<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $arpa = shell_exec('arp -a -i wlan0');
        $arpa = stristr($arpa, 'Type');
        $arpa = preg_replace("/\s+/", " ", $arpa);
        $arpat = explode(" ",$arpa);

        list($k,$v) = each($arpat);
        while (list($k, $v) = each($arpat)) {
            $ippp = $v;
            list($k, $v) = each($arpat);
            $iddd = $v;
            list($k, $v) = each($arpat);
            $typer = $v;
            if ($v && $iddd && ($typer != "invalid")) {
                $arpa_new_status[$iddd]['ip'] = $ippp;
            }
        }
        ksort($arpa_new_status);
        reset($arpa_new_status);
        foreach ($arpa_new_status as $mac => $values) {
            $ips_array[] = array("mac" => $mac, "ip" => $values['ip']);
        }
        print_r($ips_array);
    }

    function iwlist_parser(){
        $cmd = 'sudo echo -e "ctrl_interface=DIR=/var/run/wpa_supplicant GROUP=netdev\nupdate_config=1\n\nnetwork={\n\tbssid=\"MySSID1\"\n\tssid=\"MySSID1\"\n}" > /etc/wpa_supplicant/wpa_supplicant.conf';
    }

    function parseString( $string ){
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

    function parseScanAll(){
        return $this -> parseString( shell_exec( "iwlist scan 2> /dev/null" ));
    }

    function parseScanDev( $device ){
        return $this -> parseString( shell_exec( "sudo iwlist ".$device." scan 2> /dev/null" ));
    }

}
