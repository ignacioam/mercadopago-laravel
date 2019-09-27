<?php

namespace Ignacio\MercadoPago\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
          'token', 'external_reference', 'statement_descriptor', 'payment_method_id', 'transaction_amount', 'installments', 'payer', 'additional_info', 'application_fee'
     ];

}