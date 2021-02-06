<?php

namespace App\Controllers;

use App\Services\Currency;
use App\Validation\Validate;

class CurrencyConverterController extends Controller
{
    public function index($request, $response)
    {
        $requestedCurrency = $this->getRequestedName($request);

        $currency = new Currency($requestedCurrency);
        $rates = $currency->getRates();

        return $this->view->render($response, 'currency-converter/index.twig', compact(
            'rates',
                 'requestedCurrency'
        ));
    }

    protected function getRequestedName($request)
    {
        if (isset($request->getQueryParams()['currency'])) {
            $requestedCurrency = $request->getQueryParams()['currency'];
            $validate = new Validate();

            if ($validate->currency($requestedCurrency)) {
                return $requestedCurrency;
            }
        }

        return 'EUR';
    }



}