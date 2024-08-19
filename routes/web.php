<?php

use App\Http\Controllers\admin\AdminJobController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\JobTypeController;
use App\Http\Controllers\admin\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\JobController;
use App\Http\Controllers\Frontend\FindJobController;
use App\Http\Controllers\Frontend\ForgotPasswordController;



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
//     return view('frontend.home');
// });
Route::get('/',[HomeController::class,'index'])->name('frontend.home');
Route::get('/jobs',[FindJobController::class,'index'])->name('frontend.job');
Route::get('/job-details/{id}',[FindJobController::class,'details'])->name('frontend.jobdetail');

Route::middleware('guest')->group(function () {
    Route::get('/login',[AuthController::class,'login'])->name('frontend.login');
    Route::post('/loginform',[AuthController::class,'logininto']);
    Route::get('/register',[AuthController::class,'register'])->name('frontend.register');
    Route::post('/registeration',[AuthController::class,'registeration']);
});


Route::prefix('admin')->group(function(){
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/loginform', [LoginController::class, 'login']);
        
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('users', [DashboardController::class, 'user'])->name('admin.user');
        Route::post('/logout', [DashboardController::class,'logout']);

        //category
        Route::get('category',[CategoryController::class,'index'])->name('admin.category');
        Route::get('category/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('category/create',[CategoryController::class,'store']);
        Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::put('category/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::get('category/show/{id}',[CategoryController::class,'show'])->name('admin.category.show');
        Route::delete('category/delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');

        //jobtype
        Route::get('jobtype',[JobTypeController::class,'index'])->name('admin.jobtype');
        Route::get('jobtype/create',[JobTypeController::class,'create'])->name('admin.jobtype.create');
        Route::post('jobtype/create',[JobTypeController::class,'store']);
        Route::get('jobtype/edit/{id}',[JobTypeController::class,'edit'])->name('admin.jobtype.edit');
        Route::put('jobtype/update/{id}',[JobTypeController::class,'update'])->name('admin.jobtype.update');
        Route::get('jobtype/show/{id}',[JobTypeController::class,'show'])->name('admin.jobtype.show');
        Route::delete('jobtype/delete/{id}',[JobTypeController::class,'destroy'])->name('admin.jobtype.destroy');

        //job
        Route::get('jobs',[AdminJobController::class,'joblist'])->name('admin.job.list');
        Route::get('job/create',[AdminJobController::class,'create'])->name('admin.job.create');
        Route::post('job/create',[AdminJobController::class,'store']);
        Route::get('job/edit/{id}',[AdminJobController::class,'edit'])->name('admin.job.edit');
        Route::put('job/edit/{id}',[AdminJobController::class,'update']);
        Route::get('job/show/{id}',[AdminJobController::class,'show'])->name('admin.job.show');
        Route::delete('job/delete/{id}',[AdminJobController::class,'destroy'])->name('admin.job.destroy');
    });
});

Route::middleware(['auth'])->group(function(){
    Route::get('myaccount',[ProfileController::class,'index'])->name('frontend.myaccount');
    Route::get('/logout',[AuthController::class,'logout'])->name('frontend.logout');
    Route::put('/updateProfile',[ProfileController::class,'update']);
    Route::put('/passwordChange',[ProfileController::class,'passwordUpdate']);
    Route::post('/updatepic',[ProfileController::class,'updatepic']);
    Route::get('/job-post',[JobController::class,'jobpost'])->name('frontend.jobpost');
    Route::post('/job-create',[JobController::class,'createjob'])->name('frontend.jobcreate');
    Route::get('/my-jobs',[JobController::class,'myjobs'])->name('frontend.myjobs');
    Route::get('/jobs-applied',[JobController::class,'jobApplied'])->name('frontend.jobApplied');
    Route::get('/jobs-saved',[JobController::class,'jobSaved'])->name('frontend.jobsaved');
    Route::delete('/jobs-saved/delete/{id}',[JobController::class,'jobSavedelete'])->name('frontend.jobSavedelete');
    Route::get('/my-jobs/edit/{id}',[JobController::class,'myjobsedit'])->name('frontend.myjobedit');
    Route::put('/my-jobs/update/{id}',[JobController::class,'myjobupdate']);
    Route::delete('/my-jobs/delete/{id}',[JobController::class,'jobdelete'])->name('frontend.jobdelete');
    Route::delete('/jobs-applied/delete/{id}',[JobController::class,'jobApplieddelete'])->name('frontend.jobApplieddelete');
    Route::post('/job-apply/{id}',[FindJobController::class,'applyjob'])->name('frontend.applyjob');
    Route::post('/save-job/{id}',[FindJobController::class,'savejob'])->name('frontend.savejob');

});

Route::get('/forgot-password',[ForgotPasswordController::class,'forgotPassword'])->name('account.forgotPassword');
Route::post('/process-forgot-password',[ForgotPasswordController::class,'processForgotPassword'])->name('account.processForgotPassword');
Route::get('/reset-password/{token}',[ForgotPasswordController::class,'resetPassword'])->name('account.resetPassword');
Route::post('/process-reset-password',[ForgotPasswordController::class,'processResetPassword'])->name('account.processResetPassword');