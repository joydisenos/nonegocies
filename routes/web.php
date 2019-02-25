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
Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');



Route::get('/cookies', 'SiteController@cookies')->name('cookies');
Route::get('/terminos', 'SiteController@terminos')->name('terminos');
Route::get('/privacidad', 'SiteController@privacidad')->name('privacidad');

Route::post('/contactar', 'ContactarController@crear')->name('contactar');

Route::prefix('ofertas')->group(function (){
   Route::get('/' , 'SiteController@categoria')->name('indexofertas');
   Route::post('/' , 'SiteController@consultar')->name('consultar');
});


//dashboard
Route::prefix('admin')->group(function () {

   Route::get('/', 'DashController@index')->name('inicio');
   Route::get('/usuarios', 'DashController@usuarios')->name('usuarios');
   Route::get('/empresas', 'DashController@empresas')->name('empresas');
   Route::get('/contactar', 'DashController@contactar')->name('contactos');
   Route::get('/categorias', 'DashController@categorias')->name('categorias');
   Route::get('/legales', 'DashController@legales')->name('legales');
   Route::get('/ofertas', 'DashController@ofertas')->name('ofertas');
   Route::get('/ofertas/{categoria}', 'DashController@ofertasPorCategoria')->name('ofertascategoria');
   
   //empresas
   Route::post('/crear/empresa', 'EmpresaController@crear')->name('crearempresa');
   Route::get('/estatus/empresa/{id}/{estatus}', 'EmpresaController@estatus')->name('estatusempresa');
   Route::get('/editar/empresa/{id}', 'EmpresaController@editar')->name('editarempresa');
   Route::post('/editar/empresa/{id}', 'EmpresaController@actualizar')->name('actualizarempresa');

   //categorias
   Route::post('/crear/categoria', 'CategoriaController@crear')->name('crearcategoria');
   Route::get('/editar/categoria/{id}', 'CategoriaController@editar')->name('editarcategoria');
   Route::get('/estatus/categoria/{id}/{estatus}', 'CategoriaController@estatus')->name('estatuscategoria');
   Route::post('/editar/categoria/{id}', 'CategoriaController@actualizar')->name('actualizarcategoria');

   //Usuarios
   Route::get('/crear/usuario', 'DashController@crearUsuario')->name('crearusuario');
   Route::post('/crear/usuario', 'UsuarioController@store')->name('crearusuarionuevo');
   Route::get('/modificar/usuario/{id}', 'UsuarioController@modificar')->name('modificarusuario');
   Route::get('/eliminar/usuario/{id}', 'UsuarioController@borrar')->name('eliminarusuario');
   Route::post('/modificar/usuario/{id}', 'UsuarioController@actualizar')->name('actualizarusuario');
   
   //Legales
   Route::get('/editar/{tabla}', 'LegalesController@editar')->name('editarlegales');
   Route::post('/actualizar/{tabla}', 'LegalesController@actualizar')->name('actualizarlegal');

   //Ofertas
   Route::get('/crear/oferta', 'OfertasController@crear')->name('crearoferta');
   Route::post('/crear/oferta', 'OfertasController@store')->name('storeoferta');
   Route::post('/modificar/oferta/{id}', 'OfertasController@actualizar')->name('actualizaroferta');
   Route::get('/editar/oferta/{id}', 'OfertasController@editar')->name('editaroferta');
   Route::get('/estatus/oferta/{id}/{estatus}', 'OfertasController@estatus')->name('estatusoferta');

   //contactar
   Route::get('/editar/contactar/{id}', 'ContactarController@editar')->name('editarcontactar');
   Route::post('/editar/contactar/{id}', 'ContactarController@actualizar')->name('actualizarcontactar');


});

Route::prefix('panel')->group(function (){
   Route::get('/' , 'PanelController@index')->name('panel.index');
   Route::get('/configuracion' , 'PanelController@configuracion')->name('panel.configuracion');
   Route::get('/planes' , 'PanelController@planes')->name('panel.planes');

   Route::get('/plan/{plan}' , 'PlanController@cambiarPlan')->name('panel.plan');
});

