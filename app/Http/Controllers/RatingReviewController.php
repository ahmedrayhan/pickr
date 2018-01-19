<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use willvincent\Rateable;
use Illuminate\Support\Facades\DB;

class RatingReviewController extends Controller
{
    //
    /**
     * @param $rated_id
     * @return array
     */
    public function rateByGuest(Request $request,$rated_id)
    {
        $count=DB::table('guest_rating_and_all_reviews')
            ->where([['rated-id',$rated_id],['guest_email',$request->email]])
            ->count();
        if($count>0){
            notify()->flash('Forbidden','error',[
                'text'=>'You have already rated this profile'
            ]);
        }
        else{
            DB::table('guest_rating_and_all_reviews')->insert([
                'rating'=>$request->rating,
                'rated-id'=>$rated_id,
                'rated_by'=>'guest',
                'guest_email'=>$request->email,
            ]);
            $guest_rate=DB::table('guest_rating_and_all_reviews')->where('rated-id',$rated_id)->avg('rating');
            $user_rating= User::find($rated_id)->averageRating;
            if($user_rating==0){
                $averageRating=$guest_rate;
            }
            elseif ($guest_rate==0){
                $averageRating=$user_rating;
            }
            else{$averageRating=($guest_rate+$user_rating)/2;
            }
            DB::table('users')->where('id',$rated_id)->update(['rating'=>$averageRating]);
            notify()->flash('Thank You','success',[
                'text'=>'Your rating posted successfully'
            ]);
        }
        return back();

    }

    public function rateByUser($rated_id,$ratingVal)
    {
        $user_id=Auth::user()->id;
        $count=DB::table('ratings')
            ->where([['user_id',$user_id],['rateable_id',$rated_id]])
            ->count();
        if ($rated_id==$user_id){
            notify()->flash('Forbidden','error',[
                'text'=>'You can not rate your own profile'
                ,'timer'=>4000
            ]);
        }
        elseif($count>0){
            notify()->flash('Duplicate','error',[
                'text'=>'You can rate a profile once',
                'timer'=>4000
            ]);
        }
        else{
            $user=User::find($rated_id);
            $rating = new Rateable\Rating;
            $rating->rating =$ratingVal;
            $rating->user_id = $user_id;
            $user->ratings()->save($rating);
            $guest_rate=DB::table('guest_rating_and_all_reviews')->where('rated-id',$rated_id)->avg('rating');
            $user_rating= User::find($rated_id)->averageRating;
            if($user_rating==0){
                $averageRating=$guest_rate;
            }
            elseif ($guest_rate==0){
                $averageRating=$user_rating;
            }
            else{$averageRating=($guest_rate+$user_rating)/2;
            }
            DB::table('users')->where('id',$rated_id)->update(['rating'=>$averageRating]);
            notify()->flash('Thank You','success',[
                'text'=>'Your rating has been posted successfully',
                'timer'=>4000
            ]);
        }
        return back();
    }

    public function postReview(Request $request,$id)
    {
        if(Auth::guest()){
            $count=DB::table('guest_rating_and_all_reviews')
                ->where([['rated-id',$id],['guest_email',$request->email]])
                ->count();
            if($count>0){
                $review=DB::table('guest_rating_and_all_reviews')
                    ->where('guest_email',$request->email)
                    ->select('guest_rating_and_all_reviews.review')
                    ->first();

                if($review->review!=null){
                    notify()->flash('Error','error',[
                        'text'=>'Review with this email is already posted once',
                        'timer'=>4000
                    ]);
                }else{
                    DB::table('guest_rating_and_all_reviews')
                        ->where('guest_email',$request->email)
                        ->update(['review'=>$request->review,'guest_name'=>$request->name,'created_at'=>Carbon::now()]);
                }
            }
            else{
                DB::table('guest_rating_and_all_reviews')
                    ->insert([
                        'rated-id'=>$id,
                        'rated_by'=>'guest',
                        'guest_email'=>$request->email,
                        'guest_name'=>$request->name,
                        'review'=>$request->review,
                        'created_at'=>Carbon::now()
                    ]);
            }
            return back();
        }
        else{
            $user=Auth::user();
            $count=DB::table('guest_rating_and_all_reviews')
                ->where([['rated-id',$id],['user_id',$user->id]])
                ->count('review');
            if($count>0){
                notify()->flash('Forbidden','error',[
                    'text'=>'You already posted a review to this profile',
                    'timer'=>4000
                ]);
            }
            elseif ($user->id==$id){
                notify()->flash('Shame','error',[
                    'text'=>'Posting review about yourself is not allowed',
                    'timer'=>4000
                ]);
            }
            else{
                DB::table('guest_rating_and_all_reviews')
                    ->insert([
                        'review'=>$request->review,
                        'user_id'=>$user->id,
                        'rated-id'=>$id,
                        'rated_by'=>'user',
                        'created_at'=>Carbon::now()
                    ]);
            }
            return back();
        }

    }

    public function show($id)
    {
        return DB::table('guest_rating_and_all_reviews')->where('rated-id',$id)->avg('rating');
    }
}
