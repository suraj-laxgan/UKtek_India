@extends('admin.master')

@section('title', ' View Package')

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
                <a href="{{url('admin_package_view')}}" style="text-decoration:none">+ View Package &nbsp;</a>
                <a href="{{url('admin_ques_package')}}" style="text-decoration:none">+ Add Package &nbsp;</a>
                <a href="{{url('admin_ques_to_package_view')}}" style="text-decoration:none">+ Add Question To Package &nbsp;</a>
            </div>
        </div>
        <div class='mack12'> 
            <div class='row'>
                <div class='column_view'>
                    <div style=text-align:center;color:gray> Search Package</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2">
                    <form action="{{url('admin_package_view')}}" method="GET">
                        <div>
                            <input type="text" placeholder="Package Id" id="package_id" name="package_id" class="drop" autocomplete="off">
                        </div>
                        <div>
                            <input type="text" placeholder="Package Name" id="package_name" name="package_name" class="drop" autocomplete="off">
                        </div>
                        <div>
                        <select name="exam_type" id="exam_type"  class='drop'>
                            <option value="">Select Exam Type</option>
                            <option value="Practise Paper">Practise Paper</option>
                            <option value="Online Exam">Online Exam</option>
                        </select>
                    </div>
                    <div>
                        <select name="subject" id="subject"  class='drop'>
                            <option value="">Select Subject</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                    <div> 
                        <input type="submit"id="search_all_package" value="Search Package" class="blue_button_new" style="color:#000066">
                        <!-- <button type="button" id="search_all_package" class="blue_button_new" style="color:#000066">Search Package </button> -->
                        <a href="{{url('admin_package_view')}}"> <button type="button" class="blue_button_new" style="color:#000066"> Refresh
                        </button></a>
                    </div>
                    </form>
                </div>
                <div  class='column_middle'>
                    <div style="text-align:center;color:gray"> Show Package</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2">
                    <table width="100%"style="border:1px solid #e6ffff;margin-top:3px">
                        <tr style="color:#000066 ;font-size:14px; background-color:#e6ffff;">
                            <th width="20%"> Id</th>
                            <th width="20%"> Name</th>
                            <th width="20%"> Type</th>
                            <th width="20%">Subject</th>
                            <th width="20%">Operation</th>
                        </tr>
                        @foreach ($pack as $package)
                        <tr style="color:gray;font-size:12px;">
                            <td> {{ $package["package_id"]}}</td>
                            <td> {{ $package["package_name"]}}</td> 
                            <td> {{ $package["exam_type"]}}</td>
                            <td> {{ $package["subject"]}}</td>
                            <td><a href ="{{url('admin_package_edit/' .$package['package_id'])}}"><button type="button" class="lightblue_button">Edit </button></a>
                            <!-- <a href ="{{url('admin_ques_to_package_view')}}"><button type="button" class="lightblue_button">View </button></a> -->
                           
                            <!-- <a href ="{{url('admin_ques_to_package_view/' .$package['package_id'])}}"><button type="button" class="lightblue_button">View </button></a> -->
                            </td>
                        </tr>
                        @endforeach 
                    </table>  
                </div>
                <div class='column'></div>
            </div>  
        </div>
    </div>
    <script>
    //////////// for search in same page /////////////////
    $("#search_all_package").click(function(){
    //alert("The paragraph was clicked.");
    var package_id = $("#package_id").val();
    var package_name = $("#package_name").val();
    var exam_type = $("#exam_type").val();
    var subject = $("#subject").val();
    var subject = $("#subject").val();
    window.location ='admin_package_view?package_id='+package_id+'&package_name='+package_name+'&exam_type='+exam_type+'&subject='+subject+'&subject='+subject+';
    console.log(package_id);
    });
    </script>
@endsection