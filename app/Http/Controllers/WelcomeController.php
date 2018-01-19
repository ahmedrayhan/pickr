<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $photographers=User::all();
        return view('welcome',compact('photographers'));
    }
}
