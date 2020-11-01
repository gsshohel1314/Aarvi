@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Fund</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Fund</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/fund/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Fund Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/fund')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Fund</a>
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
                             <strong>Successfully!</strong> update Fund information.
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
                    <label class="col-sm-3 control-label">fund title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <input type="hidden" name="id" value=" {{$data->id}} ">
                      <input type="text" class="form-control" name="title" value="{{$data->title}}">
                      @if ($errors->has('title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Fund Details<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <textarea class="wysihtml5 form-control" rows="9" name="details">{{$data->details}}</textarea>
                        @if ($errors->has('details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('fun_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Fundraise Title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="fun_title" value="{{$data->fun_title}}">
                      @if ($errors->has('fun_title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('fun_title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('fun_details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Fundraise Details<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class="wysihtml5 form-control" rows="9" name="fun_details">{{$data->fun_details}}</textarea>
                        @if ($errors->has('fun_details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('fun_details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Image:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="image" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      <img id='img-upload'/>
                    </div>
                    <div class="col-sm-2">
                        @if($data->image!='')
                            <img class="img-thumbnail" src="{{asset('uploads/fund/'.$data->image)}}" alt="photo"/>
                        @else
                            <img class="img-thumbnail" src="{{asset('uploads')}}/no-image-big.jpg" alt="photo"/>
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
