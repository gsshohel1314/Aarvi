
<?php
use App\Body_text;
use App\Icon;
date_default_timezone_set("Asia/Dhaka");

if ( ! function_exists('getPhrase'))
{
    function getPhrase($phrase) {
        $body_text	=	Body_text::where('phrase',$phrase)->first();
        if (empty($body_text)){
            $text = str_replace('_',' ',$phrase);
            Body_text::create([
                'phrase'    =>$phrase,
                'text'   =>$text,
            ]);
            return str_replace('_',' ',$phrase);
        }else{
           return str_replace('_',' ',$body_text->text);
        }
    }
}

if ( ! function_exists('getImage'))
{
    function getImage($phrase) {
        $icon	=	Icon::where('phrase',$phrase)->first();
        if (empty($icon)){
            Icon::create([
                'phrase'    =>$phrase,
                'image'   =>$phrase,
            ]);
            return url($phrase);
        }else{
            return url($phrase);
        }
    }
}
if ( ! function_exists('imageUpload'))
{
    function imageUpload($request, $image, $path, $image_name=''){
        if (!empty($image_name)){
            if ($request->file($image)) {
                unlink_image($image_name);
                $name = $request->file($image)->store('public/'.$path);
                return $name;
            }else{
                return $image_name;
            }
        }
        if (empty($image_name)){
            if ($request->file($image)) {
                $name = $request->file($image)->store('public/'.$path);
                return $name;
            }
        }
    }
}
