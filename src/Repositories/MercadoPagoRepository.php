<?php

namespace Ignacio\MercadoPago\Repositories;

use MercadoPago;

class MercadoPagoRepository{
     public function getPaymentMethdos(){
          MercadoPago\SDK::setAccessToken(config("mercadopago.access_token"));
          return MercadoPago\SDK::get("/v1/payment_methods");
     }
}