<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/all_posts', [PostController::class, 'index'])->middleware(['auth'])->name('all_posts');
Route::post('/all_posts/store', [PostController::class, 'store'])->middleware(['auth'])->name('all_posts.store');
Route::delete('/all_posts/post/delete/{id}', [PostController::class, 'delete'])->middleware(['auth'])->name('post.delete');

require __DIR__.'/auth.php';
