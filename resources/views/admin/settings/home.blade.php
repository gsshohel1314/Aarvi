@extends('layouts.admin')
@section('content')
<style>
    .rte-modern.rte-desktop.rte-toolbar-default {
        min-width: auto;
    }
</style>

<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Home Page</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Home</li>
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
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Home Page Information</h3>
                      </div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Success!</strong>home Page information updated successfull.
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
                <div class="form-group row custom_form_group{{ $errors->has('founder_name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Founder Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="founder_name" value="{{ config('settings.founder_name') }}">
                      @if ($errors->has('founder_name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('founder_name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('founder_desig') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Founder Designation:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="founder_desig" value="{{ config('settings.founder_desig') }}">
                      @if ($errors->has('founder_desig'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('founder_desig') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('founder_message_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Founder Message Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="founder_message_title" value="{{ config('settings.founder_message_title') }}">
                      @if ($errors->has('founder_message_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('founder_message_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('institution_name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Institution Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="institution_name" value="{{ config('settings.institution_name') }}">
                      @if ($errors->has('institution_name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('institution_name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('founder_message') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Funder Message:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class=" form-control" id="codeEditor" rows="9" name="founder_message">{{ config('settings.founder_message') }}</textarea>
                        @if ($errors->has('founder_message'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('founder_message') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Founder Image:</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="founder_image" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      <img id='img-upload'/>
                    </div>
                    <div class="col-sm-2">
                        <img class="img-thumbnail" src="{{ URL::to(config('settings.founder_image')) }}"/>
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('miss_head_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Mission Head Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="miss_head_title" value="{{ config('settings.miss_head_title') }}">
                      @if ($errors->has('miss_head_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('miss_head_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('miss_head_subtitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Mission Head Subtitle:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="miss_head_subtitle" value="{{ config('settings.miss_head_subtitle') }}">
                      @if ($errors->has('miss_head_subtitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('miss_head_subtitle') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('spon_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Sponsor Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="spon_title" value="{{ config('settings.spon_title') }}">
                      @if ($errors->has('spon_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('spon_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('spon_subtitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Sponsor Subtitle:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="spon_subtitle" value="{{ config('settings.spon_subtitle') }}">
                      @if ($errors->has('spon_subtitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('spon_subtitle') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('spon_details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Sponsor Details:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class=" form-control" id="codeEditor2" rows="9" name="spon_details">{{ config('settings.spon_details') }}</textarea>
                        @if ($errors->has('spon_details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('spon_details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Sponsor Image:</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="spon_image" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      <img id='img-upload'/>
                    </div>
                    <div class="col-sm-2">
                        <img class="img-thumbnail" src="{{ URL::to(config('settings.spon_image')) }}"/>
                    </div>
      
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('spon_url') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Sponsor Video Url:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="spon_url" value="{{ config('settings.spon_url') }}">
                      @if ($errors->has('spon_url'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('spon_url') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('prog_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Program Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="prog_title" value="{{ config('settings.prog_title') }}">
                      @if ($errors->has('prog_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('prog_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('prog_subtitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Program Subtitle:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="prog_subtitle" value="{{ config('settings.prog_subtitle') }}">
                      @if ($errors->has('prog_subtitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('prog_subtitle') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('prog_details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Program Details:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class="form-control" id="codeEditor3" rows="9" name="prog_details">{{ config('settings.prog_details') }}</textarea>
                        @if ($errors->has('prog_details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('prog_details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Program Image:</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="prog_image" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      <img id='img-upload'/>
                    </div>
                    <div class="col-sm-2">
                        <img class="img-thumbnail" src="{{ URL::to(config('settings.prog_image')) }}"/>
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('cause_head_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Recent Case Head Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="cause_head_title" value="{{ config('settings.cause_head_title') }}">
                      @if ($errors->has('cause_head_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('cause_head_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('cause_head_subtitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Recent Case Head Subtitle:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="cause_head_subtitle" value="{{ config('settings.cause_head_subtitle') }}">
                      @if ($errors->has('cause_head_subtitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('cause_head_subtitle') }}</strong>
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
