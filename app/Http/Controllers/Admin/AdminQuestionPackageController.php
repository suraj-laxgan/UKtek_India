<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\package;
use App\Models\Admin\questionPackage;

class AdminQuestionPackageController extends Controller
{
    //***************** Question To Package ***********************//
    // public function quesToPackage()
    // {
    //     return view('admin.questioToPackage');
    // }
    //***************** Question To Package ***********************//
    public function packageToQuesEdit($id)
    {
        $packedit = package::where('package_id', $id)->first();
        $package_id=request('package_id');    
        return view('admin.questioToPackage',compact('packedit'));

    }
    public function packQuestionView( $id)
    {
       // $qupack = questionPackage::all();
       // $qupack = questionPackage::where('package_id', $id)->first();
        $qupack = questionPackage::all();
      

        $question_sl_no=request('question_sl_no');
        $package_id=request('package_id');
       $question_id=request('question_id');
       $create_dt=request('create_dt');

        return view('admin.questionToPackage',compact('qupack','question_sl_no','package_id','question_id','create_dt'));
    }

        
}
