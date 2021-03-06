<?php

namespace App\Http\Requests\Productor;

use Illuminate\Foundation\Http\FormRequest;

class NewTransformationRequest extends FormRequest
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
            'title' => 'required|string',
            'model_id' => 'required|integer',
            'image' => 'required|image|max:2048',
            'description' => 'required|string|max:600',
            'unit' => 'required|string',
            'image_1' => 'required|image|max:2048',
            'image_2' => 'required|image|max:2048',
            'image_3' => 'required|image|max:2048',
            'prev_transformation_id' => 'required|integer',
            'type' => 'required|in:INTERMEDIATE,FINAL'
        ];
    }
}
