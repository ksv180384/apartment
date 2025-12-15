<?php

namespace App\Http\Requests\Admin\Property;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePropertyRequest extends FormRequest
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
        $rules = [
            'user_id' => 'nullable|integer|exists:users,id',
            'title' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable',
            'category_id' => 'nullable',
            'property_type_id' => 'nullable',
            'is_published' => 'nullable',
            'area_total' => 'nullable',
            'area_living' => 'nullable',
            'floor' => 'nullable',
            'floors_total' => 'nullable',
            'rooms_total' => 'nullable',
            'bathrooms_total' => 'nullable',
            'year_built' => 'nullable',
            'condition_id' => 'nullable',
            'repair_type_id' => 'nullable',
            'region' => 'nullable',
            'city' => 'nullable',
            'district' => 'nullable',
            'street' => 'nullable',
            'house_number' => 'nullable',
            'apartment_number' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'property_type_slug' => 'nullable',
            'image_preview' => 'nullable',
            'images' => 'nullable',
            'sub_data' => 'nullable',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
//            'name.required' => 'Поле "Название" обязательно для заполнения.',
//            'name.unique' => 'Категория с таким названием уже существует.',
//            'name.min' => 'Название должно содержать не менее 2-х символов.',
//            'slug.regex' => 'Поле "Slug" должно содержать только латинские буквы, цифры и дефисы.',
//            'slug.unique' => 'Категория с таким slug уже существует.',
        ];
    }

    public function attributes(): array
    {
        return [
//            'name' => 'Название',
//            'slug' => 'ЧПУ-ссылка',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }
}
