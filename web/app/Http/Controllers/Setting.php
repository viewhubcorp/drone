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
        if($network) {
            foreach ($network as $key => $wifi) {
                if ($get_wpa_supplicant && $get_wpa_supplicant['bssid'] == $wifi['Address']) {
                    $network[$key]['now_connect'] = true;
                } else {
                    $network[$key]['now_connect'] = false;
                }

                $check = \App\Wifi::where('bssid', $wifi['Address'])->first();
                if (!is_null($check)) {
                    $network[$key]['save_connect'] = true;
                } else {
                    $network[$key]['save_connect'] = false;
                }

                if ($wifi['ESSID'] == '' || $wifi['Encryption key'] != 'on') {
                    unset($network[$key]);
                }
            }
        }

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

        $check = \App\Wifi::where('bssid', $bssid)->first();
        if(!is_null($check)){
            (new Wifi())->add_wpa_supplicant($check->essid, $check->bssid, $check->psk);
            (new Wifi())->wifi_reload();

            return redirect()->route('setting.wifi_page');
        }

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

    public function wifi_delete(Request $req, $bssid){
        $bssid[2]=':';
        $bssid[5]=':';
        $bssid[8]=':';
        $bssid[11]=':';
        $bssid[14]=':';

        $wifi = \App\Wifi::where('bssid', $bssid)->first();
        if(!is_null($wifi)){
            $wifi->delete();
        }

        $get_wpa_supplicant = (new Wifi())->get_wpa_supplicant();
        if($get_wpa_supplicant && $get_wpa_supplicant['bssid'] == $bssid){
            (new Wifi())->clean_wpa_supplicant();
            (new Wifi())->wifi_reload();
        }

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
