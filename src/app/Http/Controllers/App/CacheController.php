<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function index()
    {
        return view('admin.cache');
    }

    public function clearAll()
    {
        try {
            Artisan::call('optimize:clear');
            $output = Artisan::output();

            return back()->with('success', 'Все кэши успешно очищены! ' . $output);
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка: ' . $e->getMessage());
        }
    }

    public function clearConfig()
    {
        try {
            Artisan::call('config:clear');
            Artisan::call('config:cache');
            $output = Artisan::output();

            return back()->with('success', 'Кэш конфигурации очищен! ' . $output);
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка: ' . $e->getMessage());
        }
    }

    public function clearCache()
    {
        try {
            Artisan::call('cache:clear');
            $output = Artisan::output();

            return back()->with('success', 'Кэш приложения очищен! ' . $output);
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка: ' . $e->getMessage());
        }
    }

    public function clearView()
    {
        try {
            Artisan::call('view:clear');
            Artisan::call('view:cache');
            $output = Artisan::output();

            return back()->with('success', 'Кэш представлений очищен! ' . $output);
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка: ' . $e->getMessage());
        }
    }

    public function clearRoute()
    {
        try {
            Artisan::call('route:clear');
            Artisan::call('route:cache');
            $output = Artisan::output();

            return back()->with('success', 'Кэш маршрутов очищен! ' . $output);
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка: ' . $e->getMessage());
        }
    }

    public function createStorageLink()
    {
        try {
            // Удаляем существующий симлинк если есть
            if (file_exists(public_path('storage'))) {
                unlink(public_path('storage'));
            }

            // Создаем новый симлинк
            Artisan::call('storage:link');
            $output = Artisan::output();

            return back()->with('success', 'Симлинк storage создан! ' . $output);
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка: ' . $e->getMessage());
        }
    }

    public function optimize()
    {
        try {
            Artisan::call('optimize');
            $output = Artisan::output();

            return back()->with('success', 'Оптимизация выполнена! ' . $output);
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка: ' . $e->getMessage());
        }
    }

    public function composerDump()
    {
        try {
            exec('composer dump-autoload -o 2>&1', $output, $returnVar);
            $outputStr = implode("\n", $output);

            if ($returnVar === 0) {
                return back()->with('success', 'Composer автозагрузка обновлена! ' . $outputStr);
            } else {
                return back()->with('error', 'Ошибка Composer: ' . $outputStr);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка: ' . $e->getMessage());
        }
    }
}
