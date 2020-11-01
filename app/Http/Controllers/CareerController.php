<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Career;
use Carbon\Carbon;
use Session;
use Image;

class CareerController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Career::where('status', 1)->orderBy('id','DESC')->get();
        return view('admin.career.all',compact('all'));
    }

    public function add(){
        return view('admin.career.add');
    }

    public function edit($id){
        $data=Career::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.career.edit',compact('data'));
    }

    public function view($id){
        $data=Career::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.career.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'address'=>'required',
            'date'=>'required',
            'image'=>'required',
        ]);

        $insert=Career::insertGetId([
            'title'=>$request['title'],
            'subtitle'=>$request['subtitle'],
            'address'=>$request['address'],
            'date'=>$request['date'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('image')){
          $image=$request->file('image');
          $imageName='career_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(350, 240)->save('uploads/career/'.$imageName);

          Career::where('id',$insert)->update([
              'image'=>$imageName
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
            'subtitle'=>'required',
            'address'=>'required',
            'date'=>'required',
            // 'image'=>'required',
        ]);

        $id=$request['id'];
        $insert=Career::where('status',1)->where('id',$id)->update([
            'title'=>$request['title'],
            'subtitle'=>$request['subtitle'],
            'address'=>$request['address'],
            'date'=>$request['date'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($request->hasFile('image')){
          $image=$request->file('image');
          $imageName='career_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(350, 240)->save('uploads/career/'.$imageName);

          Career::where('id',$id)->update([
              'image'=>$imageName
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

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Career::where('status',1)->where('id',$id)->update([
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
        $restore=Career::where('status',0)->where('id',$id)->update([
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
        $del=Career::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
          Session::flash('error','value');
          return redirect()->back();
        }
    }
}
