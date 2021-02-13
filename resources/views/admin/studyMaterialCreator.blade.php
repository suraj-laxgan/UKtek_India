@extends('admin.master')

@section('title', 'Study Material Creator')

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
        <div class='row'>
                <div class='column'></div>
                <div class='column_middle'>
                        <div style=text-align:center;color:gray>Study Material Creator
                        </div>
                        <form action="{{url('admin_study_upload')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div>
                            <select name="creator_name" id="creator_name"  class='drop'>
                                <option value="">Select Creator Name</option>
                                <option value="Sourav">Sourav</option>
                                <option value="Suraj">Suraj</option>
                                <option value="Avijit">Avijit</option>
                                <option value="Amit">Amit</option>
                            </select>
                        </div>
                        <div>
                        <input type="text" placeholder="Study Material Name" id="f_name" name="f_name" class="drop" autocomplete="off">
                        </div>
                        <div>
                            <select name="select_type" id="select_type"  class='drop'>
                                <option value="">Select Type</option>
                                <option value="video">video</option>
                                <option value="audio">audio</option>
                                <option value="image">image</option>
                                <option value="pdf">pdf</option>
                            </select>
                        </div>
                        <div>
                            <input type="text" placeholder="Short Description" id="short_description" name="short_description" class="drop" autocomplete="off">
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
                            <input type="file"  class="drop" name="material" id="material">
                        </div>
                        <div> 
                            <input type="submit" value="Add Study Material" class="blue_button_new">
                        </div>
                </div>
                <div class='column'></div> 
         
        </div>
</div>
<!-- <script>
    $( "#frm_dt" ).datepicker({
		  dateFormat: "dd-mm-yy"
		});
		
		$( "#to_dt" ).datepicker({
		  dateFormat: "dd-mm-yy"
		});
</script> -->
@endsection