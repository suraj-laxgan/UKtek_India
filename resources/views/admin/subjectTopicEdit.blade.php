@extends('admin.master')

@section('title', ' Topic Edit')

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
                <a href="{{url('x')}}" style="text-decoration:none">+ View Question &nbsp;</a>
                <a href="{{url('x')}}" style="text-decoration:none">+ Add Question &nbsp;</a>
            </div>
        </div>
        <div class='mack12'>
            <div class='row'>
                <div class='column'></div>
                <div class='column_middle'>
                    <div style=text-align:center;color:gray>Edit Topic</div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                        <form action="{{url('admin_subtopic_edit_up')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="topic_id" value="{{ $topicedit->topic_id }}" >
                            <select name="subject" id="subject"  class='drop'>
                                <option value="">Select Subject</option>
                                <option value="English">English</option>
                                <option {{ ($topicedit->subject)? 'selected="selected"':'' }} value="{{ $topicedit->subject }}">{{ $topicedit->subject}}</option>

                            </select>
                            <input type='text' class='drop' name='topic' id='topic'placeholder='Topic' autocomplete='off' value="{{ $topicedit->topic }}">
                            <input type="submit" value="Update " class="blue_button_new" style="color:#000066;margin-top:3px">
                        </form> 
                </div>
                <div class='column'></div>
            </div>
        </div>
    </div>
@endsection
