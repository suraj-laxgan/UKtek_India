<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Topic;

class AdminSubTopicController extends Controller
{
    
    // public function subTopic()
    // {
    //     return view('admin.subjectTopic');
    // }
    public function addsubTopic(Request $req)
    {
        //************************  for create custom id in database **************************//
        $max_subtopic_id = Topic::orderBy('topic_id', 'desc')->value('topic_id');
        if($max_subtopic_id=="")
        {
            $topic_id = "TP0000000001";
        }
        else{
  
            $lastp = substr($max_subtopic_id,2,10);
            $lastpp = ++$lastp;
            $last = str_pad($lastpp,10,"0",STR_PAD_LEFT);
            $topic_id = 'TP'.$last;
          }
          //********************* connect database with help of models and save the data ****************/ 
        $subtopic= new Topic;
        $subtopic->topic_id=$topic_id;
        $subtopic->subject=$req->subject;
        $subtopic->topic=$req->topic;
        $subtopic->create_dt= date('d-m-Y');
        $subtopic->create_time= date('H:i:s');
        $subtopic->save();
        return redirect()->route('admin.subtopicView');

    }
    public function subTopicView()
    {
        $subtopic=Topic::paginate(5);
        return view('admin.subjectTopic',compact('subtopic'));
    }
    public function subTopicEdit($id)
    {
        $topicedit = Topic::where('topic_id', $id)->first();
        $topic_id=request('topic_id');
        $subject = request('subject');
        $topic = request('topic');
        return view('admin.subjectTopicEdit',compact('topicedit','topic_id','subject','topic'));
 
    }
    public function subTopicEditUp(Request $request)
     {
         //return 'hi';
        // return $request->input('topic_id');
        $subject = $request->input('subject');
        $topic = $request->input('topic');
        Topic::where('topic_id', $request->input('topic_id'))->update([
            'subject' => $subject,
            'topic' => $topic
            ]);
            return redirect()->route('admin.subtopicView');
     }
}
