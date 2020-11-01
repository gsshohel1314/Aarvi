<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Partner;
use App\PartnerCategory;
use Carbon\Carbon;
use Session;
use Image;

class PartnerController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=Partner::where('partner_status',1)->orderBy('partner_id','DESC')->get();
        return view('admin.partner.all',compact('all'));
    }

    public function add(){
        $partnerCategories= PartnerCategory::all();
        return view('admin.partner.add',compact('partnerCategories'));
    }

    public function view($slug){
        $data=Partner::where('partner_status',1)->where('partner_slug',$slug)->firstOrFail();
        return view('admin.partner.view',compact('data'));
    }

    public function edit($slug){
        $partnerCategories= PartnerCategory::all();
        $data=Partner::where('partner_status',1)->where('partner_slug',$slug)->firstOrFail();
        return view('admin.partner.edit',compact('data','partnerCategories'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'partner_type'=>'required',
            'partner_name'=>'required',
            'partner_url'=>'required',
            'partner_address'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'payment_condition'=>'required',
            'payment_comment'=>'nullable',
            'payment_date'=>'nullable',
            'pic'=>'required',
        ]);
        $slug='P'.uniqid(20);
        $insert=Partner::insertGetId([
            'partner_type'=>$_POST['partner_type'],
            'partner_name'=>$_POST['partner_name'],
            'partner_url'=>$_POST['partner_url'],
            'partner_logo'=>'',
            'partner_address'=>$_POST['partner_address'],
            'start_date'=>$_POST['start_date'],
            'end_date'=>$_POST['end_date'],
            'payment_condition'=>$_POST['payment_condition'],
            'payment_comment'=>$_POST['payment_comment'],
            'payment_date'=>$_POST['payment_date'],
            'partner_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='partner_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(115, 105)->save('uploads/partner/'.$imageName);

          Partner::where('partner_id',$insert)->update([
              'partner_logo'=>$imageName
          ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect('dashboard/partner/add');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/partner/add');
        }
    }

    public function update(Request $request){
       $this->validate($request,[
        // 'partner_type'=>'required',
        // 'partner_name'=>'required',
        // 'partner_url'=>'required',
        // 'partner_address'=>'required',
        // 'start_date'=>'required',
        // 'end_date'=>'required',
        // 'payment_condition'=>'required',
        // 'payment_comment'=>'required',
        // 'payment_date'=>'required',
        // 'pic'=>'required',
        ]);

        $slug=$_POST['slug'];
        $id=$_POST['id'];
        $update=Partner::where('partner_slug',$slug)->update([
            'partner_type'=>$_POST['partner_type'],
            'partner_name'=>$_POST['partner_name'],
            'partner_url'=>$_POST['partner_url'],
            'partner_address'=>$_POST['partner_address'],
            'start_date'=>$_POST['start_date'],
            'end_date'=>$_POST['end_date'],
            'payment_condition'=>$_POST['payment_condition'],
            'payment_comment'=>$_POST['payment_comment'],
            'payment_date'=>$_POST['payment_date'],
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName='partner_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(115, 105)->save(base_path('public/uploads/partner/'.$imageName));

          Partner::where('partner_slug',$slug)->update([
              'partner_logo'=>$imageName
          ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect('dashboard/partner/edit/'.$slug);
        }else{
            Session::flash('error','value');
            return redirect('dashboard/partner/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Partner::where('partner_status',1)->where('partner_id',$id)->update([
            'partner_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success_soft','value');
            return redirect('dashboard/partner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/partner');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Partner::where('partner_status',0)->where('partner_id',$id)->update([
            'partner_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($restore){
            Session::flash('restore','value');
            return redirect('dashboard/recycle/partner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/partner');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $del=Partner::where('partner_status',0)->where('partner_id',$id)->delete();
        if($del){
            Session::flash('delete','value');
            return redirect('dashboard/recycle/partner');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/recycle/partner');
        }
    }
}
