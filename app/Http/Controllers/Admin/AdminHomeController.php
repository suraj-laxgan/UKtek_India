<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\StudyMaterial;
use App\Helpers\Helper;

class AdminHomeController extends Controller
{   
  ///////////////////////////Study Material creator page/////////////////////

    public function showAdminStudy()
    {
        return view('admin.studyMaterialCreator');
    }

    ////////////// for upload study material ///////////////////
    public function uploadStudyMaterial(Request $req)
    {   
                                //////////////// for create custom id in database /////////////
      $max_study_id = StudyMaterial::orderBy('study_material_id', 'desc')->value('study_material_id');
        if($max_study_id=="")
        {
            $study_material_id = "ST0000000001";
        }
        else{

            $lastp = substr($max_study_id,2,10);
            $lastpp = ++$lastp;
            $last = str_pad($lastpp,10,"0",STR_PAD_LEFT);
            $study_material_id = 'ST'.$last;
        }
                                  /////////////// for file name with id and file extensation //////////////  
      $upload = $req->file('material');
      $filename = $study_material_id. '.' . $upload->getClientOriginalExtension();
     // $filename = date('His'). '.' . $upload->getClientOriginalExtension(); 11/02/21
      $upload->move(public_path('study_material_upload'), $filename);
                                  ///////////// connect database with help of models and save the data //////////// 
      $addstudy= new StudyMaterial;
      $addstudy->study_material_id=$study_material_id;
      $addstudy->creator_name=$req->creator_name;
      $addstudy->f_name=$req->f_name;
      $addstudy->select_type=$req->select_type;
      $addstudy->short_description=$req->short_description;
      $addstudy->grade=$req->grade;
      //$addstudy->material=$req->material;08/02/21
      $addstudy->material=$filename;
      //$addstudy->material = $material_file? Helper::imageEncode($material_file):''; 08/02/21
      $addstudy->create_dt = date('d-m-Y');
      $addstudy->create_time =  date('H:i:s');
      $addstudy->save();
      return redirect()->route('admin.study');
    }

    ///////////////////// Study Material Show Page /////////////////////////////////

    public function StudyMaterialShow()
    {
      $study_material_id=request('study_material_id');
      $creator_name = request('creator_name');
      $f_name = request('f_name');
      $select_type = request('select_type');
      $short_description = request('short_description');
      $grade = request('grade');
      
      if($study_material_id != '' || $creator_name != '' || $f_name != '' || $select_type != '' || $short_description != '' || $grade != '')
      {
        $query  = StudyMaterial::query();
        $all_study_material = '';
        if($study_material_id != '')
        {
          $query = $query->where('study_material_id', 'like', '%' . $study_material_id . '%');
        }

        if($creator_name != '')
        {
          $query = $query->where('creator_name', '=', $creator_name);
        }

        if($f_name != '')
        {
        $query = $query->where('f_name', 'like', '%' . $f_name . '%');
        }

        if($select_type != '')
        {
        $query = $query->where('select_type', '=', $select_type);
        }

        if($short_description != '')
        {
        $query = $query->where('short_description','like', '%' . $short_description);
        }

        if($grade != '')
        {
        $query = $query->where('grade', '=', $grade);
        }

        $query =  $query->select('study_material_id','creator_name','f_name','select_type','short_description','grade','material');
        //$studyview11 = $query->get();
        $studyview11 = $query->paginate(3);
      
        $studyview11->appends([
        'study_material_id' =>$study_material_id,
        'creator_name' =>$creator_name,
        'f_name' =>$f_name,
        'select_type' =>$select_type,
        'short_description' =>$short_description,
        'grade' =>$grade, 
        ]);
      }
      else{
        $studyview11=[]; 
      }
      
     // $studyview=StudyMaterial::all(); ////// (show the all data to the database )/////////
      return view('admin.studyMaterialShow',compact('studyview11'));
    }

    ////////////////////////////////////////////// Study Material Edit Page ////////////////////////////////////

    //////////////// for viewing edit  //////////////
    public function StudyMaterialEdit($id)
    {
         $studyedit = StudyMaterial::where('study_material_id', $id)->first();
         //$studyedits = StudyMaterial::find($id);
         //dd( $studyedits, $id);
         $study_material_id=request('study_material_id');
        $creator_name = request('creator_name');
        $f_name = request('f_name');
        $select_type = request('select_type');
        $short_description = request('short_description');
        $grade = request('grade');
        // return $study_material_id;
        return view('admin.studyMaterialEdit',compact('studyedit','study_material_id','creator_name','f_name','select_type','grade','short_description'));
    }

    //////////////// for viewing edit page to upload  //////////////
    public function StudyMaterialEditUpload(Request $request)
    {
      $study_material_id=request('study_material_id1');
      $creator_name = request('creator_name1');
      $f_name = request('f_name1');
      $select_type = request('select_type1');
      $short_description = request('short_description1');
      $grade = request('grade1');
      // return [$study_material_id, $creator_name, $f_name];
      //////////////// for file name with id and file extensation //////////////
      // $upload = $request->file('material');
      // // dd($upload);
      // $filename =$request->study_material_id. '.' . $upload->getClientOriginalExtension();

      $material_file=StudyMaterial::where('study_material_id', $request->study_material_id)->first();
      // dd($material_file);
      // unlink('public/study_material_upload/'.$material_file);
      if($request->file('material') != "" && $material_file->material != ""){
        unlink(public_path('study_material_upload/'.$material_file->material));
        $upload = $request->file('material');
      $filename =$request->study_material_id. '.' . $upload->getClientOriginalExtension();
      //$filename = date('His'). '.' . $upload->getClientOriginalExtension();
      $upload->move(public_path('study_material_upload'), $filename);
      }
      elseif($request->file('material') != ""){
        $upload = $request->file('material');
      $filename =$request->study_material_id. '.' . $upload->getClientOriginalExtension();
      //$filename = date('His'). '.' . $upload->getClientOriginalExtension();
      $upload->move(public_path('study_material_upload'), $filename);
      }
      elseif($request->file('material') == ""){
        $filename = $material_file->material;
      }

      

                          //////////////// for upload edit data in database //////////////

      // $editupques=StudyMaterial::find($request->study_material_id);
      $editupques=StudyMaterial::where('study_material_id', $request->study_material_id)->first();
      //$editupques->study_material_id=$request->study_material_id;
      $editupques->creator_name=$request->creator_name;
      $editupques->f_name=$request->f_name;
      $editupques->select_type=$request->select_type;
      $editupques->short_description = $request->short_description;
      $editupques->grade = $request->grade;
      $editupques->material =$filename;
      // $upques->create_dt = date('d-m-Y');
      // $upques->create_time =  date('H:i:s');
      $editupques->save();

    //  StudyMaterial::where('study_material_id',Helper::clean($study_material_id))
    //   ->update([
    //   'creator_name' => $request->creator_name,
    //   'f_name' => $request->f_name,
    //   'select_type' => $request->select_type,
    //   'short_description' => $request->short_description,
    //   'grade' => $request->grade,
    //   'material' => $r->material,
      
    //   ]);
      // return redirect('admin_study_show');
      return redirect()->route('admin.study_show',['creator_name'=>$creator_name,'study_material_id'=>$study_material_id,'f_name'=>$f_name, 'select_type'=>$select_type, 'short_description'=>$short_description, 'grade'=>$grade]);
    }




}
