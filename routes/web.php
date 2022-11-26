<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/cview',function(){
return view('customized-view');
});
Route::controller(UserController::class)->group(function(){
    Route::get('get-pdf','getPdf');
   // Route::get('download-pdf','downloadPdf');
    Route::get('download-now','downloadPdf')->name('download-pdf-now');
    Route::get('download-now-excel','downloadExcel')->name('download-excel-now');
    Route::post('import-excel','importUserData');
});

