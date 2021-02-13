@extends('admin.master')

@section('title', ' Child')

@section('header')

    @parent

    <!-- <p>This is appended to the master sidebar.</p> -->
@endsection

@section('content')
    <!-- <p>This is my body content.</p> -->
    <div class="container_fluid_new"  >
                <div width="100%" align="right">  
                    <a href="{{url('add_question')}}" class="text_12_black"> + Acdef </a>
                </div>    
    </div>
@endsection