@extends('admin.master')

@section('title', ' Add Question To Package')

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
                <div class='column'>
                   
                </div>
                <div class='column_middle'>
                    <div style=text-align:center;color:gray>View Package</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                    <table width=100% style='border:1px solid #e6ffff;margin-top:3px'>
                        <tr>
                            <th>Serial No</th>
                            <th>Id</th>
                            <th>Questuion Id</th>
                            <th>Operation</th>
                        </tr>
                        @foreach($qupack as $qpacks)
                        <tr>
                            <td>{{ $qpacks["question_sl_no"]}}</td>
                            <td>{{ $qpacks["package_id"]}}</td>
                            <td>{{ $qpacks["question_id"]}}</td>
                            <td>{{ $qpacks["create_dt"]}}</td>

                        </tr>
                        @endforeach
                    </table>
    
                </div>
                <div class='column'>  
                </div>
            </div>
        </div>
    </div>    
@endsection