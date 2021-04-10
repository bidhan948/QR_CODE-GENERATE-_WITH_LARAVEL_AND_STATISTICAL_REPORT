<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class addUserSubmit extends FormRequest
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
    public function rules(Request $r)
    {
        return [
         
            $r->validate(
                [
                    'name' => 'required',
                    'email' => 'required|unique:users_tbs,email',
                    'password' => 'required',
                    'total_qr' => 'required',
                ],
                [
                    'name.required' => 'Please Enter name',
                    'email.required' => 'Please Enter email',
                    'password.required' => 'Please Enter password',
                    'total_qr.required' => 'Please assign the number of Qr code',
                ]
            )
    
        ];
    }
}
