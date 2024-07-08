<?php

use App\Http\Controllers\Public;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('pengaduan')->controller(Public\ComplaintController::class)->group(function () {
    Route::get('/', 'create')->name('complaint.create');
    Route::post('/store', 'store')->name('complaint.store');
});

Route::prefix('kritik-saran')->controller(Public\FeedbackController::class)->group(function () {
    Route::get('/', 'create')->name('feedback.create');
    Route::post('/store', 'store')->name('feedback.store');
});
