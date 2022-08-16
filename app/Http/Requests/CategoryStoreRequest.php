<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'カテゴリ名は必須です。',
            'name.unique' => 'そのカテゴリ名は登録済みです。',
            'description.required' => 'カテゴリの説明は必須です。',
        ];
    }

}
