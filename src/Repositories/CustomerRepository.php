<?php

namespace Ignacio\MercadoPago\Repositories;

use MercadoPago\{SDK, Customer, Card};
use Ignacio\MercadoPago\Models\{ClientCustomer, ClientCard};
use Ignacio\MercadoPago\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface{
     
     public function __construct(){
          SDK::setAccessToken(config('mercadopago.access_token'));
     }

     /**
      * Method create customer
      *
      * @param Customer $customer
      * @return bool
      */
     public function create(ClientCustomer $clientCustomer) : Array{
          $customer = new Customer();
          $customer->email = $clientCustomer->email;
          $customer->first_name = $clientCustomer->first_name;
          $customer->last_name = $clientCustomer->last_name;
          $customer->phone = $clientCustomer->phone;
          $response = $customer->save();

          if($response){
               return ['status' => 'success', 'response' => $customer];
          }
          return ['status' => 'error', 'response' => $customer, 'errors' => $customer->error->causes];
     }

     /**
      * Method add card in customer
      *
      * @return Array
      */
     public function addCard(String $customer_id, ClientCard $clientCard) : Array{
          $customer = Customer::find_by_id($clientCard->customer_id);
          
          if(empty($customer)){
               return ['status' => 'error', 'response' => 400, 'errors' => "No se encontro el customer."];
          }

          $card = new Card();
          $card->token = $clientCard->token;
          $card->customer_id = $customer->id;
          $response = $card->save();

          if($response){
               return ['status' => 'success', 'response' => $card];
          }
          return ['status' => 'error', 'response' => $card, 'errors' => $card->error->causes];   
     }
}