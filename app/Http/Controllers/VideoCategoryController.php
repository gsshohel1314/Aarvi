<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\VideoCategory;
use Carbon\Carbon;
use Session;

class VideoCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=VideoCategory::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.video_category.all',compact('all'));
    }

    public function add(){
        return view('admin.video_category.add');
    }

    public function edit($id){
        $data=VideoCategory::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.video_category.edit',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);

        $insert=VideoCategory::insertGetId([
            'name'=>$_POST['name'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }

    public function update(Request $request){
       $this->validate($request,[
            'name'=>'required',
        ]);

        $id=$_POST['id'];
        $update=VideoCategory::where('id',$id)->update([
            'name'=>$_POST['name'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($update){
            Session::flash('success','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=VideoCategory::where('status',1)->where('id',$id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=VideoCategory::where('status',0)->where('id',$id)->update([
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
        $del=VideoCategory::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
          Session::flash('error','value');
          return redirect()->back();
        }
    }
}
