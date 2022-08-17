<?php
namespace App\Wallet;

class Validate {
    private $number;

    public function __construct($number){
        $this->number=$number;
    }

    private function searchZero($str){
        $arr = str_split(strval($str));
        if($arr[0] == '0'){
            return false;
        }
        return true;
    }

    public function validate(){
        $sum = explode('.', $this->number);
        if(count($sum) == 1){
            if(count(str_split(strval($this->number)))<1){
//                echo 1;
                return false;
            }
            if(!$this->searchZero($this->number)){
//                echo 2;
                return false;
            }
//            echo 3;
            return is_numeric($this->number);
        }
        if(count($sum) == 2){
            if(!preg_match("/^-?[0-9]+(?:\.[0-9]{1,2})?$/", $this->number)){
//                echo 4;
                return false;
            }
            if(count(str_split(strval($sum[0])))<1){
//                echo 5;
                return false;
            }
            if(!$this->searchZero($sum[0]) && count(str_split(strval($sum[0])))>1){
//                echo 6;
                return false;
            }
            if(!is_numeric($sum[0])){
//                echo 7;
                return false;
            }

            $count_str = count(str_split(strval($sum[1])));

            if($count_str<0 || $count_str>2){
//                echo 8;
                return false;
            }

            foreach(str_split(strval($sum[1])) as $digit){
                if(!in_array($digit, [0, 1, 2, 3, 4, 5, 6, 7, 8, 9])){
//                    echo 9;
                    return false;
                }
            }

//            echo 10;
            return is_numeric($sum[1]);

        }
    }
}