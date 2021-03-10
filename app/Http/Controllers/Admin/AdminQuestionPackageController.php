<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\package;
use App\Models\Admin\questionPackage;
use App\Models\Admin\question;


class AdminQuestionPackageController extends Controller
{
    //***************** View Question Set  Question to Package Page **************/

    public function packQuestionView()
    {  
        $package_id=request('package_id');
        $exam_type = request('exam_type');
        $package_name = request('package_name'); 

         if($package_id != ''|| $exam_type != '' || $package_name != ''  )
            {
                $query  = questionPackage::query();
                $all_package_id = '';
                if($package_id != '')
                {
                $query = $query->where('package_id', '=', $package_id);
                }
                // if($exam_type != '')
                // {
                // $query = $query->where('exam_type', 'like', '%' . $exam_type . '%');
                // }
                // if($package_name != '')
                // {
                // $query = $query->where('package_name', 'like', '%' . $package_name . '%');
                // }
                
                
                $query =  $query->select('package_id','question_id','question_sl_no','package_name','pack_question_id');
                $qupack = $query->get();
            }
        else{
            $qupack=[]; 
          }
       // $qupack=package::all();
        return view('admin.questionToPackage',compact('qupack'));
     }

     //******************************** Dropdown for exam_type -> package_name  Question to Package Page  ******************/
    public function findPackageName(Request $r)
    {
        if($r->ajax())
        {
            $packagename = package::where('exam_type',$r->exam_type)
                // ->where('package_name','5')
                ->orderBy('package_name')
                ->get();
            return $packagename;
            //return response($r->all());
        }
    }
    //////////////********Find Question in Question to Package Find Page //////////////*********** */ 09/03/21

     public function findPackQuestionView()
     {
        $question_id=request('question_id');
        //dd($question_id);
        if($question_id != '')
        {
            $query  = question::query();
                $query = $query->where('question_id', '=', $question_id);
                $query =  $query->select('question_id','question','create_dt');
                $ques = $query->get();
        }
         // dd($ques);
         return view('admin.questoToPackFind',compact('ques'));
     }

    //  **********************************************************************************************
     public function quesPackUpdate(Request $request)
     {
        // return 'hi';
        //return $request->input('pack_question_id');
        $pack_question_id = $request->input('pack_question_id');
       // dd($pack_question_id);
        $question_id = $request->input('question_id');
       // dd($question_id,$pack_question_id);

       // $topic = $request->input('topic');
        questionPackage::where('pack_question_id', $request->input('pack_question_id'))->update([
            'question_id' => $question_id,
            //'topic' => $topic
            ]);
            return redirect()->route('admin.ques_to_package_view');
     }
     
   
}
