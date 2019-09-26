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
      * Publishing files
      *
      * @return void
      */
     private function registerPublishing(){
          $this->mergeConfigFrom(__DIR__.'/../config/mercadopago.php', "mercadopago");
          $this->publishes([
               __DIR__.'/../config/mercadopago.php' => config_path('mercadopago.php'),
          ]);

          $this->registerPublic();
     }

     /**
      * Public files
      *
      * @return void
      */
     private function registerPublic(){
          $this->publishes([
               __DIR__.'/../public/js/mercadopago.js' => public_path('js/mercadopago/mercadopago.js'),
          ], 'mercadopago-js');
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