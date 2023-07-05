<?php

use App\Http\Controllers\RegisterController;
use App\Models\Post;
use Illuminate\Support\Facades\File;
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
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {

    return view('post', [
        'post' => \App\Models\Post::find($slug)
    ]);
})->where('post', '[A-z_\-]+');

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);
