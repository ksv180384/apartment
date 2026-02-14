<?php

namespace App\Services;

use App\Models\NewBuildingFeature;

//novostroiki
class NewBuildingFeatureService
{

    public function create(array $newBuildingFeatureData): NewBuildingFeature
    {
        $data = $this->normalizeNullableIds($newBuildingFeatureData);
        $newBuildingFeature = NewBuildingFeature::query()->create([
            'property_id' => $data['property_id'] ?? null,
            'completion_date' => $data['completion_date'] ?? null,
            'building_name' => $data['building_name'] ?? null,
            'developer' => $data['developer'] ?? null,
            'building_class_id' => $data['building_class_id'] ?? null,
            'building_type_id' => $data['building_type_id'] ?? null,
            'building_floors' => $data['building_floors'] ?? null,
            'apartments_total' => $data['apartments_total'] ?? null,
            'finishing_type_id' => $data['finishing_type_id'] ?? null,
            'has_installment' => $data['has_installment'] ?? null,
            'has_mortgage' => $data['has_mortgage'] ?? null,
            'has_balcony' => $data['has_balcony'] ?? null,
            'has_loggia' => $data['has_loggia'] ?? null,
        ]);

        return $newBuildingFeature;
    }

    public function update(int $id, array $newBuildingFeatureData): NewBuildingFeature
    {
        $newBuildingFeature = NewBuildingFeature::query()->findOrFail($id);
        $data = $this->normalizeNullableIds($newBuildingFeatureData);
        $newBuildingFeature->update($data);

        return $newBuildingFeature;
    }

    /**
     * Пустая строка из clearable-полей приходит как '' — для nullable id в БД нужен null.
     */
    private function normalizeNullableIds(array $data): array
    {
        $nullableIds = ['building_class_id', 'building_type_id', 'finishing_type_id'];
        foreach ($nullableIds as $key) {
            if (array_key_exists($key, $data) && ($data[$key] === '' || $data[$key] === null)) {
                $data[$key] = null;
            }
        }
        return $data;
    }

    public function destroy(int $id)
    {
        $feature = NewBuildingFeature::where('property_id', $id)->first();

        if ($feature) {
            $feature->delete();
        }
    }
}
