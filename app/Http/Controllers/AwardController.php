<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Award;
use Carbon\Carbon;
use Session;
use Image;

class AwardController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Award::where('award_status',1)->orderBy('award_id','DESC')->get();
        return view('admin.award.all',compact('all'));
    }

    public function add(){
        return view('admin.award.add');
    }

    public function edit($slug){
        $data=Award::where('award_status',1)->where('award_slug',$slug)->firstOrFail();
        return view('admin.award.edit',compact('data'));
    }

    public function view($slug){
        $data=Award::where('award_status',1)->where('award_slug',$slug)->firstOrFail();
        return view('admin.award.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'start'=>'required',
            'end'=>'required',
            'pic'=>'required',
        ],[
            'title.required'=>'Please enter event title!',
            'subtitle.required'=>'Please enter event subtitle!',
            'start.required'=>'Please enter event start time!',
            'end.required'=>'Please enter event start end!',
            'pic.required'=>'Please upload event image!',
        ]);
        $slugTitle=Str::slug($request['title'],'-');
        $slugTime=$request['start'];
        $slug=$slugTime.'-'.$slugTitle;
        $insert=Award::insertGetId([
            'award_title'=>$_POST['title'],
            'award_subtitle'=>$_POST['subtitle'],
            'award_reg_starting'=>$_POST['start'],
            'award_reg_ending'=>$_POST['end'],
            'award_details'=>$_POST['details'],
            'award_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='award_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(350,200)->save(base_path('public/uploads/award/'.$imageName));
          Image::make($image)->resize(450,580)->save(base_path('public/uploads/award/details/'.$imageName));

          Award::where('award_id',$insert)->update([
              'award_image'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/award/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/award/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'start'=>'required',
            'end'=>'required',
        ],[
            'title.required'=>'Please enter event title!',
            'subtitle.required'=>'Please enter event subtitle!',
            'start.required'=>'Please enter event start time!',
            'end.required'=>'Please enter event start end!',
        ]);
        $id=$request['id'];
        $slugTitle=Str::slug($request['title'],'-');
        $slugTime=$request['start'];
        $slug=$slugTime.'-'.$slugTitle;
        $update=Award::where('award_status',1)->where('award_id',$id)->update([
            'award_title'=>$_POST['title'],
            'award_subtitle'=>$_POST['subtitle'],
            'award_reg_starting'=>$_POST['start'],
            'award_reg_ending'=>$_POST['end'],
            'award_details'=>$_POST['details'],
            'award_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='award_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(350,200)->save(base_path('public/uploads/award/'.$imageName));
          Image::make($image)->resize(450,580)->save(base_path('public/uploads/award/details/'.$imageName));

          Award::where('award_id',$id)->update([
              'award_image'=>$imageName
          ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/award/view/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/award/edit/'.$slug);
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Award::where('award_status',1)->where('award_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
          Session::flash('error','value');
          return redirect()->back();
        }
    }
}
