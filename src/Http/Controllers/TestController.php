<?php     

namespace Ignacio\MercadoPago\Http\Controllers;

use Illuminate\Routing\Controller;
use Ignacio\MercadoPago\Models\Pay;
use Ignacio\MercadoPago\MP;

class TestController extends Controller{
     
     public function test_pay(){
          $pay = new Pay([
               'token' => 'TOKENTOKEN',
               'external_reference' => 'referencia',
               'statement_descriptor' => 'Donacion a tal cosa',
               'payment_method_id' => 'diners',
               'transaction_amount' => 300,
               'installments' => 3,
               'payer' => array(
                    'email' => 'ig.mar.oli@gmail.com',
               ),
               'additional_info' => array(
                    'payer' => array(
                         'first_name' => 'Ignacio',
                         'last_name' => 'Martins',
                         'phone' => array(
                              'area_code' => '+589',
                              'number' => '91817155'
                         ),
                    ),
                    "items" => [
                         array(
                             "id" => "item-ID-1234",
                             "title" => "Title of what you are paying for",
                             "picture_url" => "https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
                             "description" => "Item description",
                             "category_id" => "art", 
                             "quantity" => 1,
                             "unit_price" => 100
                         ),
                         array(
                              "id" => "item-ID-1357",
                              "title" => "adasdasdasdas",
                              "picture_url" => "https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
                              "description" => "descrt",
                              "category_id" => "donations", 
                              "quantity" => 23,
                              "unit_price" => 50
                          )
                    ]
               )
          ]);

          MP::pay($pay);
     }

     public function test_method(){
          return $this->m->getAll();
     }

}