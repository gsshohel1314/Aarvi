@extends('layouts.admin')
@section('content')
<div class="row bread_part">
    <div class="col-sm-12 bread_col">
        <h4 class="pull-left page-title bread_title">Volunteer History</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Volunteer History</a></li>
            <li class="active">View</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title card_top_title"><i class="fa fa-gg-circle"></i> View Volunteer History Information</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{url('dashboard/volunteer-history')}}" class="btn btn-md btn-primary waves-effect card_top_button"><i class="fa fa-th"></i> All Volunteer History</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped table-hover custom_view_table">
                            <tr>
                                <td>Volunteer History Title</td>
                                <td>:</td>
                                <td>{{$data->title}}</td>
                            </tr>
                            <tr>
                                <td>Volunteer History Details</td>
                                <td>:</td>
                                <td>{!! $data->details !!}</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>:</td>
                                <td>
                                    @if($data->image!='')
                                        <img class="table_image_ban_big" src="{{asset('uploads/volunteer_history/'.$data->image)}}" alt="image"/>
                                    @else
                                        <img class="table_image_ban_big" src="{{asset('uploads')}}/no-image-big.jpg" alt="image"/>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Upload Time</td>
                                <td>:</td>
                                <td>{{$data->created_at->format('d-m-Y | h:i:s a')}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer card_footer_expode">
                <a href="#" class="btn btn-secondary waves-effect">PRINT</a>
                <a href="#" class="btn btn-warning waves-effect">EXCEL</a>
                <a href="#" class="btn btn-success waves-effect">PDF</a>
            </div>
        </div>
    </div>
</div>
@endsection
