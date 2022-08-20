<?php
namespace App\Lib;

class Wifi {
    private function parseString( $string ){
        if(empty($string)) return false;

        // Rueckgabe dieser Funktion:
        // $array[device][Cell#][Cell-Feld] = Wert
        // z.b. $array[eth0][1][ESSID] = "MGees_WLan"

        $ergebnis = array();

        $string = explode( "\n", $string );

        $device = $cell = "";

        foreach($string as $zeile){
            if(substr( $zeile, 0, 1 ) != ' '){
                $device = substr($zeile, 0, strpos($zeile, ' '));
                $ergebnis[$device] = array();
            }
            else{
                $zeile = trim($zeile);
                // Zeile kann sein:
                // Cell ## - Address: Wert
                // Feld:Wert
                // Quality=bla Signal Level=bla2
                if(substr($zeile, 0, 5) == 'Cell '){
                    $cell = (int)substr($zeile, 5, 2);
                    $ergebnis[$device][$cell] = array();
                    $doppelp_pos = strpos($zeile, ':');
                    $ergebnis[$device][$cell]['Address'] =
                        trim(substr($zeile, $doppelp_pos + 1));
                }
                elseif(substr($zeile, 0, 8) == 'Quality='){
                    $first_eq_pos = strpos($zeile, '=');
                    $last_eq_pos = strrpos($zeile, '=');
                    $slash_pos = strpos($zeile, '/') - $first_eq_pos;
                    $ergebnis[$device][$cell]['Quality'] =
                        trim(substr($zeile, $first_eq_pos + 1, $slash_pos - 1));
                    $ergebnis[$device][$cell]['Signal level'] =
                        trim(substr($zeile, $last_eq_pos + 1));
                }
                else{
                    $doppelp_pos = strpos($zeile, ':');
                    $feld = trim( substr( $zeile, 0, $doppelp_pos ) );
                    if(!empty($ergebnis[$device][$cell][$feld]))
                        $ergebnis[$device][$cell][$feld] .= "\n";
                    // Leer- und "-Zeichen rausschmeissen - ESSID steht immer in ""
                    @$ergebnis[$device][$cell][$feld] .=
                        trim(str_replace('"', '', substr($zeile, $doppelp_pos + 1)));
                }
            }
        }
        return $ergebnis;
    }

    public function parseScanDev( $device ){
        return $this -> parseString( shell_exec( "sudo iwlist ".$device." scan" ));
    }

    public function add_wpa_supplicant($essid, $bssid, $psk){
        return shell_exec( 'echo "ctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev\nupdate_config=1\ncountry=RU\n\nnetwork={\n\t#|||canaveral_generate|||'.$essid.'|||next_io|||'.$bssid.'|||next_io|||'.$psk.'|||canaveral_generate|||\n\tbssid='.$bssid.'\n\tpsk=\"'.$psk.'\"\n\tkey_mgmt=WPA-PSK\n}" | sudo tee /etc/wpa_supplicant/wpa_supplicant.conf' );
    }

    public function clean_wpa_supplicant(){
        return shell_exec( 'echo "ctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev\nupdate_config=1" | sudo tee /etc/wpa_supplicant/wpa_supplicant.conf' );
    }

    public function get_wpa_supplicant(){
        $exp = explode('|||canaveral_generate|||', shell_exec('sudo cat /etc/wpa_supplicant/wpa_supplicant.conf'));
        if(count($exp) == 1){
            return false;
        }else{
            $result = explode('|||next_io|||', $exp[1]);
            return [
                'essid'=>$result[0],
                'bssid'=>$result[1],
                'psk'=>$result[2]
            ];
        }
    }

    public function check_connection(){
        #wlan1     ESSID:"Dikiy_derzkiy"
        $ret = shell_exec( 'sudo iwgetid' );
        if(empty($ret)){
            return '';
        }else{
            dd(rtrim(explode('ESSID:"', $ret)[1],"\"\n"));
            return rtrim(explode('ESSID:"', $ret)[1],'"');
        }
    }

    public function wifi_status(){
        if (strpos(shell_exec( 'sudo ifconfig'), 'wlan1: ') === false) {
            return false;
        } else {
            return true;
        }
    }

    public function wifi_on(){
        return shell_exec( 'sudo ifconfig wlan1 up' );
    }

    public function wifi_off(){
        return shell_exec( 'sudo ifconfig wlan1 down' );
    }

    public function wifi_reload(){
        return shell_exec( 'sudo wpa_cli -i wlan1 reconfigure' );
    }

}
