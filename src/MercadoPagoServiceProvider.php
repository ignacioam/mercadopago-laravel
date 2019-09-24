<?php

namespace Ignacio\MercadoPago;

use Illuminate\Support\ServiceProvider;

class MercadoPagoServiceProvider extends ServiceProvider{

     public function boot(){
          $this->registerPublishing();
          $this->registerResources();
     }

     public function register(){

     }

     private function registerResources(){
          $this->registerRoutes();
     }

     private function registerPublishing(){
          $this->mergeConfigFrom(__DIR__.'/../config/mercadopago.php', "mercadopago");
          $this->publishes([
               __DIR__.'/../config/mercadopago.php' => config_path('mercadopago.php'),
          ]);
     }

     private function registerRoutes(){
          $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
     }
}