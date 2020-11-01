@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Project</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Project</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/project/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Project Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/project')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Project</a>
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
                             <strong>Successfully!</strong> update project information.
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
                    <label class="col-sm-3 control-label">Project title:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <input type="hidden" name="id" value="{{$data->id}}">
                      <input type="text" class="form-control" name="title" value="{{$data->title}}">
                      @if ($errors->has('title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group {{ $errors->has('details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Project details<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class="wysihtml5 form-control" rows="9" name="details">{{$data->details}}</textarea>
                        @if ($errors->has('details'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('details') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Project start date<span class="req_star">*</span></label>
                    <div class="col-sm-4" >
                      <input type="text" class="form-control" name="start_date" id="startdate" value="{{$data->start_date}}">
                      @if ($errors->has('start_date'))
                        <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>
                
                <div class="form-group row custom_form_group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Project End date<span class="req_star">*</span></label>
                    <div class="col-sm-4" >
                      <input type="text" class="form-control" name="end_date" id="enddate" value="{{$data->end_date}}">
                      @if ($errors->has('end_date'))
                        <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>




                <div class="form-group row custom_form_group">
                    <label class="col-sm-3 control-label">Project Photo:<span class="req_star">*</span></label>
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
                            <img class="img-thumbnail" src="{{asset('uploads/project/'.$data->image)}}" alt="photo"/>
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
