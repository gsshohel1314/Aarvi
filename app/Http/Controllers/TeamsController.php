<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Team;
use App\BloodGroup;
use App\TeamCategory;
use Carbon\Carbon;
use Session;
use Image;

class TeamsController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Team::where('status', 1)->orderBy('id','DESC')->get();
        return view('admin.team.all',compact('all'));
    }

    public function add(){
        $teamCategories= TeamCategory::all();
        $bloods = BloodGroup::all();
        return view('admin.team.add',compact('bloods','teamCategories'));
    }

    public function edit($id){
        $bloods = BloodGroup::all();
        $teamCategories= TeamCategory::all();
        $data=Team::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.team.edit',compact('data','bloods','teamCategories'));
    }

    public function view($id){
        $data=Team::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.team.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'tcate_id'=>'required',
            'designation'=>'required',
            't_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'blood_group'=>'required',
            'blood_donor'=>'required',
            'membership_status'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'image'=>'required',
        ],[
            'name.required'=>'Please enter team member name!',
            'designation.required'=>'Please enter team member designation!',
            'image.required'=>'Please enter team member details!',
        ]);

        $insert=Team::insertGetId([
            'name'=>$request['name'],
            'tcate_id'=>$request['tcate_id'],
            'designation'=>$request['designation'],
            't_name'=>$request['t_name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'blood_group'=>$request['blood_group'],
            'blood_donor'=>$request['blood_donor'],
            'membership_status'=>$request['membership_status'],
            'start_date'=>$request['start_date'],
            'end_date'=>$request['end_date'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('image')){
          $image=$request->file('image');
          $imageName='team_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(270, 360)->save('uploads/team/'.$imageName);

          Team::where('id',$insert)->update([
              'image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success');
            return redirect('dashboard/team/add');
        }else{
            Session::flash('error');
            return redirect('dashboard/team/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
        ],[
            'name.required'=>'Please enter team member name!',
            'designation.required'=>'Please enter team member designation!',
        ]);

        $id=$request['id'];
        // $slug=$request['slug'];
        $insert=Team::where('status',1)->where('id',$id)->update([
            'name'=>$request['name'],
            'tcate_id'=>$request['tcate_id'],
            'designation'=>$request['designation'],
            't_name'=>$request['t_name'],
            'email'=>$request['email'],
            'phone'=>$request['phone'],
            'blood_group'=>$request['blood_group'],
            'blood_donor'=>$request['blood_donor'],
            'membership_status'=>$request['membership_status'],
            'start_date'=>$request['start_date'],
            'end_date'=>$request['end_date'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('image')){
          $image=$request->file('image');
          $imageName='team_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(270, 360)->save('uploads/team/'.$imageName);

          Team::where('id',$id)->update([
              'image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success');
            return redirect('dashboard/team/edit/'.$id);
        }else{
            Session::flash('error');
            return redirect('dashboard/team/edit/'.$id);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Team::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/team');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/team');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Team::where('status',0)->where('id',$id)->update([
            'status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/team');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/team');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Team::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/team');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/team');
        }
    }
}
