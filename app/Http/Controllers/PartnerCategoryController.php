<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\PartnerCategory;
use Carbon\Carbon;
use Session;

class PartnerCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=PartnerCategory::where('pcate_status',1)->orderBy('pcate_id','DESC')->get();
        return view('admin.partner-category.all',compact('all'));
    }

    public function add(){
        return view('admin.partner-category.add');
    }

    public function edit($slug){
        $data=PartnerCategory::where('pcate_status',1)->where('pcate_slug',$slug)->firstOrFail();
        return view('admin.partner-category.edit',compact('data'));
    }

    public function view($slug){
        $data=PartnerCategory::where('pcate_status',1)->where('pcate_slug',$slug)->firstOrFail();
        return view('admin.partner-category.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|unique:partner_categories,pcate_name'
        ],[
            'name.required'=>'Please enter partner category name!'
        ]);

        $slug=Str::slug($request['name'],'-');
        $insert=PartnerCategory::insert([
            'pcate_name'=>$request['name'],
            'pcate_remarks'=>$request['remarks'],
            'pcate_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/partner/category/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/partner/category/add');
        }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>'Please enter gallery category name!'
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $update=PartnerCategory::where('pcate_id',$id)->update([
            'pcate_name'=>$request['name'],
            'pcate_remarks'=>$request['remarks'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/partner/category/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/partner/category/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=PartnerCategory::where('pcate_status',1)->where('pcate_id',$id)->update([
            'pcate_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/partner/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/partner/category');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=PartnerCategory::where('pcate_status',0)->where('pcate_id',$id)->update([
            'pcate_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/partner/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/partner/category');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=PartnerCategory::where('pcate_status',0)->where('pcate_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/partner/category');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/partner/category');
        }
    }
}
