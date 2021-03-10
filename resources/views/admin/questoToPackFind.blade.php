@extends('admin.master')

@section('title', ' Find Question')

@section('header')

    @parent

    <!-- <p>This is appended to the master sidebar.</p> -->
@endsection

@section('content')
    <!-- <p>This is my body content.</p> -->
    <!-- 09/03/21 -->
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
                <div style=text-align:center;color:gray>View Question</div>
                <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                <table  width="100%">
                <tr style="color:#000066 ;font-size:14px; background-color:#e6ffff;">
                        <th width="15%"> Id</th>
                        <th width="65%">Question</th>
                        <th width="20%">Added Date</th>
                        <th width="15%">Action</th>

                    </tr>
                    @foreach($ques as $questions)
                    <tr style="color:gray;font-size:12px;">
                        <td>{{ $questions->question_id }}</td>
                        <td>{!! $questions->question !!}</td>
                        <td>{{ $questions->create_dt }}</td>
                            <form action="{{url('ques_package_update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type='hidden' class='drop' name='question_id' value="{{ $questions->question_id}}">
                            <!-- **************** -->
                            <input type='hidden'  name='pack_question_id' value="{{ request('pack_question_id')}}">


                        <td style="text-align:center"><input type="submit"  class="lightblue_button" value="Set" >
                        </td> 
                            </form>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class='column'></div>

            </div>
        </div>
        
    </dv>
@endsection
