<?php

use App\Http\Controllers\api\ServicoController;
use App\Models\EstadoDemanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::apiResource('users','api\UserController');

//Route::get('noticias','PostController@apiIndex');
//Route::get('/servicos', [ServicoController::class, 'index']);
Route::apiResource('noticias','api\PostController');
Route::apiResource('servicos','api\ServicoController');
Route::apiResource('unidades','api\UnidadeController');
Route::apiResource("reparticoes",'api\ReparticaoController');
Route::apiResource("tipo-reparticoes",'api\TipoReparticaoController');


Route::apiResource('demandas','api\DemandaController');
Route::get('estado-demandas', function () {
    return EstadoDemanda::all();
});

Route::get('unidades/{id}/servicos','api\UnidadeController@unityServices');
Route::get('unidades/{id}/reparticoes','api\UnidadeController@divisionServices');
Route::get('municipios/{id}','api\UnidadeController@divisionCounty');
Route::get('municipios','api\UnidadeController@allDivisionCounty');
Route::get('servicos/{id}/documentos','api\ServicoController@ServiceDocuments');

