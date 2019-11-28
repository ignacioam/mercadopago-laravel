<?php

namespace Ignacio\MercadoPago;

use Ignacio\MercadoPago\Repositories\PayRepository;
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
          $this->registerFacades();
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
          ], 'ignacio/mercadopago');

          $this->registerPublic();
     }

     /**
      * Public files
      *
      * @return void
      */
     private function registerPublic(){
          $this->publishes([
               __DIR__.'/../public/js/mercadopago.js' => public_path('vendor/mercadopago/mp.js'),
          ], 'ignacio/mercadopago');
          $this->publishes([
               __DIR__.'/../public/js.blade.php' => resource_path('views/vendor/mercadopago/include_mp.blade.php'),
          ], 'ignacio/mercadopago');
     }

     /**
      * Facades
      *
      * @return void
      */
     protected function registerFacades(){
          $this->app->singleton('MP', function($app){
               return new PayRepository();
          });
     }
}