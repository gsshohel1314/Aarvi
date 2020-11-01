@extends('layouts.admin')
@section('content')
<style>
    .rte-modern.rte-desktop.rte-toolbar-default {
        min-width: auto;
    }
</style>

<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Contact Us Page</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">All</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/settings/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Contact Us Page Information</h3>
                      </div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Success!</strong>contact us Page information updated successfull.
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

                <div class="form-group row custom_form_group{{ $errors->has('phone_one') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Contact Phone One:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="phone_one" value="{{ config('settings.phone_one') }}">
                      @if ($errors->has('phone_one'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone_one') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('phone_two') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Contact Phone Two:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="phone_two" value="{{ config('settings.phone_two') }}">
                      @if ($errors->has('phone_two'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone_two') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('email_one') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Contact Email One:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" name="email_one" value="{{ config('settings.email_one') }}">
                      @if ($errors->has('email_one'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email_one') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('email_two') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Contact Email Two:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" name="email_two" value="{{ config('settings.email_two') }}">
                      @if ($errors->has('email_two'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email_two') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('con_address') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Contact Address:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class="form-control" rows="4" name="con_address">{{ config('settings.con_address') }}</textarea>
                        @if ($errors->has('con_address'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('con_address') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('message_form_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Message Form Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="message_form_title" value="{{ config('settings.message_form_title') }}">
                      @if ($errors->has('message_form_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('message_form_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('message_form_subtitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Message Form Subtitle:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class="form-control" rows="4" name="message_form_subtitle">{{ config('settings.message_form_subtitle') }}</textarea>
                        @if ($errors->has('message_form_subtitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('message_form_subtitle') }}</strong>
                          </span>
                      @endif
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
