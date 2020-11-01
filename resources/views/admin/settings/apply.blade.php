@extends('layouts.admin')
@section('content')
<style>
    .rte-modern.rte-desktop.rte-toolbar-default {
        min-width: auto;
    }
</style>

<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Apply Award Page</h4>
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
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Apply Award Page Information</h3>
                      </div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Success!</strong>apply award Page information updated successfull.
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

                <div class="form-group row custom_form_group{{ $errors->has('apply_form_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Apply Form Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="apply_form_title" value="{{ config('settings.apply_form_title') }}">
                      @if ($errors->has('apply_form_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('apply_form_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('apply_form_subtitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Apply Form Subtitle:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class="form-control" rows="4" name="apply_form_subtitle">{{ config('settings.apply_form_subtitle') }}</textarea>
                        @if ($errors->has('apply_form_subtitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('apply_form_subtitle') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('donate_button_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Donate Button Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="donate_button_title" value="{{ config('settings.donate_button_title') }}">
                      @if ($errors->has('donate_button_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('donate_button_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('donate_button_subtitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Donate Button Subtitle:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class="form-control" rows="4" name="donate_button_subtitle">{{ config('settings.donate_button_subtitle') }}</textarea>
                        @if ($errors->has('donate_button_subtitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('donate_button_subtitle') }}</strong>
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
