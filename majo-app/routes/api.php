<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);

});

Route::group(['middleware' => 'api', 'prefix' => 'user'], function ($router) {
    Route::get('me', [UserController::class, 'me']);
    Route::get('mymerchant', [UserController::class, 'myMerchant']);
    Route::get('myoutlet', [UserController::class, 'myOutlet']);

});

Route::group(['middleware' => 'api', 'prefix' => 'transaction'], function ($router) {
    Route::get('omzetMerchantDay', [TransactionController::class, 'transactionMerchantByDay']);
    Route::get('omzetOutletDay', [TransactionController::class, 'transactionOutletByDay']);

});

