<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GarageType\CreateGarageTypeRequest;
use App\Http\Requests\Admin\GarageType\UpdateGarageTypeRequest;
use App\Http\Resources\Admin\GarageType\GarageTypeResource;
use App\Models\GarageType;
use App\Services\GarageTypeService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class GarageTypeController extends Controller
{
    public function index(GarageTypeService $garageTypeService)
    {
        $garageTypes = $garageTypeService->garageTypes();

        return Inertia::render('GarageType/GarageTypes', [
            'garageTypes' => GarageTypeResource::collection($garageTypes),
        ]);
    }

    public function create()
    {
        return Inertia::render('GarageType/CreateGarageType', []);
    }

    public function store(CreateGarageTypeRequest $request, GarageTypeService $garageTypeService)
    {
        $garageTypeService->create($request->validated());

        return Redirect::route('admin.garage_types.index');
    }

    public function edit(int $id)
    {
        $garageType = GarageType::query()->findOrFail($id);

        return Inertia::render('GarageType/EditGarageType', [
            'garageType' => $garageType,
        ]);
    }

    public function update(UpdateGarageTypeRequest $request, int $id, GarageTypeService $garageTypeService)
    {
        $garageTypeService->update($id, $request->validated());

        return Redirect::route('admin.garage_types.index');
    }

    public function destroy(int $id, GarageTypeService $garageTypeService)
    {
        $garageTypeService->destroy($id);

        return Redirect::back();
    }
}
