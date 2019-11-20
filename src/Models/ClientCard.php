<?php

namespace Ignacio\MercadoPago\Models;

use Illuminate\Database\Eloquent\Model;

class ClientCard extends Model{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
          'token', 'customer_id'
     ];
}