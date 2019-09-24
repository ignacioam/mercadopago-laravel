<?php

Route::namespace('Ignacio\MercadoPago\Http\Controllers')->group(function(){
     Route::get('prueba', 'MercadoPagoController@index');
});