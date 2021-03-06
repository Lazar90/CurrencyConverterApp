<?php

namespace App\Validation;

class Validate
{
    private $currencies = ['EUR', 'CAD', 'HKD', 'ISK', 'PHP', 'DKK', 'HUF', 'CZK', 'AUD', 'RON'
        , 'SEK', 'IDR', 'INR', 'BRL', 'RUB', 'HRK', 'JPY', 'THB', 'CHF', 'SGD', 'PLN'
        , 'BGN', 'TRY', 'CNY', 'NOK', 'NZD', 'ZAR', 'USD', 'MXN', 'ILS', 'GBP', 'KRW', 'MYR'
    ];

    public function currency($currency)
    {
        return in_array($currency, $this->currencies);
    }

    public function number($number)
    {
        return is_numeric($number);
    }

    public function date($date)
    {
        return boolval(strtotime($date));
    }
}