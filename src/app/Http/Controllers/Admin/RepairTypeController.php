<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RepairType\CreateRepairTypeRequest;
use App\Http\Requests\Admin\RepairType\UpdateRepairTypeRequest;
use App\Http\Resources\Admin\RepairType\RepairTypeResource;
use App\Models\RepairType;
use App\Services\RepairTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RepairTypeController extends Controller
{
    public function index(RepairTypeService $repairTypeService)
    {
        $repairTypes = $repairTypeService->repairTypes();

        return Inertia::render('RepairType/RepairTypes', [
            'repairTypes' => RepairTypeResource::collection($repairTypes),
        ]);
    }

    public function create()
    {
        return Inertia::render('RepairType/CreateRepairType', []);
    }

    public function store(CreateRepairTypeRequest $request, RepairTypeService $repairTypeService)
    {
        $repairTypeService->create($request->validated());

        return Redirect::route('admin.repair_types.index');
    }

    public function edit(int $id)
    {
        $repairType = RepairType::query()->findOrFail($id);

        return Inertia::render('RepairType/EditRepairType', [
            'repairType' => $repairType,
        ]);
    }

    public function update(UpdateRepairTypeRequest $request, int $id, RepairTypeService $repairTypeService)
    {
        $repairTypeService->update($id, $request->validated());

        return Redirect::route('admin.repair_types.index');
    }

    public function destroy(int $id, RepairTypeService $repairTypeService)
    {
        $repairTypeService->destroy($id);

        return Redirect::back();
    }
}
