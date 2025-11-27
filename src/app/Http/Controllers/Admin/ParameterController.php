<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PropertyType\PropertyTypeResource;
use App\Http\Resources\PaginationResource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ParameterController extends Controller
{
    public function index()
    {
        $parameters = [
            ['name' => 'Общие характеристики', 'path_name' => null],
            ['name' => 'Состояние', 'path_name' => 'admin.conditions.index'],
            ['name' => 'Типы ремонта', 'path_name' => 'admin.repair_types.index'],
            ['name' => 'Квартиры/Новостройки', 'path_name' => null],
            ['name' => 'Класс жилья', 'path_name' => 'admin.building_classes.index'],
            ['name' => 'Тип дома', 'path_name' => 'admin.building_types.index'],
            ['name' => 'Тип отделки', 'path_name' => 'admin.finishing_types.index'],
            ['name' => 'Коммерческая недвижимость', 'path_name' => null],
            ['name' => 'Типы коммерческой недвижимости', 'path_name' => 'admin.commercial_types.index'],
            ['name' => 'Назначение', 'path_name' => 'admin.purposes.index'],
            ['name' => 'Планировка', 'path_name' => 'admin.layout_types.index'],
            ['name' => 'Гаражи', 'path_name' => null],
            ['name' => 'Тип гаража', 'path_name' => 'admin.garage_types.index'],
            ['name' => 'Форма собственности', 'path_name' => 'admin.ownership_types.index'],
        ];

        return Inertia::render('Parameters/Parameters', [
            'parameters' => $parameters,
        ]);
    }
}
