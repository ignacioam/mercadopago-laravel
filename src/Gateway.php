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
}