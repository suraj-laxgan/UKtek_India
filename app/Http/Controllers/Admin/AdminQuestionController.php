<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\question;
use App\Models\Admin\Topic;


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
        $ques->subject=$req->subject;
        $ques->topic=$req->topic;
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
    // ******************************* Search topic respect of subject ************************//
    public function findTopicName(Request $r)
    {
        if($r->ajax())
        {
            $findtopic = Topic::where('subject',$r->subject)
                //->where('topic_status','A')
                ->orderBy('topic')
                ->get();
            return $findtopic;
            //return response($r->all());
        }
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
        $subject = request('subject');
        $topic = request('topic');

         if($question_id != '' || $question != '' || $answer != '' || $grade != ''|| $subject != ''|| $topic != '' )
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
                if($subject != '')
                {
                $query = $query->where('subject', 'like', '%' . $subject . '%');
                }
                if($topic != '')
                {
                $query = $query->where('topic', 'like', '%' . $topic . '%');
                }
                $query =  $query->select('question_id','question','answer','grade','subject','topic');
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
        $subject = $request->input('subject');
        $topic = $request->input('topic');
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
             'subject'=>$subject,
             'topic'=>$topic,
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
