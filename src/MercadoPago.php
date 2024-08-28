<?php

namespace App;


use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;



class MercadoPago
{
    private $_client;
    private $_options;

    public function __construct()
    {
        MercadoPagoConfig::setAccessToken("ACCESS_TOKEN");
        MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);

        $this->_client = new PreferenceClient();
        $this->_options = new RequestOptions();
        $this->_options->setCustomHeaders(["X-Idempotency-Key: <SOME_VALUE>"]);
    }

    public function paymentPreference()
    {
        $createRequest = [
            "external_reference" => 3,
            "notification_url" => "https://google.com",
            "items"=> array(
              array(
                "id" => "4567",
                "title" => "Dummy Title",
                "description" => "Dummy description",
                "picture_url" => "http://www.myapp.com/myimage.jpg",
                "category_id" => "eletronico",
                "quantity" => 1,
                "currency_id" => "BRL",
                "unit_price" => 15.0
              )
            ),
            "default_payment_method_id" => "master",
            "excluded_payment_types" => array(
              array(
                "id" => "ticket"
              )
            )
        ];

        try {

            $preference = $this->_client->create($createRequest);

            return $preference;

        } catch (MPApiException $e) {

            return $e->getMessage();

        }


    }
}

