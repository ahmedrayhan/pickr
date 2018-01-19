<?php

namespace App\Http\Requests;

use App\User_Info;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileInfo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $info=User_Info::where('user_id',Auth::user()->id)->first();
        if(!$info){
            return [
                'about'=>'min:50|string|required|',
                'phone'=>'min:11|numeric',
                //
            ];
        }
        return [
            'about'=>'min:50|string|required|',
            'fblink'=>'url|unique:user__infos,fblink,'.$info->id,
            'twtlink'=>'url|unique:user__infos,twtlink,'.$info->id,
            'instalink'=>'url|unique:user__infos,instalink,'.$info->id,
            'phone'=>'min:11|numeric',
            //
        ];
    }
}
