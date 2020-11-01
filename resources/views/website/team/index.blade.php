@extends('layouts.website')
@section('content')
<section class="others_banner_part" id="others_banner_sec">
    <div class="ovelay_others_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_others_content text-center">
                        <h1>Our Team </h1>
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
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Team</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery_main_part py_60 team_main_part" id="team_main_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 aarvi_heading">
                <h2>Meet <span>Our</span> Team</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <div id="filters" class="button-group"> <button class="button is-checked" data-filter="*">all team</button>
                    <button class="button" data-filter=".metal">Executive Team</button>
                    <button class="button" data-filter=".transition">Volunteer Team</button>
                    <button class="button" data-filter=".alkali, .alkaline-earth">Event Team</button>
                    <button class="button" data-filter=":not(.transition)">health team</button>
                    <button class="button" data-filter=".metal:not(.transition)">Others program team</button>
                </div>
            </div>

            <div class="col-12">
                <div class="row grid">
                    <div class="element-item transition metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="transition">
                        <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img1.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item metalloid col-md-3 col-sm-6 col-lg-3 col-12" data-category="metalloid">
                        <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img2.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item post-transition metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="post-transition">
                        <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img3.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item post-transition metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="post-transition">
                        <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img4.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item transition metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="transition">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img5.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item alkali metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="alkali">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img6.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item alkali metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="alkali">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img7.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item transition metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="transition">
                        <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img8.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item alkaline-earth metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="alkaline-earth">
                        <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img1.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item transition metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="transition">
                        <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img2.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item post-transition metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="post-transition">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img3.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item metalloid col-md-3 col-sm-6 col-lg-3 col-12" data-category="metalloid">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img4.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item transition metal col-md-3 col-sm-6 col-lg-3 col-12" data-category="transition">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img5.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item lanthanoid metal inner-transition col-md-3 col-sm-6 col-lg-3 col-12" data-category="lanthanoid">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img6.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item noble-gas nonmetal col-md-3 col-sm-6 col-lg-3 col-12" data-category="noble-gas">
                        <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img7.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item diatomic nonmetal col-md-3 col-sm-6 col-lg-3 col-12" data-category="diatomic">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img8.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item actinoid metal inner-transition col-md-3 col-sm-6 col-lg-3 col-12" data-category="actinoid">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img5.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item actinoid metal inner-transition col-md-3 col-sm-6 col-lg-3 col-12" data-category="actinoid">
                        <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img8.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item actinoid metal inner-transition col-md-3 col-sm-6 col-lg-3 col-12" data-category="actinoid">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img4.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="element-item actinoid metal inner-transition col-md-3 col-sm-6 col-lg-3 col-12" data-category="actinoid">
                       <div class="team_item">
                            <div class="team_item_img">
                                <img src="{{asset('contents/website')}}/images/team_img2.jpg" alt="" class="img-fluid">
                                <div class="team_item_img_overlay text-center">
                                    <h4>Odry Khan</h4>
                                    <h6>volunteer</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
