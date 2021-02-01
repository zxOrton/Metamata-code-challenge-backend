<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;
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

Auth::routes();

Route::group(['prefix' => 'story', 'middleware' => 'auth'], function () {
    Route::get('/', [StoryController::class, 'index'])->name('stories');
    Route::get('/create', [StoryController::class, 'create'])->name('create.story');
    Route::post('/', [StoryController::class, 'store'])->name('post.story');
    Route::get('/edit/{slug}', [StoryController::class, 'edit'])->name('edit.story');
    Route::patch('/{id}', [StoryController::class, 'update'])->name('update.story');
    Route::delete('/{slug}', [StoryController::class, 'destroy'])->name('delete.story');
    Route::get('/mine', [StoryController::class, 'showMine'])->name('show.mine');

    Route::prefix('/show')->group(function () {
        Route::get('{slug}', [StoryController::class, 'show'])->name('show.story');
        Route::post('{id}', [StoryController::class, 'like'])->name('like.story');
        Route::delete('{id}', [StoryController::class, 'dislike'])->name('dislike.story');
    });
});
