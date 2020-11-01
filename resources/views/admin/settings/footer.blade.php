@extends('layouts.admin')
@section('content')
<style>
    .rte-modern.rte-desktop.rte-toolbar-default {
        min-width: auto;
    }
</style>

<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Footer Section</h4>
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
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Footer Section Information</h3>
                      </div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Success!</strong>footer section information updated successfull.
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

                <div class="form-group row custom_form_group{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Subscribe Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="sub_title" value="{{ config('settings.sub_title') }}">
                      @if ($errors->has('sub_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('sub_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('sub_subtitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Subscribe Subtitle:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="sub_subtitle" value="{{ config('settings.sub_subtitle') }}">
                      @if ($errors->has('sub_subtitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('sub_subtitle') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('partner_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Partner Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="partner_title" value="{{ config('settings.partner_title') }}">
                      @if ($errors->has('partner_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('partner_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('aarvi_details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">AARVI Details:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class=" form-control" id="codeEditor" rows="9" name="aarvi_details">{{ config('settings.aarvi_details') }}</textarea>
                        @if ($errors->has('aarvi_details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('aarvi_details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('copyright') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Copyright:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="copyright" value="{{ config('settings.copyright') }}">
                      @if ($errors->has('copyright'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('copyright') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('reserved_by') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">All Rights Reserved :<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="reserved_by" value="{{ config('settings.reserved_by') }}">
                      @if ($errors->has('reserved_by'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('reserved_by') }}</strong>
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
