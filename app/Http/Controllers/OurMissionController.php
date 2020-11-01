<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\OurMission;
use Carbon\Carbon;
use Session;
use Image;

class OurMissionController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=OurMission::where('status', 1)->orderBy('id','DESC')->get();
        return view('admin.our_mission.all',compact('all'));
    }

    public function add(){
        return view('admin.our_mission.add');
    }

    public function edit($id){
        $data=OurMission::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.our_mission.edit',compact('data'));
    }

    public function view($id){
        $data=OurMission::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.our_mission.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'logo'=>'required',
        ]);

        $insert=OurMission::insertGetId([
            'title'=>$request['title'],
            'details'=>$request['details'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('logo')){
          $image=$request->file('logo');
          $imageName='ourmission_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(42, 42)->save('uploads/our-mission/'.$imageName);

          OurMission::where('id',$insert)->update([
              'logo'=>$imageName
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
            // 'logo'=>'required',
        ]);

        $id=$request['id'];
        $insert=OurMission::where('status',1)->where('id',$id)->update([
            'title'=>$request['title'],
            'details'=>$request['details'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('logo')){
          $image=$request->file('logo');
          $imageName='ourmission_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(42, 42)->save('uploads/our-mission/'.$imageName);

          OurMission::where('id',$id)->update([
              'logo'=>$imageName
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

    public function delete(){
        $id=$_POST['modal_id'];
        $del=OurMission::where('status',1)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
          Session::flash('error','value');
          return redirect()->back();
        }
    }
}
