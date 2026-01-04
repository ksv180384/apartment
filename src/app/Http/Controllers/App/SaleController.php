<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Resources\App\NameListResource;
use App\Http\Resources\App\Property\PropertyResource;
use App\Http\Resources\App\Property\PropertyShowResource;
use App\Http\Resources\PaginationResource;
use App\Services\PropertyService;
use App\Services\PropertyTypeService;
use Inertia\Inertia;

class SaleController extends Controller
{
    public function index(PropertyService $propertyService, PropertyTypeService $propertyTypeService)
    {
        $propertyTypes = $propertyTypeService->PropertyTypesActiveList();
        $properties = $propertyService->salesPublishedPagination();

        return Inertia::render('Sale/Sales', [
            'propertyTypes' => NameListResource::collection($propertyTypes),
            'properties' => PropertyResource::collection($properties->items()),
            'pagination' => PaginationResource::make($properties),
            'seo' => [
                'title' => 'Продажа недвижимости | Купить квартиру, дом, коммерческую недвижимость | Агентство Триумф',
                'description' => 'Продажа недвижимости от собственников и застройщиков. Купить квартиру, дом, коммерческую недвижимость по выгодным ценам. Проверенные объекты с фото и описанием.',
                'keywords' => 'продажа недвижимости, купить квартиру, купить дом, вторичное жилье, новостройки, ипотека, коммерческая недвижимость',
                'canonical' => url('/sales'),
            ]
        ]);
    }
}
