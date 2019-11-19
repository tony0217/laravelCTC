<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|Aquí es donde puede registrar rutas API de la aplicación.
|
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
|--------------------------------------------------------------------------
| rutas API de la aplicación.
|--------------------------------------------------------------------------
|    Route::get('customer', 'Customer\CustomerController@customer');
|    Route::get('customer/{id}', 'Customer\CustomerController@customerByID');
|    Route::post('customer' ,  'Customer\CustomerController@customerSave');
|    Route::put('customer/{id}' ,  'Customer\CustomerController@customerUpdate');
|    Route::delete('customer/{id}' ,  'Customer\CustomerController@customerDelete');
*/


route::apiResource('customer','Customer');

