<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Fund;
use Carbon\Carbon;
use Session;
use Image;

class FundController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Fund::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.fund.all',compact('all'));
    }

    public function add(){
        return view('admin.fund.add');
    }

    public function edit($id){
        $data=Fund::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.fund.edit',compact('data'));
    }

    public function view($id){
        $data=Fund::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.fund.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'image'=>'required',
            'fun_title'=>'required',
            'fun_details'=>'required',
        ]);

        $insert=Fund::insertGetId([
            'title'=>$_POST['title'],
            'details'=>$_POST['details'],
            'fun_title'=>$_POST['fun_title'],
            'fun_details'=>$_POST['fun_details'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='fund_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(470, 600)->save('uploads/fund/'.$imageName);
  
            Fund::where('id',$insert)->update([
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
            'details'=>'required',
            'image'=>'required',
            'fun_title'=>'required',
            'fun_details'=>'required',
        ]);

        $id=$request['id'];
        $insert=Fund::where('id',$id)->update([
            'title'=>$_POST['title'],
            'details'=>$_POST['details'],
            'fun_title'=>$_POST['fun_title'],
            'fun_details'=>$_POST['fun_details'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='fund_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(470, 600)->save('uploads/fund/'.$imageName);
  
            Fund::where('id',$id)->update([
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
        $soft=Fund::where('status',1)->where('id',$id)->update([
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
        $restore=Fund::where('status',0)->where('id',$id)->update([
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
        $del=Fund::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }
}
