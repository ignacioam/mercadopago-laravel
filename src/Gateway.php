<?php

namespace Ignacio\MercadoPago;

use Ignacio\MercadoPago\Models\{ClientCustomer, Pay};
use Ignacio\MercadoPago\Repositories\{CustomerRepository, PayRepository};

class Gateway {
     /**
      * Property repositories
      *
      */
     private $payRepository, $customerRepository;

     /**
      * Construct
      *
      */
     public function __construct()
     {
          $this->payRepository = new PayRepository();
          $this->customerRepository = new CustomerRepository();
     }

     /**
      * PAY
      */
     public function pay(Pay $pay){
          return $this->payRepository->pay($pay);
     }
     public function getPaymentById(String $id){
          return $this->payRepository->get($id);
     }
     public function generateRandomExternalReference(){
          return $this->payRepository->generateRandomExternalReference();
     }

     /**
      * CUSTOMER
      */
     public function createCustomer(ClientCustomer $clientCustomer){
          return $this->customerRepository->create($clientCustomer);
     }
     public function updateCustomer(String $customer_id, ClientCustomer $clientCustomer){
          return $this->customerRepository->update($customer_id, $clientCustomer);
     }
     public function createOrUpdateCustomer(ClientCustomer $clientCustomer) : Array{
          return $this->customerRepository->createOrUpdate($clientCustomer);
     }
}