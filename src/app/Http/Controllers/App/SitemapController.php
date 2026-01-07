<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Property;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0))
            ->add(Url::create('/rents')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9))
            ->add(Url::create('/sales')
                ->setLastModificationDate(Carbon::now()->subMonth())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.9))
            ->add(Url::create('/contacts')
                ->setLastModificationDate(Carbon::now()->subMonth())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.5));

        // Добавляем свойства из модели Property
        Property::query()
            ->where('is_published', true)
            ->orderBy('updated_at', 'desc')
            ->chunk(100, function ($properties) use ($sitemap) {
                foreach ($properties as $property) {
                    $url = route('properties.show', [
                        'id' => $property->id
                    ]);

                    $sitemap->add(Url::create($url)
                        ->setLastModificationDate($property->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8));
                }
            });

        return $sitemap->toResponse('sitemap.xml');
    }
}
