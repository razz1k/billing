<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TextPostController;
use App\Http\Controllers\VideoPostController;
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

Route::get('/category/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+')->name('category.show');
Route::get('/category/list', [CategoryController::class, 'show'])->name('category.list');

Route::get('/text/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+')->name('text.show');
Route::get('/text/list', [CategoryController::class, 'show'])->name('text.list');

Route::get('/video/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+')->name('video.show');
Route::get('/video/list', [CategoryController::class, 'show'])->name('video.list');

Route::any('/{type}/{id?}/{edit?}', function (Request $request, $type, $id = null) {
    switch ($type) {
        case('category');
            $controller = CategoryController::class;
            break;
        case('text');
            $controller = TextPostController::class;
            break;
        case('video');
            $controller = VideoPostController::class;
            break;
        default:
            return abort(404);
    }
    switch ($request->method()) {
        case('POST'):
            $metod = 'create';
            break;
        case('PUT'):
            $metod = 'update';
            break;
        case('DELETE'):
            $metod = 'delete';
            break;
        default:
            $metod = 'edit';
    }
    return (new $controller)->$metod($id);
})->where('edit', '^edit$')->name('editor')->middleware('auth');
