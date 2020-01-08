<?php

namespace Ignacio\MercadoPago\Repositories;

use MercadoPago\{SDK, Payment};
use Ignacio\MercadoPago\Models\Pay;
use Ignacio\MercadoPago\Repositories\Interfaces\PayRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PayRepository implements PayRepositoryInterface{
     
     public function __construct(){
          SDK::setAccessToken(config('mercadopago.access_token'));
     }

     /**
      * Method pay 
      *
      * @param Pay $pay
      * @return void
      */
     public function pay(Pay $pay, String $accessToken = null) : Array{

          if($accessToken != null){
               try {
                    SDK::setAccessToken($accessToken);
               } catch (\Exception $e) {
                    return ['status' => 'error_access_token', 'errors' => ["Access Token incorrecto."]];
               }
          }

          $payment = new Payment([
               'token' => $pay->token,
               'external_reference' => $pay->external_reference,
               'statement_descriptor' => $pay->statement_descriptor,
               'payment_method_id' => $pay->payment_method_id,
               'transaction_amount' => (float) empty($pay->application_fee) ? $pay->transaction_amount : ($pay->transaction_amount + $pay->application_fee),
               'installments' => (Int) empty($pay->installments) ? 1 : $pay->installments,
               'payer' => array(
                    'email' => $pay->payer['email'],
                    'identification' => array(
                         "type" => $pay->payer['identification']['type'],
                         "number" => $pay->payer['identification']['number'],
                    )
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

          if(!empty($pay->application_fee)){
               $payment->application_fee = (float)$pay->application_fee;
          }

          $response = $payment->save();

          if($response){
               return ['status' => 'success', 'response' => $payment];
          }
          return ['status' => 'error', 'response' => $payment, 'errors' => $payment->error->causes];
     }
     
     /**
      * Get all info 
      *
      * @param String $id
      * @return Payment
      */
     public function get(String $id){
          return Payment::get($id);
     }

     /**
      * Generate random key
      *
      * @return String
      */
     public function generateRandomExternalReference() : String{
          return base64_encode(substr(Hash::make(Carbon::now()), 0, 16));
     }
}