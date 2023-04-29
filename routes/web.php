<?php
use App\Http\Controllers\UserController;

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PrestacionController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index']);
Route::get('/categories/create', [App\Http\Controllers\CategoriesController::class, 'create']);
Route::get('/categories/edit/{id}', [App\Http\Controllers\CategoriesController::class, 'edit']);
Route::get('/categories/update_status/{id}', [App\Http\Controllers\CategoriesController::class, 'update_status']);
Route::get('/categories/destroy/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy']);
Route::put('/categories/update/{id}', [App\Http\Controllers\CategoriesController::class, 'update']);
Route::post('/categories/store', [App\Http\Controllers\CategoriesController::class, 'store']);


Route::get('/categories/pdf', [App\Http\Controllers\CategoriesController::class, 'exportPdf']);
// Route::get('/categories-pdf', 'CategoriesController@exportPdf')->name('categories.pdf');


Route::get('/dependences', [App\Http\Controllers\dependenceController::class, 'index']);
Route::get('/dependences/create', [App\Http\Controllers\dependenceController::class, 'create']);
Route::get('/dependences/edit/{id}', [App\Http\Controllers\dependenceController::class, 'edit']);
Route::get('/dependences/update_status/{id}', [App\Http\Controllers\dependenceController::class, 'update_status']);
Route::get('/dependences/destroy/{id}', [App\Http\Controllers\dependenceController::class, 'destroy']);
Route::put('/dependences/update/{id}', [App\Http\Controllers\dependenceController::class, 'update']);
Route::post('/dependences/store', [App\Http\Controllers\dependenceController::class, 'store']);


Route::get('/personal', [App\Http\Controllers\personalController::class, 'index']);
Route::get('/personal/create', [App\Http\Controllers\personalController::class, 'create']);
Route::post('/personal/store', [App\Http\Controllers\personalController::class, 'store']);

Route::get('/dependences/edit/{id}', [App\Http\Controllers\dependenceController::class, 'edit']);
Route::get('/dependences/update_status/{id}', [App\Http\Controllers\dependenceController::class, 'update_status']);
Route::get('/dependences/destroy/{id}', [App\Http\Controllers\dependenceController::class, 'destroy']);
Route::put('/dependences/update/{id}', [App\Http\Controllers\dependenceController::class, 'update']);
Route::post('/dependences/store', [App\Http\Controllers\dependenceController::class, 'store']);

// Route::get('/prestacion', [App\Http\Controllers\prestacionController::class, 'index']);

Route::get('/items', [App\Http\Controllers\ItemController::class, 'index']);
Route::get('/items/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
Route::put('/items/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
Route::get('/items/create', [App\Http\Controllers\ItemController::class, 'create']);
Route::post('/items/store', [App\Http\Controllers\ItemController::class, 'store']);

Route::get('/prestaciones', [App\Http\Controllers\PrestacionController::class, 'index']);
// Route::post('prestacion/add', [App\Http\Controllers\PrestacionController::class, 'store']);
Route::get('/prestaciones/store', [App\Http\Controllers\PrestacionController::class, 'store']);


route::get('calendar', [CalendarController::class, 'index'])->name('calendar');
route::post('/createEvent',[CalendarController::class, 'createEvent'])->name('createEventphp ');
route::post('/deleteEvent', [CalendarController::class, 'delete'])->name('delete');


