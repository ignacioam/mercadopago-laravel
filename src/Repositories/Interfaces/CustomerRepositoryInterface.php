<?php

namespace Ignacio\MercadoPago\Repositories\Interfaces;

use Ignacio\MercadoPago\Models\{ClientCard, ClientCustomer};

interface CustomerRepositoryInterface{
     function create(ClientCustomer $customer) : Array;
     function addCard(String $customer_id, ClientCard $clientCard) : Array;
     function update(String $customer_id, ClientCustomer $clientCustomer) : Array;
     function createOrUpdate(ClientCustomer $clientCustomer) : Array;
     function getById(String $id);
}