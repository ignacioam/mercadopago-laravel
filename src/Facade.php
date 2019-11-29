<?php

namespace Ignacio\MercadoPago;

use Ignacio\MercadoPago\Models\Pay;
use Ignacio\MercadoPago\Repositories\Interfaces\{CustomerRepositoryInterface, PayRepositoryInterface};

class Facade {
     /**
      * Property repositories
      *
      * @var PayRepositoryInterface
      */
     private $payRepository, $customerRepository;

     /**
      * Construct
      *
      * @param PayRepositoryInterface $pay
      * @param CustomerRepositoryInterface $customer
      */
     public function __construct(PayRepositoryInterface $payRepository, CustomerRepositoryInterface $customerRepository)
     {
          $this->payRepository = $payRepository;
          $this->customerRepository = $customerRepository;
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
      
}