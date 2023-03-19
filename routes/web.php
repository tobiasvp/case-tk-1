<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Models\Video;
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
    $video = Video::get();
	return view('app',['video' => $video]);
});

Route::post('/upload', [UploadController::class, 'upload']);

// Route::put('/edit', [])

// Route::delete('/delete')

Route::resource('video', UploadController::class);
