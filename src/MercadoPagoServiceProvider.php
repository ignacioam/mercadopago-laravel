<?php

namespace Ignacio\MercadoPago;

use Illuminate\Support\ServiceProvider;

class MercadoPagoServiceProvider extends ServiceProvider{

     /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot(){
          $this->registerPublishing();
          $this->registerResources();
     }

    /**
     * Register any application services.
     *
     * @return void
     */
     public function register(){

     }

     /**
      * Resources
      *
      * @return void
      */
     private function registerResources(){
          $this->registerRoutes();
     }

     /**
      * Public files
      *
      * @return void
      */
     private function registerPublishing(){
          $this->mergeConfigFrom(__DIR__.'/../config/mercadopago.php', "mercadopago");
          $this->publishes([
               __DIR__.'/../config/mercadopago.php' => config_path('mercadopago.php'),
          ]);
     }

     /**
      * Routes
      *
      * @return void
      */
     private function registerRoutes(){
          $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
     }
}