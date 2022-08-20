<?php

namespace App\Http\Controllers;

use App\Lib\Wifi;
use Illuminate\Http\Request;

class Setting extends Controller
{
    public function wifi_page(Request $req){
        return view('page.wifi', [
            'main_menu'=>['setting', 'wifi'],
            'network'=>(new Wifi())->parseScanDev('wlan1')['wlan1']
        ]);
    }

    public function wifi_bssid(Request $req, $bssid){
        $bssid[2]=':';
        $bssid[5]=':';
        $bssid[8]=':';
        $bssid[11]=':';
        $bssid[14]=':';
        dd($bssid);
    }
}
