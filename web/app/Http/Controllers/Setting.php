<?php

namespace App\Http\Controllers;

use App\Lib\Wifi;
use Illuminate\Http\Request;

class Setting extends Controller
{
    public function wifi_page(Request $req){
        $wifi = (new Wifi())->parseScanDev('wlan1');

        return view('page.wifi', [
            'main_menu'=>['setting', 'wifi'],
            'network'=>$wifi
        ]);
    }
}