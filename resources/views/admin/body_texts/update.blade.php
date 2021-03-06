@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">All Body Text</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Body Text</a></li>
            <li class="active">Update</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form p-t-20" method="post" action="{{ url('dashboard/body_texts') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> Update Body Text</h3>
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
                                 <strong>Successfully!</strong> save body text.
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <textarea type="text" name="body_text[]"  style="width: 100% !important; resize: block;" class="form-control" required>{{$body_text->text}}</textarea>
                                        <input type="hidden" name="id[]" value="{{$body_text->id}}">
                                    </div>
                                </div>
                            @endforeach @endif
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
