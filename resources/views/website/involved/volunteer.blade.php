@extends('layouts.website')
@section('content')
<section class="others_banner_part career_other_banner" id="others_banner_sec">
    <div class="ovelay_others_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_others_content text-center">
                        <h1>Volunteer</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--
<section class="breadcrumb_section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Involved</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Volunteer</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<section class="career_message_part" id="career_message_sec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="career_message_content text-center">
                    <p>{!! config('settings.vol_head_details') !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="volunteer_about_part pb_90" id="volunteer_about_sec">
    @php
        // $data = App\Volunteerhistory::where('status',1)->latest()->first();
        $data = App\Volunteerhistory::where('status',1)->orderBy('id','ASC')->first();
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="volunteer_about_img">
                    <img src="{{asset('uploads/volunteer_history/'.$data->image)}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 mmt_30">
                <div class="volunteer_about_content">
                    <h3>{{$data->title}}</h3>
                    <p>{!! $data->details !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="volunteer_working_part" id="volunteer_working_sec">
    @php
        // $data = App\Volunteerskill::where('status',1)->latest()->first();
        $skill = App\Volunteerskill::where('status',1)->orderBy('id','ASC')->first();
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6">
                <div class="volunteer_working_content">
                    <h4>{{$skill->title}}</h4>
                    <ul>
                        <li><i class=""></i>{!! $skill->skill !!}</li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 mmt_30">
                <div class="volunteer_working_content_img">
                    <img src="{{asset('uploads/volunteer_skill/'.$skill->image)}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="volunteer_join_team_part py_90" id="volunteer_join_team_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 volunteer_join_team_content_bg pl-0">
                <div class="volunteer_join_team_content">
                    <h3>{{ config('settings.vol_form_title') }}</h3>
                    <p>{{ config('settings.vol_form_subtitle') }}
                        <span>{{ config('settings.vol_form_email') }}</span></p>
                    <a href="#"><i class="fas fa-phone-alt"></i>{{ config('settings.vol_form_phone') }}</a>
                    <a href="#"><i class="fas fa-envelope"></i>{{ config('settings.vol_form_web_url') }}</a>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12 volunteer_join_team_form_bg pr-0">
                <div class="volunteer_join_team_form mt_30">
                    @if(Session::has('success'))
                      <script type="text/javascript">
                          swal({title: "Success!", text: "Successfully complete your registration!", icon: "success", button: "OK", timer:5000,});
                       </script>
                    @endif
                    @if(Session::has('error'))
                        <script type="text/javascript">
                            swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                        </script>
                    @endif
                    <form method="post" action="{{url('volunteer/registration/submit')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}" required/>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{old('phone')}}" required/>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" required/>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" name="password" placeholder="Password" required/>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm-Password" required/>
                            </div>
                        </div>
                        <button type="submit" class="btn sub_mit_btn">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
