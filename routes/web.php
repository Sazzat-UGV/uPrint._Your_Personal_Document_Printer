<?php

use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\auth\loginController;
use App\Http\Controllers\backend\changeStatusController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\DepartmentController as BackendDepartmentController;
use App\Http\Controllers\backend\SubjectController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\DepartmentController;
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

        /*admin profile modification route*/
        Route::get('profile',[adminController::class,'showProfile'])->name('admin.profile');
        Route::put('profile_image/{slug}',[adminController::class,'saveImage'])->name('admin.imageUpdate');
        Route::put('profile_data/{slug}',[adminController::class,'updateUser'])->name('admin.profileUpdate');
        Route::get('change_password',[adminController::class,'changePasswordPage'])->name('admin.changePassPage');
        Route::post('change_password',[adminController::class,'changePassword'])->name('admin.changePassword');

        /*Resource Controller*/
        Route::resource('department',BackendDepartmentController::class);
        Route::resource('teacher',TeacherController::class);
        Route::resource('subject',SubjectController::class);


        /*Change Active Status*/
        Route::get('active_department/{slug}/{status}',[changeStatusController::class,'activeDepartment'])->name('admin.departmentActive');
        Route::get('active_teacher/{slug}/{status}',[changeStatusController::class,'activeTeacher'])->name('admin.teacherActive');
        Route::get('active_subject/{slug}/{status}',[changeStatusController::class,'activeSubject'])->name('admin.subjectActive');

    });

});

