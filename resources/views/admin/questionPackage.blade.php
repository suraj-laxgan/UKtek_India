@extends('admin.master')

@section('title', ' Question Package')

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
                <a href="{{url('admin_ques_package')}}" style="text-decoration:none">+ Add  Package &nbsp;</a>
                <a href="{{url('admin_ques_to_package_view')}}" style="text-decoration:none">+ Add Question To Package &nbsp;</a>

            </div>
        </div>
        <div class='row'>
            <div class='column'></div>
            <div class='column_middle'>
                <div style=text-align:center;color:gray>Add Package</div>
                <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2"> 
                <form action="{{url('admin_package_upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
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
                     <input type="text" placeholder="No of Question" id="no_of_ques" name="no_of_ques" class="drop" autocomplete="off">
                     <input type="text" placeholder="Total Marks" id="total_marks" name="total_marks" class="drop" autocomplete="off">
                    </div>
                    <!-- <div>
                        <input type="file"  class="drop" name="ques" id="ques">
                    </div> -->
                    <div> 
                        <input type="submit" value="Add Package" class="blue_button_new" style="margin-top:3px">
                    </div>
                </form>                      
            </div>
            <div class='column'></div>
        </div>
    </div>    
@endsection