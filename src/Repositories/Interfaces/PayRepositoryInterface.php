<?php

namespace Ignacio\MercadoPago\Repositories\Interfaces;
use Ignacio\MercadoPago\Models\Pay;

interface PayRepositoryInterface{
     function pay(Pay $pay, String $accessToken = null) : Array;
     function generateRandomExternalReference() : String;
     function get(String $id);
}