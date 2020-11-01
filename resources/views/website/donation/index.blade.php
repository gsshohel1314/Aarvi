@extends('layouts.website')
@section('content')
    <section class="others_banner_part" id="others_banner_sec">
        <div class="ovelay_others_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="banner_others_content text-center">
                            <h1>Donation</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breat_come">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Donation</li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- others banner end -->

    <!-- Donation part start  -->
    <section class="donation_dtls_part py_90" id="donation_dtls_sec">
        <div class="side_img">
            <img src="{{asset('contents/website')}}/images/donation_side_img1.png" alt="" class="img-fluid">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4">

                </div>
                <div class="col-md-8 col-lg-8 col-sm-8">
                    <div class="donation_dtls_content">
                        <h3>BECOME A DONAR</h3>
                        <p>How much would you like to donate?</p>
                        <h5>AMOUNT <span>(Taka)</span></h5>
                        <form>
                            <a href="#" class="btn">1000</a>
                            <a href="#" class="btn">2000</a>
                            <a href="#" class="btn">3000</a>
                            <a href="#" class="btn">5000</a>
                            <a href="#" class="btn">10000</a>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="inpu_tk" placeholder="Custom Amount">
                                </div>
                            </div>
                            <h6>Would you like to donate this to a
                                specific campaign?</h6>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select id="inputgender" class="form-control">
                                        <option selected>Select Donation Type</option>
                                        <option value="1">Visa</option>
                                        <option value="2">Master card</option>
                                        <option value="3">Nexus</option>
                                        <option value="4">others</option>
                                    </select>
                                </div>
                            </div>
                            <h6>Payment Method</h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Credit Card</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Local Bank</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Mobile Bank</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="contact2-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false">Bkash</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="xxx xxxx xxx xxxx">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Full Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Phone Number">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Phone Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="xxx xxxx xxx xxxx">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Full Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Phone Number">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Phone Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="xxx xxxx xxx xxxx">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Full Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Phone Number">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Phone Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Card Number</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="xxx xxxx xxx xxxx">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Full Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Phone Number">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" id="inpu_tk2" placeholder="Your Phone Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn" type="submit" value="send">DONATE NOW</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Donation part end  -->

    <!-- international Donation start  -->
    <section class="international_donation_part" id="international_donation_sec">
        <div class="international_donation_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-10 offset-sm-1 offset-md-2 offset-lg-2">
                        <div class="international_donation_content">
                            <h3>International Donation</h3>
                            <div class="row mx-0">
                                <div class="col-6 pr-0  bor-r">
                                    <h4>Name</h4>
                                    <ul>
                                        <li>Bank Name</li>
                                        <li>Account Name</li>
                                        <li>Account number</li>
                                        <li>Swift Code</li>
                                        <li>National (Local) Money Transfer Code</li>
                                        <li>Country</li>
                                    </ul>
                                </div>
                                 <div class="col-6 pl-0 bor-l">
                                    <h4>DEtails</h4>
                                    <ul>
                                        <li>Wells Fargo Bank</li>
                                        <li>AARVI USA</li>
                                        <li>XXXX XXX XXX XXXX</li>
                                        <li>XXXX XXX</li>
                                        <li>xxxxxxxxxxxxxx</li>
                                        <li>USA</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- international Donation end  -->

     <!-- client_feed_part start -->
    <section class="client_feed_part py_90" id="client_feed_sec">
        <div class="container">
            <!-- common heading start -->
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                    <div class="common_heading text-center">
                        <h3>THEY SAID ABOUT US</h3>
                    </div>
                </div>
            </div>
            <!-- common heading end -->

            <div class="row">
                <div class="col-12">
                    <div class="client_feed_slide owl-carousel">
                        @php
                            $testimonials=App\Testimonial::where('tm_status',1)->orderBy('tm_id','asc')->get();
                        @endphp
                        @foreach ($testimonials as $data)
                            <div class="client_feed_item text-center" style="min-height: 354px;">
                                <p>{!! $data->tm_review !!}</p>
                                <div class="blog_slide_item_img">
                                    <img src="{{asset('uploads/testimonial/'.$data->tm_image)}}" alt="" class="img-fluid" style="border-radius: 50%;">
                                </div>
                                <h4>{{ $data->tm_name }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
  @endsection
