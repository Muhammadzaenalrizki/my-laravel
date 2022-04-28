<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressImageController;

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


// progress image
Route::get('progres_image', [ProgressImageController::class, 'index'])->name('progress_image');
Route::post('upload/postImage', [ProgressImageController::class, 'postImage'])->name('progress_image.postImage');
