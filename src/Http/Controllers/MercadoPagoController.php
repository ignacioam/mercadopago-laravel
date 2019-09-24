<?php     

namespace Ignacio\MercadoPago\Http\Controllers;

use Illuminate\Routing\Controller;

use MercadoPago;

class MercadoPagoController extends Controller{
     
     public function index(){
          MercadoPago\SDK::setAccessToken(config("mercadopago.sandbox.access_token"));
          return "esaa";
     }

}