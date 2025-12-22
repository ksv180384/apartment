<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuildingClass\CreateBuildingClassRequest;
use App\Http\Requests\Admin\BuildingType\CreateBuildingTypeRequest;
use App\Http\Requests\Admin\BuildingType\UpdateBuildingTypeRequest;
use App\Http\Requests\Admin\Purpose\UpdatePurposeRequest;
use App\Http\Resources\Admin\BuildingClass\BuildingClassResource;
use App\Http\Resources\Admin\BuildingType\BuildingTypeResource;
use App\Http\Resources\Admin\Media\ImageUrlResource;
use App\Models\BuildingClass;
use App\Models\BuildingType;
use App\Models\Property;
use App\Services\BuildingClassService;
use App\Services\BuildingTypeService;
use App\Services\MediaService;
use App\Services\PropertyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MediaController extends Controller
{
    public function destroy(int $id, MediaService $mediaService)
    {
        DB::beginTransaction();

        try {

            $mediaService->destroy($id);

            DB::commit();

            return Redirect::back()
                ->with('success', 'Изображение удалено.');

        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error('Ошибка при удалении изображения: ' . $e->getMessage(), [
                'id' => $id,
            ]);

            return Redirect::back()
                ->with('error', 'Произошла ошибка при удалении изображения. Пожалуйста, попробуйте снова.')
                ->withInput();
        }
    }
}
