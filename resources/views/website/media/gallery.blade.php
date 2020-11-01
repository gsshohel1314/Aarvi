@extends('layouts.website')
@section('content')
<section class="others_banner_part" id="others_banner_sec">
    <div class="ovelay_others_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_others_content text-center">
                        <h1>Photos</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumb_section">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Media</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Gallery</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery_main_part py_90" id="gallery_main_sec">
    <div class="container">
        <div class="row">
            @php
                $allGalCate=App\GalleryCategory::where('gcate_status',1)->orderBy('gcate_id','ASC')->get();
            @endphp
            <div class="col-12 text-center">
                <div id="filters" class="button-group"> <button class="button is-checked" data-filter="*">All</button>
                    @foreach($allGalCate as $gcate)
                    <button class="button" data-filter=".gcate{{$gcate->gcate_id}}">{{$gcate->gcate_name}}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-12">
                <div class="row grid">
                    @php
                        $allGal=App\Gallery::where('gallery_status',1)->orderBy('gallery_id','DESC')->get();
                    @endphp
                    @foreach($allGal as $gal)
                    <div class="element-item gcate{{$gal->gcate_id}} col-md-4 col-sm-6 col-lg-4 col-12" data-category="gcate{{$gal->gcate_id}}">
                        <div class="gly_img">
                            <img src="{{asset('uploads/gallery/'.$gal->gallery_photo)}}" alt="" class="img-fluid">
                            <div class="overlay_gallery">
                                <a class="venobox" data-gall="gallery01" href="{{asset('uploads/gallery/'.$gal->gallery_photo)}}">
                                    <i class="fas fa-search-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
