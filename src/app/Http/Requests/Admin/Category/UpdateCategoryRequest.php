<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categoryId = $this->route('id');

        return [
            'name' => [
                'required',
                'min:2',
                Rule::unique('categories', 'name')->ignore($categoryId)
            ],
            'slug' => [
                'nullable',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('categories', 'slug')->ignore($categoryId)
            ],
            'order' => 'nullable|min:0',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название" обязательно для заполнения.',
            'name.unique' => 'Категория с таким названием уже существует.',
            'name.min' => 'Название должно содержать не менее 2-х символов.',
            'slug.regex' => 'Поле "Slug" должно содержать только латинские буквы, цифры и дефисы.',
            'slug.unique' => 'Категория с таким slug уже существует.',
            'order.min' => 'Поле "Порядок" должно быть не менее 0.',
            'is_active.boolean' => 'Поле "Активность" должно быть true или false.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Название',
            'slug' => 'ЧПУ-ссылка',
            'order' => 'Порядок',
            'is_active' => 'Активность',
        ];
    }
}
