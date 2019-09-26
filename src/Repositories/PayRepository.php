<?php

namespace Ignacio\MercadoPago\Repositories;

use MercadoPago\{SDK, Payment};
use Ignacio\MercadoPago\Models\Pay;

class PayRepository{

     public function __construct(){
          SDK::setAccessToken(config('mercadopago.access_token'));
     }

     /**
      * Method pay 
      *
      * @param Pay $pay
      * @return void
      */
     public function pay(Pay $pay){
          $payment = new Payment([
               'token' => $pay->token,
               'external_reference' => $pay->external_reference,
               'statement_descriptor' => $pay->statement_descriptor,
               'payment_method_id' => $pay->payment_method_id,
               'transaction_amount' => $pay->transaction_amount,
               'installments' => $pay->installments,
               'payer' => array(
                    'email' => $pay->payer['email'],
               ),
               'additional_info' => array(
                    'payer' => array(
                         'first_name' => $pay->additional_info['payer']['first_name'],
                         'last_name' => $pay->additional_info['payer']['last_name'],
                         'phone' => array(
                              'area_code' => $pay->additional_info['payer']['phone']['area_code'],
                              'number' => $pay->additional_info['payer']['phone']['number']
                         ),
                    ),
                    'items' => $pay->additional_info['items']
               )
          ]);

          $payment->save();
          dd($payment);
     }
}