<?php

namespace App\Http\Requests\Productor;

use Illuminate\Foundation\Http\FormRequest;

class NewModelRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string|max:600',
            'image' => 'required|image|max:2048',
            'unit' => 'required|string',
            'image_1' => 'required|image|max:2048',
            'image_2' => 'required|image|max:2048',
            'image_3' => 'required|image|max:2048'
        ];
    }
}
