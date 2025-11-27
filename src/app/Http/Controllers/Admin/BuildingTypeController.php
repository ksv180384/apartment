<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuildingClass\CreateBuildingClassRequest;
use App\Http\Requests\Admin\BuildingType\CreateBuildingTypeRequest;
use App\Http\Requests\Admin\BuildingType\UpdateBuildingTypeRequest;
use App\Http\Requests\Admin\Purpose\UpdatePurposeRequest;
use App\Http\Resources\Admin\BuildingClass\BuildingClassResource;
use App\Http\Resources\Admin\BuildingType\BuildingTypeResource;
use App\Models\BuildingClass;
use App\Models\BuildingType;
use App\Services\BuildingClassService;
use App\Services\BuildingTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BuildingTypeController extends Controller
{
    public function index(BuildingTypeService $buildingTypeService)
    {
        $buildingTypes = $buildingTypeService->buildingTypes();

        return Inertia::render('BuildingType/BuildingTypes', [
            'buildingTypes' => BuildingTypeResource::collection($buildingTypes),
        ]);
    }

    public function create()
    {
        return Inertia::render('BuildingType/CreateBuildingType', []);
    }

    public function store(CreateBuildingTypeRequest $request, BuildingTypeService $buildingTypeService)
    {
        $buildingTypeService->create($request->validated());

        return Redirect::route('admin.building_types.index');
    }

    public function edit(int $id)
    {
        $buildingType = BuildingType::query()->findOrFail($id);

        return Inertia::render('BuildingType/EditBuildingType', [
            'buildingType' => $buildingType,
        ]);
    }

    public function update(UpdateBuildingTypeRequest $request, int $id, BuildingTypeService $buildingTypeService)
    {
        $buildingTypeService->update($id, $request->validated());

        return Redirect::route('admin.building_types.index');
    }

    public function destroy(int $id, BuildingTypeService $buildingTypeService)
    {
        $buildingTypeService->destroy($id);

        return Redirect::back();
    }
}
