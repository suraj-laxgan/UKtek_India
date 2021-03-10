@extends('admin.master')

@section('title', 'Admin Home')

@section('header')

    @parent

    <!-- <p>This is appended to the master sidebar.</p> -->
@endsection

@section('content')
    <!-- <p>This is my body content.</p> -->
    <div class='mack11'>
        <div class='mack'>
            <i class="fa fa-desktop"></i> Admin  Dashboard   
        </div>
        <div>
            <button type="button" class="btn" onClick="window.location.href='{{ url('admin_study') }}'">
                <i class="fa fa-bars"></i> Study Material Creator
            </button> 
            <button type="button" class="btn" onClick="window.location.href='{{ url('admin_ques_package') }}'">
                <i class="fa fa-book"></i> Exam Package
            </button>
            <button type="button" class="btn" onClick="window.location.href='{{ url('admin_question') }}'">
                <i class="fa fa-cubes"></i> Question Entry
            </button>
            <button type="button" class="btn" onClick="window.location.href='{{ url('admin_subtopic_view') }}'">
                <i class="fa fa-group"></i> Subject Topic
            </button>
             
        </div>
        
    </div>    
@endsection