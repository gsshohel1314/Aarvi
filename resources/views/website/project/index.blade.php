@extends('layouts.website')
@section('content')
    <section class="others_banner_part" id="others_banner_sec">
        <div class="ovelay_others_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_others_content text-center">
                            <h1>OUR PROJECTS</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breat_come">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Our Projects</li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- others banner end -->

    <!-- type of project start -->
    <section class="type_of_project_part py_90" id="type_of_project_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                    <div class="common_heading text-center">
                        <h3>Type Of projects We Do</h3>
                    </div>
                </div>
            </div>
            <!-- common heading end -->

            <div class="row">
                @php
                    $allProjectType=App\Projecttype::where('status',1)->get();
                @endphp
                @foreach ($allProjectType as $key => $data)
                    <div class="col-lg-4 col-md-6 col-sm-6" style="margin-bottom: 20px;">
                        <div class="type_of_project_iteam">
                        <h4><span>{{$key + 1}}</span>{{$data->title}}</h4>
                            <P>{{$data->details}}.</P>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- type of project end -->

    <!-- project_live part start -->
    <section class="project_live_part py_90">
        <div class="container">
            
            @php
                $current = Carbon\Carbon::now()->format('Y-m-d');
                $datas = App\Project::where('end_date', '>=', $current)->where('status',1)->get();
            @endphp

            <!-- common heading start -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                    <div class="common_heading text-center">
                        <h3> Live Projects</h3>
                    </div>
                </div>
            </div>
            <!-- common heading end -->

            <div class="row">
                <div class="col-12">
                    <div class="live_project_slide owl-carousel">
                        @foreach ($datas as $data)
                            <div class="live_project_item">
                                <div class="live_project_item_img">
                                    <img src="{{asset('uploads/project/'.$data->image)}}" alt="" class="img-fluid">
                                </div>
                                <h3>{{Illuminate\Support\Str::limit($data->title, 22)}}</h3>
                                <p>{!!Illuminate\Support\Str::limit($data->details, 100)!!}</p>
                                <h6>500 Taka </h6>
                                <a href="#" class="btn">DONATE</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project_live part end -->

    <!-- blog start -->
    <section class="our_blog_part our_past_project_part py_90" id="our_past_project_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                    <div class="common_heading text-center">
                        <h3>Past Projects</h3>
                    </div>
                </div>
            </div>
            <!-- common heading end -->

            @php
                $current = Carbon\Carbon::now()->format('Y-m-d');
                $datas = App\Project::where('end_date', '<=', $current)->where('status',1)->get();
            @endphp

            <div class="row">
                <div class="col-12">
                    <div class="blog_slide owl-carousel">
                        @foreach ($datas as $data)
                            <div class="blog_slide_content" style="min-height: 398px;">
                                <div class="blog_slide_content_img">
                                    <img src="{{asset('uploads/project/past/'.$data->image)}}" alt="" class="img-fluid">
                                </div>
                                <h4>{{Illuminate\Support\Str::limit($data->title, 38)}}</h4>
                                <p>{!!Illuminate\Support\Str::limit($data->details, 70)!!}</p>
                                <a href="#" class="btn">READ MORE</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
