@extends('admin.master')

@section('title', ' Edit Question')

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
             <div class='column'></div>
                <div class='column_middle'>
                    <div style=text-align:center;color:gray>Edit Question</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                    <form action="{{url('admin_question_edit_upload')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                        <div>
                            <input type="hidden" placeholder="Packagel Id" name="question_id" value="{{ $quesedit->question_id }}" >
                            <select name="subject" id="subject"  class='drop'onChange="findTopicName()">
                                <option value="">Select Subject</option>
                                <option value="English">English</option>
                                <option {{ ($quesedit->subject)? 'selected="selected"':'' }} value="{{ $quesedit->subject }}">{{ $quesedit->subject}}</option>

                            </select>
                            <select name="topic" id="topic"  class='drop'>
                                <option value="">Select Topic</option>
                                <option {{ ($quesedit->topic)? 'selected="selected"':'' }} value="{{ $quesedit->topic }}">{{ $quesedit->topic}}</option>

                            </select>
                            <textarea class="drop" name="question" id="question" value="{{ $quesedit->question }}" >{{ $quesedit->question}}</textarea>
                            <textarea class="drop" name="option_one" id="option_one"value="{{ $quesedit->option_one }}">{{ $quesedit->option_one}}</textarea>
                            <textarea class="drop" name="option_two" id="option_two" value="{{ $quesedit->option_two }}">{{ $quesedit->option_two}}</textarea>
                            <textarea class="drop" name="option_three" id="option_three" value="{{ $quesedit->option_three }}">{{ $quesedit->option_three}}</textarea>
                            <textarea class="drop" name="option_four" id="option_four" value="{{ $quesedit->option_four }}">{{ $quesedit->option_four}}</textarea>
                            <textarea class="drop" name="option_five" id="option_five" value="{{ $quesedit->option_five }}">{{ $quesedit->option_five}}</textarea>
                            <textarea class="drop" name="answer" id="answer" value="{{ $quesedit->answer }}">{{ $quesedit->answer}}</textarea>
                            <input class="drop" name="marks"  id="marks"  value="{{ $quesedit->marks }}">
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
                                <option {{ ($quesedit->grade)? 'selected="selected"':'' }} value="{{ $quesedit->grade }}">{{ $quesedit->grade}}</option>

                            </select>  
                            <input type="submit" value="Update Question" class="blue_button_new" style="margin-top:3px">  
                        </div>
                    </form>
                </div>
                <div class='column'></div>
            </div>
        </div>
    </div>
    <script>
        function findTopicName()
        {
            //alert('hi');
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