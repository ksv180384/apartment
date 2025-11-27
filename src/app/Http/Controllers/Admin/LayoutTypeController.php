<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LayoutType\CreateLayoutTypeRequest;
use App\Http\Requests\Admin\Purpose\CreatePurposeRequest;
use App\Http\Requests\Admin\Purpose\UpdatePurposeRequest;
use App\Http\Resources\Admin\LayoutType\LayoutTypeResource;
use App\Http\Resources\Admin\Purpose\PurposeResource;
use App\Models\LayoutType;
use App\Models\Purpose;
use App\Services\LayoutTypeService;
use App\Services\PurposeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class LayoutTypeController extends Controller
{
    public function index(LayoutTypeService $layoutTypeService)
    {
        $layoutTypes = $layoutTypeService->layoutTypes();

        return Inertia::render('LayoutType/LayoutTypes', [
            'layoutTypes' => LayoutTypeResource::collection($layoutTypes),
        ]);
    }

    public function create()
    {
        return Inertia::render('LayoutType/CreateLayoutType', []);
    }

    public function store(CreateLayoutTypeRequest $request, LayoutTypeService $layoutTypeService)
    {
        $layoutTypeService->create($request->validated());

        return Redirect::route('admin.layout_types.index');
    }

    public function edit(int $id)
    {
        $layoutType = LayoutType::query()->findOrFail($id);

        return Inertia::render('LayoutType/EditLayoutType', [
            'layoutType' => $layoutType,
        ]);
    }

    public function update(UpdatePurposeRequest $request, int $id, LayoutTypeService $layoutTypeService)
    {
        $layoutTypeService->update($id, $request->validated());

        return Redirect::route('admin.layout_types.index');
    }

    public function destroy(int $id, LayoutTypeService $layoutTypeService)
    {
        $layoutTypeService->destroy($id);

        return Redirect::back();
    }
}
