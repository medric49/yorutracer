<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'logo' => 'required|image|max:2048',
            'type' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'website' => 'url',
            'tel' => 'required|string',
            'lon' => 'required|numeric',
            'lat' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed'
        ];
    }
}
