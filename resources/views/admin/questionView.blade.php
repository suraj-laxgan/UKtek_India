@extends('admin.master')

@section('title', ' View Question')

@section('header')

    @parent

    <!-- <p>This is appended to the master sidebar.</p> -->
@endsection

@section('content')
    <!-- <p>This is my body content.</p> -->
    <div class='mack11'>
        <div class='row'> 
            <div class='column_two'></div>
            <div class='column_two'>
                <a href="{{url('admin_question_view')}}" style="text-decoration:none">+ View Question &nbsp;</a>
                <a href="{{url('admin_question')}}" style="text-decoration:none">+ Add Question &nbsp;</a>
            </div>
        </div>
        <div class='mack12'>
            <div class='row'>
                <div class='column_view'>
                    <div style=text-align:center;color:gray> Search Question</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2">
                    <form action="{{url('admin_question_view')}}" method="GET">
                        <div>
                            <input class="drop" name="question_id"  id="question_id" placeholder="Question Id" autocomplete="off">
                            <textarea class="drop" name="question" id="question" placeholder="Question"></textarea>
                            <textarea class="drop" name="answer" id="answer" placeholder="Answer"></textarea>
                            <select name="grade" id="grade"  class='drop'>
                                <option value="">Select Grade</option>
                                <option value=" 1">Grade 1</option>
                                <option value=" 2">Grade 2</option>
                                <option value=" 3">Grade 3</option>
                                <option value=" 4">Grade 4</option>
                                <option value=" 5">Grade 5</option>
                                <option value=" 6">Grade 6</option>
                                <option value=" 7">Grade 7</option>
                                <option value=" 8">Grade 8</option>
                                <option value=" 9">Grade 9</option>
                                <option value=" 10">Grade 10</option>
                            </select>
                            <select name="subject" id="subject"  class='drop'onChange="findTopicName()">
                                <option value="">Select Subject</option>
                                <option value="English">English</option>
                            </select>
                            <select name="topic" id="topic"  class='drop'>
                                <option value="">Select Topic</option>
                            </select>
                           
                            <input type="submit" id ="search_question" value="Search Question" class="blue_button_new" style="color:#000066">
                            <a href="{{url('admin_question_view')}}"> <button type="button" class="blue_button_new" style="color:#000066"> Refresh
                            </button></a>
                        </div>
                    </form>
                </div>
                <div  class='column_middle'>
                    <div style="text-align:center;color:gray"> Show Question</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2">
                    <table width="100%"style="border:1px solid #e6ffff;margin-top:3px">
                        <tr style="color:#000066 ;font-size:14px; background-color:#e6ffff;">
                            <th width="15%"> Id</th>
                            <th width="45%"> Question</th>
                            <th width="20%"> Answer</th>
                            <th width="10%">Grade</th>
                            <th width="10%">Operation</th>
                        </tr>
                    @foreach ($ques as $question)
                        <tr style="color:gray;font-size:12px;">
                            <td>{{ $question["question_id"]}}</td>
                            <td>{{ $question["question"]}}</td>
                            <td>{{ $question["answer"]}}</td>
                            <td>{{ $question["grade"]}}</td>
                            <td><a href ="{{url('admin_question_edit/' .$question['question_id'])}}"><button type="button" class="lightblue_button">Edit </button></a></td>
                        </tr>
                    @endforeach 
                     </table>
                    
                </div>
                <div class='column'></div>
            </div>
        </div>
    </div>
    
    <!-- //////////// for search in same page (jQuery) ///////////////// -->
    <script>
    // $("#search_question").click(function(){
    // //alert("The paragraph was clicked.");
    // var question_id = $("#question_id").val();
    // var question = $("#question").val();
    // var answer = $("#answer").val();
    // var grade = $("#grade").val();
    // window.location ='admin_question_view?question_id='+question_id+'&question='+question+'&answer='+answer+'&grade='+grade+';
    // console.log(question_id);
    // });
    //****************************************************** */<script>
        function findTopicName()
        {
           // alert('hi');
            var subject = $('#subject').val();
       // alert(subject);
            $.ajax({
            type : 'post',
            url  : "{{ url('find_topic_name')}}",
            data: {'subject' : subject,
                '_token':$('input[name=_token]').val()},   
            datatype : 'html',
            success:function(data)
            {
            var des_j = '<option value="">Select topic</option>';
                        $.each( data, function( index, value )
                        {
                            // console.log(value);
                            des_j += '<option value="'+value.topic+'">'+value.topic+'</option>';
                            });
            $('#topic').html(des_j);
            //console.log(data)
            } 
        })
        }
    
    </script>
@endsection