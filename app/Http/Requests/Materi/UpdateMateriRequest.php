<?php

namespace App\Http\Requests\Materi;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMateriRequest extends FormRequest
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
            'title' => 'required|max:191',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'start' => 'required',
            'end' => 'required',
            'description' => 'required|max:191',
            'description2' => 'required',
            'subtitle' => 'required'
        ];
    }
}
