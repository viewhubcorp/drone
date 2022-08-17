<?php
namespace App\WayForPay;

class WFP {
    private $sum;
    private $currency;
    private $id;

    public function __construct($sum, $currency){
        $this->sum = $sum;
        $this->currency = $currency;
    }

    public function signature(string $id, string $date){
        $string = config("pay.way_for_pay.merchant_id") . ";" .
                config("pay.way_for_pay.merchant_domain") . ";" .
                $id . ";" .
                $date . ";" .
                $this->sum . ";" .
                $this->currency . ";" .
                "Payment for new IBUPROG" . ";" .
                "1" . ";" .
                $this->sum;
        $key = config("pay.way_for_pay.secret");
        return hash_hmac("md5",$string,$key);
    }

    public function uniqid(){
        return sha1(rand(0, 9999).uniqid().rand(0, 9999));
    }

    public function getId(){
        return $this->id;
    }

    public function create(){
        $id = $this->uniqid();
        $this->id = $id;
        $date = time();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.wayforpay.com/api', ['body'=>json_encode([
            "transactionType" => "CREATE_INVOICE",
            "merchantAccount" => config("pay.way_for_pay.merchant_id"),
            "merchantDomainName" => config("pay.way_for_pay.merchant_domain"),
            "merchantSignature" => $this->signature($id, $date),
            "apiVersion" => 1,
            "language" => "en",
            "serviceUrl" => config("pay.way_for_pay.callback"),
            "orderReference" => $id,
            "orderDate" => $date,
            "amount" => $this->sum,
            "currency" => $this->currency,
            "orderTimeout" => 86400,
            "productName" => ["Payment for new IBUPROG"],
            "productPrice" => [$this->sum],
            "productCount" => [1]
        ])]);

        if ($response->getBody()) {
            return json_decode($response->getBody(), true);
        } else {
            return false;
        }
    }
}
