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

Route::get('/register/{referido}', 'SiteController@registro')->name('registro.referido')->middleware('guest');
Route::get('/', 'SiteController@inicio')->name('home');
Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');


Route::get('/planes', 'SiteController@planes')->name('planes');
Route::get('/nosotros', 'SiteController@nosotros')->name('nosotros');
Route::get('/colabora', 'SiteController@colabora')->name('colabora');
Route::post('/colabora', 'SiteController@mailColabora')->name('mail.colabora');
Route::get('/cookies', 'SiteController@cookies')->name('cookies');
Route::get('/terminos', 'SiteController@terminos')->name('terminos');
Route::get('/privacidad', 'SiteController@privacidad')->name('privacidad');
Route::get('/contrato-plan', 'SiteController@contrato_plan')->name('contrato.plan');

Route::post('/contactar', 'ContactarController@crear')->name('contactar');

Route::prefix('ofertas')->group(function (){
   Route::get('/' , 'SiteController@categoria')->name('indexofertas')->middleware('auth');
   Route::post('/luz' , 'SiteController@consultar')->name('consultar');
   Route::get('/luz' , 'SiteController@consultar')->name('consultar.get');
   Route::post('/gas' , 'SiteController@consultar_gas')->name('consultar.gas');
   Route::get('/gas' , 'SiteController@consultar_gas')->name('consultar.gas.get');
   Route::get('/seguros' , 'SiteController@seguros')->name('ofertas.seguros')->middleware('auth');
   Route::get('/telefonia' , 'SiteController@ofertasTelefonia')->name('ofertas.telefonia')->middleware('auth');
   Route::get('/categoria/{categoria}' , 'SiteController@ofertasCategoria')->name('ofertas.categoria')->middleware('auth');
   // Route::get('/contratar/{oferta_id}/{comision}' , 'OrdenController@contratar')->name('contratar.oferta');
   Route::post('/contratar' , 'OrdenController@contratar')->name('contratar.oferta');
   Route::get('/finalizar/{finalizar}' , 'OrdenController@finalizar')->name('finalizar.oferta');
});


//dashboard
Route::prefix('admin')->group( function () {

   Route::get('/', 'DashController@index')->name('inicio')->middleware('role:admin');
   Route::get('/usuarios', 'DashController@usuarios')->name('usuarios')->middleware('role:admin');
   Route::get('/cobros', 'DashController@cobros')->name('cobros')->middleware('role:admin');
   Route::get('/empresas', 'DashController@empresas')->name('empresas')->middleware('role:admin');
   Route::get('/contactar', 'DashController@contactar')->name('contactos')->middleware('role:admin|contador|gerente');
   Route::get('/categorias', 'DashController@categorias')->name('categorias')->middleware('role:admin');
   Route::get('/legales', 'DashController@legales')->name('legales')->middleware('role:admin');
   Route::get('/ofertas', 'DashController@ofertas')->name('ofertas')->middleware('role:admin|contador|gerente');
   Route::get('/ofertas/{categoria}', 'DashController@ofertasPorCategoria')->name('ofertascategoria')->middleware('role:admin|contador|gerente');
   Route::get('/pagos', 'DashController@pagos')->name('pagos.comision')->middleware('role:admin|contador|gerente');
   
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
   Route::post('/crear/usuario', 'UsuarioController@store')->name('crearusuarionuevo')->middleware('auth');
   Route::get('/modificar/usuario/{id}', 'UsuarioController@modificar')->name('modificarusuario')->middleware('role:admin');
   Route::get('/eliminar/usuario/{id}', 'UsuarioController@borrar')->name('eliminarusuario');
   Route::post('/modificar/usuario/{id}', 'UsuarioController@actualizar')->name('actualizarusuario')->middleware('auth');
   
   //Legales
   Route::get('/editar/{tabla}', 'LegalesController@editar')->name('editarlegales')->middleware('role:admin');
   Route::post('/actualizar/{tabla}', 'LegalesController@actualizar')->name('actualizarlegal')->middleware('role:admin');

   //Ofertas
   Route::get('/crear/oferta', 'OfertasController@crear')->name('crearoferta')->middleware('role:admin|contador|gerente');
   Route::get('/duplicar/oferta/{id}', 'OfertasController@duplicar')->name('duplicar.oferta')->middleware('role:admin|contador|gerente');
   Route::post('/crear/oferta', 'OfertasController@store')->name('storeoferta')->middleware('role:admin|contador|gerente');
   Route::post('/modificar/oferta/{id}', 'OfertasController@actualizar')->name('actualizaroferta')->middleware('role:admin|contador|gerente');
   Route::get('/editar/oferta/{id}', 'OfertasController@editar')->name('editaroferta')->middleware('role:admin|contador|gerente');
   Route::get('/estatus/oferta/{id}/{estatus}', 'OfertasController@estatus')->name('estatusoferta')->middleware('role:admin|contador|gerente');

   //contactar
   Route::get('/editar/contactar/{id}', 'ContactarController@editar')->name('editarcontactar')->middleware('role:admin|contador|gerente');
   Route::post('/editar/contactar/{id}', 'ContactarController@actualizar')->name('actualizarcontactar')->middleware('role:admin');
   Route::get('/eliminar/{id}', 'ContactarController@eliminar')->name('eliminar.contactar')->middleware('role:admin');

   //Mensajes
   Route::get('/enviar/mensajes' , 'MensajeController@mensajes')->name('enviar.mensajes')->middleware('role:admin|contador|gerente');
   Route::post('/registrar/mensajes' , 'MensajeController@enviar')->name('registrar.mensajes')->middleware('role:admin|contador|gerente');
   Route::post('/marcar/mensajes' , 'MensajeController@marcar')->name('marcar.mensajes')->middleware('role:admin|contador|gerente');

   //contratos
   Route::get('/contratos' , 'DashController@contratos')->name('index.contratos')->middleware('role:admin');
   Route::get('/contrato/{id}' , 'DashController@detallesContrato')->name('detalles.contrato')->middleware('role:admin');
   Route::get('/aprobar/contrato/{id}' , 'OrdenController@aprobar')->name('aprobar.contrato')->middleware('role:admin');
   Route::get('/negar/contrato/{id}' , 'OrdenController@negar')->name('negar.contrato')->middleware('role:admin');
   Route::get('/negar/comision/{id}' , 'OrdenController@negarComision')->name('negar.comision')->middleware('role:admin');
   Route::get('/marcar/pago/{id}' , 'OrdenController@pagado')->name('pagar.contrato')->middleware('role:admin');
   Route::get('/marcar/pago/comision/{id}' , 'OrdenController@pagadoComision')->name('pagar.comision')->middleware('role:admin');

   //Offline
   Route::get('/offline' , 'DashController@offline')->name('offline')->middleware('auth');
   Route::post('/crear/offline' , 'OfertasController@contratoOffline')->name('contrato.offline')->middleware('auth');

});

   // Usuario
   Route::get('/panel' , 'PanelController@index')->name('panel.index');
   Route::get('/perfil' , 'PanelController@configuracion')->name('panel.configuracion');
   Route::get('/contratos' , 'PanelController@contratos')->name('panel.contratos');
   Route::get('/comisiones' , 'PanelController@comisiones')->name('panel.comisiones');
   Route::get('/cobrar/contrato/{id}' , 'OrdenController@cobrar')->name('cobrar.contrato');
   Route::get('/cobrar/comision/{id}' , 'OrdenController@cobrarComision')->name('cobrar.comision');
   Route::get('/contrato/{id}' , 'PanelController@contrato')->name('ver.contrato');
   Route::post('/datos' , 'PanelController@datos')->name('panel.datos');
   Route::get('/mensajes' , 'PanelController@mensajes')->name('panel.mensajes');
   Route::get('/referidos' , 'PanelController@referidos')->name('panel.referidos');

   Route::post('/tarjeta' , 'TarjetaController@registrar')->name('registrar.tarjeta');
   Route::post('/cuenta' , 'CuentaController@registrar')->name('registrar.cuenta');

   //Route::get('/plan/{plan}' , 'PlanController@cambiarPlan')->name('panel.plan');
   Route::post('/plan' , 'PlanController@cambiarPlan')->name('panel.plan');
   Route::get('/plan' , 'PlanController@cambiarPlan')->name('panel.plan');
   
Route::prefix('panel')->group(function (){

   Route::get('/usuarios' , 'PanelController@usuarios')->name('panel.usuarios')->middleware('auth');
   Route::get('/crear/usuario' , 'PanelController@crearUsuario')->name('panel.crear.usuario')->middleware('auth');
   Route::get('/contratos' , 'PanelController@contratosReferidos')->name('panel.contratos.referidos')->middleware('auth');
   Route::get('/contrato/{id}' , 'PanelController@detallesContrato')->name('panel.detalles.contrato')->middleware('auth');
   Route::get('/modificar/usuario/{id}', 'UsuarioController@modificar')->name('panel.modificarusuario')->middleware('auth');
   Route::get('/contactar', 'DashController@contactar')->name('contactos.panel')->middleware('role:admin|contador|gerente');

   //Mensajes
   Route::get('/enviar/mensajes' , 'MensajeController@mensajes')->name('enviar.mensajes.panel')->middleware('role:admin|contador|gerente');
   Route::post('/registrar/mensajes' , 'MensajeController@enviar')->name('registrar.mensajes.panel')->middleware('role:admin|contador|gerente');
});


