<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OwnershipType\CreateOwnershipTypeRequest;
use App\Http\Requests\Admin\OwnershipType\UpdateOwnershipTypeRequest;
use App\Http\Requests\Admin\RepairType\CreateRepairTypeRequest;
use App\Http\Requests\Admin\RepairType\UpdateRepairTypeRequest;
use App\Http\Resources\Admin\RepairType\RepairTypeResource;
use App\Models\OwnershipType;
use App\Models\RepairType;
use App\Services\OwnershipTypeService;
use App\Services\RepairTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class OwnershipTypeController extends Controller
{
    public function index(OwnershipTypeService $ownershipTypeService)
    {
        $ownershipTypes = $ownershipTypeService->ownershipTypes();

        return Inertia::render('OwnershipType/OwnershipTypes', [
            'ownershipTypes' => RepairTypeResource::collection($ownershipTypes),
        ]);
    }

    public function create()
    {
        return Inertia::render('OwnershipType/CreateOwnershipType', []);
    }

    public function store(CreateOwnershipTypeRequest $request, OwnershipTypeService $ownershipTypeService)
    {
        $ownershipTypeService->create($request->validated());

        return Redirect::route('admin.ownership_types.index');
    }

    public function edit(int $id)
    {
        $ownershipType = OwnershipType::query()->findOrFail($id);

        return Inertia::render('OwnershipType/EditOwnershipType', [
            'ownershipType' => $ownershipType,
        ]);
    }

    public function update(UpdateOwnershipTypeRequest $request, int $id, OwnershipTypeService $ownershipTypeService)
    {
        $ownershipTypeService->update($id, $request->validated());

        return Redirect::route('admin.ownership_types.index');
    }

    public function destroy(int $id, OwnershipTypeService $ownershipTypeService)
    {
        $ownershipTypeService->destroy($id);

        return Redirect::back();
    }
}
