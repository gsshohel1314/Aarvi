<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Image;
use Auth;
use Config;
use Schema;
use Session;
class SettingController extends Controller
{
    public function __construct()
    {

    }
    public function all()
    {
        return view('admin.settings.all');
    }

    public function home()
    {
        return view('admin.settings.home');
    }
    
    public function about()
    {
        return view('admin.settings.about');
    }
    
    public function volunteer()
    {
        return view('admin.settings.volunteer');
    }

    public function career()
    {
        return view('admin.settings.career');
    }

    public function fundrise()
    {
        return view('admin.settings.fundrise');
    }
    
    public function apply()
    {
        return view('admin.settings.apply');
    }
    
    public function contactus()
    {
        return view('admin.settings.contactus');
    }
    
    public function footer()
    {
        return view('admin.settings.footer');
    }

    public function update(Request $request)
    {
        if ($request->has('founder_image') && ($request->file('founder_image'))) {

            if (config('settings.founder_image') != null) {
                unlink(config('settings.founder_image'));
            }
            $setting= new Setting;
            $image =$request->founder_image;
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(369,391)->save('uploads/home-page/'.$image_name);
            $final ='uploads/home-page/'.$image_name;
            Setting::set('founder_image', $final);
        }
        elseif ($request->has('spon_image') && ($request->file('spon_image'))) {

            if (config('settings.spon_image') != null) {
                unlink(config('settings.spon_image'));
            }
            $setting= new Setting;
            $image =$request->spon_image;
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1000,667)->save('uploads/home-page/'.$image_name);
            $final ='uploads/home-page/'.$image_name;
            Setting::set('spon_image', $final);
        }
        elseif ($request->has('prog_image') && ($request->file('prog_image'))) {

            if (config('settings.prog_image') != null) {
                unlink(config('settings.prog_image'));
            }
            $setting= new Setting;
            $image =$request->prog_image;
            $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(875, 404)->save('uploads/home-page/'.$image_name);
            $final ='uploads/home-page/'.$image_name;
            Setting::set('prog_image', $final);
        }
        else {
            $keys = $request->except('_token');

            foreach ($keys as $key => $value)
            {
             Setting::set($key, $value);
            }
        }

        Session::flash('success','value');
        return redirect()->back();
        Session::flash('error','value');
        return redirect()->back();
    }

}
