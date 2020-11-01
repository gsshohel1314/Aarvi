<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Volunteerskill;
use Carbon\Carbon;
use Session;
use Image;

class VolunteerSkillController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Volunteerskill::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.volunteer_skill.all',compact('all'));
    }

    public function add(){
        return view('admin.volunteer_skill.add');
    }

    public function edit($id){
        $data=Volunteerskill::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.volunteer_skill.edit',compact('data'));
    }

    public function view($id){
        $data=Volunteerskill::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.volunteer_skill.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'skill'=>'required',
            'image'=>'required',
        ]);

        $insert=Volunteerskill::insertGetId([
            'title'=>$_POST['title'],
            'skill'=>$_POST['skill'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='volunteerskill_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(570, 663)->save('uploads/volunteer_skill/'.$imageName);
  
            Volunteerskill::where('id',$insert)->update([
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
            'skill'=>'required',
            // 'image'=>'required',
        ]);

        $id=$request['id'];
        $insert=Volunteerskill::where('id',$id)->update([
            'title'=>$_POST['title'],
            'skill'=>$_POST['skill'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $imageName='volunteerskill_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(570, 663)->save('uploads/volunteer_skill/'.$imageName);
  
            Volunteerskill::where('id',$id)->update([
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
        $soft=Volunteerskill::where('status',1)->where('id',$id)->update([
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
        $restore=Volunteerskill::where('status',0)->where('id',$id)->update([
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
        $del=Volunteerskill::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }
}
