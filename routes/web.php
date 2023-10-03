<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SpaceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::controller(SpaceController::class)->prefix('admin/space')->name('admin.space.')->middleware('auth')->group(function() {
    Route::get('create', 'add')->name('add');
    Route::post('create', 'create')->name('create');
    Route::get('/', 'index')->name('index');
    Route::get('{id}', 'show')->name('show')->where('id', '[0-9]+');
    Route::get('edit', 'edit')->name('edit');
    Route::post('edit', 'update')->name('update');
    Route::get('delete', 'delete')->name('delete');
    Route::get('calculate', 'calculate')->name('calculate');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
