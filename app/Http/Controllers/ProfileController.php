<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumUpload;
use App\Http\Requests\UpdateProfileInfo;
use App\User_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Auth;
use DB;
class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=Auth::user();
        $id=$user->id;
        $images='';
        $albums=DB::table('user_album')
        ->where('user_id',$id)
        ->select('user_album.*')->get();
        $total_ratings=DB::table('guest_rating_and_all_reviews')->where('rated-id',$id)->count('rating')+DB::table('ratings')
                ->where('rateable_id',$id)->count('rating');
        if(file_exists(public_path('/images/'.$id.'/avatars'))){
            $images=File::allFiles(public_path('/images/'.$id.'/avatars'));
        }
        return view('profile',compact('user','images','albums','total_ratings'));
    }

    public function showUpdatePage($id)
    {
        $id=Crypt::decrypt($id);
        $info=User_Info::where('user_id',$id)->first();
        return view('partials.update',compact('info'));
    }

    /**
     * @param UpdateProfileInfo $request
     */
    public function updateInfo(UpdateProfileInfo $request)
    {
        $id=Auth::user()->id;
        if ($request->has('job_fee')){
            $user=User::find($id);
            $user->job_fee=$request->job_fee;
            $user->save();
        }
        $category=$request->cat;
        $count=DB::table('category')->where('user_id',$id)->count();
        if($count>0){
            DB::table('category')->where('user_id',$id)->delete();
        }
        foreach ($category as $cat) {
            DB::table('category')
                ->insert([
                   'user_id'=>$id,
                    'category'=>$cat
                ]);
        }
        $info=User_Info::where('user_id',$id)->first();
        if(!$info){
            $userInfo=new User_Info($request->except('cat','job_fee'));
            Auth::user()->info()->save($userInfo);
        }
        else{
            DB::table('user__infos')
            ->where('user_id',$id)
            ->update($request->except('_token','cat','job_fee'));
        }
        return redirect('profile');
    }
    public function fileUpload(Request $request)
    {

        $id=Auth::user()->id;
        $validator=Validator::make(['image'=>$request->image], [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails()){

            return back()->withErrors($validator);
//            notify()->flash('Oops!', 'error',[
//                'text'=>'There must be an error. Please select an image file(jpeg, jpg, gif, png) less then 2048kb',
//                'error'=>'true'
//            ]);
        }else{
        $avatar = $request->file('image');
        $name='avatar.'.$avatar->getClientOriginalExtension();
        $avatarPath = public_path('/images/avatars/'.$id);
        $avatar->move($avatarPath, $name);
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/'.$id.'/avatars');
        if(!file_exists($destinationPath)){
            File::makeDirectory(public_path('/images/'.$id));
            File::makeDirectory(public_path('/images/'.$id.'/avatars'));
        }
        $copyFile=$destinationPath.'/'.$imageName;//
        if(!File::copy(($avatarPath.'/'.$name),$copyFile)){
            die('cant copy');
        }
        Image::make($avatarPath.'/'.$name)->encode('jpg', 100)->save(public_path('images/avatars/'.$id.'/avatar.jpg'));
        notify()->flash('Uploaded!', 'success',[
            'text'=>'Your image was uploaded successfully',
            'timer'=>2000,
        ]);
        }
        return back();
    }

    public function createAlbum(Request $request)
    {
        $user_id=Auth::user()->id;
        $this->validate($request,[
            'album_name'=>'unique:user_album,album_name,NULL,id,user_id,'.$user_id
        ]);
        $user_id=Auth::user()->id;
        $album_name=$request->album_name;
        if(!file_exists(public_path('/images/'.$user_id.'/albums'))){
            File::makeDirectory(public_path('/images/' . $user_id . '/albums'));
        }
        File::makeDirectory(public_path('/images/'.$user_id.'/albums/'.$album_name));
        $album_path=public_path('/images/'.$user_id.'/albums/'.$album_name);
        $files=$request->file('images');
        $file_count=count($files);
        $upload_count=0;
        $numberdname=1;
        foreach ($files as $file) {
            $rules=['file'=>'image|mimes:png,jpeg,jpg,gif,svg|max:1024'];
            $validator=Validator::make(['file'=>$file],$rules);
            if($validator->passes()){
                $filename=$file->getClientOriginalName();
                Image::make($file)->encode('jpg',100)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($album_path.'/'.$numberdname.'.jpg');
                $upload_count++;
                $numberdname++;
            }
        }
        if($upload_count==$file_count){
            DB::table('user_album')->insert([
                'user_id'=>$user_id,
                'album_name'=>$album_name,
                'imageCount'=>$file_count
            ]);
        }
        return back()->withErrors($validator);
    }

    public function addImage(Request $request,$album_name)
    {
        $user_id=Auth::user()->id;
        $album_path=public_path('/images/'.$user_id.'/albums/'.$album_name);
        $files=$request->file('addImages');
        $file_count=count($files);
        $upload_count=0;
        $user_album=DB::table('user_album')
        ->where([['user_id',$user_id],['album_name',$album_name]])
        ->select('user_album.imageCount')->first();
        $numberdname=$user_album->imageCount;
        foreach ($files as $file) {
            $rules=['addImages'=>'image|mimes:png,jpeg,jpg,gif,svg|max:1024'];
            $validator=Validator::make(['addImages'=>$file],$rules);
            if($validator->passes()){
                $filename=$file->getClientOriginalName();
                Image::make($file)->encode('jpg',100)->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($album_path.'/'.++$numberdname.'.jpg');
                $upload_count++;
            }
        }
        if($upload_count==$file_count){
            DB::table('user_album')
                ->where([['user_id',$user_id],['album_name',$album_name]])
                ->update([
                'imageCount'=>$numberdname
            ]);
        }
        return back()->withErrors($validator);
    }

    public function deleteAlbum($album_name)
    {
        $id=Auth::user()->id;
        $album_path=public_path('/images/'.$id.'/albums/'.$album_name);
        File::deleteDirectory($album_path);
        DB::table('user_album')->where([['user_id',$id],['album_name',$album_name]])->delete();
        return back();
    }

    public function deleteImage($album_name,$image)
    {
        $id=Auth::user()->id;
        $user_album=DB::table('user_album')
            ->where([['user_id',$id],['album_name',$album_name]])
            ->select('user_album.imageCount')->first();
        $numberdname=$user_album->imageCount;
        $delImage=public_path('/images/'.$id.'/albums/'.$album_name.'/'.$image.'.jpg');
        if(File::delete($delImage)){
            $numberdname--;
        }
        DB::table('user_album')->where([['user_id',$id],['album_name',$album_name]])->update(['imageCount'=>$numberdname]);
        return back();
    }
    
}
