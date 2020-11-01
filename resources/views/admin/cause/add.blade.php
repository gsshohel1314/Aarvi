@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Cause</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Cause</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/cause/submit')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Add Cause Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/cause')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Cause</a>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div class="card-body card_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        @if(Session::has('success'))
                          <div class="alert alert-success alertsuccess" role="alert">
                             <strong>Successfully!</strong> add cause information.
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

                <div class="form-group row custom_form_group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Cause Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="title" value="{{old('title')}}">
                      @if ($errors->has('title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Cause Subtitle:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="subtitle" rows="3">{{old('subtitle')}}</textarea>
                      @if ($errors->has('subtitle'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('subtitle') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Cause Details<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <textarea class="wysihtml5 form-control" rows="9" name="details"></textarea>
                        @if ($errors->has('details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('country') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Cause Country:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="country" value="{{old('country')}}">
                      @if ($errors->has('country'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('country') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('date') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Cause Date:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="date" id="datePick" value="{{old('date')}}">
                      @if ($errors->has('date'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('date') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Cause Photo:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="image" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      @if ($errors->has('image'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('image') }}</strong>
                          </span>
                      @endif
                      <img id='img-upload'/>
                    </div>
                </div>
              </div>
              <div class="card-footer card_footer_button text-center">
                  <button type="submit" class="btn btn-primary waves-effect">UPLOAD</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
