@extends('layouts.website')
@section('content')
    <section class="others_banner_part" id="others_banner_sec">
        <div class="ovelay_others_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_others_content text-center">
                            <h1>Events</h1>
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
                            <li><a href="#"><i class="fa fa-angle-double-right"></i>Events</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="event_contant_part py_60" id="event_contant_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 aarvi_heading">
                    <h2>Aarvi <span>Foundation</span> All Events</h2>
                </div>
            </div>
            <div class="row">
                {{-- @php
                    $allEvent=App\Event::where('event_status',1)->orderby('event_id','DESC')->paginate(5);
                @endphp --}}

                @php
                    $current = Carbon\Carbon::now()->format('Y-m-d');
                    $allEvent = App\Event::where('event_date', '>=', $current)->where('event_status',1)->paginate(5);
                @endphp
                @foreach($allEvent as $edata)
                <div class="col-12 mb_30">
                    <div class="event_contant_item">
                        <div class="row mx-0">
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="event_contant_item_img">
                                    <img src="{{asset('uploads/event/'.$edata->event_image)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-8">
                                <div class="event_contant_item_content">
                                    <h3>{{$edata->event_title}}</h3>
                                    <p>{{$edata->event_subtitle}}</p>
                                    <a href="#" class="btn">Apply NOW</a>
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-4">
                                <div class="event_contant_item_content_date text-center">
                                   <h4>{{date('d',strtotime($edata->event_date))}}</h4>
                                   <p>{{date('F Y',strtotime($edata->event_date))}}</p>
                                   <a href="#"><i class="fas fa-angle-down"></i></a>
                                   <h6>{{$edata->event_start}} - {{$edata->event_end}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row">
                  <div class="col-md-12 paginate_part mr_15">
                      {{$allEvent->links()}}
                  </div>
                </div>
            </div>
        </div>
    </section>
@endsection
