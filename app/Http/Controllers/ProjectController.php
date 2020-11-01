<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Project;
use Carbon\Carbon;
use Session;
use Image;

class ProjectController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Project::where('status', 1)->orderBy('id','DESC')->get();
        return view('admin.project.all',compact('all'));
    }

    public function add(){
        return view('admin.project.add');
    }

    public function edit($id){
        $data=Project::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.project.edit',compact('data'));
    }

    public function view($id){
        $data=Project::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.project.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'image'=>'required',
        ]);

        $insert=Project::insertGetId([
            'title'=>$request['title'],
            'details'=>$request['details'],
            'image'=>$request['image'],
            'start_date'=>$request['start_date'],
            'end_date'=>$request['end_date'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('image')){
          $image=$request->file('image');
          $imageName='project_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(550, 290)->save('uploads/project/'.$imageName);
          Image::make($image)->resize(250, 190)->save('uploads/project/past/'.$imageName);

          Project::where('id',$insert)->update([
              'image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
        ]);

        $id=$request['id'];
        $insert=Project::where('status',1)->where('id',$id)->update([
            'title'=>$request['title'],
            'details'=>$request['details'],
            'image'=>$request['image'],
            'start_date'=>$request['start_date'],
            'end_date'=>$request['end_date'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('image')){
          $image=$request->file('image');
          $imageName='project_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(550, 290)->save('uploads/project/'.$imageName);
          Image::make($image)->resize(250, 190)->save('uploads/project/past/'.$imageName);

          Project::where('id',$id)->update([
              'image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Project::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/project');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/project');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Project::where('status',0)->where('id',$id)->update([
            'status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect()->back();
        }else{
          Session::flash('error','value');
          return redirect()->back();
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Project::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
          Session::flash('error','value');
          return redirect()->back();
        }
    }
}
