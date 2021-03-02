@extends('admin.master')

@section('title', ' Edit Package')

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
            </div>
        </div>
        <div class='mack12'>
            <div class='row'>
                <div class='column'></div>
                <div class='column_middle'>
                    <div style=text-align:center;color:gray>Edit Package</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                    <form action="{{url('admin_package_Edit_upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="hidden" placeholder="Packagel Id" name="package_id" value="{{ $packedit->package_id }}" >
                        </div>
                        <div>
                            <input type="text"  value="{{ $packedit->package_name }}" id="package_name" name="package_name" class="drop" autocomplete="off">
                        </div> 
                        <div>
                            <select name="exam_type" id="exam_type"  class='drop'>
                                <option value="">Select Exam Type</option>
                                <option value="Practise Paper">Practise Paper</option>
                                <option value="Online Exam">Online Exam</option>
                                <option {{ ($packedit->exam_type)? 'selected="selected"':'' }} value="{{ $packedit->exam_type }}">{{ $packedit->exam_type}}</option>
                            </select>
                        </div> 
                        <div>
                            <select name="subject" id="subject"  class='drop'>
                                <option value="">Select Subject</option>
                                <option value="English">English</optin>
                                <option {{ ($packedit->subject)? 'selected="selected"':'' }} value="{{ $packedit->subject }}">{{ $packedit->subject}}</option>
                            </select>
                        </div>
                        <div>
                            <input type="text" placeholder="No of Question" id="no_of_ques" name="no_of_ques" class="drop" value="{{ $packedit->no_of_ques }}">
                            <input type="text" placeholder="Total Marks" id="total_marks" name="total_marks" class="drop" value="{{ $packedit->total_marks }}">
                        </div> 
                        <div> 
                            <input type="submit" value="Update Package" class="blue_button_new" style="margin-top:3px">
                        </div> 
                    </form>    
                </div>
                <div class='column'></div>
            </div>   
        </div>
    </div>
@endsection