<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendingEmailController extends Controller
{
    //
    public function __contsruct(){
        $this->middleware('guest');
    }

    public function contact(Request $request,$id)
    {
        $this->validate($request,[
           'mobile'=>'required|numeric|min:11|',
        ]);
        $user=User::find($id);
        Mail::send('emails.contactPhotographer',['user'=>$user,'mail'=>$request],function($m)use($user,$request){
            $m->from($request->email,$request->name);
            $m->to($user->email,$user->name)->subject('Contact for Job');
        });
        if(count(Mail::failures()==0)){
            notify()->flash('Email sent','success',[
                'text'=>'Your mail has been sent.',
                'timer'=>4000
            ]);
        }
        return back();
    }
}
