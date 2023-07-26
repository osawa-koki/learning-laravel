<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrefectureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:10',
            'capital' => 'required|string|max:10',
            'description' => 'nullable|string|max:100',
            'population' => 'required|integer|min:0',
            'area' => 'required|integer|min:0',
            'visited' => 'required|boolean',
        ];
    }
}
