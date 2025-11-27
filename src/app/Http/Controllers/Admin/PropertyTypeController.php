<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyType\CreatePropertyTypeRequest;
use App\Http\Requests\Admin\PropertyType\UpdatePropertyTypeRequest;
use App\Http\Resources\Admin\PropertyType\PropertyTypeResource;
use App\Http\Resources\PaginationResource;
use App\Models\PropertyType;
use App\Services\PropertyTypeService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PropertyTypeController extends Controller
{
    public function index(PropertyTypeService $propertyTypeService)
    {
        $propertyTypesPaginate = $propertyTypeService->PropertyTypesPaginate();

        return Inertia::render('PropertyType/PropertyTypes', [
            'propertyTypes' => PropertyTypeResource::collection($propertyTypesPaginate->items()),
            'pagination' => PaginationResource::make($propertyTypesPaginate),
        ]);
    }

    public function create()
    {
        $lastOrder = PropertyType::query()->max('order');
        $lastOrder = ($lastOrder ?: 0) + 1;

        return Inertia::render('PropertyType/CreatePropertyType', [
            'lastOrder' => $lastOrder,
        ]);
    }

    public function store(CreatePropertyTypeRequest $request, PropertyTypeService $propertyTypeService)
    {
        $propertyTypeService->create($request->validated());

        return Redirect::route('admin.property_types.index');
    }

    public function edit(int $id)
    {
        $propertyType = PropertyType::query()->findOrFail($id);

        return Inertia::render('PropertyType/EditPropertyType', [
            'propertyType' => $propertyType,
        ]);
    }

    public function update(UpdatePropertyTypeRequest $request, int $id, PropertyTypeService $propertyTypeService)
    {
        $propertyTypeService->update($id, $request->validated());

        return Redirect::route('admin.property_types.index');
    }

    public function destroy(int $id, PropertyTypeService $propertyTypeService)
    {
        $propertyTypeService->destroy($id);

        return Redirect::back();
    }
}
