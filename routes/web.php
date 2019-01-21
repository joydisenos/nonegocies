<?php

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

Auth::routes();

Route::get('/', 'SiteController@inicio')->name('home');



Route::get('/cookies', 'SiteController@cookies')->name('cookies');
Route::get('/terminos', 'SiteController@terminos')->name('terminos');
Route::get('/privacidad', 'SiteController@privacidad')->name('privacidad');
Route::post('/contactar', 'ContactarController@crear')->name('contactar');


//dashboard
Route::prefix('admin')->group(function () {

   Route::get('/', 'dashController@index')->name('inicio');
   Route::get('/usuarios', 'dashController@usuarios')->name('usuarios');
   Route::get('/empresas', 'dashController@empresas')->name('empresas');
   Route::get('/contactar', 'dashController@contactar')->name('contactos');
   Route::get('/categorias', 'dashController@categorias')->name('categorias');
   Route::get('/legales', 'dashController@legales')->name('legales');
   
   //empresas
   Route::post('/crear/empresa', 'EmpresaController@crear')->name('crearempresa');

   //categorias
   Route::post('/crear/categoria', 'CategoriaController@crear')->name('crearcategoria');

   //Legales
   Route::get('/editar/{tabla}', 'LegalesController@editar')->name('editarlegales');
   Route::post('/actualizar/{tabla}', 'LegalesController@actualizar')->name('actualizarlegal');



});

