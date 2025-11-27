<?php

namespace App\Http\Requests\Admin\BuildingClass;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBuildingClassRequest extends FormRequest
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
        return [
            'name' => [
                'required',
                'min:2',
                Rule::unique('building_classes', 'name')
            ],
            'slug' => [
                'nullable',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('building_classes', 'slug')
            ],
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
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Название',
            'slug' => 'ЧПУ-ссылка',
        ];
    }
}
