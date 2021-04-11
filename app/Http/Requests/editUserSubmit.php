<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class editUserSubmit extends FormRequest
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
    public function rules(Request $r,$id)
    {
        return [
            $r->validate(
                [
                    'name' => 'required',
                    'email' => 'required|unique:users_tbs,email'.$id,
                    'total_qr' => 'required',
                ],
                [
                    'name.required' => 'Please Enter name',
                    'email.required' => 'Please Enter email',
                    'total_qr.required' => 'Please assign the number of Qr code',
                ]
            )
        ];
    }
}
