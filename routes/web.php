<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth;
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
    return view('index');
})->name('index');


//only authenticated can access this group
Route::group(['middleware' => ['auth']], function() {
    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function() {
            Route::get('/dashboard', [UserController::class, 'dashboard'])
            ->name('dashboard');
            
            Route::get('/profile', [UserController::class, 'profile'])
            ->name('profile');
            
            Route::post('editProfile', [UserController::class, 'editProfile'])
            ->name('editProfile');
            
            // admin
            Route::resource('admin', AdminController::class);
            Route::resource('product', ProductController::class);

    });
});


require __DIR__.'/auth.php';

  