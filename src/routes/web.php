<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/redirect', function (\Illuminate\Http\Request $request) {
    $redirectUrl = $request->session()->get('redirect', '');
    return Inertia::render('Redirect', [
        'redirect' => $redirectUrl
    ]);
})->name('redirect');

Route::get('/admin/redirect', function (\Illuminate\Http\Request $request) {
    $redirectUrl = $request->session()->get('redirect', '');
    return Inertia::render('Redirect', [
        'redirect' => $redirectUrl
    ]);
})->name('admin.redirect');

Route::get('properties', [\App\Http\Controllers\App\PropertyController::class, 'index'])->name('properties.index');
Route::get('properties/{id}', [\App\Http\Controllers\App\PropertyController::class, 'show'])->name('properties.show');

Route::get('rents', [\App\Http\Controllers\App\RentController::class, 'index'])->name('rents.index');
Route::get('sales', [\App\Http\Controllers\App\SaleController::class, 'index'])->name('sales.index');

Route::middleware(['auth', 'verified'])->group(function () {

    // Home
    Route::get('/admin/home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
//    Route::get('/admin/test', [\App\Http\Controllers\Admin\HomeController::class, 'test'])->name('admin.test');

    // Profile
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Property types
    Route::get('/admin/property-types', [\App\Http\Controllers\Admin\PropertyTypeController::class, 'index'])->name('admin.property_types.index');
    Route::get('/admin/property-types/create', [\App\Http\Controllers\Admin\PropertyTypeController::class, 'create'])->name('admin.property_types.create');
    Route::post('/admin/property-types/store', [\App\Http\Controllers\Admin\PropertyTypeController::class, 'store'])->name('admin.property_types.store');
    Route::get('/admin/property-types/edit/{id}', [\App\Http\Controllers\Admin\PropertyTypeController::class, 'edit'])->name('admin.property_types.edit');
    Route::put('/admin/property-types/update/{id}', [\App\Http\Controllers\Admin\PropertyTypeController::class, 'update'])->name('admin.property_types.update');
    Route::delete('/admin/property-types/destroy/{id}', [\App\Http\Controllers\Admin\PropertyTypeController::class, 'destroy'])->name('admin.property_types.destroy');

    // Categories
    Route::get('/admin/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/destroy/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Properties
    Route::get('/admin/properties', [\App\Http\Controllers\Admin\PropertyController::class, 'index'])->name('admin.properties.index');
    Route::get('/admin/properties/create', [\App\Http\Controllers\Admin\PropertyController::class, 'create'])->name('admin.properties.create');
    Route::post('/admin/properties/store', [\App\Http\Controllers\Admin\PropertyController::class, 'store'])->name('admin.properties.store');
    Route::get('/admin/properties/edit/{id}', [\App\Http\Controllers\Admin\PropertyController::class, 'edit'])->name('admin.properties.edit');
    Route::post('/admin/properties/update/{id}', [\App\Http\Controllers\Admin\PropertyController::class, 'update'])->name('admin.properties.update');
    Route::delete('/admin/properties/destroy/{id}', [\App\Http\Controllers\Admin\PropertyController::class, 'destroy'])->name('admin.properties.destroy');

    // Parameters
    Route::get('/admin/parameters', [\App\Http\Controllers\Admin\ParameterController::class, 'index'])->name('admin.parameters.index');

    // Conditions
    Route::get('/admin/conditions', [\App\Http\Controllers\Admin\ConditionController::class, 'index'])->name('admin.conditions.index');
    Route::get('/admin/conditions/create', [\App\Http\Controllers\Admin\ConditionController::class, 'create'])->name('admin.conditions.create');
    Route::post('/admin/conditions/store', [\App\Http\Controllers\Admin\ConditionController::class, 'store'])->name('admin.conditions.store');
    Route::get('/admin/conditions/edit/{id}', [\App\Http\Controllers\Admin\ConditionController::class, 'edit'])->name('admin.conditions.edit');
    Route::put('/admin/conditions/update/{id}', [\App\Http\Controllers\Admin\ConditionController::class, 'update'])->name('admin.conditions.update');
    Route::delete('/admin/conditions/destroy/{id}', [\App\Http\Controllers\Admin\ConditionController::class, 'destroy'])->name('admin.conditions.destroy');

    // Repair types
    Route::get('/admin/repair-types', [\App\Http\Controllers\Admin\RepairTypeController::class, 'index'])->name('admin.repair_types.index');
    Route::get('/admin/repair-types/create', [\App\Http\Controllers\Admin\RepairTypeController::class, 'create'])->name('admin.repair_types.create');
    Route::post('/admin/repair-types/store', [\App\Http\Controllers\Admin\RepairTypeController::class, 'store'])->name('admin.repair_types.store');
    Route::get('/admin/repair-types/edit/{id}', [\App\Http\Controllers\Admin\RepairTypeController::class, 'edit'])->name('admin.repair_types.edit');
    Route::put('/admin/repair-types/update/{id}', [\App\Http\Controllers\Admin\RepairTypeController::class, 'update'])->name('admin.repair_types.update');
    Route::delete('/admin/repair-types/destroy/{id}', [\App\Http\Controllers\Admin\RepairTypeController::class, 'destroy'])->name('admin.repair_types.destroy');

    // Commercial types
    Route::get('/admin/commercial-types', [\App\Http\Controllers\Admin\CommercialTypeController::class, 'index'])->name('admin.commercial_types.index');
    Route::get('/admin/commercial-types/create', [\App\Http\Controllers\Admin\CommercialTypeController::class, 'create'])->name('admin.commercial_types.create');
    Route::post('/admin/commercial-types/store', [\App\Http\Controllers\Admin\CommercialTypeController::class, 'store'])->name('admin.commercial_types.store');
    Route::get('/admin/commercial-types/edit/{id}', [\App\Http\Controllers\Admin\CommercialTypeController::class, 'edit'])->name('admin.commercial_types.edit');
    Route::put('/admin/commercial-types/update/{id}', [\App\Http\Controllers\Admin\CommercialTypeController::class, 'update'])->name('admin.commercial_types.update');
    Route::delete('/admin/commercial-types/destroy/{id}', [\App\Http\Controllers\Admin\CommercialTypeController::class, 'destroy'])->name('admin.commercial_types.destroy');

    // Purposes
    Route::get('/admin/purposes', [\App\Http\Controllers\Admin\PurposeController::class, 'index'])->name('admin.purposes.index');
    Route::get('/admin/purposes/create', [\App\Http\Controllers\Admin\PurposeController::class, 'create'])->name('admin.purposes.create');
    Route::post('/admin/purposes/store', [\App\Http\Controllers\Admin\PurposeController::class, 'store'])->name('admin.purposes.store');
    Route::get('/admin/purposes/edit/{id}', [\App\Http\Controllers\Admin\PurposeController::class, 'edit'])->name('admin.purposes.edit');
    Route::put('/admin/purposes/update/{id}', [\App\Http\Controllers\Admin\PurposeController::class, 'update'])->name('admin.purposes.update');
    Route::delete('/admin/purposes/destroy/{id}', [\App\Http\Controllers\Admin\PurposeController::class, 'destroy'])->name('admin.purposes.destroy');

    // Layout types
    Route::get('/admin/layout-types', [\App\Http\Controllers\Admin\LayoutTypeController::class, 'index'])->name('admin.layout_types.index');
    Route::get('/admin/layout-types/create', [\App\Http\Controllers\Admin\LayoutTypeController::class, 'create'])->name('admin.layout_types.create');
    Route::post('/admin/layout-types/store', [\App\Http\Controllers\Admin\LayoutTypeController::class, 'store'])->name('admin.layout_types.store');
    Route::get('/admin/layout-types/edit/{id}', [\App\Http\Controllers\Admin\LayoutTypeController::class, 'edit'])->name('admin.layout_types.edit');
    Route::put('/admin/layout-types/update/{id}', [\App\Http\Controllers\Admin\LayoutTypeController::class, 'update'])->name('admin.layout_types.update');
    Route::delete('/admin/layout-types/destroy/{id}', [\App\Http\Controllers\Admin\LayoutTypeController::class, 'destroy'])->name('admin.layout_types.destroy');

    // Building classes
    Route::get('/admin/building-classes', [\App\Http\Controllers\Admin\BuildingClassController::class, 'index'])->name('admin.building_classes.index');
    Route::get('/admin/building-classes/create', [\App\Http\Controllers\Admin\BuildingClassController::class, 'create'])->name('admin.building_classes.create');
    Route::post('/admin/building-classes/store', [\App\Http\Controllers\Admin\BuildingClassController::class, 'store'])->name('admin.building_classes.store');
    Route::get('/admin/building-classes/edit/{id}', [\App\Http\Controllers\Admin\BuildingClassController::class, 'edit'])->name('admin.building_classes.edit');
    Route::put('/admin/building-classes/update/{id}', [\App\Http\Controllers\Admin\BuildingClassController::class, 'update'])->name('admin.building_classes.update');
    Route::delete('/admin/building-classes/destroy/{id}', [\App\Http\Controllers\Admin\BuildingClassController::class, 'destroy'])->name('admin.building_classes.destroy');

    // Building types
    Route::get('/admin/building-types', [\App\Http\Controllers\Admin\BuildingTypeController::class, 'index'])->name('admin.building_types.index');
    Route::get('/admin/building-types/create', [\App\Http\Controllers\Admin\BuildingTypeController::class, 'create'])->name('admin.building_types.create');
    Route::post('/admin/building-types/store', [\App\Http\Controllers\Admin\BuildingTypeController::class, 'store'])->name('admin.building_types.store');
    Route::get('/admin/building-types/edit/{id}', [\App\Http\Controllers\Admin\BuildingTypeController::class, 'edit'])->name('admin.building_types.edit');
    Route::put('/admin/building-types/update/{id}', [\App\Http\Controllers\Admin\BuildingTypeController::class, 'update'])->name('admin.building_types.update');
    Route::delete('/admin/building-types/destroy/{id}', [\App\Http\Controllers\Admin\BuildingTypeController::class, 'destroy'])->name('admin.building_types.destroy');

    // Finishing types
    Route::get('/admin/finishing-types', [\App\Http\Controllers\Admin\FinishingTypeController::class, 'index'])->name('admin.finishing_types.index');
    Route::get('/admin/finishing-types/create', [\App\Http\Controllers\Admin\FinishingTypeController::class, 'create'])->name('admin.finishing_types.create');
    Route::post('/admin/finishing-types/store', [\App\Http\Controllers\Admin\FinishingTypeController::class, 'store'])->name('admin.finishing_types.store');
    Route::get('/admin/finishing-types/edit/{id}', [\App\Http\Controllers\Admin\FinishingTypeController::class, 'edit'])->name('admin.finishing_types.edit');
    Route::put('/admin/finishing-types/update/{id}', [\App\Http\Controllers\Admin\FinishingTypeController::class, 'update'])->name('admin.finishing_types.update');
    Route::delete('/admin/finishing-types/destroy/{id}', [\App\Http\Controllers\Admin\FinishingTypeController::class, 'destroy'])->name('admin.finishing_types.destroy');

    // Garage types
    Route::get('/admin/garage-types', [\App\Http\Controllers\Admin\GarageTypeController::class, 'index'])->name('admin.garage_types.index');
    Route::get('/admin/garage-types/create', [\App\Http\Controllers\Admin\GarageTypeController::class, 'create'])->name('admin.garage_types.create');
    Route::post('/admin/garage-types/store', [\App\Http\Controllers\Admin\GarageTypeController::class, 'store'])->name('admin.garage_types.store');
    Route::get('/admin/garage-types/edit/{id}', [\App\Http\Controllers\Admin\GarageTypeController::class, 'edit'])->name('admin.garage_types.edit');
    Route::put('/admin/garage-types/update/{id}', [\App\Http\Controllers\Admin\GarageTypeController::class, 'update'])->name('admin.garage_types.update');
    Route::delete('/admin/garage-types/destroy/{id}', [\App\Http\Controllers\Admin\GarageTypeController::class, 'destroy'])->name('admin.garage_types.destroy');

    // Ownership types
    Route::get('/admin/ownership-types', [\App\Http\Controllers\Admin\OwnershipTypeController::class, 'index'])->name('admin.ownership_types.index');
    Route::get('/admin/ownership-types/create', [\App\Http\Controllers\Admin\OwnershipTypeController::class, 'create'])->name('admin.ownership_types.create');
    Route::post('/admin/ownership-types/store', [\App\Http\Controllers\Admin\OwnershipTypeController::class, 'store'])->name('admin.ownership_types.store');
    Route::get('/admin/ownership-types/edit/{id}', [\App\Http\Controllers\Admin\OwnershipTypeController::class, 'edit'])->name('admin.ownership_types.edit');
    Route::put('/admin/ownership-types/update/{id}', [\App\Http\Controllers\Admin\OwnershipTypeController::class, 'update'])->name('admin.ownership_types.update');
    Route::delete('/admin/ownership-types/destroy/{id}', [\App\Http\Controllers\Admin\OwnershipTypeController::class, 'destroy'])->name('admin.ownership_types.destroy');

    // Media
    Route::delete('/admin/media/delete/{id}', [\App\Http\Controllers\Admin\MediaController::class, 'destroy'])->name('admin.media.delete');
});

require __DIR__.'/auth.php';
