<?php

namespace Ignacio\MercadoPago\Repositories;

use MercadoPago\{SDK};

class MethodRepository
{

     const URI = '/v1/payment_methods';

     public function __construct()
     {
          SDK::setAccessToken(config("mercadopago.access_token"));
     }

     /**
      * Get all payment methods
      *
      * @return void
      */
     public function getAll()
     {
          $response = SDK::get(self::URI);
          if ($response['code'] != 200) {
               return null;
          }
          return $response['body'];
     }
}
