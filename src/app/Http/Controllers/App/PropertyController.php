<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Resources\App\Property\PropertyResource;
use App\Http\Resources\PaginationResource;
use App\Services\PropertyService;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index(PropertyService $propertyService)
    {
        $properties = $propertyService->propertiesPagination();

        return Inertia::render('Property/Properties', [
            'properties' => PropertyResource::collection($properties->items()),
            'pagination' => PaginationResource::make($properties),
        ]);
    }
}
