<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Projecttype;
use Carbon\Carbon;
use Session;
use Image;

class ProjectTypeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Projecttype::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.project-type.all',compact('all'));
    }

    public function add(){
        return view('admin.project-type.add');
    }

    public function edit($id){
        $data=Projecttype::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.project-type.edit',compact('data'));
    }

    public function view($id){
        $data=Projecttype::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.project-type.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
        ]);

        $insert=Projecttype::insertGetId([
            'title'=>$_POST['title'],
            'details'=>$_POST['details'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/projecttype/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/projecttype/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
        ]);

        $id=$request['id'];
        $insert=Projecttype::where('id',$id)->update([
            'title'=>$_POST['title'],
            'details'=>$_POST['details'],
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/projecttype/edit/'.$id);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/projecttype/edit/'.$id);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Projecttype::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/projecttype');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/projecttype');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Projecttype::where('status',0)->where('id',$id)->update([
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
        $del=Projecttype::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }
}
