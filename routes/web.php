<?php

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
/*
Route::get('unidades', function(){
    return view('unidades');
})->name('unidades');
*/
/*
Route::get('servicos', function(){
    return view('servicos');
})->name('servicos');
*/
Route::get('maps', function () {
    return view('map');
})->name('maps');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('dados/noticias','PostController@apiIndex');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
