<?php

namespace App\Http\Controllers;



use App\Icon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Session;
use Image;

class IconsController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $page_data = [
            'body_texts' => Icon::all()
        ];
        return view('admin.icons.update', $page_data);
    }

    public function update(Request $request)
    {
        $id = $request['id'];
        $body_texts = $request['icon'];
        foreach ($id as $key => $value) {
            if (!empty($id[$key])) {
                $check_data = Icon::where('id', $id[$key])->first();
                if (!empty($check_data)) {
                    if (!empty($body_texts[$key]) && $check_data->image != $body_texts[$key]) {
                        if($request['icon'][$key]) {
                            $icon = $request->file('icon')[$key];
                            $extension = $icon->getClientOriginalExtension();
                            $name = explode('.',$check_data->image);
                            $file_name = $name[0];
                            $image_name = $file_name.'.'.$extension;
                            $data['image'] = $image_name;
                            Icon::where('id', $id[$key])->update($data);
                            move_uploaded_file($_FILES['icon']['tmp_name'][$key], $image_name);
                        }
                    }
                }
            }
        }
        Session::flash('success', 'Updated successfully');
        return redirect()->back();

    }
}


