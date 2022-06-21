<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebRequest extends FormRequest
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
            'listname' => [],
            'file' => 'required|file|mimes:txt',
            'startport' => 'nullable|numeric|between:1,65535',
            'endport' => 'nullable|numeric|between:1,65535|gte:startport',
        ];
    }
}