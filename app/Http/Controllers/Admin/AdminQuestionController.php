<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\question;


class AdminQuestionController extends Controller
{
    public function question()
    {
        return view('admin.question');
    }

    public function uploadQuestion(Request $req)
    {
                 //************************  for create custom id in database **************************//
      $max_ques_id = question::orderBy('question_id', 'desc')->value('question_id');
      if($max_ques_id=="")
      {
          $question_id = "QT0000000001";
      }
      else{

          $lastp = substr($max_ques_id,2,10);
          $lastpp = ++$lastp;
          $last = str_pad($lastpp,10,"0",STR_PAD_LEFT);
          $question_id = 'QT'.$last;
        }
        //********************* connect database with help of models and save the data ****************/ 
        $ques= new question;
        $ques->question_id=$question_id;
        $ques->question=$req->question;
        $ques->option_one=$req->option_one;
        $ques->option_two=$req->option_two;
        $ques->option_three=$req->option_three;        
        $ques->option_four=$req->option_four;
        $ques->option_five=$req->option_five;
        $ques->answer=$req->answer;
        $ques->marks=$req->marks;
        $ques->grade=$req->grade;
        $ques->create_dt = date('d-m-Y');
        $ques->create_time =  date('H:i:s');
        $ques->save();
        return redirect()->route('admin.question');
    }

    // ************************* Package view ********************************* //
    public function questionView()

     {   
       $question_id=request('question_id');
        $question = request('question');
        // $option_one = request('option_one');
        // $option_two = request('option_two');
        // $option_three = request('option_three');
        // $option_four = request('option_four');
        // $option_five = request('option_five');
        $answer = request('answer');
        $grade = request('grade');

         if($question_id != '' || $question != '' || $answer != '' || $grade != '' )
            {
                $query  = question::query();
                $all_question_id = '';
                if($question_id != '')
                {
                $query = $query->where('question_id', 'like', '%' . $question_id . '%');
                }
                if($question != '')
                {
                $query = $query->where('question', 'like', '%' . $question . '%');
                }
                if($answer != '')
                {
                $query = $query->where('answer', 'like', '%' . $answer . '%');
                }
                if($grade != '')
                {
                $query = $query->where('grade', 'like', '%' . $grade . '%');
                }
                $query =  $query->select('question_id','question','answer','grade');
                $ques = $query->get();
            }
        else{
            $ques=[]; 
          }
       // $ques=question::all();
        return view('admin.questionView',compact('ques'));
    }
    //********************************* Edit Question **********************************/
    public function questionEdit($id)
    {
        $quesedit = question::where('question_id', $id)->first();
        $question_id=request('question_id');
        $question = request('question');
        $answer = request('answer');
        $grade = request('grade');
        return view('admin.questionEdit',compact('quesedit','question_id','question','answer','grade'));
    }
     //********************************* Upload Question **************************************/
     public function questionUpload(Request $request)
     {
        //  return $request->input('question_id');
        $question = $request->input('question');
        $option_one = $request->input('option_one');
        $option_two = $request->input('option_two');
        $option_three = $request->input('option_three');
        $option_four = $request->input('option_four');
        $option_five = $request->input('option_five');
        $answer = $request->input('answer');
        $marks = $request->input('marks');
        $grade = $request->input('grade');
         question::where('question_id', $request->input('question_id'))->update([
            'question' => $question,
            'option_one' => $option_one,
            'option_two' => $option_two,
            'option_three' => $option_three,
            'option_four' => $option_four,
            'option_five' => $option_five,
            'answer' => $answer,
            'marks' => $marks,
            'grade' => $grade,
         ]);
         return redirect()->route('admin.question_view');
     }
}
