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

   Route::get('/', 'DashController@index')->name('inicio');
   Route::get('/usuarios', 'DashController@usuarios')->name('usuarios');
   Route::get('/empresas', 'DashController@empresas')->name('empresas');
   Route::get('/contactar', 'DashController@contactar')->name('contactos');
   Route::get('/categorias', 'DashController@categorias')->name('categorias');
   Route::get('/legales', 'DashController@legales')->name('legales');
   Route::get('/ofertas', 'DashController@ofertas')->name('ofertas');
   
   //empresas
   Route::post('/crear/empresa', 'EmpresaController@crear')->name('crearempresa');

   //categorias
   Route::post('/crear/categoria', 'CategoriaController@crear')->name('crearcategoria');
   Route::get('/editar/categoria/{id}', 'CategoriaController@editar')->name('editarcategoria');
   Route::post('/editar/categoria/{id}', 'CategoriaController@actualizar')->name('actualizarcategoria');

   //Legales
   Route::get('/editar/{tabla}', 'LegalesController@editar')->name('editarlegales');
   Route::post('/actualizar/{tabla}', 'LegalesController@actualizar')->name('actualizarlegal');

   //Ofertas
   Route::get('/crear/oferta', 'OfertasController@crear')->name('crearoferta');
   Route::post('/crear/oferta', 'OfertasController@store')->name('storeoferta');



});

