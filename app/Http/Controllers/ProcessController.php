<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Contactus;
use App\NewsletterSubscriber;
use App\ApplyAward;
use Carbon\Carbon;
use Session;
use Image;

class ProcessController extends Controller{
    public function __construct(){

    }

    public function index(){

    }

    public function contact(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|max:40',
            'phone'=>'required|max:20',
            'subject'=>'required',
            'message'=>'required',
        ],[
            'name.required'=>'Please enter your name!',
            'email.required'=>'Please enter email address!',
            'phone.required'=>'Please enter your phone number!',
            'subject.required'=>'Please enter your subject!',
            'message.required'=>'Please enter your message!',
        ]);

        $slug=uniqid('CON');
        $insert=Contactus::insert([
            'conus_name'=>$request['name'],
            'conus_email'=>$request['email'],
            'conus_phone'=>$request['phone'],
            'conus_sub'=>$request['subject'],
            'conus_mess'=>$request['message'],
            'conus_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success');
            return redirect('contact');
        }else{
            Session::flash('error');
            return redirect('contact');
        }
    }

    public function newsletter(Request $request){
        $this->validate($request,[
            'email'=>'required',
        ],[
            'email.required'=>'Please enter email address',
        ]);

        $slug='S'.uniqid('20');
        $insert=NewsletterSubscriber::insert([
            'ns_email'=>$request['email'],
            'ns_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success_subscrib');
            return redirect()->back();
        }else{
           Session::flash('error_subscrib');
           return redirect()->back();
        }
    }

    public function apply_award(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|max:40',
            'phone'=>'required|max:20',
            'address'=>'required',
            'message'=>'required',
        ],[
            'name.required'=>'Please enter your name!',
            'email.required'=>'Please enter email address!',
            'phone.required'=>'Please enter your phone number!',
            'address.required'=>'Please enter your address!',
            'message.required'=>'Please enter your message!',
        ]);

        $slug=uniqid('AAW');
        $insert=ApplyAward::insert([
            'aa_name'=>$request['name'],
            'aa_phone'=>$request['phone'],
            'aa_email'=>$request['email'],
            'aa_address'=>$request['address'],
            'aa_message'=>$request['message'],
            'award_id'=>$request['award'],
            'aa_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success');
            return redirect('award/apply');
        }else{
            Session::flash('error');
            return redirect('award/apply');
        }
    }

    public function volunteer_registration(Request $request){
        $this->validate($request,[
            'name'=>'required|string|max:255',
            'phone'=>'required|max:20',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
        ],[
            'name.required'=>'Please enter your name!',
            'phone.required'=>'Please enter phone number!',
            'email.required'=>'Please enter email address!',
            'password.required'=>'Please enter password!',
        ]);

        $insert=User::insertGetId([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'password' => Hash::make($request['password']),
            'role_id'=>'5',
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        $username='UA'.$insert;
        $updateUN=User::where('id',$insert)->update([
            'username'=>$username,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success');
            return redirect('volunteer');
        }else{
            Session::flash('error');
            return redirect('volunteer');
        }
    }
}
