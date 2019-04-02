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


Route::get('/planes', 'SiteController@planes')->name('planes');
Route::get('/nosotros', 'SiteController@nosotros')->name('nosotros');
Route::get('/cookies', 'SiteController@cookies')->name('cookies');
Route::get('/terminos', 'SiteController@terminos')->name('terminos');
Route::get('/privacidad', 'SiteController@privacidad')->name('privacidad');

Route::post('/contactar', 'ContactarController@crear')->name('contactar');

Route::prefix('ofertas')->group(function (){
   Route::get('/' , 'SiteController@categoria')->name('indexofertas');
   Route::post('/' , 'SiteController@consultar')->name('consultar');
   Route::get('/seguros' , 'SiteController@seguros')->name('ofertas.seguros');
   Route::get('/telefonia' , 'SiteController@telefonia')->name('ofertas.telefonia');
   // Route::get('/contratar/{oferta_id}/{comision}' , 'OrdenController@contratar')->name('contratar.oferta');
   Route::post('/contratar' , 'OrdenController@contratar')->name('contratar.oferta');
});


//dashboard
Route::prefix('admin')->group(function () {

   Route::get('/', 'DashController@index')->name('inicio');
   Route::get('/usuarios', 'DashController@usuarios')->name('usuarios');
   Route::get('/cobros', 'DashController@cobros')->name('cobros');
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

   //Mensajes
   Route::get('/enviar/mensajes' , 'MensajeController@mensajes')->name('enviar.mensajes');
   Route::post('/registrar/mensajes' , 'MensajeController@enviar')->name('registrar.mensajes');
   Route::post('/marcar/mensajes' , 'MensajeController@marcar')->name('marcar.mensajes');

   //contratos
   Route::get('/contratos' , 'DashController@contratos')->name('index.contratos');

});

   // Usuario
   Route::get('/panel' , 'PanelController@index')->name('panel.index');
   Route::get('/perfil' , 'PanelController@configuracion')->name('panel.configuracion');
   Route::get('/contratos' , 'PanelController@contratos')->name('panel.contratos');
   Route::get('/contrato/{id}' , 'PanelController@contrato')->name('ver.contrato');
   Route::post('/datos' , 'PanelController@datos')->name('panel.datos');
   Route::get('/mensajes' , 'PanelController@mensajes')->name('panel.mensajes');

   Route::post('/tarjeta' , 'TarjetaController@registrar')->name('registrar.tarjeta');
   Route::post('/cuenta' , 'CuentaController@registrar')->name('registrar.cuenta');

   Route::get('/plan/{plan}' , 'PlanController@cambiarPlan')->name('panel.plan');
   


