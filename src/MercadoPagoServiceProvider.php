<?php

namespace Ignacio\MercadoPago;

use Illuminate\Support\ServiceProvider;

class MercadoPagoServiceProvider extends ServiceProvider{

     public function boot(){
          $this->registerResources();
     }

     public function register(){

     }

     private function registerResources(){
          $this->registerRoutes();
     }

     protected function registerRoutes(){
          $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
     }
}