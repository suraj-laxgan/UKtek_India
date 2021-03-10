@extends('admin.master')

@section('title', ' Topic')

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
                <div class='column_view'>
                    <div style=text-align:center;color:gray>Add Topic</div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                        <form action="{{url('admin_subtopic_up')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <select name="subject" id="subject"  class='drop'>
                                <option value="">Select Subject</option>
                                <option value="English">English</option>
                            </select>
                            <input type='text' class='drop' name='topic' id='topic'placeholder='Topic' autocomplete='off'>
                            <input type="submit" value="Add " class="blue_button_new" style="color:#000066;margin-top:3px">
                        </form>
                </div>
                <div class='column_middle'>
                    <div style=text-align:center;color:gray>View Topic</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                    <table width="100%"style="border:1px solid #e6ffff;margin-top:3px">
                        <tr style="color:#000066 ;font-size:14px; background-color:#e6ffff;">
                            <th width='25%'>Id</th>
                            <th width='25%'>Subject</th>
                            <th width=25%>Topic</th>
                            <th width=25%>Operation</th>
                        </tr>
                        @foreach ($subtopic as $topicviews)
                        <tr style="color:gray;font-size:12px;">
                            <td>{{ $topicviews["topic_id"]}}</td>
                            <td>{{ $topicviews["subject"]}}</td>
                            <td>{{ $topicviews["topic"]}}</td>
                            <td><a href ="{{url('admin_subtopic_edit/' .$topicviews['topic_id'])}}"><button type="button" class="lightblue_button">Edit </button></a>
                        </tr>
                        @endforeach    
                    </table>
                    <div style="text-align:center;color:gray">
                        <span>
                            {{$subtopic->links()}}
                        </span>
                        <style>
                            .w-5{
                                display:none;
                            }
                        </style>
                    </div>
                </div>
                <div class='column'></div>
               
            </div>
        </div>
    </div>
@endsection
