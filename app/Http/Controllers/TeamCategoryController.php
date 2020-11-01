<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\TeamCategory;
use Carbon\Carbon;
use Session;

class TeamCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=TeamCategory::where('tcate_status',1)->orderBy('tcate_id','DESC')->get();
        return view('admin.team-category.all',compact('all'));
    }

    public function add(){
        return view('admin.team-category.add');
    }

    public function edit($slug){
        $data=TeamCategory::where('tcate_status',1)->where('tcate_slug',$slug)->firstOrFail();
        return view('admin.team-category.edit',compact('data'));
    }

    public function view($slug){
        $data=TeamCategory::where('tcate_status',1)->where('tcate_slug',$slug)->firstOrFail();
        return view('admin.team-category.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:team_categories,tcate_name'
        ],[
            'name.required'=>'Please enter team category name!'
        ]);

        $slug=Str::slug($request['name'],'-');
        $insert=TeamCategory::insert([
            'tcate_name'=>$request['name'],
            'tcate_remarks'=>$request['remarks'],
            'tcate_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/team/category/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/team/category/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>'Please enter team category name!'
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $update=TeamCategory::where('tcate_id',$id)->update([
            'tcate_name'=>$request['name'],
            'tcate_remarks'=>$request['remarks'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/team/category/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/team/category/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=TeamCategory::where('tcate_status',1)->where('tcate_id',$id)->update([
            'tcate_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/team/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/team/category');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=TeamCategory::where('tcate_status',0)->where('tcate_id',$id)->update([
            'tcate_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/team/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/team/category');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=TeamCategory::where('tcate_status',0)->where('tcate_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/team/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/team/category');
        }
    }
}
