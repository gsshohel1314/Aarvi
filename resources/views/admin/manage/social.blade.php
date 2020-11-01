@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Manage</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Manage</a></li>
            <li class="active">Social Media</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/manage/social/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Social Media Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/manage/contact')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> Contact Information</a>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> update social media information.
                          </div>
                        @endif
                        @if(Session::has('error'))
                          <div class="alert alert-warning alerterror" role="alert">
                             <strong>Opps!</strong> please try again.
                          </div>
                        @endif
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-facebook-square"></i></span></div>
                            <input type="text" class="form-control" id="" name="facebook" value="{{ $social->sm_facebook }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-twitter-square"></i></span></div>
                            <input type="text" class="form-control" id="" name="twitter" value="{{ $social->sm_twitter }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-linkedin-square"></i></span></div>
                            <input type="text" class="form-control" id="" name="linkedin" value="{{ $social->sm_linkedin }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-google-plus-square"></i></span></div>
                            <input type="text" class="form-control" id="" name="google" value="{{ $social->sm_google }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-youtube-play"></i></span></div>
                            <input type="text" class="form-control" id="" name="youtube" value="{{ $social->sm_youtube }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-pinterest-square"></i></span></div>
                            <input type="text" class="form-control" id="" name="pinterest" value="{{ $social->sm_pinterest }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-instagram"></i></span></div>
                            <input type="text" class="form-control" id="" name="instagram" value="{{ $social->sm_instagram }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-vimeo-square"></i></span></div>
                            <input type="text" class="form-control" id="" name="vimeo" value="{{ $social->sm_vimeo }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-skype"></i></span></div>
                            <input type="text" class="form-control" id="" name="skype" value="{{ $social->sm_skype }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-15">
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-rss-square"></i></span></div>
                            <input type="text" class="form-control" id="" name="rss" value="{{ $social->sm_rss }}">
                        </div>
                    </div>
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">UPDATE</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
