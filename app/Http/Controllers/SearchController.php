<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{
    //
    /**
     * @param $type
     * @return mixed
     */
    public function index($type)
    {
        $cat=$type;
        if($type =='family'||$type =='corporate'){
            $cat ='events';
        }elseif ($type =='product'||$type =='advertisement'){
            $cat ='commercial';
        }
        $users = DB::table('category')
        ->where('category',$cat)
        ->join('users','users.id','=','category.user_id')
        ->select('users.id','users.rating','users.name','users.email','users.job_fee','category.category')
        ->get();
        return view('search_result',compact('users','type'));
    }

    public function sortBy(Request $request)
    {
        $type=$request->category;
        $cat=$type;
        if($type =='family'||$type =='corporate'){
            $cat ='events';
        }elseif ($type =='product'||$type =='advertisement'){
            $cat ='commercial';
        }
        if($request->sort=='name'){
            $users = DB::table('category')
                ->where('category',$cat)
                ->join('users','users.id','=','category.user_id')
                ->select('users.id','users.rating','users.name','users.email','users.job_fee','category.category')
                ->oldest($request->sort)
                ->get();
        }else {
            $users = DB::table('category')
                ->where('category', $cat)
                ->join('users', 'users.id', '=', 'category.user_id')
                ->select('users.id', 'users.rating', 'users.name', 'users.email','users.job_fee', 'category.category' )
                ->latest($request->sort)
                ->get();
        }
        if($request->ajax()){
            return view('partials.search_result',compact('users','type'));
        }
        return view('search_result',compact('users','type'));

    }
}
