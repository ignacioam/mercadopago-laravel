<?php

namespace Ignacio\MercadoPago\Repositories\Interfaces;
use Ignacio\MercadoPago\Models\Pay;

interface PayRepositoryInterface{
     function pay(Pay $pay) : Array;
     function generateRandomExternalReference() : String;
}