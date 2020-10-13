<?php

use App\Http\Controllers\api\ServicoController;
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


//Route::get('noticias','PostController@apiIndex');
//Route::get('/servicos', [ServicoController::class, 'index']);
Route::apiResource('noticias','api\PostController');
Route::apiResource('servicos','api\ServicoController');
Route::apiResource('unidades','api\UnidadeController');
Route::apiResource("reparticoes",'api\ReparticaoController');
Route::apiResource("tipo-reparticoes",'api\TipoReparticaoController');
Route::get('unidades/{id}/servicos','api\UnidadeController@unityServices');
Route::get('unidades/{id}/reparticoes','api\UnidadeController@divisionServices');
Route::get('municipios/{id}','api\UnidadeController@divisionCounty');