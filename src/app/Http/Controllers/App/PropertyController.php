<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Resources\App\Property\PropertyResource;
use App\Http\Resources\App\Property\PropertyShowResource;
use App\Http\Resources\PaginationResource;
use App\Services\PropertyService;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function index(PropertyService $propertyService)
    {
        $properties = $propertyService->propertiesPublishedPagination();

        return Inertia::render('Property/Properties', [
            'properties' => PropertyResource::collection($properties->items()),
            'pagination' => PaginationResource::make($properties),
        ]);
    }

    public function show(int $id, PropertyService $propertyService)
    {
        $property = $propertyService->getPublishedById($id);

        return Inertia::render('Property/PropertyShow', [
            'property' => PropertyShowResource::make($property),
            'seo' => [
                'title' => $property->title,
                'description' => $property->title,
                'keywords' => $property->title,
                'canonical' => url('/properties' . $id),
            ]
        ]);
    }
}
