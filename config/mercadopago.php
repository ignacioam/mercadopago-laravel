<?php

     return [
          /*
          |--------------------------------------------------------------------------
          | Public key and access token
          |--------------------------------------------------------------------------
          |
          | Public key and access token for sandbox and production
          |
          */

          'public_key' => env('MP_PUBLIC_KEY', null),
          'access_token' => env('MP_ACCESS_TOKEN', null)
     ];