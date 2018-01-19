<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use willvincent\Rateable\Rateable;

class ProfileViewController extends Controller
{
    //
    public function view($id,$to=null)
    {
        $user=DB::table('users')
        ->where('users.id',$id)
        ->leftJoin('user__infos','users.id','=','user__infos.user_id')
        ->select('users.name','users.email','users.job_fee','users.id as u_id','users.rating','user__infos.*')
        ->first();
        $albums=DB::table('user_album')
            ->where('user_id',$id)
            ->get();
        $averageRating=$user->rating;
        $total_ratings=DB::table('guest_rating_and_all_reviews')->where('rated-id',$id)->count('rating')+DB::table('ratings')
                ->where('rateable_id',$id)->count('rating');
        $reviews=DB::table('guest_rating_and_all_reviews')
            ->where('rated-id',$id)
            ->whereNotNull('review')
            ->leftJoin('users','guest_rating_and_all_reviews.user_id','=','users.id')
            ->select('guest_rating_and_all_reviews.*','users.name')
            ->latest()->get();
        return view('view_profile',compact('reviews','user','total_ratings','albums','averageRating','to'));
        return $user;
    }
}
