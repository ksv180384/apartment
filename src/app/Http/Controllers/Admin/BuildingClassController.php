<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuildingClass\CreateBuildingClassRequest;
use App\Http\Requests\Admin\BuildingClass\UpdateBuildingClassRequest;
use App\Http\Requests\Admin\Purpose\UpdatePurposeRequest;
use App\Http\Resources\Admin\BuildingClass\BuildingClassResource;
use App\Models\BuildingClass;
use App\Services\BuildingClassService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BuildingClassController extends Controller
{
    public function index(BuildingClassService $buildingClassService)
    {
        $buildingClasses = $buildingClassService->buildingClasses();

        return Inertia::render('BuildingClass/BuildingClasses', [
            'buildingClasses' => BuildingClassResource::collection($buildingClasses),
        ]);
    }

    public function create()
    {
        return Inertia::render('BuildingClass/CreateBuildingClass', []);
    }

    public function store(CreateBuildingClassRequest $request, BuildingClassService $buildingClassService)
    {
        $buildingClassService->create($request->validated());

        return Redirect::route('admin.building_classes.index');
    }

    public function edit(int $id)
    {
        $buildingClass = BuildingClass::query()->findOrFail($id);

        return Inertia::render('BuildingClass/EditBuildingClass', [
            'buildingClass' => $buildingClass,
        ]);
    }

    public function update(UpdateBuildingClassRequest $request, int $id, BuildingClassService $buildingClassService)
    {
        $buildingClassService->update($id, $request->validated());

        return Redirect::route('admin.building_classes.index');
    }

    public function destroy(int $id, BuildingClassService $buildingClassService)
    {
        $buildingClassService->destroy($id);

        return Redirect::back();
    }
}
