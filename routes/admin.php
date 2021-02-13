<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;

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


Route::get('child', function () {
    return view('admin.masterChild');
});
//admin login//
Route::get('admin_login',[AdminLoginController::class,'showAdminLogin'])->name('admin.login');
Route::post('admin_office',[AdminLoginController::class,'AdminLogin']);
Route::get('admin_home',[AdminLoginController::class,'adminHome'])->name('admin.adminhome');
Route::post('admin_log',[AdminLoginController::class ,'adminlogout'])->name('admin.logout');

///////// admin home///////////
Route::get('admin_study',[AdminHomeController::class,'showAdminStudy'])->name('admin.study');
Route::post('admin_study_upload',[AdminHomeController::class,'uploadStudyMaterial'])->name('admin.study_upload');
Route::get('admin_study_show',[AdminHomeController::class,'StudyMaterialShow'])->name('admin.study_show');
Route::get('admin_study_edit/{id}',[AdminHomeController::class,'StudyMaterialEdit'])->name('admin.study_edit');
Route::post('admin_study_edit_upload',[AdminHomeController::class,'StudyMaterialEditUpload'])->name('admin.study_edit_upload');