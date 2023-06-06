<?php

use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\auth\loginController;
use App\Http\Controllers\backend\changeStatusController;
use App\Http\Controllers\backend\CoverPageContoller;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\DepartmentController as BackendDepartmentController;
use App\Http\Controllers\backend\GeneralSetting;
use App\Http\Controllers\backend\SemesterController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\SubjectController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\frontend\auth\LoginController as AuthLoginController;
use App\Http\Controllers\frontend\auth\RegistrationController;
use App\Http\Controllers\frontend\CoverPageController;
use App\Http\Controllers\frontend\DashboardController as FrontendDashboardController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\UserController;
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


Route::prefix('')->group(function () {

    /*Home page*/
    Route::get('/', [HomeController::class, 'homePage'])->name('HomePage');

    /*student login route*/
    Route::get('login', [AuthLoginController::class, 'studentloginPage'])->name('student.LoginPage');
    Route::post('login', [AuthLoginController::class, 'studentlogin'])->name('student.Login');
    Route::get('registration', [RegistrationController::class, 'studentRegistrationPage'])->name('student.RegistrationPage');
    Route::post('registration', [RegistrationController::class, 'studentRegistration'])->name('student.Registration');
});

/*student auth route*/
Route::prefix('student')->middleware(['auth', 'IsSystemUser'])->group(function () {

    Route::get('dashboard', [FrontendDashboardController::class, 'dashboard'])->name('student.dashboard');
    Route::get('logout', [AuthLoginController::class, 'logout'])->name('student.logout');

    /*cover page route*/
    Route::get('cover_page_form', [CoverPageController::class, 'getCoverPageForm'])->name('student.GetCoverPageForm');
    Route::post('print_cover_page', [CoverPageController::class, 'PrintCoverPage'])->name('student.PrintCoverPage');

    /*AJAX Call */
    Route::get('subject/ajax/{semester_name}', [CoverPageController::class, 'loadSubjectAjax'])->name('loadSubject.ajax');

    /*user profile modification route*/
    Route::get('change_password',[UserController::class,'changePasswordPage'])->name('student.changePasswordPage');
    Route::post('change_password',[UserController::class,'changePassword'])->name('student.changePassword');
    Route::get('profile',[UserController::class,'UserProfilePage'])->name('student.profile');
    Route::post('profile_image/{id}',[UserController::class,'changeImage'])->name('student.profileImageChange');
    Route::get('profile_edit',[UserController::class,'profile_EditPage'])->name('student.ProfileEditPage');
    Route::put('profile_edit',[UserController::class,'profile_edit'])->name('student.ProfileEdit');
});












/*admin auth route*/
Route::prefix('admin/')->group(function () {
    /*admin login route*/
    Route::get('login', [loginController::class, 'loginPage'])->name('admin.loginPage');
    Route::post('login', [loginController::class, 'login'])->name('admin.login');
    Route::get('logout', [loginController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth', 'IsSystemAdmin'])->group(function () {

        /*admin dashboard*/
        Route::get('dashboard', [dashboardController::class, 'dashboard'])->name('admin.dashboard');

        /*admin profile modification route*/
        Route::get('profile', [adminController::class, 'showProfile'])->name('admin.profile');
        Route::put('profile_image/{slug}', [adminController::class, 'saveImage'])->name('admin.imageUpdate');
        Route::put('profile_data/{slug}', [adminController::class, 'updateUser'])->name('admin.profileUpdate');
        Route::get('change_password', [adminController::class, 'changePasswordPage'])->name('admin.changePassPage');
        Route::post('change_password', [adminController::class, 'changePassword'])->name('admin.changePassword');

        /*general Setting route*/
        Route::get('general_setting', [GeneralSetting::class, 'settingPage'])->name('admin.generalSettingPage');
        Route::put('general_setting/{id}', [GeneralSetting::class, 'getSettings'])->name('admin.getGeneralSetting');
        /*Resource Controller*/
        Route::resource('department', BackendDepartmentController::class);
        Route::resource('teacher', TeacherController::class);
        Route::resource('subject', SubjectController::class);
        Route::resource('semester', SemesterController::class);

        /*Change Active Status*/
        Route::get('active_department/{slug}/{status}', [changeStatusController::class, 'activeDepartment'])->name('admin.departmentActive');
        Route::get('active_teacher/{slug}/{status}', [changeStatusController::class, 'activeTeacher'])->name('admin.teacherActive');
        Route::get('active_subject/{slug}/{status}', [changeStatusController::class, 'activeSubject'])->name('admin.subjectActive');

        /*route for users*/
        Route::get('student',[StudentController::class,'index'])->name('admin.studentIndexPage');
        Route::get('student/details/{student_id}',[StudentController::class,'student_details'])->name('admin.studentDetailsPage');
        Route::get('student/reset_password/{student_id}',[StudentController::class,'passwordResetPage'])->name('admin.studentPasswordResetPage');
        Route::put('student/reset_password/{student_id}',[StudentController::class,'passwordReset'])->name('admin.studentPasswordReset');
        Route::delete('student/delete/{student_id}',[StudentController::class,'DeleteStudent'])->name('admin.studentDelete');

        
    });
});
