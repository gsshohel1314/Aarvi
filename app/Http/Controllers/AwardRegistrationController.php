<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ApplyAward;
use Carbon\Carbon;
use Session;

class AwardRegistrationController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ApplyAward::where('aa_status',1)->orderBy('aa_id','DESC')->get();
        return view('admin.registration.award.all',compact('all'));
    }

    public function view($slug){
        $data=ApplyAward::where('aa_status',1)->where('aa_slug',$slug)->firstOrFail();
        return view('admin.registration.award.view',compact('data'));
    }
}
