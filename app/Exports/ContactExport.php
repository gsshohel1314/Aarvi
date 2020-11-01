<?php

namespace App\Exports;

use App\Contactus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ContactExport implements FromView{

    public function view(): View{
        return view('admin.contactus.excel', [
          'all' => Contactus::where('conus_status',1)->orderBy('conus_id','DESC')->get(),
        ]);
    }
}
