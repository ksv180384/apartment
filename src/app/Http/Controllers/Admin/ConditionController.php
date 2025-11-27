<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Condition\CreateConditionRequest;
use App\Http\Requests\Admin\Condition\UpdateConditionRequest;
use App\Http\Resources\Admin\Condition\ConditionResource;
use App\Models\Condition;
use App\Services\ConditionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ConditionController extends Controller
{
    public function index(ConditionService $conditionService)
    {
        $conditions = $conditionService->conditions();

        return Inertia::render('Condition/Conditions', [
            'conditions' => ConditionResource::collection($conditions),
        ]);
    }

    public function create()
    {
        return Inertia::render('Condition/CreateCondition', []);
    }

    public function store(CreateConditionRequest $request, ConditionService $conditionService)
    {
        $conditionService->create($request->validated());

        return Redirect::route('admin.conditions.index');
    }

    public function edit(int $id)
    {
        $condition = Condition::query()->findOrFail($id);

        return Inertia::render('Condition/EditCondition', [
            'condition' => $condition,
        ]);
    }

    public function update(UpdateConditionRequest $request, int $id, ConditionService $conditionService)
    {
        $conditionService->update($id, $request->validated());

        return Redirect::route('admin.conditions.index');
    }

    public function destroy(int $id, ConditionService $conditionService)
    {
        $conditionService->destroy($id);

        return Redirect::back();
    }
}
