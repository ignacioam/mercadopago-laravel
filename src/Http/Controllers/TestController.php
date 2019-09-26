<?php     

namespace Ignacio\MercadoPago\Http\Controllers;

use Illuminate\Routing\Controller;
use Ignacio\MercadoPago\Repositories\PayRepository;
use Ignacio\MercadoPago\Models\Pay;

class TestController extends Controller{
     
     private $r;

     public function __construct(PayRepository $r){
          $this->r = $r;
     }

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

          $this->r->pay($pay);

     }

}