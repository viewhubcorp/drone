<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Setting extends Controller
{
    public function wifi_page(Request $req){
        return view('page.wifi');
    }
}
