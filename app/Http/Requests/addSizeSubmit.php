<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class addSizeSubmit extends FormRequest
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
                'Size'=>'required|unique:sizes,size'
            ],
            [
                'Size.required'=>"Please Enter Unique Size"
            ])
        ];
    }
}
