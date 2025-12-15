<?php

namespace App\Services;

use App\Models\Condition;
use App\Models\Property;
use App\Models\RepairType;
use App\Services\Features\FeatureStrategyFactory;
use Illuminate\Database\Eloquent\Collection;

class PropertyService
{
    const PAGINATION_LIMIT = 20;

    public function propertiesPagination(): \Illuminate\Pagination\LengthAwarePaginator
    {
        $properties = Property::query()
            ->orderBy('created_at')
            ->paginate(self::PAGINATION_LIMIT);

        return $properties;
    }

    public function create(array $propertyData): Property
    {
        $property = Property::query()->create($propertyData);

        // Обрабатываем дополнительные данные если они есть
        $this->processFeatureData($property, $propertyData);

        return $property;
    }

    public function update(int $id, array $propertyData): Property
    {
        $property = Property::query()->findOrFail($id);

        $property->update($propertyData);
        // Обрабатываем дополнительные данные если они есть
        $this->processFeatureData($property, $propertyData, true);

        return $property;
    }

    public function destroy(int $id): void
    {
        $property = Property::query()->findOrFail($id);

        $property->delete();
    }

    /**
     * Обработка дополнительных данных через стратегию
     */
    private function processFeatureData(
        Property $property,
        array $propertyData,
        bool $isUpdate = false
    ): void
    {
        // Проверяем наличие необходимых данных
        if (!isset($propertyData['sub_data']) || empty($propertyData['sub_data'])) {
            return;
        }

        $propertyTypeSlug = $isUpdate
            ? $property->property_type_slug
            : ($propertyData['property_type_slug'] ?? null);

        if (!$propertyTypeSlug) {
            return;
        }

        // Получаем стратегию через фабрику
        $strategy = FeatureStrategyFactory::make($propertyTypeSlug);

        if (!$strategy) {
            return;
        }

        // Выполняем соответствующее действие
        $propertyData['sub_data']['property_id'] = $property->id;
        if ($isUpdate) {
            $strategy->update($property, $propertyData['sub_data']);
        } else {
            $strategy->create($property, $propertyData['sub_data']);
        }
    }
}
