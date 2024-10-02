<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
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

Route::any('mc/{phone}', function($phone, Request $request){
    $adminController = new App\Http\Controllers\Userscontroller();
    return $adminController->mc($phone, $request->input('message'));
});
Route::any('fines/{phone}/{message}/{names}','Userscontroller@fines')->name('fines');
Route::get('clients/search', [ClientController::class, 'search'])->name('api.clients.search');
