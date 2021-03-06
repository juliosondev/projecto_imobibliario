<?php

use App\Http\Controllers\Admin\AuthController;
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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    #login
    Route::get('/', [AuthController::class, 'showLoginform'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.do');
    #home
    Route::get('/home', [AuthController::class, 'home'])->name('home');
});
