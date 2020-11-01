@extends('layouts.website')
@section('content')
<section class="others_banner_part" id="others_banner_sec">
    <div class="ovelay_others_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_others_content text-center">
                        <h1>Instagrams</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="video_main_part py_90" id="video_main_sec">
    <div class="container">
        <div class="row">
            <div id="instagram-feed-demo" class="instagram_feed"></div>
        </div>
    </div>
</section>
<script src="{{asset('contents/website')}}/instagram/jquery.instagramFeed.min.js"></script>
<script>
    (function($){
        $(window).on('load', function(){
            $.instagramFeed({
                'username': 'instagram_username',
                'container': "#instagram-feed-demo",
                'display_profile': false,
                'display_biography': true,
                'display_gallery': true,
                'callback': null,
                'styling': true,
                'items': 8,
                'items_per_row': 4,
                'margin': 1,
                'lazy_load': true 
            });
        });
    })(jQuery);
</script>
@endsection
