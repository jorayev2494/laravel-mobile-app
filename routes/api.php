<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

#region Public links
Route::get('/categories', ['uses' => 'PublicAPIController@categories', 'as' => 'categories']);
Route::get('/products', ['uses' => 'PublicAPIController@products', 'as' => 'products']);
#endregion

// Authorize Route
Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.'], static function(): void {
    Route::post('/register', ['uses' => 'AuthorizeController@register', 'as' => 'register']);
    Route::post('/login', ['uses' => 'AuthorizeController@login', 'as' => 'login']);
    Route::put('/email/confirm', ['uses' => 'AuthorizeController@emailConfirmation', 'as' => 'email.confirm']);
    Route::post('/logout', ['uses' => 'AuthorizeController@logout', 'as' => 'logout']);
    Route::get('/refresh_token', ['uses' => 'AuthorizeController@refreshToken', 'as' => 'refresh.token']);

    Route::group(['prefix' => 'forgot_password', 'as' => 'forgot_password.'], static function(): void {
        Route::post('/email', ['uses' => 'ForgotPasswordController', 'as' => 'email']);
        Route::put('/reset', ['uses' => 'ForgotPasswordController@reset', 'as' => 'reset']);
    });
});

// Private Routes
Route::group(['middleware' => ['auth:' . \App\Services\Base\AppGuardInterface::USER_GUARD, 'jwt.token.refresh']], static function(): void {
    Route::get('/account/{id?}', ['uses' => 'AccountController', 'as' => 'account']);
    Route::put('/account', ['uses' => 'AccountController@update', 'as' => 'account.update']);
    Route::delete('/account', ['uses' => 'AccountController@destroy', 'as' => 'account.delete']);
    Route::put('/account/password/change', ['uses' => 'AccountController@passwordChange', 'as' => 'account.password.change']);

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], static function(): void {
         Route::apiResource('/address', 'AddressController');
    });

    Route::apiResource('/carts', 'CartController', ['except' => 'update']);
});
