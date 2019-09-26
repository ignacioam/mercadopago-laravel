<?php

Route::namespace('Ignacio\MercadoPago\Http\Controllers')->group(function(){
     Route::get('prueba', 'TestController@test_pay');
});