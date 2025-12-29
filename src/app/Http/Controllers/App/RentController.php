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

class RentController extends Controller
{
    public function index(PropertyService $propertyService, PropertyTypeService $propertyTypeService)
    {
        $propertyTypes = $propertyTypeService->PropertyTypesActiveList();
        $properties = $propertyService->rentsPublishedPagination();

        return Inertia::render('Rent/Rents', [
            'propertyTypes' => NameListResource::collection($propertyTypes),
            'properties' => PropertyResource::collection($properties->items()),
            'pagination' => PaginationResource::make($properties),
        ]);
    }
}
