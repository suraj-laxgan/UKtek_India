@extends('admin.master')

@section('title', 'Study Material Show ')

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
    <div class='mack12'>
        <div  class='row'>
            <div class='column_view'>
                <div style=text-align:center;color:gray> Search Study Material</div>
                <form action="{{url('admin_study_show')}}" method="GET">
                    <div>
                        <input type="text" placeholder="Study Material Id" id="study_material_id" name="study_material_id" class="drop" autocomplete="off">
                    </div>
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
                    <div class="row">
                        <!-- <div class="column_two">
                            <input type="text" id="frm_dt" name="create_dt" class="drop"  placeholder="From Date">
                        </div>
                        <div class="column_two">
                            <input type="text" id="to_dt" name="create_dt" class="drop"  placeholder="To Date">
                        </div> -->
                    </div>
                     <div> 
                        <input type="submit" id="search_all" value="Search Study Material" class="blue_button_new"  style="color:#000066">
                        <!-- <button type="button" id="search_all" class="blue_button_new" style="color:#000066">Search Package </button> -->
                        <a href="{{url('admin_study_show')}}"> <button type="button" class="blue_button_new" style="color:#000066"> Refresh
                        </button></a>
                    </div>
                </form>    
            </div>
            <div  class='column_middle'>
                <div style="text-align:center;color:gray"> View Study Material</div>
                
                <table width="100%"style="border:1px solid #e6ffff;">
                        <tr style="color:#000066 ;font-size:14px; background-color:#e6ffff;">
                            <th width="15%"> Id</th>
                            <th width="15%">Creator Name</th>
                            <th width="15%"> Name</th>
                            <th width="10%">Type</th>
                            <th width="15%">Short Description</th> 
                            <th width="5%">Grade</th>
                            <th width="15%">Study Material</th>
                            <th width="10%">Operation</th>
                        </tr>
                        @foreach ($studyview11 as $study)
                        <tr style="color:gray;font-size:12px;">
                            <td>{{ $study["study_material_id"]}}</td>
                            <td>{{ $study["creator_name"]}}</td>
                            <td>{{ $study["f_name"]}}</td>
                            <td>{{ $study["select_type"]}}</td>
                            <td>{{ $study["short_description"]}}</td>
                            <td>{{ $study["grade"]}}</td>
                            <td >
                                <!-- <img src="{{ asset('study_material_upload/'.$study["material"]) }}" width="100px" height="100px" /> -->
                                <!-- <video width="130px" height="100px" controls>
                                    <source src="{{ asset('study_material_upload/'.$study["material"]) }}"" type="video/mp4">
                                </video> -->
                                <!-- <audio  controls>
                                    <source src="{{ asset('study_material_upload/'.$study["material"]) }}" type="audio/ogg">
                                    <source src="{{ asset('study_material_upload/'.$study["material"]) }}" type="audio/mpeg">
                                </audio> -->
                                @if($study["select_type"] == "video")
                                    <video height="100" width="150" controls>
                                        <source src="{{ asset('study_material_upload/'.$study["material"]) }}"" type="video/mp4">
                                    </video>
                                @elseif($study["select_type"] == "audio")
                                    <audio style="width:100%;" controls>
                                        <source src="{{ asset('study_material_upload/'.$study["material"]) }}" type="audio/mpeg">
                                    </audio>
                                @elseif($study["select_type"] == "image")
                                    <img src="{{ asset('study_material_upload/'.$study["material"]) }}" height="100" width="150" />       
                                @else
                                    <iframe src="{{ asset('study_material_upload/'.$study["material"]) }} " height="100" width="150" scrolling="auto" ></iframe>
                                @endif
                            </td>
                            <!-- <td> <a href={{'admin_study_edit/'.$study['study_material_id']}}><button type="button" class="lightblue_button">Edit Material</button></a></td> -->
                            <td><a href ="{{url('admin_study_edit/' .$study['study_material_id'].'?creator_name='.request('creator_name').'&study_material_id='.request('study_material_id').'&f_name='.request('f_name').'&select_type='.request('select_type').'&short_description='.request('short_description').'&grade='.request('grade'))}}"><button type="button" class="lightblue_button">Edit </button></a></td>
                        </tr>
                        @endforeach 
                </table>
                    <div style="text-align:center;color:gray">
                        <!-- <div class='pagination'> -->
                        @if($studyview11)
                            {{$studyview11->links()}}
                        @endif
                        <style>
                              .w-5 {
                                   display: none 
                                }
                        </style>
                    </div>
            </div>
            <div class='column'></div>
        </div>
        
    </div>    
</div>    
<script>
//////////// for search in same page /////////////////
$("#search_all").click(function(){
  //alert("The paragraph was clicked.");
  var creator_name = $("#creator_name").val();
  var study_material_id = $("#study_material_id").val();
  var f_name = $("#f_name").val();
  var select_type = $("#select_type").val();
  var short_description = $("#short_description").val();
  var grade = $("#grade").val();
  var create_dt = $("#frm_dt").val();
  var create_dt = $("#to_dt").val();
  window.location ='admin_study_show?creator_name='+creator_name+'&study_material_id='+study_material_id+'&f_name='+f_name+'&select_type='+select_type+'&short_description='+short_description+'&grade='+grade+'&frm_dt='+frm_dt+'&to_dt='+to_dt;
  console.log(creator_name);
});
////////  for iframe autoplay off //////////
$(document).ready(function () {
    var ownVideos = $("iframe");
    $.each(ownVideos, function (i, video) {                
        var frameContent = $(video).contents().find('body').html();
        if (frameContent) {
            $(video).contents().find('body').html(frameContent.replace("autoplay", ""));
        }
    });
});
////////// for date picker ///////////
$( "#frm_dt" ).datepicker({
		  dateFormat: "dd-mm-yy"
		});
		
        $( "#to_dt" ).datepicker({
		  dateFormat: "dd-mm-yy"
		});

</script>
@endsection
