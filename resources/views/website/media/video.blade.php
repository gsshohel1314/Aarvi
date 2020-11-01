@extends('layouts.website')
@section('content')
<section class="others_banner_part" id="others_banner_sec">
    <div class="ovelay_others_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_others_content text-center">
                        <h1>Videos</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video_main_part py_90" id="video_main_sec">
    <div class="container">
        <div class="row">
            @php
                $allVideo=App\Video::where('video_status',1)->orderBy('video_id','DESC')->get();
            @endphp
            @foreach ($allVideo as $data)
                <div class="col-md-6 col-lg-4 col-sm-12">
                    <div class="video_main_content" style="margin-bottom: 15px;">
                        <div class="video_main_cont_img">
                            <img src="{{asset('uploads/video/'.$data->image)}}" alt="" class="img-fluid">
                            <div class="video_main_cont_overlay">
                            <a class="venobox vbox-item" data-autoplay="true" data-vbtype="video" href="{{$data->video_url}}"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <h4>{{$data->video_title}}</h4>
                    </div>
                </div>
            @endforeach
            
            {{--
             <div class="col-md-6 col-lg-4 col-sm-12 smmt_30 mmt_30">
                <div class="video_main_content">
                    <div class="video_main_cont_img">
                        <img src="{{asset('contents/website')}}/images/01.jpg" alt="" class="img-fluid">
                        <div class="video_main_cont_overlay">
                            <a class="venobox vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=1sZXfANXi6w"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>We've funded $230,00 for 10M children around the world</h4>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-12 smmt_30 mmt_30 mdmt_30">
                <div class="video_main_content">
                    <div class="video_main_cont_img">
                        <img src="{{asset('contents/website')}}/images/01.jpg" alt="" class="img-fluid">
                        <div class="video_main_cont_overlay">
                            <a class="venobox vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=1sZXfANXi6w"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>We've funded $230,00 for 10M children around the world</h4>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-sm-12 mt_30">
                <div class="video_main_content">
                    <div class="video_main_cont_img">
                        <img src="{{asset('contents/website')}}/images/01.jpg" alt="" class="img-fluid">
                        <div class="video_main_cont_overlay">
                            <a class="venobox vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=1sZXfANXi6w"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>We've funded $230,00 for 10M children around the world</h4>
                </div>
            </div>
             <div class="col-md-6 col-lg-4 col-sm-12 mt_30">
                <div class="video_main_content">
                    <div class="video_main_cont_img">
                        <img src="{{asset('contents/website')}}/images/01.jpg" alt="" class="img-fluid">
                        <div class="video_main_cont_overlay">
                            <a class="venobox vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=1sZXfANXi6w"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>We've funded $230,00 for 10M children around the world</h4>
                </div>
            </div>
             <div class="col-md-6 col-lg-4 col-sm-12 mt_30">
                <div class="video_main_content">
                    <div class="video_main_cont_img">
                        <img src="{{asset('contents/website')}}/images/01.jpg" alt="" class="img-fluid">
                        <div class="video_main_cont_overlay">
                            <a class="venobox vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=1sZXfANXi6w"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>We've funded $230,00 for 10M children around the world</h4>
                </div>
            </div>
             <div class="col-md-6 col-lg-4 col-sm-12 mt_30">
                <div class="video_main_content">
                    <div class="video_main_cont_img">
                        <img src="{{asset('contents/website')}}/images/01.jpg" alt="" class="img-fluid">
                        <div class="video_main_cont_overlay">
                            <a class="venobox vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=1sZXfANXi6w"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>We've funded $230,00 for 10M children around the world</h4>
                </div>
            </div>
             <div class="col-md-6 col-lg-4 col-sm-12 mt_30">
                <div class="video_main_content">
                    <div class="video_main_cont_img">
                        <img src="{{asset('contents/website')}}/images/01.jpg" alt="" class="img-fluid">
                        <div class="video_main_cont_overlay">
                            <a class="venobox vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=1sZXfANXi6w"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>We've funded $230,00 for 10M children around the world</h4>
                </div>
            </div>
             <div class="col-md-6 col-lg-4 col-sm-12 mt_30">
                <div class="video_main_content">
                    <div class="video_main_cont_img">
                        <img src="{{asset('contents/website')}}/images/01.jpg" alt="" class="img-fluid">
                        <div class="video_main_cont_overlay">
                            <a class="venobox vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=1sZXfANXi6w"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>We've funded $230,00 for 10M children around the world</h4>
                </div>
            </div> --}}

        </div>
    </div>
</section>
@endsection
