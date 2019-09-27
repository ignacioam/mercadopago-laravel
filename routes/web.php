<?php

Route::namespace('Ignacio\MercadoPago\Http\Controllers')->group(function(){
     Route::get('test-pay', function(){
          return view('mercadopago.pay');
     });
     Route::post('test-pay', 'TestController@test_pay_post')->name('mercadopago.pago');
     Route::get('test-method', 'TestController@test_method');
});