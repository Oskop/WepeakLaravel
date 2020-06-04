<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('water-list', 'API\WaterController@getWaterList');
Route::get('water', 'API\WaterController@getWater');
Route::get('dashboard', 'API\TransactionController@dashboardNeed');

Route::get('/', function () {
  return [
    'app' => config('app.name'),
    'version' => '1.0.0'
  ];
});

// Route::post('auth/login', 'Auth\LoginController@login');
// Route::post('auth/register', 'Auth\RegisterController@register');
//
// Route::group(['middleware' => 'guest:api'], function () {
//
//     Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//     Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// });

Route::post('registrasi', 'Auth\RegistrasiController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('refresh', 'Auth\LoginController@refresh');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'API\Auth\LoginController@logout');
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});
