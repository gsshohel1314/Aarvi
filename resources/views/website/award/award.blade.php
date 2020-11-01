@extends('layouts.website')
@section('content')
    <section class="others_banner_part" id="others_banner_sec">
        <div class="ovelay_others_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_others_content text-center">
                            <h1>awards Details</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breat_come">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Awards Details</li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- others banner end -->

    <!-- awards_dtls_part start -->
    <section class="awards_dtls_part py_90" id="awards_dtls_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-lg-5">
                    <div class="awards_dtls_img">
                        <img src="{{asset('uploads/award/details/'.$data->award_image)}}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-lg-7">
                    <div class="awards_dtls_content">
                       <h3>{{$data->award_title}}</h3>
                       <p> {{$data->award_details}} </p>
                      <a href="#" class="btn">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- awards_dtls_part_part end -->

     <!-- sing_up start -->
    <section class="sing_up_part" id="sing_up">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-7">
                    <div class="sing_up_content">
                        <h3>{{ config('settings.vol_title') }} </h3>
                        <p>{{ config('settings.vol_details') }}</p>
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
    <section class="wining_awards_part py_90" id="big_awards_sec">
        <div class="container">
           <!-- common heading start -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                    <div class="common_heading text-center">
                        <h3>Awards Wining</h3>
                    </div>
                </div>
            </div>
            <!-- common heading end -->
            <div class="row">
                <div class="col-12">
                    <div class="slide_wining_awards owl-carousel">
                        <div class="slide_wining_awards_item">
                            <div class="slide_wining_awards_item_img">
                                <img src="{{asset('contents/website')}}/images/awards_details_slide1.jpg" alt="" class="img-fluid">
                                <div class="slide_wining_awards_item_img_ovelay">
                                    <a href="#" class="btn">MD. Rasel</a>
                                    <h4>Winners of Charity Awards 2019</h4>
                                </div>
                            </div>
                        </div>
                        <div class="slide_wining_awards_item">
                            <div class="slide_wining_awards_item_img">
                                <img src="{{asset('contents/website')}}/images/awards_details_slide2.jpg" alt="" class="img-fluid">
                                <div class="slide_wining_awards_item_img_ovelay">
                                    <a href="#" class="btn">Nowusin</a>
                                    <h4>Winners of Charity Awards 2018</h4>
                                </div>
                            </div>
                        </div>
                        <div class="slide_wining_awards_item">
                            <div class="slide_wining_awards_item_img">
                                <img src="{{asset('contents/website')}}/images/awards_details_slide3.jpg" alt="" class="img-fluid">
                                <div class="slide_wining_awards_item_img_ovelay">
                                    <a href="#" class="btn">Haidar Ali</a>
                                    <h4>Winners of Charity Awards 2017</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  @endsection
