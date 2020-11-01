@extends('layouts.website')
@section('content')
    <section class="others_banner_part" id="others_banner_sec">
        <div class="ovelay_others_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_others_content text-center">
                            <h1>ABOUT US</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="breadcrumb_section">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                          <ul>
                              <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                              <li><a href="#"><i class="fa fa-angle-double-right"></i>About Us</a></li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_video_part" id="about_video_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-5">
                    <div class="about_video_content">
                        <h3>{{ config('settings.about_head_title') }}</h3>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-7">
                    <div class="about_video_content">
                    <p>{!! config('settings.about_head_details') !!}</p>
                    </div>
                </div>
            </div>
            @php
                $datas=App\About::where('status',1)->orderBy('id','DESC')->get();
            @endphp
            @foreach ($datas as $data)
                <div class="row">
                    <div class="col-12">
                        <div class="video_play_content">
                            <img src="{{asset('uploads/about/'.$data->video_image)}}" alt="" class="img-fluid">
                            <div class="ovelay_video_play_content text-center">
                                <div class="row">
                                    <div class="col-12 col-md-8 col-sm-10 offset-sm-1 offset-md-2">
                                        <h4>{{$data->video_title}}</h4>
                                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{$data->video_url}}"><i class="fas fa-play"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- about_video end -->

    <!-- misson_visition start -->
    <section class="misson_visition_part" id="misson_visition_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-12 col-lg-8 col-sm-10 col-md-8 offset-md-2 offset-lg-2 offset-sm-1">
                    <div class="common_heading text-center">
                        <h3>{{ config('settings.vision_head_title') }}</h3>
                        <p>{{ config('settings.vision_head_details') }} </p>
                    </div>
                </div>
            </div>
            <!-- common heading end -->
            <div class="row">
                @php
                    $allMission=App\OurMission::where('status',1)->orderBy('id','asc')->get();
                @endphp
                <div class="col-12">
                    <div class="slide_mission owl-carousel">
                        @foreach ($allMission as $key => $data)
                            <div class="our_mission_content">
                                <div class="our_mission_content_icon our_mission_content_icon{{ $key }}">
                                    <img src="{{asset('uploads/our-mission/'.$data->logo)}}" alt="" class="img-fluid" style="padding-top: 64px; margin-left:12px; height: 105px; width: 42px;">
                                </div>
                                <h4>{{$data->title}}</h4>
                                <p>{{$data->details}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- misson_visition end -->

    <!-- hostory about start -->
    <section class="hostory_about_part py_90" id="hostory_about_sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @foreach ($datas as $data)
                        <div class="hostory_about_content">
                            <h3>{{$data->title}}</h3>
                            <p>{!! $data->details!!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- hostory about end -->

     <!-- sing_up start -->
    {{-- <section class="sing_up_part" id="sing_up">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-7">
                    <div class="sing_up_content">
                        <h3>{{ config('settings.vol_title') }} </h3>
                        <p>{!! config('settings.vol_details') !!} </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-5">
                    <div class="sing_up_content text-center">
                        <a href="#" class="btn">Join US</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- sing_up end -->
    <section class="gallery_main_part py_80 team_main_part" id="team_main_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 aarvi_heading">
                    <h2>Meet <span>Our</span> Team</h2>
                </div>
            </div>
            <div class="row">
                @php
                    $allTeamCate=App\TeamCategory::where('tcate_status',1)->orderBy('tcate_id','ASC')->get();
                @endphp
                <div class="col-12 text-center">
                    <div id="filters" class="button-group"> <button class="button is-checked" data-filter="*">All Team</button>
                        @foreach($allTeamCate as $tcate)
                            <button class="button" data-filter=".tcate{{$tcate->tcate_id}}">{{$tcate->tcate_name}}</button>
                        @endforeach
                    </div>
                </div>

                <div class="col-12">
                    <div class="row grid">
                        @php
                            $allTeam=App\Team::where('status',1)->orderBy('id','DESC')->get();
                        @endphp
                        @foreach($allTeam as $team)
                            <div class="element-item tcate{{$team->tcate_id}} col-md-3 col-sm-6 col-lg-3 col-12" data-category="tcate{{$team->tcate_id}}">
                                <div class="team_item">
                                    <div class="team_item_img">
                                        <img src="{{asset('uploads/team/'.$team->image)}}" alt="" class="img-fluid">

                                        <div class="team_item_img_overlay text-center">
                                        <h4>{{$team->name}}</h4>
                                            <h6>{{(!empty($team->teamCate))?$team->teamCate->tcate_name:''}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
