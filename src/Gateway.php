<?php

namespace Ignacio\MercadoPago;

use Ignacio\MercadoPago\Models\{ClientCustomer, Pay};
use Ignacio\MercadoPago\Repositories\Interfaces\{CustomerRepositoryInterface, PayRepositoryInterface};

class Gateway {
     /**
      * Property repositories
      *
      * @var PayRepositoryInterface
      */
     private $payRepository, $customerRepository;

     /**
      * Construct
      *
      */
     public function __construct()
     {
          $this->payRepository = new PayRepositoryInterface();
          $this->customerRepository = new CustomerRepositoryInterface();
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