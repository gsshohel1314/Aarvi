<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Award;

class WebsiteController extends Controller{
    public function __construct(){

    }

    public function index(){
        return view('website.home');
    }

    public function about(){
        return view('website.about');
    }

    public function team(){
        return view('website.team.index');
    }

    public function project(){
        return view('website.project.index');
    }

    public function gallery(){
        return view('website.media.gallery');
    }

    public function video_gallery(){
        return view('website.media.video');
    }
    
    public function instagram(){
        return view('website.media.instagram');
    }

    public function event(){
        return view('website.event.index');
    }

    public function event_past(){
        return view('website.event.past');
    }

    public function involved(){
        return view('website.involved.index');
    }

    public function volunteer(){
        return view('website.involved.volunteer');
    }

    public function career(){
        return view('website.involved.career');
    }

    public function fundrise(){
        return view('website.involved.fundrise');
    }

    public function award(){
        return view('website.award.index');
    }

    public function award_details($award_slug){
        $data=Award::where('award_status',1)->where('award_slug',$award_slug)->firstOrFail();
        return view('website.award.award',compact('data'));
    }

    public function contact(){
        return view('website.contact');
    }

    public function donate(){
        return view('website.donation.index');
    }

    public function apply_award(){
        return view('website.award.apply');
    }
}
