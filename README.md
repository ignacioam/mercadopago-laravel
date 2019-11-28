<p align="center"><img src="https://i.imgur.com/pbVb1q2.png" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework" rel="nofollow"><img src="https://camo.githubusercontent.com/88861b709123d23a028c2fd3ee2362d4d0a74927/68747470733a2f2f7472617669732d63692e6f72672f6c61726176656c2f6672616d65776f726b2e737667" alt="Build Status" data-canonical-src="https://travis-ci.org/laravel/framework.svg" style="max-width:100%;"></a>
<a href="https://packagist.org/packages/ignaciom/package-mercadopago"><img src="https://poser.pugx.org/ignaciom/package-mercadopago/v/stable" alt="Build Status"></a>
<a href="https://packagist.org/packages/ignaciom/package-mercadopago"><img src="https://poser.pugx.org/ignaciom/package-mercadopago/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/ignaciom/package-mercadopago"><img src="https://poser.pugx.org/ignaciom/package-mercadopago/v/unstable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/ignaciom/package-mercadopago"><img src="https://poser.pugx.org/ignaciom/package-mercadopago/license" alt="License"></a>
</p>

<center>Primer paquete de Laravel sobre MercadoPago.</center>

## :fire: Características
Próximamente.

## :wrench: Compatibilidad

Debes respetar las versiones de la librería con la versión de Laravel que estés utilizando.
En caso de que estés usando una versión de Laravel que no se encuentre en la tabla deberás actualizar tu proyecto a alguna de las que se muestran.

> Las versiones de las librería pueden sufrir cambios que pueden interferir en la forma que se implementa. Mantente informado de las versiones [aquí](https://www.google.com).

| Lib Versión | Laravel Versión | PHP Versión| Soporte |
|--|--|--|--|
| 1.0.0 | ^5.8 | ^7.2 | Sí |
|--|--|--|--|


## :computer: Instalación
Instalar el paquete en tu proyecto de Laravel.

    composer require ignaciom/package-mercadopago
<br>
Luego de instalar la librería debes agregar dos valores en el archivo **.env**.

    MP_PUBLIC_KEY="TU PUBLIC KEY DE MP"
    MP_ACCESS_TOKEN="TU ACCESS TOKEN DE MP"

> MercadoPago genera las claves para un entorno de prueba y de producción. 
> Si esta en un entorno de desarrollo debes ingresar las claves de prueba en las variables. Una vez que se pase de producción se debe cambiar los valores de las variables por los de producción. 

<br>
 Ahora debes publicar en tu proyecto el archivo de configuración y los de javascript que MercadoPago exige para la manipulación de los formularios y así poder sobrescribir los archivos y diseñar los formularios a su manera sin afectar los archivos de la librería. 

    php artisan vendor:publish --tag=ignacio/mercadopago --force

Luego que termine de publicar los archivos usted vera en la estructura de su proyecto nuevos archivos. 

 - :open_file_folder: proyecto
	 - :open_file_folder:config
		 - :page_facing_up:mercadopago.php
	 - :open_file_folder:public 
		 - :open_file_folder:vendor
			 - :open_file_folder:mercadopago
				 - :page_facing_up:mp.js
	 -  :open_file_folder:views
		 -  :open_file_folder:vendor
			 - :open_file_folder:mercadopago
				 - :page_facing_up:include_mp.blade.php

**proyecto/config/mercadopago.php**: Archivo de configuración. <br>
**proyecto/public/vendor/mercadopago/mp.js**: Archivo para manipular los formularios. <br>
**proyecto/views/vendor/mercadopago/include_mp.blade.php**: Archivo que contiene los scripts necesarios para poder hacer uso de mercadopago. <br>

<br>

Para finalizar con la implementación del paquete se debe incluir el archivo **include_mp.blade.php** en la vista donde se requiera el uso de MercadoPago o en el Layout en el caso que usted quiera que en todas las vistas haga uso de los scripts de MercadoPago.

    @include('vendor.mercadopago.include_mp')

**Ejemplo**

![Ejemplo de como incluir los scripts de mercadopago en mi vista](https://imgur.com/zZ31l37.png)



## :mortar_board: Aprender a usar la librería

Próximamente.
<!-- Puedes encontrar la documentación completa [aqui](https://www.google.com). -->