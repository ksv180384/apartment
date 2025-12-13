<?php

namespace App\Http\Requests\Admin\Property;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePropertyRequest extends FormRequest
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


//        if($this->property_type_slug === 'novostroiki'){
//            $rules = array_merge($rules, [
//                'completion_date' => 'nullable',
//                'building_name' => 'nullable',
//                'developer' => 'nullable',
//                'building_class_id' => 'nullable',
//                'building_type_id' => 'nullable',
//                'building_floors' => 'nullable',
//                'apartments_total' => 'nullable',
//                'finishing_type_id' => 'nullable',
//                'has_installment' => 'nullable|boolean',
//                'has_mortgage' => 'nullable|boolean',
//                'has_balcony' => 'nullable|boolean',
//                'has_loggia' => 'nullable|boolean',
//            ]);
//        }
//        elseif($this->property_type_slug === 'kvartiry'){
//            $rules = array_merge($rules, [
//                'completion_date' => 'nullable',
//                'building_name' => 'nullable',
//                'developer' => 'nullable',
//                'building_class_id' => 'nullable',
//                'building_type_id' => 'nullable',
//                'building_floors' => 'nullable',
//                'apartments_total' => 'nullable',
//                'finishing_type_id' => 'nullable',
//                'has_installment' => 'nullable|boolean',
//                'has_mortgage' => 'nullable|boolean',
//                'has_balcony' => 'nullable|boolean',
//                'has_loggia' => 'nullable|boolean',
//            ]);
//        }
//        elseif($this->property_type_slug === 'doma'){
//            $rules = array_merge($rules, [
//                'land_area' => 'nullable',
//                'bedrooms_total' => 'nullable',
//                'wall_material' => 'nullable',
//                'roof_material' => 'nullable',
//                'foundation_type' => 'nullable',
//                'has_electricity' => 'nullable|boolean',
//                'has_water_supply' => 'nullable|boolean',
//                'has_sewage' => 'nullable|boolean',
//                'has_heating' => 'nullable|boolean',
//                'has_gas' => 'nullable|boolean',
//                'has_internet' => 'nullable|boolean',
//                'has_phone_line' => 'nullable|boolean',
//                'has_garage' => 'nullable|boolean',
//                'has_basement' => 'nullable|boolean',
//                'has_attic' => 'nullable|boolean',
//                'has_balcony' => 'nullable|boolean',
//                'has_terrace' => 'nullable|boolean',
//                'has_veranda' => 'nullable|boolean',
//                'has_pool' => 'nullable|boolean',
//                'has_sauna' => 'nullable|boolean',
//                'has_fireplace' => 'nullable|boolean',
//                'has_fence' => 'nullable|boolean',
//                'has_garden' => 'nullable|boolean',
//                'has_vegetable_garden' => 'nullable|boolean',
//                'has_lawn' => 'nullable|boolean',
//                'has_playground' => 'nullable|boolean',
//                'has_parking' => 'nullable|boolean',
//            ]);
//        }
//        elseif($this->property_type_slug === 'ucastki'){
//            $rules = array_merge($rules, [
//                'land_area' => 'nullable',
//                'land_category' => 'nullable',
//                'permitted_use' => 'nullable',
//                'relief' => 'nullable',
//                'soil_type' => 'nullable',
//                'has_utilities' => 'nullable|boolean',
//                'has_road_access' => 'nullable|boolean',
//                'has_fence' => 'nullable|boolean',
//            ]);
//        }
//        elseif($this->property_type_slug === 'kommerceskaia-nedvizimost'){
//            $rules = array_merge($rules, [
//                'commercial_type_id' => 'nullable',
//                'purpose_id' => 'nullable',
//                'parking_spaces' => 'nullable',
//                'layout_type_id' => 'nullable',
//                'has_ventilation' => 'nullable|boolean',
//                'has_air_conditioning' => 'nullable|boolean',
//                'has_security' => 'nullable|boolean',
//                'has_parking' => 'nullable|boolean',
//            ]);
//        }
//        elseif($this->property_type_slug === 'garazi'){
//            $rules = array_merge($rules, [
//                'garage_type_id' => 'nullable',
//                'ownership_type_id' => 'nullable',
//                'equipment' => 'nullable',
//                'gate_height' => 'nullable',
//                'gate_width' => 'nullable',
//                'vehicle_capacity' => 'nullable',
//                'has_electricity' => 'nullable|boolean',
//                'has_heating' => 'nullable|boolean',
//                'has_water_supply' => 'nullable|boolean',
//            ]);
//        }

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
}
