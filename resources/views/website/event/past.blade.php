@extends('layouts.website')
@section('content')
    <section class="others_banner_part" id="others_banner_sec">
        <div class="ovelay_others_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_others_content text-center">
                            <h1>Previous Events</h1>
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
                              <li><a href="#"><i class="fa fa-angle-double-right"></i>Award</a></li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="past_event_part py_90 our_blog_part our_past_project" id="past_event_sec">
        <div class="container">
            <div class="row">
                @php
                    $current = Carbon\Carbon::now()->format('Y-m-d');
                    $pastEvent = App\Event::where('event_date', '<=', $current)->where('event_status',1)->get();
                @endphp
                @foreach($pastEvent as $data)
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="blog_slide_content" style="margin-bottom: 15px;">
                            <div class="blog_slide_content_img">
                                <img src="{{asset('uploads/event/past/'.$data->event_image)}}" alt="" class="img-fluid">
                            </div>
                            <h4>{{$data->event_title}}
                            </h4>
                            <p>{{$data->event_subtitle}}</p>
                            <a href="#" class="btn">READ MORE</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
