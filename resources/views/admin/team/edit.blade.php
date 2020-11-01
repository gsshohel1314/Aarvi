@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Team</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Team</a></li>
            <li class="active">Add</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/team/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Team Member Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/team')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Team</a>
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
                             <strong>Successfully!</strong> update team member information.
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

                <div class="form-group row custom_form_group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Member Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <input type="hidden" name="id" value="{{$data->id}}"/>
                      <input type="text" class="form-control" name="name" value="{{$data->name}}">
                      @if ($errors->has('name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('tcate_id') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Team Category:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control" name="tcate_id">
                          <option value="">Select Team Category</option>
                          @foreach ($teamCategories as $value)
                            <option value="{{$value->tcate_id}}" @if($value->tcate_id==$data->tcate_id) selected @endif >{{$value->tcate_name}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('tcate_id'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('tcate_id') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('designation') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Member Designation:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="designation" value="{{$data->designation}}">
                      @if ($errors->has('designation'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('designation') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('t_name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Team Name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="t_name" value="{{$data->t_name}}">
                      @if ($errors->has('t_name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('t_name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Member Email:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control" name="email" value="{{$data->email}}">
                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Member Phone:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="phone" value="{{$data->phone}}">
                      @if ($errors->has('phone'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('phone') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('blood_group') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Member Bood Group:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control" name="blood_group">
                          <option value="">Select Blood Group</option>
                          @foreach ($bloods as $value)
                            <option value="{{$value->id}}" @if($value->id==$data->blood_group) selected @endif >{{$value->name}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('blood_group'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('blood_group') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('blood_donor') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Is Blood Donor:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <input type="radio" id="yes" name="blood_donor" value="1" {{ ($data->blood_donor=="1")? "checked" : "" }}>
                        <label for="yes">Yes</label><br>
                        <input type="radio" id="no" name="blood_donor" value="0" {{ ($data->blood_donor=="0")? "checked" : "" }}>
                        <label for="no">No</label><br>
                      @if ($errors->has('blood_group'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('blood_group') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('membership_status') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Member Status:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <input type="radio" id="active" name="membership_status" value="1" {{ ($data->membership_status=="1")? "checked" : "" }}>
                        <label for="active">Active</label><br>
                        <input type="radio" id="inactive" name="membership_status" value="0" {{ ($data->membership_status=="0")? "checked" : "" }}>
                        <label for="inactive">In-active</label><br>
                      @if ($errors->has('membership_status'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('membership_status') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Membership start_date<span class="req_star">*</span></label>
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
                    <label class="col-sm-3 control-label">Membership end date<span class="req_star">*</span></label>
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
                    <label class="col-sm-3 control-label">Member Photo:<span class="req_star">*</span></label>
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
                            <img class="img-thumbnail" src="{{asset('uploads/team/'.$data->image)}}" alt="photo"/>
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
