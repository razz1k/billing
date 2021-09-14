<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Post\Text\Controller as TextController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

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
  return view('blog.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
  return view('blog.adminPanel');
})->name('admin.panel')->middleware('auth');

Route::get('/profile/{user?}', [UserController::class, 'show'])->name('profile.show')->middleware('auth');
Route::put('/profile/update', [UserController::class, 'edit'])->name('profile.update')->middleware('auth');

Route::prefix('category')->name('category')->group(function () {
  Route::get('/', [CategoryController::class, 'listAction'])->name('.list');
  Route::get('{id}', [CategoryController::class, 'singleAction'])->name('.single');
});

Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {
  Route::get('/', function () {
    return view('blog.adminPanel');
  })->name('.panel');

  Route::prefix('category')->name('.category')->group(function () {
    Route::get('/', [CategoryController::class, 'listAction'])->name('.list');
    Route::get('create', [CategoryController::class, 'createAction'])->name('.create');
    Route::post('create', [CategoryController::class, 'storeAction'])->name('.store');
    Route::get('{id}', [CategoryController::class, 'editAction'])->name('.edit');
    Route::put('{id}', [CategoryController::class, 'updateAction'])->name('.update');
    Route::delete('{id}', [CategoryController::class, 'deleteAction'])->name('.delete');
  });

  Route::prefix('post')->name('.post')->group(function () {
    Route::prefix('text')->name('.text')->group(function () {
      Route::get('/', [TextController::class, 'listAction'])->name('.list');
      Route::get('create', [TextController::class, 'createAction'])->name('.create');
      Route::post('create', [TextController::class, 'storeAction'])->name('.store');
      Route::get('{id}', [TextController::class, 'editAction'])->name('.edit');
      Route::put('{id}', [TextController::class, 'updateAction'])->name('.update');
      Route::delete('{id}', [TextController::class, 'deleteAction'])->name('.delete');
    });
  });
});
