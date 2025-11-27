<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommercialType\CreateCommercialTypeRequest;
use App\Http\Requests\Admin\CommercialType\UpdateCommercialTypeRequest;
use App\Http\Resources\Admin\CommercialType\CommercialTypeResource;
use App\Models\CommercialType;
use App\Services\CommercialTypeService;
use App\Services\RepairTypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CommercialTypeController extends Controller
{
    public function index(CommercialTypeService $commercialTypeService)
    {
        $commercialTypes = $commercialTypeService->commercialTypes();

        return Inertia::render('CommercialType/CommercialTypes', [
            'repairTypes' => CommercialTypeResource::collection($commercialTypes),
        ]);
    }

    public function create()
    {
        return Inertia::render('CommercialType/CreateCommercialType', []);
    }

    public function store(CreateCommercialTypeRequest $request, CommercialTypeService $commercialTypeService)
    {
        $commercialTypeService->create($request->validated());

        return Redirect::route('admin.commercial_types.index');
    }

    public function edit(int $id)
    {
        $commercialType = CommercialType::query()->findOrFail($id);

        return Inertia::render('CommercialType/EditCommercialType', [
            'commercialType' => $commercialType,
        ]);
    }

    public function update(UpdateCommercialTypeRequest $request, int $id, CommercialTypeService $commercialTypeService)
    {
        $commercialTypeService->update($id, $request->validated());

        return Redirect::route('admin.commercial_types.index');
    }

    public function destroy(int $id, CommercialTypeService $commercialTypeService)
    {
        $commercialTypeService->destroy($id);

        return Redirect::back();
    }
}
