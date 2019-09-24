<?php

namespace Ignacio\MercadoPago\Repositories;

use MercadoPago;

class MercadoPagoRepository{
     public function save($mp){
          MercadoPago\SDK::setAccessToken(config("mercadopago.access_token"));
          $payment = new MercadoPago\Payment();
          $payment->transaction_amount = 2000;
          dd($payment);
     }
}