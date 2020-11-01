@extends('layouts.admin')
@section('content')
<style>
    .rte-modern.rte-desktop.rte-toolbar-default {
        min-width: auto;
    }
</style>

<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">ALL Page Content</h4>
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
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update All Page Information</h3>
                      </div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Success!</strong>all Page information updated successfull.
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

                <div class="form-group row custom_form_group{{ $errors->has('vol_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Volunteer Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="vol_title" value="{{ config('settings.vol_title') }}">
                      @if ($errors->has('vol_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('vol_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('vol_details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Volunteer Details:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class="form-control" id="codeEditor" rows="9" name="vol_details">{{ config('settings.vol_details') }}</textarea>
                        @if ($errors->has('vol_details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('vol_details') }}</strong>
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
