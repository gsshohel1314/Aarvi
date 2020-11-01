@extends('layouts.admin')
@section('content')
<style>
    #hidden_div {
        display: none;
    }
</style>
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Partner</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Partner</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="{{url('dashboard/partner/update')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-8">
                          <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Partner Information</h3>
                      </div>
                      <div class="col-md-4 text-right">
                          <a href="{{url('dashboard/partner')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Partner</a>
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
                             <strong>Successfully!</strong> update partner information.
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

                <div class="form-group row custom_form_group{{ $errors->has('partner_type') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Partner Type:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <select class="form-control" name="partner_type">
                          <option value="">Select Partner Type</option>
                          @foreach ($partnerCategories as $value)
                            <option value="{{$value->pcate_id}}" @if($value->pcate_id==$data->partner_type) selected @endif >{{$value->pcate_name}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('partner_type'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('partner_type') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('partner_name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Partner name:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                        <input type="hidden" name="id" value="{{$data->partner_id}}"/>
                        <input type="hidden" name="slug" value="{{$data->partner_slug}}"/>
                      <input type="text" class="form-control" name="partner_name" value="{{$data->partner_name}}">
                      @if ($errors->has('partner_name'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('partner_name') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>
                <div class="form-group row custom_form_group{{ $errors->has('partner_url') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Partner Website:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="partner_url" value="{{$data->partner_url}}">
                      @if ($errors->has('partner_url'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('partner_url') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('partner_address') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Contact Information:<span class="req_star">*</span></label>
                    <div class="col-sm-7">
                    <textarea class="form-control" rows="3" name="partner_address">{{$data->partner_address}}</textarea>

                        @if ($errors->has('partner_address'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('partner_address') }}</strong>
                          </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('pic') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Partner Logo:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file btnu_browse">
                                  Browse… <input type="file" name="pic" id="imgInp">
                              </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                      </div>
                      @if ($errors->has('pic'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('pic') }}</strong>
                          </span>
                      @endif
                      <img id='img-upload'/>
                    </div>
                    <div class="col-sm-2">
                        @if($data->partner_logo!='')
                            <img class="img-thumbnail" src="{{asset('uploads/partner/'.$data->partner_logo)}}" alt="logo"/>
                        @else
                            <img class="img-thumbnail" src="{{asset('uploads')}}/no-image-big.jpg" alt="logo"/>
                        @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Partnership start date<span class="req_star">*</span></label>
                    <div class="col-sm-4" >
                      <input type="text" class="form-control" name="start_date" id="partnerstartdate" value="{{$data->start_date}}">
                      @if ($errors->has('start_date'))
                        <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>
                
                <div class="form-group row custom_form_group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Partnership end date<span class="req_star">*</span></label>
                    <div class="col-sm-4" >
                      <input type="text" class="form-control" name="end_date" id="partnerenddate" value="{{$data->end_date}}">
                      @if ($errors->has('end_date'))
                        <span class="invalid-feedback mb-0" role="alert">
                                <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>

                <div class="form-group row custom_form_group{{ $errors->has('payment_condition') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Payment Type:<span class="req_star">*</span></label>
                    <div class="col-sm-4">
                      <select id="payment_id" class="form-control" name="payment_condition" onchange="showDiv('hidden_div', this)">
                          <option value="">Select Payment Condition</option>
                          <option {{($data->payment_condition=='1')?'selected':''}} value="1">Yes</option>
                          <option {{($data->payment_condition=='0')?'selected':''}}  value="0">No</option>
                      </select>
                      @if ($errors->has('payment_condition'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('payment_condition') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div id="hidden_div">
                    <div class="form-group row custom_form_group{{ $errors->has('payment_comment') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Payment Description<span class="req_star">*</span></label>
                        <div class="col-sm-7" >
                        <textarea class="form-control" rows="4" name="payment_comment">{{$data->payment_comment}}</textarea>

                        @if ($errors->has('payment_comment'))
                            <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('payment_comment') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="form-group row custom_form_group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
                        <label class="col-sm-3 control-label">Payment Date<span class="req_star">*</span></label>
                        <div class="col-sm-4" >
                        <input type="text" class="form-control" name="payment_date" id="payment_date" value="{{$data->payment_date}}">
                        @if ($errors->has('payment_date'))
                            <span class="invalid-feedback mb-0" role="alert">
                                    <strong>{{ $errors->first('payment_date') }}</strong>
                            </span>
                        @endif
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

<script>
    function showDiv(divId, element)
    {
        document.getElementById(divId).style.display = element.value == '1' ? 'block' : 'none';
    }

    $(document).ready(function(){
        var value = $('#payment_id').val();
        showDivTest('hidden_div', value);
    });

    function showDivTest(divId, element)
    {
        if (element =='1'){
            $('#'+divId).css('display','block');
        }else{
            $('#'+divId).css('display','none');
        }
    }
</script>
@endsection
