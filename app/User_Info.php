<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Info extends Model
{
    //
    protected $fillable=[
        'about','address','phone','city','fblink','price','avatarLink','twlink','instalink'
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
