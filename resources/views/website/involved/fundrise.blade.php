@extends('layouts.website')
@section('content')
    <section class="others_banner_part career_other_banner" id="others_banner_sec">
        <div class="ovelay_others_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_others_content text-center">
                            <h1>FUNDRAISE</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breat_come">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Fundraise</li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- others banner end -->

    <!-- fundraise_content part start -->
    <section class="fundraise_content_part py_90" id="fundraise_content_sec">
        <div class="container">
            @php
                // $allFund = App\Fund::where('status',1)->orderBy('id', 'asc')->first();
                $fund = App\Fund::where('status',1)->latest()->first();
            @endphp
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="fundraise_content_img">
                            <img src="{{asset('uploads/fund/'.$fund->image)}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7">
                        <div class="fundraise_content_cont">
                            <h3>{{$fund->title}}</h3>
                            <p>{!! $fund->details !!}</p>
                        </div>
                    </div>
                </div>

            <div class="row">
                @php
                    $fundCost=App\Fundcost::where('status',1)->get();
                @endphp
                <div class="col-12">
                    <div class="fundraise_content_chart">
                        <div class="row mx-0">
                            <div class="col-3 px-0">
                                <div class="fundraise_content_chart_content fundraise_content_chart_content2">
                                    <h4>COST</h4>
                                    <ul>
                                        @foreach ($fundCost as $data)
                                            <li>{{$data->cost}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-9 px-0">
                                <div class="fundraise_content_chart_content">
                                    <h4>DETAILS</h4>
                                    <ul>
                                        @foreach ($fundCost as $value)
                                            <li> {{$data->details}} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fundraise_content part end -->

    <!-- fundraise_content_message start -->
    <section class="fundraise_content_message_part py_90" id="fundraise_content_message_sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fundraise_content_message_cont">
                        <h3>{{ config('settings.how_fund_title') }}</h3>
                        <h5>{{$fund->fun_title}}</h5>
                        <p>{!! $fund->fun_details !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fundraise_content_message end -->

    <!-- fundraise_aravi_prev start -->
    <section class="fundraise_aravi_prev_part py_90" id="fundraise_aravi_prev_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                    <div class="common_heading text-center">
                        <h3>{{ config('settings.pre_fund_title') }}</h3>
                        <p>{{ config('settings.pre_fund_subtitle') }}</p>
                    </div>
                </div>
            </div>
            <!-- common heading end -->
            <div class="row">
                <div class="col-12">
                    <div class="fundraise_aravi_prev_slide owl-carousel">
                        @php
                            $prefund=App\Prefund::where('status',1)->get();
                        @endphp
                        @foreach ($prefund as $data)
                            <div class="fundraise_aravi_prev_item">
                                <div class="fundraise_aravi_prev_item_img">
                                    <img src="{{asset('uploads/prefund/'.$data->image)}}" alt="" class="img-fluid">
                                    <div class="fundraise_aravi_prev_item_img_ovelay">
                                        <h4>{{$data->title}}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        

{{-- 
                        <div class="fundraise_aravi_prev_item">
                            <div class="fundraise_aravi_prev_item_img">
                                <img src="{{asset('contents/website')}}/images/fundrise_slide2.jpg" alt="" class="img-fluid">
                                <div class="fundraise_aravi_prev_item_img_ovelay">
                                    <h4>SYDNEY FUND RISING RUN 2014</h4>
                                </div>
                            </div>
                        </div>
                        <div class="fundraise_aravi_prev_item">
                            <div class="fundraise_aravi_prev_item_img">
                                <img src="{{asset('contents/website')}}/images/fundrise_slide3.jpg" alt="" class="img-fluid">
                                <div class="fundraise_aravi_prev_item_img_ovelay">
                                    <h4>UCL-IPAS MARATHON RUN 2013</h4>
                                </div>
                            </div>
                        </div>
                        <div class="fundraise_aravi_prev_item">
                            <div class="fundraise_aravi_prev_item_img">
                                <img src="{{asset('contents/website')}}/images/fundrise_slide2.jpg" alt="" class="img-fluid">
                                <div class="fundraise_aravi_prev_item_img_ovelay">
                                    <h4>TARA FUND RISING 2014</h4>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
  @endsection
