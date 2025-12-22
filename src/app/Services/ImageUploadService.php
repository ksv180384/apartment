<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageUploadService
{

    const PREFIX_MINI = 'mini_';

    public function uploadImage($imageFile, string $directory, ?string $oldImage = null): string
    {
        if(!$imageFile){
            return '';
        }
        $manager = new ImageManager(
            new Driver()
        );
        $img = $manager->read($imageFile);

        $fileName = Str::random(6) . '.' . $imageFile->getClientOriginalExtension();
        $fileNameMini = self::PREFIX_MINI . $fileName;

        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory, 0755, true);
        }

        if ($oldImage) {
            Storage::delete($directory . $oldImage);
            Storage::delete($directory . self::PREFIX_MINI . $oldImage);
        }

        // Сохраняем оригинальное изображение
        $img->save(Storage::path($directory . $fileName));

        // Создаем и сохраняем уменьшенную версию
        $this->createResizedImage($img, $directory, $fileNameMini, 300);

        return $fileName;
    }

    public function deleteImage(string $fileName, string $directory): void
    {
        Storage::delete($directory. '/' . $fileName);
        Storage::delete($directory. '/' . self::PREFIX_MINI . $fileName);
    }

    public function deleteDirectory(string $directory): void
    {
        Storage::delete($directory);
    }

    /**
     * Создание уменьшенной версии с другими параметрами
     */
    public function createResizedImage($imageFile, string $directory, string $filename, int $width): string
    {
        $manager = new ImageManager(new Driver());
        $img = $manager->read($imageFile);


        $path = $directory . '/' . $filename;
        $clonedImage = clone $img;
        $clonedImage->scaleDown(width: $width);
        $clonedImage->save(Storage::path($path));

        return $filename;
    }
}
