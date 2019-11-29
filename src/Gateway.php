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
     public function findByEmailCustomer(String $email){
          return $this->customerRepository->findByEmail($email);
     }
}