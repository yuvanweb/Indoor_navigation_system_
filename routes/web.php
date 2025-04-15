<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LocationGridController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PathController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('website.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// map
Route::get('/maps-view/{id}', [MapController::class, 'view']);
Route::get('/maps', [MapController::class, 'maplist'])->name('maps.index');
Route::get('/maps/create', [MapController::class, 'create'])->name('maps.create');
Route::post('/maps', [MapController::class, 'store'])->name('maps.store');
Route::post('/maps-update', [MapController::class, 'upgate'])->name('maps.update');
Route::get('/maps-edit/{id}', [MapController::class, 'edit']);



// shop
Route::get('/shops', [ShopController::class, 'index']);
Route::get('/shops/create', [ShopController::class, 'create'])->name('shops.create');
Route::post('/shops', [ShopController::class, 'store'])->name('shops.store');
Route::get('/shops-edit/{id}', [ShopController::class, 'edit'])->name('shops.edit');
Route::post('/shops-update', [ShopController::class, 'update'])->name('shops.update');



// path 
Route::get('/maps-list', [PathController::class, 'index'])->name('maps.show');
Route::get('/maps/{id}', [PathController::class, 'show'])->name('maps.show');
Route::post('/paths', [PathController::class, 'store'])->name('paths.store');

Route::post('/paths/show', [PathController::class, 'showPath'])->name('paths.show');

Route::get('/maps/{id}/show-path', [PathController::class, 'showPathPage'])->name('paths.show.page');
Route::post('/paths/get', [PathController::class, 'getPath'])->name('paths.get');
Route::get('/maps/{map}/get-path', [PathController::class, 'gettPath']);




Route::get('/business-categories', [BusinessCategoryController::class, 'index']);
Route::get('/business-categories-create', [BusinessCategoryController::class, 'create'])->name('businesscategories.create');
Route::post('/business-categories-store', [BusinessCategoryController::class, 'store'])->name('businesscategories.store');
Route::put('/business-categories-update/{id}', [BusinessCategoryController::class, 'update']);
//Route::get('/business-categories-show', [BusinessCategoryController::class, 'show'])->name('businesscategories.show');
Route::get('/business-categories-edit/{businesscategories}', [BusinessCategoryController::class, 'edit'])->name('business-categories-edit.edit');
Route::get('/business-categories-delete/{$ids}', [BusinessCategoryController::class, 'destroy']);Route::get('/business-categories', [BusinessCategoryController::class, 'index']);

Route::get('/location-grid', [LocationGridController::class, 'index']);
Route::get('/location-grid-create', [LocationGridController::class, 'create'])->name('locationgrid.create');
Route::post('/location-grid-store', [LocationGridController::class, 'store'])->name('locationgrid.store');
Route::put('/location-grid-update/{id}', [LocationGridController::class, 'update']);
//Route::get('/business-categories-show', [BusinessCategoryController::class, 'show'])->name('businesscategories.show');
Route::get('/location-grid-edit/{businesscategories}', [LocationGridController::class, 'edit'])->name('business-categories-edit.edit');
Route::get('/location-grid-delete/{$ids}', [LocationGridController::class, 'destroy']);

Route::get('/logout', [WebsiteController::class, 'destroy'])->name('logout');




});
Route::get('login-temp', [WebsiteController::class,'login']);
Route::get('/locale/{lang}', [LocaleController::class,'setLocale']);



// Business Category 



require __DIR__.'/auth.php';



