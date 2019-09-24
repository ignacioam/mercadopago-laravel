<?php     

namespace Ignacio\MercadoPago\Http\Controllers;

use Illuminate\Routing\Controller;
use Ignacio\MercadoPago\Repositories\MercadoPagoRepository;

class MercadoPagoController extends Controller{
     
     private $r;

     public function __construct(MercadoPagoRepository $r){
          $this->r = $r;
     }

     public function index(){
          return $this->r->save("asdasdasdasd");
     }

}