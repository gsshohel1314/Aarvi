@extends('layouts.website')
@section('content')
    <section class="others_banner_part" id="others_banner_sec">
        <div class="ovelay_others_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_others_content text-center">
                            <h1>Awards</h1>
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
    <section class="awards_item_part py_60" id="awards_item_sec">
        <div class="container">
          <div class="row">
              <div class="col-md-12 aarvi_heading">
                  <h2> <span>All</span> Awards <span>List</span></h2>
              </div>
          </div>
            @php
                $today=Carbon\Carbon::now()->format('yy-m-d');
                $allAward=App\Award::where('award_status',1)->orderBy('award_reg_starting','DESC')->get();
            @endphp
            <div class="row">
                @foreach($allAward as $data)
                @if($data->award_reg_ending>=$today)
                <div class="col-12 col-md-10 col-lg-10 col-sm-12 offset-md-1 offset-lg-1 mb_30">
                    <div class="awards_item">
                        <div class="row">
                            <div class="col-12 col-md-5 col-lg-5 col-sm-12">
                                <div class="awards_item_img">
                                    <img src="{{asset('uploads/award/'.$data->award_image)}}" alt="{{$data->award_title}}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-12 col-md-7 col-lg-7 col-sm-12">
                                <div class="awards_item_cont">
                                   <h3>{{$data->award_title}}</h3>
                                   <p>{{$data->award_subtitle}}</p>
                                   <a href="{{url('award/apply')}}" class="btn">Apply NOW</a>
                                   <a href="{{url('award/details/'.$data->award_slug)}}" class="btn">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- awards_item_part end -->

     <!-- sing_up start -->
    <section class="sing_up_part" id="sing_up">
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
    <!-- sing_up end -->

    <!-- big_awards_part start -->
    <section class="big_awards_part py_90" id="big_awards_sec">
        <div class="container">
           <!-- common heading start -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                    <div class="common_heading text-center">
                        <h3>Our Achievement</h3>
                    </div>
                </div>
            </div>
            <!-- common heading end -->
            <div class="row">
                <div class="col-12">
                    <div class="slide_big_awards owl-carousel">
                        <div class="slide_big_awards_item">
                            <div class="slide_big_awards_item_img">
                                <img src="{{asset('contents/website')}}/images/awards_big1.jpg" alt="" class="img-fluid">
                                <div class="slide_big_awards_item_img_ovelay">
                                    <h4>Winners of Charity Awards 2020</h4>
                                </div>
                            </div>
                        </div>
                         <div class="slide_big_awards_item">
                            <div class="slide_big_awards_item_img">
                                <img src="{{asset('contents/website')}}/images/awards_big1.jpg" alt="" class="img-fluid">
                                <div class="slide_big_awards_item_img_ovelay">
                                    <h4>Winners of Charity Awards 2019</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  @endsection
