<?php

Route::namespace('Ignacio\MercadoPago\Http\Controllers')->group(function(){
     Route::get('test-pay', 'TestController@test_pay');
     Route::get('test-method', 'TestController@test_method');
});
