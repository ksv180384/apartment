<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BuildingClass\BuildingClassListResource;
use App\Http\Resources\Admin\BuildingType\BuildingTypeListResource;
use App\Http\Resources\Admin\Category\CategoryListResource;
use App\Http\Resources\Admin\CommercialType\CommercialTypeListResource;
use App\Http\Resources\Admin\Condition\ConditionListResource;
use App\Http\Resources\Admin\FinishingType\FinishingTypeListResource;
use App\Http\Resources\Admin\GarageType\GarageTypeListResource;
use App\Http\Resources\Admin\LayoutType\LayoutTypeListResource;
use App\Http\Resources\Admin\OwnershipType\OwnershipTypeListResource;
use App\Http\Resources\Admin\Property\PropertyResource;
use App\Http\Resources\Admin\PropertyType\PropertyTypeListResource;
use App\Http\Resources\Admin\Purpose\PurposeListResource;
use App\Http\Resources\Admin\RepairType\RepairTypeListResource;
use App\Http\Resources\PaginationResource;
use App\Models\Property;
use App\Models\RepairType;
use App\Services\BuildingClassService;
use App\Services\BuildingTypeService;
use App\Services\CategoryService;
use App\Services\CommercialTypeService;
use App\Services\ConditionService;
use App\Services\FinishingTypeService;
use App\Services\GarageTypeService;
use App\Services\LayoutTypeService;
use App\Services\OwnershipTypeService;
use App\Services\PropertyService;
use App\Services\PropertyTypeService;
use App\Services\PurposeService;
use App\Services\RepairTypeService;
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

    public function create(
        CategoryService $categoryService,
        PropertyTypeService $propertyTypeService,
        ConditionService $conditionService,
        RepairTypeService $repairTypeService,
        BuildingClassService $buildingClassService,
        BuildingTypeService $buildingTypeService,
        FinishingTypeService $finishingTypeService,
        CommercialTypeService $commercialTypeService,
        PurposeService $purposeService,
        LayoutTypeService $layoutTypeService,
        GarageTypeService $garageTypeService,
        OwnershipTypeService $ownershipTypeService
    )
    {
        $categories = $categoryService->categoriesList();
        $propertyTypes = $propertyTypeService->PropertyTypesList();
        $conditions = $conditionService->conditionsList();
        $repairTypes = $repairTypeService->repairTypesList();
        $buildingClasses = $buildingClassService->buildingClassesList();
        $buildingTypes = $buildingTypeService->buildingTypesList();
        $finishingTypes = $finishingTypeService->finishingTypesList();
        $commercialTypes = $commercialTypeService->commercialTypesList();
        $purposes = $purposeService->purposesList();
        $layoutTypes = $layoutTypeService->layoutTypesList();
        $garageTypes = $garageTypeService->garageTypesList();
        $ownershipTypes = $ownershipTypeService->ownershipTypesList();


        return Inertia::render('Property/CreateProperty', [
            'categories' => CategoryListResource::collection($categories),
            'propertyTypes' => PropertyTypeListResource::collection($propertyTypes),
            'conditions' => ConditionListResource::collection($conditions),
            'repairTypes' => RepairTypeListResource::collection($repairTypes),
            'buildingClasses' => BuildingClassListResource::collection($buildingClasses),
            'buildingTypes' => BuildingTypeListResource::collection($buildingTypes),
            'finishingTypes' => FinishingTypeListResource::collection($finishingTypes),
            'commercialTypes' => CommercialTypeListResource::collection($commercialTypes),
            'purposes' => PurposeListResource::collection($purposes),
            'layoutTypes' => LayoutTypeListResource::collection($layoutTypes),
            'garageTypes' => GarageTypeListResource::collection($garageTypes),
            'ownershipTypes' => OwnershipTypeListResource::collection($ownershipTypes),
        ]);
    }
//
//    public function store(CreateRepairTypeRequest $request, RepairTypeService $repairTypeService)
//    {
//        $repairTypeService->create($request->validated());
//
//        return Redirect::route('admin.repair_types.index');
//    }
//
    public function edit(int $id)
    {
        $property = Property::query()->findOrFail($id);

        return Inertia::render('Property/EditProperty', [
            'property' => $property,
        ]);
    }
//
//    public function update(UpdateRepairTypeRequest $request, int $id, RepairTypeService $repairTypeService)
//    {
//        $repairTypeService->update($id, $request->validated());
//
//        return Redirect::route('admin.repair_types.index');
//    }
//
//    public function destroy(int $id, RepairTypeService $repairTypeService)
//    {
//        $repairTypeService->destroy($id);
//
//        return Redirect::back();
//    }
}
