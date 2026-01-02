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
        ]);
    }
}
