<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use Illuminate\Http\Request;

class userRegister extends FormRequest
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
        return [
            'user_type'=>'required|string|max:40',
            'first_name' => 'required|string|max:55',
            'second_name' => 'required|string|max:55',
            'third_name' => 'required|string|max:55',
            'gender' => 'required|string|max:25',
            'id_number' => 'required|string|max:55',
            'box_number' => 'required|string|max:55',
            'zip_code' => 'required|string|max:55',
            'postal_town' => 'required|string|max:55',
            'total_milk' => 'required|string|max:55',
            'email' => 'required|string|email|max:55|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
