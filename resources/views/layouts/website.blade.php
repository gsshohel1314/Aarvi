<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta content="" name="description" />
      <meta content="Uzzal" name="author" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @php
        $basic=App\Basic::where('basic_status',1)->where('basic_id',1)->firstOrFail();
        $social=App\SocialMedia::where('sm_status',1)->where('sm_id',1)->firstOrFail();
      @endphp
      <title>Aarvi Foundation</title>
      <link rel="icon" href="{{asset('uploads/basic/'.$basic->basic_favicon)}}">
      <link rel="stylesheet" href="{{asset('contents/website')}}/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{asset('contents/website')}}/css/animate.min.css">
      <link rel="stylesheet" href="{{asset('contents/website')}}/css/venobox.min.css">
      <link rel="stylesheet" href="{{asset('contents/website')}}/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{asset('contents/website')}}/css/fontawesome-all.min.css">
      <link rel="stylesheet" href="{{asset('contents/website')}}/css/style.css">
      <link rel="stylesheet" href="{{asset('contents/website')}}/css/responisive.css">
      <script src="{{asset('contents/website')}}/js/jquery-2.1.3.min.js"></script>
      <script src="{{asset('contents/website')}}/js/sweetalert.min.js"></script>
      <script src="{{asset('contents/website')}}/js/modernizr-2.8.3.min.js"></script>
  </head>
  <body>
      <header class="header_part" id="header_sec">
          <nav class="navbar navbar-expand-md navbar-light menu_part">
              <div class="container">
                  <a class="navbar-brand" href="{{url('/')}}">
                      <img src="{{asset('uploads/basic/'.$basic->basic_logo)}}" alt="" class="img-fluid">
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ml-auto  menu">
                          <li class="nav-item"> <a class="nav-link" href="{{url('about')}}">About us</a>
                           <li class="nav-item"> <a class="nav-link" href="{{url('project')}}">Our Project</a>
                          </li>
                          <li class="nav-item"> <a class="nav-link" href="#">Media<i class="fas fa-angle-down"></i></a>
                              <ul>
                                  <li><a href="{{url('media/gallery')}}">Image Gallery</a></li>
                                  <li><a href="{{url('media/video')}}">Video Gallery</a></li>
                                  <li><a href="{{url('media/instagram')}}">Instagram Gallery</a></li>
                              </ul>
                          </li>
                          <li class="nav-item"> <a class="nav-link" href="{{url('event')}}">Events</a></li>
                          <li class="nav-item"> <a class="nav-link" href="{{url('involved')}}">Get Involved<i class="fas fa-angle-down"></i></a>
                              <ul>
                                  <li><a href="{{url('volunteer')}}">Volunteer With Us</a></li>
                                  <li><a href="#">Partnership</a></li>
                                  <li><a href="#">Shop</a></li>
                                  <li><a href="{{url('career')}}">Career</a></li>
                                  <li><a href="{{url('fundrise')}}">Fundraise</a></li>
                                  <li><a href="{{url('donate')}}">Donate</a></li>
                              </ul>
                          </li>
                          <li class="nav-item"> <a class="nav-link" href="#">More<i class="fas fa-angle-down"></i></a>
                              <ul>
                                  <li><a href="{{url('award')}}">Award</a></li>
                                  <li><a href="#">Partnership</a></li>
                              </ul>
                          </li>
                          <li class="nav-item"> <a class="nav-link" href="{{url('contact')}}">Contact</a> </li>
                          <li class="nav-item"> <a class="nav-link btn_menu" href="{{url('donate')}}">DONATE</a> </li>
                      </ul>
                  </div>
              </div>
          </nav>
      </header>

      @yield('content')

      {{-- <section id="subscribe_sec" class="subscribe_part">
          <div class="container">
              <div class="row">
                  <div class="col-md-10 col-lg-6 col-sm-10 offset-md-1 offset-sm-1 offset-lg-3">
                    @if(Session::has('success_subscrib'))
                        <script type="text/javascript">
                            swal({title: "Success!", text: "Successfully registered newsletter subscribe!", icon: "success", button: "OK", timer:5000,});
                         </script>
                      @endif
                      @if(Session::has('error_subscrib'))
                          <script type="text/javascript">
                              swal({title: "Opps!",text: "Error! Please try again", icon: "error", button: "OK", timer:5000,});
                          </script>
                      @endif
                      <div class="subscribe_content text-center">
                          <h3>{{ config('settings.sub_title') }}</h3>
                          <h6>{{ config('settings.sub_subtitle') }}</h6>
                          <form method="post" action="{{url('newsletter/submit')}}">
                              @csrf
                             <input type="email" name="email" id="email" placeholder="Your e-mail address" class="form-control input_text" required>
                             <button type="submit" value="send" class="btn sub_btn">SUBSCRIBE</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section> --}}

      @if (Request::segment(1) == '' or Request::segment(1) == 'about')
        <!-- our_parner start -->
        <section class="our_parner_part py_90" id="our_parner_sec">
            <div class="container">
                <!-- common heading start -->
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2 offset-lg-2">
                        <div class="common_heading text-center">
                            <h3>{{ config('settings.partner_title') }}</h3>
                        </div>
                    </div>
                </div>
                <!-- common heading end -->

                <div class="row">
                    <div class="col-12">
                        @php
                            $allParner=App\Partner::where('partner_status',1)->orderby('partner_id','ASC')->get();
                        @endphp
                        <div class="parthner_slide owl-carousel">
                            @foreach($allParner as $partner)
                            <div class="parthner_slide_item">
                                <a href="{{$partner->partner_url}}" target="_blank">
                                    <img src="{{asset('uploads/partner/'.$partner->partner_logo)}}" alt="{{$partner->partner_title}}" class="img-fluid" style="height: 100px;">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
      @endif
      
      <footer class="footer_part">
          <div class="container">
              <div class="row">
                  <div class="col-md-5 col-lg-4 col-sm-12">
                      <div class="ft_logo">
                          <a href="#">
                              <img src="{{asset('uploads/basic/'.$basic->basic_flogo)}}" alt="" class="img-fluid">
                          </a>
                          {{-- <p>{!! config('settings.aarvi_details') !!}</p> --}}
                          <ul>
                              @if($social->sm_facebook!='')
                              <li><a href="{{$social->sm_facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                              @endif
                              @if($social->sm_twitter!='')
                              <li><a href="{{$social->sm_twitter}}"><i class="fab fa-twitter" target="_blank"></i></a></li>
                              @endif
                              @if($social->sm_linkedin!='')
                              <li><a href="{{$social->sm_linkedin}}"><i class="fab fa-linkedin-in" target="_blank"></i></a></li>
                              @endif
                              @if($social->sm_instagram!='')
                              <li><a href="{{$social->sm_instagram}}"><i class="fab fa-instagram" target="_blank"></i></a></li>
                              @endif
                              @if($social->sm_youtube!='')
                              <li><a href="{{$social->sm_youtube}}"><i class="fab fa-youtube" target="_blank"></i></a></li>
                              @endif
                              @if($social->sm_pinterest!='')
                              <li><a href="{{$social->sm_pinterest}}"><i class="fab fa-pinterest" target="_blank"></i></a></li>
                              @endif
                              @if($social->sm_google!='')
                              <li><a href="{{$social->sm_google}}"><i class="fab fa-google" target="_blank"></i></a></li>
                              @endif
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-8 col-md-7 col-sm-12 smmt_30">
                      <div class="row">
                          <div class="col-md-6 col-lg-4 col-sm-5 offset-lg-2  mmt_30">
                              <div class="quik_link">
                                  <h4>QUICK LINKS</h4>
                                  <ul>
                                      <li><a href="#">About Us</a></li>
                                      <li><a href="#">Our Schools</a></li>
                                      <li><a href="#">Sponsor A Child</a></li>
                                      <li><a href="#">Our Causes</a></li>
                                      <li><a href="#">Project</a></li>
                                      <li><a href="#">Career</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="col-md-6 col-sm-7 col-lg-6 mmt_30">
                              <div class="ft_award">
                                  <h4>GLOBAL GIVING</h4>
                                  <ul>
                                      <li><a href="#"><img src="{{asset('contents/website')}}/images/ft_arward1.png" alt="" class="img-fluid"></a></li>
                                      <li><a href="#"><img src="{{asset('contents/website')}}/images/ft_arward2.png" alt="" class="img-fluid"></a></li>
                                      <li><a href="#"><img src="{{asset('contents/website')}}/images/ft_arward3.png" alt="" class="img-fluid"></a></li>
                                      <li><a href="#"><img src="{{asset('contents/website')}}/images/ft_arward4.png" alt="" class="img-fluid"></a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="copy_right">
                                  <p>{{ config('settings.copyright') }} | All rights reserved by <a href="#">{{ config('settings.reserved_by') }}</a> | Development By <a href="#">Creative System Limited.</a></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </footer>
      <script src="{{asset('contents/website')}}/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('contents/website')}}/js/owl.carousel.min.js"></script>
      <script src="{{asset('contents/website')}}/js/waypoints.min.js"></script>
      <script src="{{asset('contents/website')}}/js/jquery.counterup.min.js"></script>
      <script src="{{asset('contents/website')}}/js/venobox.min.js"></script>
      <script src="{{asset('contents/website')}}/js/isotope.pkgd.js"></script>
      <script src="{{asset('contents/website')}}/js/custom.js"></script>
  </body>
</html>
