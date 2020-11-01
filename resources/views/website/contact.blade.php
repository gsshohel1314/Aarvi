@extends('layouts.website')
@section('content')
<section class="others_banner_part" id="others_banner_sec">
    <div class="ovelay_others_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_others_content text-center">
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="address_map_part py_90" id="address_map_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-6">
                <div class="contact_item contact_item_phn">
                    <h4>PHONE NUMBER:</h4>
                    <a href="#">{{ config('settings.phone_one') }}</a>
                    <a href="#">{{ config('settings.phone_two') }}</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 mmt_30">
                <div class="contact_item contact_item_email">
                    <h4>E-MAIL:</h4>
                    <a href="#">{{ config('settings.email_one') }}</a>
                    <a href="#">{{ config('settings.email_two') }}</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-6 mmt_30 smmt_30">
                <div class="contact_item contact_item_address">
                    <h4>ADDRESS:</h4>
                    <a href="#">{{ config('settings.con_address') }}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="maps_iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.657863994466!2d90.41243511544816!3d23.795194784567407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a706cf80f3%3A0x8af0390a4255db95!2sBSB%20Global%20Network!5e0!3m2!1sen!2sbd!4v1599283279038!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="conatct_us_part py_90" id="conatct_us_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                <div class="common_heading text-center">
                    <h3>{{ config('settings.message_form_title') }}</h3>
                    <p>{{ config('settings.message_form_subtitle') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form_contact">
                    @if(Session::has('success'))
                      <script type="text/javascript">
                          swal({title: "Success!", text: "Successfully send your contact information!", icon: "success", button: "OK", timer:5000,});
                       </script>
                    @endif
                    @if(Session::has('error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif
                    <form method="post" action="{{url('contact/submit')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="" name="name" placeholder="Full Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="" name="phone" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="" name="email" placeholder="E-mail Address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control2" id="" placeholder="Type Massage" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn bnt_submit">SEND MASSAGE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
