<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------|
|
*/

Route::middleware('auth:api','cors')->get('/user', function (Request $request) {
    return $request->user();
});


/*
|--------------------------------------------------------------------------
| routes API
|--------------------------------------------------------------------------
|    Route::get('customer', 'Customer\CustomerController@customer');
|    Route::get('customer/{id}', 'Customer\CustomerController@customerByID');
|    Route::post('customer' ,  'Customer\CustomerController@customerSave');
|    Route::put('customer/{id}' ,  'Customer\CustomerController@customerUpdate');
|    Route::delete('customer/{id}' ,  'Customer\CustomerController@customerDelete');
*/


route::apiResource('customer','Customer');

route::apiResource('country','Country');

route::apiResource('city','City');

