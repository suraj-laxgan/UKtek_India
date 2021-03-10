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
                <div class='column_view'>
                    <div style=text-align:center;color:gray>Search Question To Package</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                    <form action="{{url('admin_ques_to_package_view')}}" method="GET">
                        <div>
                            <select name="exam_type" id="exam_type"  class='drop' onChange="findPackageName()">
                                <option value="">Select Exam Type</option>
                                <option value="Practise Paper">Practise Paper</option>
                                <option value="Online Exam">Online Exam</option>
                            </select>
                            <select name="package_id" id="package_id"  class='drop'>
                                <option value="">Select package</option>
                            </select>

                            <input type="submit" value="Show " class="blue_button_new" style="color:#000066;margin-top:3px">
                            <!-- <a href="{{url('admin_ques_to_package_view')}}"> <button type="button" class="blue_button_new" style="color:#000066"> Refresh -->

                        </div>
                    </form>
                </div>
                <div class='column_middle'>
                    <div style=text-align:center;color:gray>View Package</div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:#f2f2f2;margin-left:3px">
                    <table width="80%"style="margin-top:3px;margin-left:70px">
                       <tr style="color:#000066 ;font-size:14px; background-color:#e6ffff;">
                            <th width="10%">No</th>
                            <th width="55%">Question  Id</th>
                            <th width="15%">Find Question</th>
                            <!-- <th width="15%">Set Question</th> -->

                        </tr>
                        <!-- 09/03/21 -->
                        @foreach($qupack as $qpacks)
                        <tr style="color:gray;font-size:12px;">
                            <form action="{{url('find_ques_to_package_view')}}" method="GET">
                            <!-- <input type='hidden' name = 'question_id' id ='question_id' class = 'drop'> -->
                            <td style='color:red;text-align:center'><strong>{{ $qpacks["question_sl_no"]}}</strong></td>
                            <td><input type="text" class='drop' name='question_id' id='question_id' placeholder='Question Id' autocomplete='off' >
                            <input type="hidden" name='pack_question_id' id='pack_question_id'  value='{{$qpacks->pack_question_id}}' >
                            </td>
                            <td style="text-align:center"><input type="submit" style=' margin:10px' class="lightblue_button" value="Find" >
                            </form>
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
    //////////// for search in same page /////////////////****** */
    // $("#search_ques").click(function(){
    // alert("The paragraph was clicked.");
    // var package_id = $("#package_id").val();
    // var question_id = $("#question_id").val();
    // window.location ='add_package_ques/'.$qpacks['package_id'])?'package_id='+package_id+'&question_id='+question_id+';
    // console.log(package_id);
    // });

    // *************************************************
    function findPackageName()
    {	//str = $('#category_ques_nm').val();
		//n = str.indexOf("#");
		//category_ques_nm = str.substring(0,n);
        //alert('hi');
       var exam_type = $('#exam_type').val();
       //alert(exam_type);
		$.ajax({
        type : 'post',
        url  : "{{ url('find_package_name')}}",
        data: {'exam_type' : exam_type,
             '_token':$('input[name=_token]').val()},   
        datatype : 'html',
        success:function(data)
        {
          var des_j = '<option value="">Select package</option>';
                       $.each( data, function( index, value )
                       {
                         // console.log(value);
                           des_j += '<option value="'+value.package_id+'">'+value.package_name+'</option>';
                         });
          $('#package_id').html(des_j);
          //console.log(data)
        } 
       })
    }
    </script>    
@endsection