<?php

use App\Http\Controllers\NumberPartition;
use App\Http\Controllers\NumToBinary;
use App\Http\Controllers\PrefixNotation;
use App\Http\Controllers\stringSorter;
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

// Route::get('/sort/{string}', function($string){
//     return 'Hello'.$string;
// });
// Route::get('/sort/{string}', function($string){
//     return 'Hello '.$string;
// });
Route::get('/sort/{string}', [stringSorter::class, 'sortString']);

Route::get('/partition/{number}',[NumberPartition::class, 'partitionNum']);

Route::get('/binary/{string}',[NumToBinary::class, 'numToBinary']);

Route::get('/calculate/{string}',[PrefixNotation::class, 'calculate']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
