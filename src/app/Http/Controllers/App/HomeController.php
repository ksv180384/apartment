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

class HomeController extends Controller
{
    public function index(PropertyService $propertyService)
    {

        $lastProperties = $propertyService->lastProperties(4);

        return Inertia::render('Home/Home', [
            'lastProperties' => PropertyResource::collection($lastProperties),
            'seo' => [
                'title' => 'Агентство недвижимости "Триумф" - Купить, продать, арендовать жилье',
                'description' => 'Надежное агентство недвижимости "Триумф". Помогаем купить, продать или арендовать квартиру, дом, коммерческую недвижимость. Юридическая чистота сделок, сопровождение "под ключ".',
                'keywords' => 'недвижимость, купить квартиру, продать квартиру, аренда жилья, агентство недвижимости, Триумф, купить дом, ипотека, вторичное жилье, новостройки',
                'canonical' => url()->current(),
            ]
        ]);
    }
}
