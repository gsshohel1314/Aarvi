<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Volunteerhistory;
use Carbon\Carbon;
use Session;
use Image;

class VolunteerHistoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Volunteerhistory::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.volunteer-history.all',compact('all'));
    }

    public function add(){
        return view('admin.volunteer-history.add');
    }

    public function edit($id){
        $data=Volunteerhistory::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.volunteer-history.edit',compact('data'));
    }

    public function view($id){
        $data=Volunteerhistory::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.volunteer-history.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'image'=>'required',
        ]);

        $insert=Volunteerhistory::insertGetId([
            'title'=>$_POST['title'],
            'details'=>$_POST['details'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='volunteerhistory_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(570, 283)->save('uploads/volunteer_history/'.$imageName);
  
            Volunteerhistory::where('id',$insert)->update([
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
        ]);

        $id=$request['id'];
        $insert=Volunteerhistory::where('id',$id)->update([
            'title'=>$_POST['title'],
            'details'=>$_POST['details'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='volunteerhistory_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(570, 283)->save('uploads/volunteer_history/'.$imageName);
  
            Volunteerhistory::where('id',$id)->update([
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
        $soft=Volunteerhistory::where('status',1)->where('id',$id)->update([
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
        $restore=Volunteerhistory::where('status',0)->where('id',$id)->update([
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
        $del=Volunteerhistory::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }
}
