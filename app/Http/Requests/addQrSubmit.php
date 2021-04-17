<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class addQrSubmit extends FormRequest
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
                    'name'=>'required',
                    'link'=>'required',
                ],
                [
                    'name.required'=>'Please enter the name of Qr code',
                    'link.required'=>'Please enter the link of  Qr code',
                ]
            )
        ];
    }
}
