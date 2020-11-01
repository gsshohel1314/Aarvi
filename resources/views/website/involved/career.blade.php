@extends('layouts.website')
@section('content')
    <section class="others_banner_part career_other_banner" id="others_banner_sec">
        <div class="ovelay_others_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_others_content text-center">
                            <h1>Career</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breat_come">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Career</li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- others banner end -->

    <!-- career message start -->
    <section class="career_message_part" id="career_message_sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="career_message_content text-center">
                        <p>{!! config('settings.car_head_details') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- career message end -->

    <!-- career job start -->
    <section class="career_job_part pb_90" id="career_job_sec">
        <div class="container">
            <div class="row">

                @php
                    $datas = App\Career::where('status',1)->orderBy('id','DESC')->get();
                @endphp
                @foreach ($datas as $data)
                    <div class="col-md-4 col-lg-4 col-sm-6" style="margin-bottom: 20px;">
                        <div class="career_job_content">
                            <div class="career_job_content_img">
                                <img src="{{asset('uploads/career/'.$data->image)}}" alt="" class="img-fluid">
                            </div>
                            <h6>We‘re Hiring</h6>
                            <h4> {{$data->title}} </h4>
                            <p><i class="fas fa-map-marker-alt"></i> {{$data->address}} </p>
                            <p><i class="fas fa-calendar-alt"></i> {{\Carbon\Carbon::parse($data->date)->format('F j, Y')}} </p>

                        </div>
                        <div class="career_job_contents">
                        <a href="#" class="btn">Read More<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- career job end -->



    <!-- misson_visition start -->
    <section class="misson_visition_part help_part" id="help_part_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-12">
                    <div class="common_heading">
                       <h6>{{ config('settings.car_miss_title') }}</h6>
                        <h3>{{ config('settings.car_miss_subtitle') }}</h3>
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
  @endsection
