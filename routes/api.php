<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TypingController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::get('/sentence', [TypingController::class, 'getSentence']);
  Route::post('/sentence', [TypingController::class, 'getSentence']);
  Route::get('/user', [UserController::class, 'index']);
});
