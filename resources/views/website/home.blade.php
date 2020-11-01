@extends('layouts.website')
@section('content')
<style>
    .sponser_child_part .sponser_child_video a {
    margin-left: -23px;
}
</style>

<section class="banner_part" id="banner_sec">
    @php
        $allBanner=App\Banner::where('ban_status',1)->where('ban_publish',1)->orderby('ban_id','DESC')->get();
    @endphp
    <div class="banner_slide owl-carousel">
        @foreach($allBanner as $banner)
        <div class="banner_item_slide" style="background: url({{asset('uploads/banner/'.$banner->ban_image)}});">
            <div class="overlay_banner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-9 col-lg-7 offset-md-5 offset-sm-3 offset-lg-5">
                            <div class="banner_slide_content">
                                <h1>{{$banner->ban_title}}</h1>
                                <h5>{{$banner->ban_details}}</h5>
                                <a href="{{$banner->ban_button_url}}" class="btn">{{$banner->ban_button}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section class="founder_about_part" id="founder_about_sec">
    <div class="container">
        {{-- @php
          $foundMess=App\PageContent::where('pc_status',1)->where('pc_id',1)->firstOrFail();
        @endphp --}}
        <div class="row">
            <div class="col-lg-4 col-sm-5 col-md-4">
                <div class="founder_about_img">
                    <img src="{{ URL::to(config('settings.founder_image')) }}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-8 col-sm-7 col-md-8">
                <div class="founder_about_content">
                    <h3>{{ config('settings.founder_name') }}</h3>
                    <h6>{{ config('settings.founder_desig') }} , {{ config('settings.institution_name') }}</h6>
                    <p>{!! config('settings.founder_message') !!}</p>
                    <h5>{{ config('settings.founder_message_title') }}</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our_mission_part py_90" id="our_mission">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="common_heading">
                    <h6>{{ config('settings.miss_head_title') }}</h6>
                    <h3>{{ config('settings.miss_head_subtitle') }}</h3>
                </div>
            </div>
        </div>
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
<section class="sponser_child_part" id="sponser_child_sec">
    <div class="sponser_child_part_img"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="sponser_child_content">
                    <h3>{{ config('settings.spon_title') }}</h3>
                    <h6>{{ config('settings.spon_subtitle') }}</h6>
                    <p>{!! config('settings.spon_details') !!}</p>
                    <a href="#" class="btn">Sponsorship Form</a>
                    <a href="#" class="btn">Be a Sponsor</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 offset-md-3 offset-sm-3 offset-lg-3">
                <div class="sponser_child_video">
                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{ config('settings.spon_url') }}"><i class="fas fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery_part" id="gallery">
    @php
        $allGallery=App\Gallery::where('gallery_status',1)->where('gallery_home',1)->limit(8)->get()
    @endphp
    <div class="row mx-0">
      @foreach($allGallery as $gallery)
      <div class="col-lg-3 col-md-3 col-sm-6 px-0">
            <div class="gallery_img gallery_img_big">
                <img src="{{asset('uploads/gallery/'.$gallery->gallery_photo)}}" alt="" class="img-fluid w-100">
                <div class="overlay_gallery">
                    <a class="venobox" data-gall="gallery01" href="{{asset('uploads/gallery/'.$gallery->gallery_photo)}}">
                        <i class="fas fa-search-plus"></i>
                    </a>
                    <h4>{{$gallery->gallery_title}}</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section class="sing_up_part sing_up_part2" id="sing_up">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7">
                <div class="sing_up_content">
                    <h3>{{ config('settings.vol_title') }}</h3>
                    <p>{!! config('settings.vol_details') !!}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5">
                <div class="sing_up_content text-center">
                    <a href="#" class="btn">Join US</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="education_program_part" id="education_program_sec">
    <div class="education_program_img_bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-6"></div>
            <div class="col-lg-5 col-md-5 col-sm-6">
                <div class="education_program_content">
                    <h3>{{ config('settings.prog_title') }}</h3>
                    <h6>{{ config('settings.prog_subtitle') }}</h6>
                    <p>{!! config('settings.prog_details') !!}</p>
                    <a href="#" class="btn">ExPLORE MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="recent_case_part py_90" id="recent_case_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                <div class="common_heading text-center">
                    <h3>{{ config('settings.cause_head_title') }}</h3>
                    <p>{{ config('settings.cause_head_subtitle') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $projects = App\Project::where('status',1)->orderBy('id','DESC')->get();
            @endphp
            <div class="col-12">
                <div class="slide_case owl-carousel">
                    @foreach ($projects as $project)
                        <div class="slide_case_item" style="min-height: 482px;">
                            <div class="slide_case_item_img">
                                <img src="{{asset('uploads/project/'.$project->image)}}" alt="" class="img-fluid">
                            </div>
                            <h4>{{$project->title}}</h4>
                            <p>{{ Illuminate\Support\Str::limit($project->details,100) }}</p>
                            <a href="#" class="btn">DONATE NOW</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
