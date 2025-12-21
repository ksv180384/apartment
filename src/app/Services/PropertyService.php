<?php

namespace App\Services;

use App\Models\Condition;
use App\Models\Media;
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
            ->with([
                'category:id,name',
                'propertyType:id,name,slug',
                'user:id,email',
                'address',
                'media',
            ])
            ->orderBy('created_at')
            ->paginate(self::PAGINATION_LIMIT);

        return $properties;
    }

    public function getById(int $id): Property
    {
        $property = Property::query()->findOrFail($id);

        return $property;
    }

    public function create(array $propertyData): Property
    {
        $property = Property::query()->create($propertyData);
        $propertyData['property_id'] = $property->id;

        // Дополнительные параметры
        (new PropertyFeatureService())->create($propertyData);

        // Обрабатываем дополнительные данные если они есть
        $this->processFeatureData($property, $propertyData);

        (new AddressService())->create([
            'property_id' => $property->id,
            'region' => $propertyData['region'] ?? null,
            'city' => $propertyData['city'] ?? null,
            'street' => $propertyData['street'] ?? null,
            'house_number' => $propertyData['house_number'] ?? null,
            'apartment_number' => $propertyData['apartment_number'] ?? null,
            'latitude' => $propertyData['latitude'] ?? null,
            'longitude' => $propertyData['longitude'] ?? null,
        ]);

        // Обрабатываем изображения для слайдера
        $this->processImages($property, $propertyData['images']);

        return $property;
    }

    public function update(int $id, array $propertyData): Property
    {
        $property = Property::query()->findOrFail($id);

        $property->update($propertyData);
        $propertyData['property_id'] = $property->id;

        // Дополнительные параметры
        (new PropertyFeatureService())->update($property->features?->id, $propertyData);

        // Обрабатываем дополнительные данные если они есть
        $this->processFeatureData($property, $propertyData, true);

        (new AddressService())->update($property->address->id, [
            'property_id' => $propertyData['property_id'],
            'region' => $propertyData['region'] ?? null,
            'city' => $propertyData['city'] ?? null,
            'street' => $propertyData['street'] ?? null,
            'house_number' => $propertyData['house_number'] ?? null,
            'apartment_number' => $propertyData['apartment_number'] ?? null,
            'latitude' => $propertyData['latitude'] ?? null,
            'longitude' => $propertyData['longitude'] ?? null,
        ]);

        // Обрабатываем изображения для слайдера
        $this->processImages($property, $propertyData['images']);

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

    private function processImages(Property $property, array $images = null): void
    {
        if (empty($images)) {
            return;
        }

        $imageUploadService = new ImageUploadService();
        $imagesToInsert = [];

        foreach ($images as $index => $image) {
            $fileName = $imageUploadService->uploadImage($image, $property->getImagesDir());
            $imagesToInsert[] = [
                'property_id' => $property->id,
                'is_main' => $index === 0, // первое изображение - главное
                'file_path' => $property->getImagesDir(),
                'file_name' => $fileName,
                'type' => 'image',
                'order' => $index,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Массовая вставка для оптимизации
        Media::insert($imagesToInsert);
    }
}
