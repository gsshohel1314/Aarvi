@extends('layouts.website')
@section('content')
<section class="others_banner_part" id="others_banner_sec">
    <div class="ovelay_others_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_others_content text-center">
                        <h1>Apply for Awards</h1>
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
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Apply</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="registion_part py_90" id="registion_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="site_navs_registion">
                    <h4>Our Awards</h4>
                    <ul>
                        <li class="active"><a href="#">Volunteer of the Year</a></li>
                        <li><a href="#">Volunteer of the Month</a></li>
                        <li><a href="#">Volunteer of the Week</a></li>
                        <li><a href="#">Volunteer of the Year</a></li>
                        <li><a href="#">Volunteer of the Month</a></li>
                        <li><a href="#">Volunteer of the Week</a></li>
                    </ul>
                </div>
                <div class="site_navs_registion_bt mt_30 text-center">
                    <h4>{{ config('settings.donate_button_title') }}</h4>
                    <p>{{ config('settings.donate_button_subtitle') }}</p>
                    <a href="#" class="btn">DONATE</a>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 mmt_30">
                <div class="registion_from_content">
                    <h4>{{ config('settings.apply_form_title') }}</h4>
                    <p>{{ config('settings.apply_form_subtitle') }}</p>
                    @if(Session::has('success'))
                      <script type="text/javascript">
                          swal({title: "Success!", text: "Successfully complete award registration!", icon: "success", button: "OK", timer:5000,});
                       </script>
                    @endif
                    @if(Session::has('error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif
                    <form method="post" action="{{url('award/apply/submit')}}">
                        @csrf
                        <div class="form-group">
                           <input type="text" class="form-control" name="name" id="" placeholder="Name">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="phone" id="" placeholder="Phone Number">
                       </div>
                        <div class="form-group">
                           <input type="email" class="form-control" name="email" id="" placeholder="Your E-mail">
                        </div>
                         <div class="form-group">
                           <input type="text" class="form-control" name="address" id="" placeholder="Address">
                        </div>
                        <div class="form-row">
                            @php
                                $today=Carbon\Carbon::now()->format('yy-m-d');
                                $allAward=App\Award::where('award_status',1)->orderBy('award_reg_starting','DESC')->get();
                            @endphp
                            <div class="form-group col-12">
                                <select id="" class="form-control" name="award">
                                    <option selected>Select Category</option>
                                    @foreach($allAward as $data)
                                      @if($data->award_reg_ending>=$today)
                                      <option value="{{$data->award_id}}">{{$data->award_title}}</option>
                                      @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                             <textarea  class="form-control" id="" name="message" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn_submit">APPLY NOW</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
