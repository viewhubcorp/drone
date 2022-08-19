<?php

namespace App\Http\Controllers;

use App\Lib\Wifi;
use Illuminate\Http\Request;

class Setting extends Controller
{
    public function wifi_page(Request $req){
        $wifi = (new Wifi())->parseScanDev('wlan1');
        dd($wifi);
        return view('page.wifi', [
            'main_menu'=>['setting', 'wifi'],
            'network'=>(new Wifi())->parseScanDev('wlan1')
        ]);
    }
}
