<?php

namespace App\Http\Controllers;

use App\Lib\Wifi;
use Illuminate\Http\Request;

class Setting extends Controller
{
    public function wifi_page(Request $req){
        $wifi_status = (new Wifi())->wifi_status();
        if(!$wifi_status){
            return view('page.wifi', [
                'main_menu'=>['setting', 'wifi'],
                'wifi'=>false
            ]);
        }
        $check_connection = (new Wifi())->check_connection();
        $get_wpa_supplicant = (new Wifi())->get_wpa_supplicant();
        $network = (new Wifi())->parseScanDev('wlan1')['wlan1'];
        return view('page.wifi', [
            'main_menu'=>['setting', 'wifi'],
            'wpa_supplicant'=>$get_wpa_supplicant,
            'check_connection'=>$check_connection,
            'network'=>$network,
            'wifi'=>true
        ]);
    }

    public function wifi_bssid(Request $req, $bssid){
        $bssid[2]=':';
        $bssid[5]=':';
        $bssid[8]=':';
        $bssid[11]=':';
        $bssid[14]=':';

        $network = (new Wifi())->parseScanDev('wlan1')['wlan1'];
        $essid = '';
        $check = 0;
        foreach($network as $wifi){
            if($wifi['Address'] == $bssid){
                $essid = $wifi['ESSID'];
                $check = 1;
                break;
            }
        }
        if($check == 0){
            return redirect()->route('setting.wifi_page');
        }

        return view('page.wifi_connect', [
            'essid'=>$essid,
            'bssid'=>$bssid
        ]);

        dd($bssid);
    }

    public function wifi_connect(Request $req){
        $wifi = new \App\Wifi();
        $wifi->bssid = $req->get('bssid');
        $wifi->essid = $req->get('essid');
        $wifi->psk = $req->get('psk');
        $wifi->connect = true;
        $wifi->save();

        (new Wifi())->add_wpa_supplicant($req->get('essid'), $req->get('bssid'), $req->get('psk'));
        (new Wifi())->wifi_reload();

        return redirect()->route('setting.wifi_page');
    }

    public function wifi_disconnect(Request $req){
        (new Wifi())->clean_wpa_supplicant();
        (new Wifi())->wifi_reload();
        return redirect()->route('setting.wifi_page');
    }

    public function wifi_on(Request $req){
        (new Wifi())->wifi_on();
        return redirect()->back();
    }

    public function wifi_off(Request $req){
        (new Wifi())->wifi_off();
        return redirect()->back();
    }
}
