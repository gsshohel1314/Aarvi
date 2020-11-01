<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Prefund;
use Carbon\Carbon;
use Session;
use Image;

class PrefundController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Prefund::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.prefund.all',compact('all'));
    }

    public function add(){
        return view('admin.prefund.add');
    }

    public function edit($id){
        $data=Prefund::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.prefund.edit',compact('data'));
    }

    public function view($id){
        $data=Prefund::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.prefund.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required',
        ]);

        $insert=Prefund::insertGetId([
            'title'=>$_POST['title'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='prefund_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(370, 338)->save('uploads/prefund/'.$imageName);
  
            Prefund::where('id',$insert)->update([
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
            'image'=>'required',
        ]);

        $id=$request['id'];
        $insert=Prefund::where('id',$id)->update([
            'title'=>$_POST['title'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='prefund_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(370, 338)->save('uploads/prefund/'.$imageName);
  
            Prefund::where('id',$id)->update([
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
        $soft=Prefund::where('status',1)->where('id',$id)->update([
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
        $restore=Prefund::where('status',0)->where('id',$id)->update([
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
        $del=Prefund::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }
}
