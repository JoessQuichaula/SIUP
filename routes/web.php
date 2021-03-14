<?php

use App\Models\Documento;
use App\Models\DocumentoServico;
use App\Models\Reparticao;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('root');

/*
Route::get('noticias', function () {
    return view('news');
})->name('noticias');
*/

Route::resource('noticias', 'PostController');

Route::resource('unidades', 'UnidadeController');
Route::resource('servicos', 'ServicoController');


Route::get('maps/{id}', function ($id) {
    $servico = Servico::findOrFail($id);
    return view('map',compact('servico'));
})->name('maps');

Route::get('maps/{servico_id}/envio-documentos/{reparticao_id}', function ($servico_id,$reparticao_id) {
    $servico = Servico::findOrFail($servico_id);
    $reparticao = Reparticao::findOrFail($reparticao_id);
    $documentos = [];
    $documentoServicos = DocumentoServico::where('servico_id',$servico->id)->get();
    foreach ($documentoServicos as $documentoServico) {
        $documento = Documento::findOrFail($documentoServico->documento_id);
        array_push($documentos,$documento);
    }
    return view('enviar',compact('servico','reparticao','documentos'));
})->middleware('auth');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('dados/noticias','PostController@apiIndex');
Route::get('demandas', 'UnidadeController@teste');
Route::post('demandas', 'UnidadeController@testePlaceHolder')->name("demandas.st");


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/dropzone-test','UnidadeController@dropzoneTest')->name('dropzone');
