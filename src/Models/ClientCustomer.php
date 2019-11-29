<?php

namespace Ignacio\MercadoPago\Models;

use Illuminate\Database\Eloquent\Model;

class ClientCustomer extends Model{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
          'email', 'first_name', 'last_name', 'phone', 'identification', 'description', 'address'
     ];

}