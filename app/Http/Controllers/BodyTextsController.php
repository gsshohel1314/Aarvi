<?php

namespace App\Http\Controllers;



use App\Body_text;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Session;
use Image;

class BodyTextsController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $page_data = [
            'body_texts' => Body_text::all()
        ];
        return view('admin.body_texts.update', $page_data);
    }

    public function update(Request $request)
    {
        $id = $request['id'];
        $body_texts = $request['body_text'];
        foreach ($id as $key => $value) {
            if (!empty($id[$key])) {
                $check_data = Body_text::where('id', $id[$key])->first();
                if (!empty($check_data)) {
                    $data = [];
                    if ($check_data->text != $body_texts[$key] && !empty($body_texts[$key])) {
                        $data['text'] = trim($body_texts[$key], ' ');
                        Body_text::where('id', $id[$key])->update($data);
                    }
                    $data = [];
                }
            }
        }
        Session::flash('success', 'Updated successfully');
        return redirect()->back();

    }
}


