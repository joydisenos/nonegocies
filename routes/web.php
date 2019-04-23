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
Route::get('/contrato-plan', 'SiteController@contrato_plan')->name('contrato.plan');

Route::post('/contactar', 'ContactarController@crear')->name('contactar');

Route::prefix('ofertas')->group(function (){
   Route::get('/' , 'SiteController@categoria')->name('indexofertas')->middleware('auth');
   Route::post('/luz' , 'SiteController@consultar')->name('consultar');
   Route::post('/gas' , 'SiteController@consultar_gas')->name('consultar.gas');
   Route::get('/seguros' , 'SiteController@seguros')->name('ofertas.seguros')->middleware('auth');
   Route::get('/telefonia' , 'SiteController@telefonia')->name('ofertas.telefonia')->middleware('auth');
   // Route::get('/contratar/{oferta_id}/{comision}' , 'OrdenController@contratar')->name('contratar.oferta');
   Route::post('/contratar' , 'OrdenController@contratar')->name('contratar.oferta');
});


//dashboard
Route::prefix('admin')->group( function () {

   Route::get('/', 'DashController@index')->name('inicio')->middleware('role:admin');
   Route::get('/usuarios', 'DashController@usuarios')->name('usuarios')->middleware('role:admin');
   Route::get('/cobros', 'DashController@cobros')->name('cobros')->middleware('role:admin');
   Route::get('/empresas', 'DashController@empresas')->name('empresas')->middleware('role:admin');
   Route::get('/contactar', 'DashController@contactar')->name('contactos')->middleware('role:admin');
   Route::get('/categorias', 'DashController@categorias')->name('categorias')->middleware('role:admin');
   Route::get('/legales', 'DashController@legales')->name('legales')->middleware('role:admin');
   Route::get('/ofertas', 'DashController@ofertas')->name('ofertas')->middleware('role:admin');
   Route::get('/ofertas/{categoria}', 'DashController@ofertasPorCategoria')->name('ofertascategoria')->middleware('role:admin');
   
   //empresas
   Route::get('/crear/empresa', 'EmpresaController@registrar')->name('registrar.empresa')->middleware('role:admin');
   Route::post('/crear/empresa', 'EmpresaController@crear')->name('crearempresa')->middleware('role:admin');
   Route::get('/estatus/empresa/{id}/{estatus}', 'EmpresaController@estatus')->name('estatusempresa')->middleware('role:admin');
   Route::get('/editar/empresa/{id}', 'EmpresaController@editar')->name('editarempresa')->middleware('role:admin');
   Route::post('/editar/empresa/{id}', 'EmpresaController@actualizar')->name('actualizarempresa')->middleware('role:admin');

   //categorias
   Route::post('/crear/categoria', 'CategoriaController@crear')->name('crearcategoria')->middleware('role:admin');
   Route::get('/editar/categoria/{id}', 'CategoriaController@editar')->name('editarcategoria')->middleware('role:admin');
   Route::get('/estatus/categoria/{id}/{estatus}', 'CategoriaController@estatus')->name('estatuscategoria')->middleware('role:admin');
   Route::post('/editar/categoria/{id}', 'CategoriaController@actualizar')->name('actualizarcategoria')->middleware('role:admin');

   //Usuarios
   Route::get('/crear/usuario', 'DashController@crearUsuario')->name('crearusuario')->middleware('role:admin');
   Route::post('/crear/usuario', 'UsuarioController@store')->name('crearusuarionuevo')->middleware('role:admin');
   Route::get('/modificar/usuario/{id}', 'UsuarioController@modificar')->name('modificarusuario')->middleware('role:admin');
   Route::get('/eliminar/usuario/{id}', 'UsuarioController@borrar')->name('eliminarusuario');
   Route::post('/modificar/usuario/{id}', 'UsuarioController@actualizar')->name('actualizarusuario')->middleware('role:admin');
   
   //Legales
   Route::get('/editar/{tabla}', 'LegalesController@editar')->name('editarlegales')->middleware('role:admin');
   Route::post('/actualizar/{tabla}', 'LegalesController@actualizar')->name('actualizarlegal')->middleware('role:admin');

   //Ofertas
   Route::get('/crear/oferta', 'OfertasController@crear')->name('crearoferta')->middleware('role:admin');
   Route::post('/crear/oferta', 'OfertasController@store')->name('storeoferta')->middleware('role:admin');
   Route::post('/modificar/oferta/{id}', 'OfertasController@actualizar')->name('actualizaroferta')->middleware('role:admin');
   Route::get('/editar/oferta/{id}', 'OfertasController@editar')->name('editaroferta')->middleware('role:admin');
   Route::get('/estatus/oferta/{id}/{estatus}', 'OfertasController@estatus')->name('estatusoferta')->middleware('role:admin');

   //contactar
   Route::get('/editar/contactar/{id}', 'ContactarController@editar')->name('editarcontactar')->middleware('role:admin');
   Route::post('/editar/contactar/{id}', 'ContactarController@actualizar')->name('actualizarcontactar')->middleware('role:admin');
   Route::get('/eliminar/{id}', 'ContactarController@eliminar')->name('eliminar.contactar')->middleware('role:admin');

   //Mensajes
   Route::get('/enviar/mensajes' , 'MensajeController@mensajes')->name('enviar.mensajes')->middleware('role:admin');
   Route::post('/registrar/mensajes' , 'MensajeController@enviar')->name('registrar.mensajes')->middleware('role:admin');
   Route::post('/marcar/mensajes' , 'MensajeController@marcar')->name('marcar.mensajes')->middleware('role:admin');

   //contratos
   Route::get('/contratos' , 'DashController@contratos')->name('index.contratos')->middleware('role:admin');
   Route::get('/contrato/{id}' , 'DashController@detallesContrato')->name('detalles.contrato')->middleware('role:admin');
   Route::get('/aprobar/contrato/{id}' , 'OrdenController@aprobar')->name('aprobar.contrato')->middleware('role:admin');
   Route::get('/negar/contrato/{id}' , 'OrdenController@negar')->name('negar.contrato')->middleware('role:admin');

   //Offline
   Route::get('/offline' , 'DashController@offline')->name('offline')->middleware('role:admin');
   Route::post('/crear/offline' , 'OfertasController@contratoOffline')->name('contrato.offline')->middleware('role:admin');

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

   //Route::get('/plan/{plan}' , 'PlanController@cambiarPlan')->name('panel.plan');
   Route::post('/plan' , 'PlanController@cambiarPlan')->name('panel.plan');
   


