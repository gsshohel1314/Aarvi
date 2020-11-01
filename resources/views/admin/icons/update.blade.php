@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Body Image</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Body Image</a></li>
            <li class="active">Update</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form p-t-20" method="post" action="{{ url('dashboard/icons') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Body Image</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="card-body card_form" style="margin-left: 45px;">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-7">
                            @if(Session::has('success'))
                              <div class="alert alert-success alertsuccess" role="alert">
                                 <strong>Successfully!</strong> update body image.
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
                    <div class="row">
                        @if (!empty($body_texts))
                            @foreach ($body_texts as $body_text)
                                <input type="hidden" name="id[]" value="{{$body_text->id}}">
                                <div class="form-group row custom_form_group">
                                    <label class="col-sm-4 control-label">Image </label>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                          <span class="input-group-btn">
                                              <span class="btn btn-default btn-file btnu_browse">
                                                  Browse… <input type="file" name="icon[]" id="imgInp">
                                              </span>
                                          </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <img id='img-upload'/>
                                    </div>
                                    <div class="col-sm-2">
                                    <img class="img-thumbnail" src="{{url($body_text->image)}}" alt="logo" style="height: 50px;
                                    width: 100px; background-color: #d4cdcd;"/>

                                    </div>
                                </div>
                            @endforeach 
                        @endif
                    </div>
                </div>
                <div class="card-footer card_footer_button text-center">
                    <button type="submit" class="btn btn-primary waves-effect">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
