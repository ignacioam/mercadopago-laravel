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
      * Create customer
      *
      * @param Customer $customer
      * @return bool
      */
     public function create(ClientCustomer $clientCustomer) : Array{

          $customer = new Customer();
          $customer->email = $clientCustomer->email;
          $customer->first_name = $clientCustomer->first_name;
          $customer->last_name = $clientCustomer->last_name;
          $customer->phone  = array(
               'area_code' => empty($clientCustomer->phone['area_code']) ? null : $clientCustomer->phone['area_code'],
               'number' => empty($clientCustomer->phone['number']) ? null : $clientCustomer->phone['number'],
          );
          $customer->identification = array(
               'type' => empty($clientCustomer->identification['type']) ? null : $clientCustomer->identification['type'],
               'number' => empty($clientCustomer->identification['number']) ? null : $clientCustomer->identification['number']
          );
          $customer->description = $clientCustomer->description;

          $response = $customer->save();

          if($response){
               return ['status' => 'success', 'response' => $customer];
          }
          return ['status' => 'error', 'response' => $customer, 'errors' => $customer->error->causes];
     }
     
     /**
      * Update customer
      *
      * @param String $customer_id
      * @param ClientCustomer $clientCustomer
      * @return Array
      */
     public function update(String $customer_id, ClientCustomer $clientCustomer) : Array{
          
          $customer = Customer::find_by_id($customer_id);
          $customer->first_name = $clientCustomer->first_name;
          $customer->last_name = $clientCustomer->last_name;
          $customer->phone  = array(
               'area_code' => empty($clientCustomer->phone['area_code']) ? null : $clientCustomer->phone['area_code'],
               'number' => empty($clientCustomer->phone['number']) ? null : $clientCustomer->phone['number'],
          );
          $customer->identification = array(
               'type' => empty($clientCustomer->identification['type']) ? null : $clientCustomer->identification['type'],
               'number' => empty($clientCustomer->identification['number']) ? null : $clientCustomer->identification['number']
          );
          $customer->description = $clientCustomer->description;

          $response = $customer->update();

          if($response){
               return ['status' => 'success', 'response' => $customer];
          }
          return ['status' => 'error', 'response' => $customer, 'errors' => $customer->error->causes];
     }

     /**
      * Add or update customer
      *
      * @param ClientCustomer $clientCustomer
      * @return Array
      */
     public function createOrUpdate(ClientCustomer $clientCustomer) : Array{
          $customer = $this->findByEmail($clientCustomer->email);
          if(empty($customer[0])){
              return $this->create($clientCustomer);
          }
          return $this->update($customer[0]->id, $clientCustomer);
     }

     /**
      * Add card in customer
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

     /**
      * Get customer by id
      *
      * @return Customer
      */
     public function getById(String $id){
          $customer = Customer::find_by_id($id);
          return $customer;
     }

     /**
      * Get Customer by email
      *
      * @param String $email
      * @return Customer
      */
     private function findByEmail(String $email){
          return Customer::search(array("email" => $email));
     }
}