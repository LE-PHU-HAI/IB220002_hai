<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/post/{id}', '\App\Http\Controllers\PostsController@index');
Route::get('/tweet', '\App\Http\Controllers\IndexController@a')->name('tweet.index');
Route::post('/tweet/create', '\App\Http\Controllers\Tweet\CreateController@b')->name('tweet.create');
Route::get('/tweet/update/{tweetId}', '\App\Http\Controllers\Tweet\Update\IndexController@c')
    ->name('tweet.update.index');
Route::put('/tweet/update/{tweetId}', '\App\Http\Controllers\Tweet\Update\PutController@d')
    ->name('tweet.update.put');
require __DIR__.'/auth.php';
