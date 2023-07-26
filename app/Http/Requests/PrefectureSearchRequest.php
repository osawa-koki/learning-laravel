<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrefectureSearchRequest extends FormRequest
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
            'name' => 'nullable|string|max:10',
            'capital' => 'nullable|string|max:10',
            'description' => 'nullable|string|max:100',
            'population-min' => 'required|integer|min:0',
            'population-max' => 'required|integer|min:0',
            'area-min' => 'required|integer|min:0',
            'area-max' => 'required|integer|min:0',
            'population-density-min' => 'required|integer|min:0',
            'population-density-max' => 'required|integer|min:0',
            'visited' => 'required|boolean',
        ];
    }
}
