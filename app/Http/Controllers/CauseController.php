<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Cause;
use Carbon\Carbon;
use Session;
use Image;

class CauseController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Cause::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.cause.all',compact('all'));
    }

    public function add(){
        return view('admin.cause.add');
    }

    public function edit($id){
        $data=Cause::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.cause.edit',compact('data'));
    }

    public function view($id){
        $data=Cause::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.cause.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'details'=>'required',
            'country'=>'required',
            'date'=>'required',
            'image'=>'required',
        ]);

        $insert=Cause::insertGetId([
            'title'=>$_POST['title'],
            'subtitle'=>$_POST['subtitle'],
            'details'=>$_POST['details'],
            'country'=>$_POST['country'],
            'date'=>$_POST['date'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='cause_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(350, 240)->save('uploads/cause/'.$imageName);
            Image::make($image)->resize(250, 190)->save('uploads/cause/past/'.$imageName);
  
            Cause::where('id',$insert)->update([
                'image'=>$imageName
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
            'subtitle'=>'required',
            'details'=>'required',
            'country'=>'required',
            'date'=>'required',
            // 'image'=>'required',
        ]);

        $id=$request['id'];
        $insert=Cause::where('id',$id)->update([
            'title'=>$_POST['title'],
            'subtitle'=>$_POST['subtitle'],
            'details'=>$_POST['details'],
            'country'=>$_POST['country'],
            'date'=>$_POST['date'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='cause_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(350, 240)->save('uploads/cause/'.$imageName);
            Image::make($image)->resize(250, 190)->save('uploads/cause/past/'.$imageName);
  
            Cause::where('id',$id)->update([
                'image'=>$imageName
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

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Cause::where('status',1)->where('id',$id)->update([
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
        $restore=Cause::where('status',0)->where('id',$id)->update([
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
        $del=Cause::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }
}
