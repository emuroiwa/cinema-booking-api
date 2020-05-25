<?php


namespace App\Billing;


use Illuminate\Support\Str;

class PaymentGatway
{
    private $currency;

    public function __construct($currency)
    {
        $this->currency = $currency;
    }

    public  function  charge($amount)
    {
        return [
            "price" => $amount,
            "confirmation_number" => Str::random(10),
            "currency" => $this->currency

        ];
    }
}
