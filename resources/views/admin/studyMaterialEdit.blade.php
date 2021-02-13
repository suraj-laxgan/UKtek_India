@extends('admin.master')

@section('title', 'Study Material Edit')

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
                <a href="{{url('admin_study_show')}}" style="text-decoration:none">+ View Study Material &nbsp;</a>
                <a href="{{url('admin_study')}}" style="text-decoration:none">+ Add Study Material &nbsp;</a>
            </div>
        </div>
    <div class='x'> 
        <div class='row'> 
            <div class='column'></div>
            <div class='column_middle'>
                <div style=text-align:center;color:gray>Edit Study Material</div>
                <form action="{{url('admin_study_edit_upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="hidden" placeholder="Study Material Id" name="study_material_id" value="{{ $studyedit->study_material_id }}" >
                        </div>
                        <div>
                            <select name="creator_name" id="creator_name"  class='drop'>
                                <option value="">Select Creator Name</option>
                                <option value="Sourav">Sourav</option>
                                <option value="Suraj">Suraj</option>
                                <option value="Avijit">Avijit</option>
                                <option value="Amit">Amit</option>
                                <option {{ ($studyedit->creator_name)? 'selected="selected"':'' }} value="{{ $studyedit->creator_name }}">{{ $studyedit->creator_name}}</option>
                            </select>
                        </div> 
                        <div>
                            <input type="text"  id="f_name" name="f_name" class="drop" value="{{ $studyedit->f_name }}">
                        </div> 
                        <div>
                            <select name="select_type" id="select_type"  class='drop'>
                                <option value="">Select Type</option>
                                <option value="video">video</option>
                                <option value="audio">audio</option>
                                <option value="image">image</option>
                                <option value="pdf">pdf</option>
                                <option {{ ($studyedit->select_type)? 'selected="selected"':'' }} value="{{ $studyedit->select_type }}">{{ $studyedit->select_type}}</option>
                            </select>
                        </div> 
                        <div>
                            <input type="text"  id="short_description" name="short_description" class="drop" value="{{ $studyedit->short_description }}">
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
                                <option {{ ($studyedit->grade)? 'selected="selected"':'' }} value="{{ $studyedit->grade }}">{{ $studyedit->grade}}</option>
                            </select>
                        </div>  
                        <div>
                            <input type="file"  class="drop" name="material" id="material" >
                        </div>
                        <div class='drop'>
                            @if($studyedit["select_type"] == "video")
                                <video width="50%" height="auto" controls>
                                    <source src="{{ asset('study_material_upload/'.$studyedit["material"]) }}"" type="video/mp4">
                                </video>
                            @elseif($studyedit["select_type"] == "audio")
                                <audio  controls>
                                    <source src="{{ asset('study_material_upload/'.$studyedit["material"]) }}" type="audio/mpeg">
                                </audio>
                            @elseif($studyedit["select_type"] == "image")
                                <img src="{{ asset('study_material_upload/'.$studyedit["material"]) }}" height="auto" width="30%" />       
                            @else
                                    <iframe src="{{ asset('study_material_upload/'.$studyedit["material"]) }} " height="auto" width="100%" scrolling="auto" ></iframe>
                            @endif
                        </div>
                        <div> 
                            <input type="submit" value="Update Study Material" class="blue_button_new">
                        </div> 
                </form>   
            </div>
            <div class='column'></div>  
        </div>  
    </div>
</div>   
@endsection