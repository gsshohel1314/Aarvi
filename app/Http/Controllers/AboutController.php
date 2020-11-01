<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\About;
use Carbon\Carbon;
use Session;
use Image;

class AboutController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=About::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.about.all',compact('all'));
    }

    public function add(){
        return view('admin.about.add');
    }

    public function view($id){
        $data=About::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.about.view',compact('data'));
    }

    public function edit($id){
        $data=About::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.about.edit',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'video_url'=>'required',
            'video_title'=>'required',
            'image'=>'required',
        ]);

        $insert=About::insertGetId([
            'title'=>$_POST['title'],
            'details'=>$_POST['details'],
            'video_url'=>$_POST['video_url'],
            'video_title'=>$_POST['video_title'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='about_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1168, 600)->save('uploads/about/'.$imageName);
  
            About::where('id',$insert)->update([
                'video_image'=>$imageName
            ]);
        }

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
            'title'=>'required',
            'details'=>'required',
            'video_url'=>'required',
            'video_title'=>'required',
            // 'image'=>'required',
        ]);

        $id=$_POST['id'];
        $update=About::where('id',$id)->update([
            'title'=>$_POST['title'],
            'details'=>$_POST['details'],
            'video_url'=>$_POST['video_url'],
            'video_title'=>$_POST['video_title'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='about_'.$update.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1168, 600)->save('uploads/about/'.$imageName);
  
            About::where('id',$update)->update([
                'video_image'=>$imageName
            ]);
        }

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
        $soft=About::where('status',1)->where('id',$id)->update([
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
        $restore=About::where('status',0)->where('id',$id)->update([
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
        $del=About::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
          Session::flash('error','value');
          return redirect()->back();
        }
    }
}
