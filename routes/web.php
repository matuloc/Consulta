<?php
use Illuminate\Support\Facades\Input;
use App\Hora_disponible;
use App\Hora_medica;

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

/*
|--------------------------------------------------------------------------
| Usuarios y Administrador
|--------------------------------------------------------------------------
 */
Auth::routes();
Route::get('/admin', 'HomeController@index')->name('admin.home');
Route::get('/admin/crear_blog','HomeController@crear')->name('admin.crear_blog');
Route::post('/admin/crear_blog','HomeController@post_blog')->name('admin_postblog');
Route::get('/admin/ver_blog','HomeController@ver_blog')->name('admin.ver_blog');
Route::get('/admin/editar_blog/{id}','HomeController@editar_blog')->name('admin.editar_blog');
Route::post('/admin/actualizar_blog/{id}','HomeController@actualizar_blog')->name('admin.actualizar_blog');
Route::get('/admin/eliminar_blog/{id}','HomeController@eliminar_blog')->name('admin.eliminar_blog');
Route::get('/admin/lista_usuario','HomeController@lista_usuario')->name('admin.lista_usuario');
Route::post('/admin/lista_usuario','HomeController@crear_usuario')->name('admin.crear_usuario');
Route::get('/admin/editar_usuario/{id}','HomeController@editar_usuario')->name('admin.editar_usuario');
Route::post('/admin/editar_usuario','HomeController@post_editarusuario')->name('admin.post_editarusuario');
Route::get('/admin/eliminar_usuario/{id}','HomeController@eliminar_usuario')->name('admin.eliminar_usuario');
Route::get('/admin/mensajes','HomeController@mensajes')->name('admin.mensajes');
Route::get('/admin/mensajes/{id}','HomeController@ver_mensajes')->name('admin.ver_mensajes');
Route::get('/admin/eliminar_mensaje/{id}','HomeController@eliminar_mensaje')->name('eliminar.mensaje');
Route::get('/admin/hora_medica','HomeController@hora_medica')->name('admin.hora_medica');
Route::post('/admin/hora_medica','HomeController@actualizar_hora_medica')->name('admin.actualizar_hora_medica');
Route::get('/admin/eliminar_hora_medica/{id}','HomeController@eliminar_hora_medica')->name('admin.eliminar_hora_medica');
Route::get('/admin/especialidades','HomeController@especialidades')->name('admin.especialidades');
Route::post('/admin/especialidad','HomeController@post_especialidad')->name('admin.post_especialidad');
Route::post('/admin/prevision','HomeController@post_prevision')->name('admin.post_prevision');
Route::get('/admin/editar_especialidad/{id}','HomeController@editar_especialidad')->name('admin.editar_especialidad');
Route::post('/admin/editar_especialidad','HomeController@posteditar_especialidad')->name('admin.posteditar_especialidad');
Route::get('/admin/eliminar_especialidad/{id}','HomeController@eliminar_especialidad')->name('admin.eliminar_especialidad');
Route::get('/admin/editar_prevision/{id}','HomeController@editar_prevision')->name('admin.editar_prevision');
Route::post('/admin/editar_prevision','HomeController@posteditar_prevision')->name('admin.posteditar_prevision');
Route::get('/admin/eliminar_prevision/{id}','HomeController@eliminar_prevision')->name('admin.eliminar_prevision');

/*
|--------------------------------------------------------------------------
| Página Principal
|--------------------------------------------------------------------------
 */
Route::get('/', 'InicioController@inicio')->name('inicio');
Route::get('/blog', 'InicioController@blog_post')->name('seguir_leyendo');
Route::get('/blog/{id}','InicioController@novedades')->name('novedades');

/*
|--------------------------------------------------------------------------
| Pedir hora
|--------------------------------------------------------------------------
 */
 Route::get('/reserva', 'GestionHoraController@reserva')->name('reserva');
 Route::get('/consulta', 'GestionHoraController@consulta')->name('consulta');
 Route::post('/consulta', 'GestionHoraController@consulta_hora')->name('consulta.hora');
 Route::post('/reserva_hora','GestionHoraController@reserva_hora')->name('reserva.hora');
 Route::post('/reserva_datos','GestionHoraController@reserva_datos')->name('reserva.datos');

/*
|--------------------------------------------------------------------------
| Informacion
|--------------------------------------------------------------------------
 */
Route::get('/contacto','InformacionController@contacto')->name('contacto');
Route::post('/contacto','InformacionController@enviar_correo')->name('enviar.contacto');
Route::get('/especialidades','InformacionController@especialidades')->name('especialidades');
Route::get('/especialidades/{id}','InformacionController@info_especialidad')->name('info_especialidad');
Route::get('/ubicacion','InformacionController@ubicacion')->name('ubicacion');
Route::get('/quienes_somos','InformacionController@quienes_somos')->name('quienes_somos');

/*
|------------------------------------------------------
| Ajax
|------------------------------------------------------
*/

Route::get('/ajax_fecha',function(){
	$fecha=Input::get('fecha');
	if($fecha!=null)
	{
		$fechas=Hora_medica::where('dia','=',$fecha)->get();	
		if($fechas->count()==0)
		{
			return Response::json("no");
		}
		else
		{
			return Response::json($fechas);
		}
	}
	else
	{
		return Response::json("no");
	}
});
Route::get('/ajax-ver',function(){
	$id=Input::get('ver');
	$info=DB::table('hora_medica')
	->join('estados','hora_medica.estado','=','estados.id')
	->join('especialidad','hora_medica.id_especialidad','=','especialidad.id')
	->join('prevision','hora_medica.id_prevision','=','prevision.id')
	->select('hora_medica.*','hora_medica.id as id_hora','estados.nombre_estado','especialidad.nombre_especialidad','prevision.nombre_prevision')
	->where('hora_medica.id','=',$id)
	->get();
	return Response::json($info);
});