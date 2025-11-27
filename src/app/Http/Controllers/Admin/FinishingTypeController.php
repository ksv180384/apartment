<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FinishingType\CreateFinishingTypeRequest;
use App\Http\Requests\Admin\FinishingType\UpdateFinishingTypeRequest;
use App\Http\Requests\Admin\Purpose\CreatePurposeRequest;
use App\Http\Requests\Admin\Purpose\UpdatePurposeRequest;
use App\Http\Resources\Admin\FinishingType\FinishingTypeResource;
use App\Http\Resources\Admin\Purpose\PurposeResource;
use App\Models\FinishingType;
use App\Models\Purpose;
use App\Services\FinishingTypeService;
use App\Services\PurposeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FinishingTypeController extends Controller
{
    public function index(FinishingTypeService $finishingTypeService)
    {
        $finishingTypes = $finishingTypeService->finishingTypes();

        return Inertia::render('FinishingType/FinishingTypes', [
            'finishingTypes' => FinishingTypeResource::collection($finishingTypes),
        ]);
    }

    public function create()
    {
        return Inertia::render('FinishingType/CreateFinishingType', []);
    }

    public function store(CreateFinishingTypeRequest $request, FinishingTypeService $finishingTypeService)
    {
        $finishingTypeService->create($request->validated());

        return Redirect::route('admin.finishing_types.index');
    }

    public function edit(int $id)
    {
        $finishingType = FinishingType::query()->findOrFail($id);

        return Inertia::render('FinishingType/EditFinishingType', [
            'finishingType' => $finishingType,
        ]);
    }

    public function update(UpdateFinishingTypeRequest $request, int $id, FinishingTypeService $finishingTypeService)
    {
        $finishingTypeService->update($id, $request->validated());

        return Redirect::route('admin.finishing_types.index');
    }

    public function destroy(int $id, FinishingTypeService $finishingTypeService)
    {
        $finishingTypeService->destroy($id);

        return Redirect::back();
    }
}
