<?php

namespace App\Http\Requests\Admin\PropertyType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePropertyTypeRequest extends FormRequest
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
        $propertyTypeId = $this->route('id');

        return [
            'name' => [
                'required',
                'min:2',
                Rule::unique('property_types', 'name')->ignore($propertyTypeId)
            ],
            'slug' => [
                'nullable',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('property_types', 'slug')->ignore($propertyTypeId)
            ],
            'description' => 'nullable',
            'order' => 'nullable|min:0',
            'is_active' => 'boolean',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название" обязательно для заполнения.',
            'name.unique' => 'Вид недвижимости с таким названием уже существует.',
            'name.min' => 'Название должно содержать не менее 2-х символов.',
            'slug.regex' => 'Поле "Slug" должно содержать только латинские буквы, цифры и дефисы.',
            'slug.unique' => 'Вид недвижимости с таким slug уже существует.',
            'description.max' => 'Поле "Описание" не должно превышать 1000 символов.',
            'order.min' => 'Поле "Порядок" должно быть не менее 0.',
            'is_active.boolean' => 'Поле "Активность" должно быть true или false.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Название',
            'slug' => 'ЧПУ-ссылка',
            'description' => 'Описание',
            'order' => 'Порядок',
            'is_active' => 'Активность',
            'meta_title' => 'Название для поисковых систем',
            'meta_description' => 'Описание категории для поисковых систем',
        ];
    }
}
