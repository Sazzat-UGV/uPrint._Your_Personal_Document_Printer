<?php

use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\auth\loginController;
use App\Http\Controllers\backend\dashboardController;
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


/*admin auth route*/
Route::prefix('admin/')->group(function(){
    /*admin login route*/
    Route::get('login',[loginController::class,'loginPage'])->name('admin.loginPage');
    Route::post('login',[loginController::class,'login'])->name('admin.login');
    Route::get('logout',[loginController::class,'logout'])->name('admin.logout');

    Route::middleware(['auth','IsSystemAdmin'])->group(function(){
        /*admin dashboard*/
        Route::get('dashboard',[dashboardController::class,'dashboard'])->name('admin.dashboard');
        /*admin profile modify route*/
        Route::get('profile',[adminController::class,'showProfile'])->name('admin.profile');
        Route::put('profile_image/{slug}',[adminController::class,'saveImage'])->name('admin.profileImage');
        Route::put('profile_data/{slug}',[adminController::class,'updateUser'])->name('admin.profileUpdate');

    });

});

