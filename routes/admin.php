<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminQuestionController;
use App\Http\Controllers\Admin\AdminQuestionPackageController;

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

//*************** admin home (Study Material)*************/ 
Route::get('admin_study',[AdminHomeController::class,'showAdminStudy'])->name('admin.study');
Route::post('admin_study_upload',[AdminHomeController::class,'uploadStudyMaterial'])->name('admin.study_upload');
Route::get('admin_study_show',[AdminHomeController::class,'StudyMaterialShow'])->name('admin.study_show');
Route::get('admin_study_edit/{id}',[AdminHomeController::class,'StudyMaterialEdit'])->name('admin.study_edit');
Route::post('admin_study_edit_upload',[AdminHomeController::class,'StudyMaterialEditUpload'])->name('admin.study_edit_upload');

//***************  Package ******************//
Route::get('admin_ques_package',[AdminPackageController::class,'quesPackage'])->name('admin.ques_package');
Route::post('admin_package_upload',[AdminPackageController::class,'uploadPackage'])->name('admin.package');
Route::get('admin_package_view',[AdminPackageController::class,'packageView'])->name('admin.package_view');
Route::get('admin_package_edit/{id}',[AdminPackageController::class,'packageEdit'])->name('admin.package_edit');
Route::post('admin_package_Edit_upload',[AdminPackageController::class,'packagetUpload'])->name('admin.package_upload');

//***************  Question to Package ******************//
Route::get('admin_ques_to_package/{id}',[AdminQuestionPackageController::class,'packageToQuesEdit'])->name('admin.ques_to_package');
// Route::post('admin_package_question_upload',[AdminQuestionPackageController::class,'uploadQuestionPackage'])->name('admin.question_package');
Route::get('admin_ques_to_package_view/{id}',[AdminQuestionPackageController::class,'packQuestionView'])->name('admin.ques_to_package_view');


//******************** Admin Question Entry ******************/
Route::get('admin_question',[AdminQuestionController::class,'question'])->name('admin.question');
Route::post('admin_question_upload',[AdminQuestionController::class,'uploadQuestion'])->name('admin.upques');
Route::get('admin_question_view',[AdminQuestionController::class,'questionView'])->name('admin.question_view');
Route::get('admin_question_edit/{id}',[AdminQuestionController::class,'questionEdit'])->name('admin.question_edit');
Route::post('admin_question_edit_upload',[AdminQuestionController::class,'questionUpload'])->name('admin.question_upload');



