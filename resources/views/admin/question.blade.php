@extends('admin.master')

@section('title', ' Question Entry')

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
                    <div style=text-align:center;color:gray>Question Entry</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                    <form action="{{url('admin_question_upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <textarea class="drop" name="question" id="question" placeholder="Question"></textarea>
                        </div>
                        <div>
                            <textarea class="drop" name="option_one" id="option_one" placeholder="Option 1"></textarea>
                            <textarea class="drop" name="option_two" id="option_two" placeholder="Option 2"></textarea>
                            <textarea class="drop" name="option_three" id="option_three" placeholder="Option 3"></textarea>
                            <textarea class="drop" name="option_four" id="option_four" placeholder="Option 4"></textarea>
                            <textarea class="drop" name="option_five" id="option_five" placeholder="Option 5"></textarea>
                        </div>
                        <div>
                            <textarea class="drop" name="answer" id="answer" placeholder="Answer"></textarea>
                        </div>
                        <div>
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
                        </div>
                        <div>
                         <input type="submit" value="Add Question" class="blue_button_new" style="margin-top:3px">
                        </div>
                    </form>
                </div>
                <div class='column'></div>
            </div>
        </div>    
    </div>
    
@endsection