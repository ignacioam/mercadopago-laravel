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
          'email', 'first_name', 'last_name', 'phone', 'identification', 'default_address', 'address', 'date_registered', 'description', 'date_created', 'date_last_updated', 'metadata','default_card', 'cards', 'addresses', 'live_mode'
     ];

}