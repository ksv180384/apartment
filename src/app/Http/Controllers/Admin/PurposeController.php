<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Purpose\CreatePurposeRequest;
use App\Http\Requests\Admin\Purpose\UpdatePurposeRequest;
use App\Http\Resources\Admin\Purpose\PurposeResource;
use App\Models\Purpose;
use App\Services\PurposeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PurposeController extends Controller
{
    public function index(PurposeService $purposeService)
    {
        $purposes = $purposeService->purposes();

        return Inertia::render('Purpose/Purposes', [
            'purposes' => PurposeResource::collection($purposes),
        ]);
    }

    public function create()
    {
        return Inertia::render('Purpose/CreatePurpose', []);
    }

    public function store(CreatePurposeRequest $request, PurposeService $purposeService)
    {
        $purposeService->create($request->validated());

        return Redirect::route('admin.purposes.index');
    }

    public function edit(int $id)
    {
        $purpose = Purpose::query()->findOrFail($id);

        return Inertia::render('Purpose/EditPurpose', [
            'purpose' => $purpose,
        ]);
    }

    public function update(UpdatePurposeRequest $request, int $id, PurposeService $purposeService)
    {
        $purposeService->update($id, $request->validated());

        return Redirect::route('admin.purposes.index');
    }

    public function destroy(int $id, PurposeService $purposeService)
    {
        $purposeService->destroy($id);

        return Redirect::back();
    }
}
