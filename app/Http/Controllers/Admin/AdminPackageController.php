<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\package;
use App\Models\Admin\questionPackage;


class AdminPackageController extends Controller
{
    public function quesPackage()
    {
        return view('admin.questionPackage');
    }

    public function uploadPackage(Request $req)
    {
                //************************  for create custom id in database **************************//
      $max_pack_id = package::orderBy('package_id', 'desc')->value('package_id');
      if($max_pack_id=="")
      {
          $package_id = "PA0000000001";
      }
      else{

          $lastp = substr($max_pack_id,2,10);
          $lastpp = ++$lastp;
          $last = str_pad($lastpp,10,"0",STR_PAD_LEFT);
          $package_id = 'PA'.$last;
        }
                 //********************* connect database with help of models and save the data ****************/ 
         $pack= new package;
         $pack->package_id=$package_id;
         $pack->package_name=$req->package_name;
         $pack->exam_type=$req->exam_type;
         $pack->subject=$req->subject;
         $pack->no_of_ques=$req->no_of_ques;
         $pack->total_marks=$req->total_marks;
         $pack->create_dt = date('d-m-Y');
         $pack->create_time =  date('H:i:s');
         $pack->save();
//**************************************************************************************************** */
        for($i=1;$i<=$req->no_of_ques;$i++)
        {
            $max_question_id = questionPackage::orderBy('pack_question_id', 'desc')->value('pack_question_id');
            if($max_question_id=="")
            {
                $pack_question_id = "PQ0000000001";
            }
            else{

                $lastp = substr($max_question_id,2,10);
                $lastpp = ++$lastp;
                $last = str_pad($lastpp,10,"0",STR_PAD_LEFT);
                $pack_question_id = 'PQ'.$last;
            }
        
                            //********************* connect database with help of models and save the data ****************/ 
                $ques= new questionPackage;
                $ques->pack_question_id=$pack_question_id;
                $ques->package_id=$package_id;
                $ques->subject=$req->subject;
                $ques->question_sl_no=$i;                               
                $ques->create_dt = date('d-m-Y');
                $ques->create_time =  date('H:i:s');
                $ques->save();
        }
         return redirect()->route('admin.ques_package');
    }
    // ************************* Package view ********************************* //
    public function packageView()

    {   $package_id=request('package_id');
        $package_name = request('package_name');
        $exam_type = request('exam_type');
        $subject = request('subject');
         if($package_id != '' || $package_name != '' || $exam_type != '' || $subject != '' )
            {
                $query  = package::query();
                $all_package_id = '';
                if($package_id != '')
                {
                $query = $query->where('package_id', 'like', '%' . $package_id . '%');
                }
                if($package_name != '')
                {
                $query = $query->where('package_name', 'like', '%' . $package_name . '%');
                }
                if($exam_type != '')
                {
                $query = $query->where('exam_type', 'like', '%' . $exam_type . '%');
                }
                if($subject != '')
                {
                $query = $query->where('subject', 'like', '%' . $subject . '%');
                }
                $query =  $query->select('package_id','package_name','exam_type','subject');
                $pack = $query->get();
            }
        else{
            $pack=[]; 
          }
       // $pack=package::all();
        return view('admin.questionPackageView',compact('pack'));
    }
    //********************************* Edit package **********************************/
    public function packageEdit($id)
    {
        $packedit = package::where('package_id', $id)->first();
        $package_id=request('package_id');
        $package_name = request('package_name');
        $exam_type = request('exam_type');
        $subject = request('subject');
        return view('admin.questionPackageEdit',compact('packedit','package_id','package_name','exam_type','subject'));
    }
    //********************************* Upload package **************************************/
    public function packagetUpload(Request $request)
    {
        $packup=package::where('package_id', $request->package_id)->first();
        $packup->package_name=$request->package_name;
        $packup->exam_type=$request->exam_type;
        $packup->subject=$request->subject;
        $packup->no_of_ques=$request->no_of_ques;
        $packup->total_marks=$request->total_marks;
        $packup->save();
        return redirect()->route('admin.package_view');
    }
    
    
    
}
