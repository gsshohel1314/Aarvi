<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Fundcost;
use Carbon\Carbon;
use Session;
use Image;

class FundcostController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Fundcost::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.fundcost.all',compact('all'));
    }

    public function add(){
        return view('admin.fundcost.add');
    }

    public function edit($id){
        $data=Fundcost::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.fundcost.edit',compact('data'));
    }

    public function view($id){
        $data=Fundcost::where('status',1)->where('id',$id)->firstOrFail();
        return view('admin.fundcost.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'details'=>'required',
            'cost'=>'required',
        ]);

        $insert=Fundcost::insertGetId([
            'details'=>$_POST['details'],
            'cost'=>$_POST['cost'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

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
            'details'=>'required',
            'cost'=>'required',
        ]);

        $id=$request['id'];
        $insert=Fundcost::where('id',$id)->update([
            'details'=>$_POST['details'],
            'cost'=>$_POST['cost'],
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

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
        $soft=Fundcost::where('status',1)->where('id',$id)->update([
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
        $restore=Fundcost::where('status',0)->where('id',$id)->update([
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
        $del=Fundcost::where('status',0)->where('id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect()->back();
        }else{
            Session::flash('error','value');
            return redirect()->back();
        }
    }
}
