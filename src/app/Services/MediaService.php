<?php

namespace App\Services;

use App\Models\Media;
use App\Models\Property;
use Illuminate\Support\Facades\DB;

class MediaService
{
    public function destroy(int $id): void
    {
        $media = Media::query()->findOrFail($id);

        $propertyId = $media->property_id;
        $wasMain = $media->is_main;
        $directory = $media->property->getImagesDir();

        (new ImageUploadService())->deleteImage($media->file_name, $directory);

        // Запоминаем порядок удаляемого элемента
        $deletedOrder = $media->order;

        $media->delete();

        // Если удалили главное изображение, назначаем новое
        if ($wasMain) {
            $this->setNewMainImage($propertyId);
        }

        // Пересчитываем порядок для оставшихся изображений
        $this->recalculateOrder($propertyId, $deletedOrder);
    }

    /**
     * Назначает новое главное изображение
     */
    private function setNewMainImage(int $propertyId): void
    {
        // Находим первое изображение по order
        $newMain = Media::where('property_id', $propertyId)
            ->orderBy('order')
            ->first();

        if ($newMain) {
            $newMain->update(['is_main' => true]);
        }
    }

    /**
     * Пересчитывает порядок изображений после удаления
     */
    private function recalculateOrder(int $propertyId): void
    {
        // Получаем все изображения свойства, упорядоченные по текущему order
        $images = Media::where('property_id', $propertyId)
            ->orderBy('order')
            ->get();

        // Перенумеровываем order начиная с 1
        foreach ($images as $index => $image) {
            $newOrder = $index + 1;

            // Обновляем только если order изменился
            if ($image->order !== $newOrder) {
                $image->update(['order' => $newOrder]);
            }
        }
    }
}
