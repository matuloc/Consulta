<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Blog;
use App\Especialidad;
use App\Prevision;
use App\Hora_medica;
use App\Contacto;
use Alert;
use Illuminate\Support\Facades\Hash;
use Freshwork\ChileanBundle\Rut;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $idsession=Auth::id();
      $misdatos=User::find($idsession);

      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $contar_mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->count('*');
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $grafico_tareas = array();
      for ($i = 1; $i<13; $i++){
        array_push($grafico_tareas, Hora_medica::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', $i)->count());
      }
      $grafico_mensajes = array();
      for ($i = 1; $i<13; $i++){
        array_push($grafico_mensajes, contacto::whereYear('created_at', '=', date('Y'))->whereMonth('created_at', '=', $i)->count());
      }
      //dd($mensajes);
      if($misdatos->tipo==1)
      {
        return view('/admin/admin_inicio')->with('tareas',$tareas)->with('contar_mensajes',$contar_mensajes)->with('mensajes',$mensajes)->with('grafico_tareas',$grafico_tareas)->with('grafico_mensajes',$grafico_mensajes);
      }
      else
      {
        $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
        return view('/admin/vista_usuario')->with('mensajes',$mensajes);
      }
    }
    public function lista_usuario()
    {
      $usuarios=DB::table('users')->join('tipo_usuario','users.tipo','=','tipo_usuario.id')->join('estados','users.estado','=','estados.id')->select('users.*','tipo_usuario.Tipo','estados.nombre_estado')->get();
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $tipo_usuario=DB::table('tipo_usuario')->select('*')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      return view('/admin/usuario/lista_usuario')->with('tareas',$tareas)->with('estados',$estados)->with('tipo_usuario',$tipo_usuario)->with('usuarios',$usuarios)->with('contador',$contador)->with('mensajes',$mensajes);
    }
    public function post_editarusuario(Request $request)
    {
      $this->validate($request, array(
            'id'=>'required',
            'nombre'=>'required|max:255',
            'rut'=>'required|max:255',
            'correo'=>'required|max:255',
            'tipo'=>'required',
            'estado'=>'required'
        ));
      $actualizar=User::find($request->id);
      $actualizar->name=$request->nombre;
      $actualizar->rut=$request->rut;
      $actualizar->tipo=$request->tipo;
      $actualizar->estado=$request->estado;
      $actualizar->email=$request->correo;
      $actualizar->updated_at=date('Y-m-d h:i:s');
      $actualizar->save();

      alert('Usuario Actualizado!','success')->autoclose(10000);
      $usuarios=DB::table('users')->join('tipo_usuario','users.tipo','=','tipo_usuario.id')->join('estados','users.estado','=','estados.id')->select('users.*','tipo_usuario.Tipo','estados.nombre_estado')->get();
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $tipo_usuario=DB::table('tipo_usuario')->select('*')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      return view('/admin/usuario/lista_usuario')->with('tareas',$tareas)->with('estados',$estados)->with('tipo_usuario',$tipo_usuario)->with('usuarios',$usuarios)->with('contador',$contador)->with('mensajes',$mensajes);
    }
    public function eliminar_usuario($id)
    {
      $eliminar=DB::table('users')->where('id_usuario','=',$id)->delete();

      alert('Usuario Eliminado!','success')->autoclose(10000);
      $usuarios=DB::table('users')->join('tipo_usuario','users.tipo','=','tipo_usuario.id')->join('estados','users.estado','=','estados.id')->select('users.*','tipo_usuario.Tipo','estados.nombre_estado')->get();
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $tipo_usuario=DB::table('tipo_usuario')->select('*')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      return view('/admin/usuario/lista_usuario')->with('tareas',$tareas)->with('estados',$estados)->with('tipo_usuario',$tipo_usuario)->with('usuarios',$usuarios)->with('contador',$contador)->with('mensajes',$mensajes);
    }
    public function crear_usuario(Request $request)
    {
      //dd($request);
      $usuarios=DB::table('users')->join('tipo_usuario','users.tipo','=','tipo_usuario.id')->join('estados','users.estado','=','estados.id')->select('users.*','tipo_usuario.Tipo','estados.nombre_estado')->get();
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $tipo_usuario=DB::table('tipo_usuario')->select('*')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      $buscar_correo=User::find($request->correo);
      if($buscar_correo==null)
      {
        $this->validate($request, array(
            'nombre'=>'required|max:255',
            'rut'=>'required|cl_rut',
            'correo'=>'required|max:255',
            'tipo'=>'required',
            'estado'=>'required'
        ));
        $users=new User;
        $users->id_usuario= $request->rut.'_'.$request->nombre;
        $users->name= $request->nombre;
        $users->rut= $request->rut;
        $users->tipo= $request->tipo;
        $users->estado= $request->estado;
        $users->email= $request->correo;
        $users->password=Hash::make($request->rut.'_'.$request->nombre);
        $users->save();
        alert('Usuario Creado!','success')->autoclose(10000);
        return view('/admin/usuario/lista_usuario')->with('tareas',$tareas)->with('estados',$estados)->with('tipo_usuario',$tipo_usuario)->with('usuarios',$usuarios)->with('contador',$contador)->with('mensajes',$mensajes);
      }
      else
      {
        alert('Correo ya registrado!, intente con otro','wrong')->autoclose(10000);
        return view('/admin/usuario/lista_usuario')->with('tareas',$tareas)->with('estados',$estados)->with('tipo_usuario',$tipo_usuario)->with('usuarios',$usuarios)->with('contador',$contador)->with('mensajes',$mensajes);
      }
      
       
    }
    public function editar_usuario($id)
    {
      $editar_usuario=DB::table('users')->select('*')->where('id_usuario','=',$id)->get();
      //dd($editar_usuario);
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $tipo_usuario=DB::table('tipo_usuario')->select('*')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      return view('/admin/usuario/editar_usuario')->with('tareas',$tareas)->with('estados',$estados)->with('tipo_usuario',$tipo_usuario)->with('editar_usuario',$editar_usuario)->with('contador',$contador)->with('mensajes',$mensajes);
    }
    public function crear()
    {
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      return view('/admin/blog/crear_blog')->with('tareas',$tareas)->with('mensajes',$mensajes);
    }

    public function mensajes()
    {
      $contar_mensajes=Contacto::count();
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $mensajes_lista=DB::table('contacto')->select('*')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $contador=1;
      return view('/admin/mensajes/lista_mensajes')->with('tareas',$tareas)->with('contar_mensajes',$contar_mensajes)->with('mensajes_lista',$mensajes_lista)->with('mensajes',$mensajes)->with('contador',$contador);
    }

    public function ver_mensajes($id)
    {
      $actualizar_id=DB::table('contacto')->where('id','=',$id)->update(['estado'=>2]);
      $mensajes_id=DB::table('contacto')->select('*')->where('id','=',$id)->get();
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      return view('/admin/mensajes/ver_mensajes')->with('tareas',$tareas)->with('mensajes_id',$mensajes_id)->with('mensajes',$mensajes);
    }
    public function eliminar_mensaje($id)
    {
      $eliminar=Contacto::where('id','=',$id)->delete();
      alert('Mensaje Eliminado!','success')->autoclose(10000);

      $contar_mensajes=Contacto::count();
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $mensajes_lista=DB::table('contacto')->select('*')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $contador=1;
      return view('/admin/mensajes/lista_mensajes')->with('tareas',$tareas)->with('contar_mensajes',$contar_mensajes)->with('mensajes_lista',$mensajes_lista)->with('mensajes',$mensajes)->with('contador',$contador);
    }

    public function ver_blog()
    {
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $blog_post=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->get();
      $contador=1;
      return view('/admin/blog/ver_blog')->with('tareas',$tareas)->with('blog_post',$blog_post)->with('mensajes',$mensajes)->with('contador',$contador);
    }

    public function editar_blog($id)
    {
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $blog_post=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->where('blog.id','=',$id)->get();
      $contador=1;
      return view('/admin/blog/editar_blog')->with('tareas',$tareas)->with('blog_post',$blog_post)->with('mensajes',$mensajes)->with('contador',$contador);
    }

    public function actualizar_blog($id,Request $request)
    {
      $this->validate($request, array(
          'titulo'=>'required|max:255',
          'descripcion'=>'required|max:10000'
      ));
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $blog_post=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->get();
      $contador=1;
      $actualizar_id=Blog::find($id);
      $actualizar_id->titulo=$request->titulo;
      $actualizar_id->descripcion=$request->descripcion;
      $actualizar_id->updated_at=date('Y-m-d h:i:s');
      $actualizar_id->save();
      alert('Post Actualizado!','success')->autoclose(10000);
      return view('/admin/blog/ver_blog')->with('tareas',$tareas)->with('blog_post',$blog_post)->with('mensajes',$mensajes)->with('contador',$contador);
    }

    public function eliminar_blog($id)
    {
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $blog_post=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->get();
      $contador=1;
      $eliminar=DB::table('blog')->where('id','=',$id)->delete();
      alert('Post Eliminado!','success')->autoclose(10000);
      return redirect('/admin/ver_blog')->with('tareas',$tareas)->with('blog_post',$blog_post)->with('mensajes',$mensajes)->with('contador',$contador);
    }

    public function post_blog(Request $request)
    {
      $this->validate($request, array(
          'titulo'=>'required|max:255',
          'descripcion'=>'required|max:10000'
      ));

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $blog_post=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->get();
      $contador=1;

      $idsession=Auth::id();
      $misdatos=User::find($idsession);
      $blog=new Blog;
      $blog->titulo= $request->titulo;
      $blog->descripcion= $request->descripcion;
      $blog->id_users=$misdatos->id_usuario;
      $blog->save();
      alert('Post Creado!','success')->autoclose(10000);
      return redirect('/admin/ver_blog')->with('tareas',$tareas)->with('blog_post',$blog_post)->with('mensajes',$mensajes)->with('contador',$contador);
    }
    public function hora_medica()
    {

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $horas=DB::table('hora_medica')->join('estado_atencion','hora_medica.estado','=','estado_atencion.id')->select('hora_medica.*','estado_atencion.nombre_estado_atencion')->orderBy('id','desc')->get();
      $estados=DB::table('estado_atencion')->select('*')->get();
      $contador=1;

      //$actualizar_hora=DB::table('hora_medica')->where('created_at','<=',Carbon::now())->update(['estado'=>2]);

      return view('admin/hora/ver_horas')->with('tareas',$tareas)->with('estados',$estados)->with('horas',$horas)->with('contador',$contador)->with('mensajes',$mensajes);
    }
    public function actualizar_hora_medica(Request $request)
    {
      $this->validate($request, array(
            'estado'=>'required'
        ));
      //dd($request);
      $actualizar=Hora_medica::find($request->id);
      $actualizar->estado=$request->estado;
      $actualizar->updated_at=date('Y-m-d h:i:s');
      $actualizar->save();
      alert('Hora Médica actualizada!','success')->autoclose(10000);

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $horas=DB::table('hora_medica')->join('estado_atencion','hora_medica.estado','=','estado_atencion.id')->select('hora_medica.*','estado_atencion.nombre_estado_atencion')->orderBy('id','desc')->get();
      $estados=DB::table('estado_atencion')->select('*')->get();
      $contador=1;
      return view('admin/hora/ver_horas')->with('tareas',$tareas)->with('estados',$estados)->with('horas',$horas)->with('contador',$contador)->with('mensajes',$mensajes);
    }
    public function eliminar_hora_medica($id)
    {
      $eliminar=DB::table('hora_medica')->where('id','=',$id)->delete();
      alert('Hora Médica Eliminada!','success')->autoclose(10000);

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $horas=DB::table('hora_medica')->join('estado_atencion','hora_medica.estado','=','estado_atencion.id')->select('hora_medica.*','estado_atencion.nombre_estado_atencion')->orderBy('id','desc')->get();
      $estados=DB::table('estado_atencion')->select('*')->get();
      $contador=1;
      return view('admin/hora/ver_horas')->with('tareas',$tareas)->with('estados',$estados)->with('horas',$horas)->with('contador',$contador)->with('mensajes',$mensajes);
    }

    public function especialidades()
    {
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $especialidades=DB::table('especialidad')->join('estados','especialidad.disponible','=','estados.id')->select('especialidad.*','estados.nombre_estado')->get();
      $prevision=DB::table('prevision')->join('estados','prevision.disponible','=','estados.id')->select('prevision.*','estados.nombre_estado')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      $contador2=1;
      return view('admin/hora/especialidades')->with('estados',$estados)->with('prevision',$prevision)->with('especialidades',$especialidades)->with('contador',$contador)->with('mensajes',$mensajes)->with('tareas',$tareas)->with('contador2',$contador2);
    }
    public function post_especialidad(Request $request)
    {
      $this->validate($request, array(
            'nombre'=>'required|max:255',
            'descripcion'=>'required|max:255',
            'estado'=>'required'
        ));
      $especialidad=new Especialidad;
      $especialidad->nombre_especialidad= $request->nombre;
      $especialidad->descripcion= $request->descripcion;
      $especialidad->disponible=$request->estado;
      $especialidad->save();

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $especialidades=DB::table('especialidad')->join('estados','especialidad.disponible','=','estados.id')->select('especialidad.*','estados.nombre_estado')->get();
      $prevision=DB::table('prevision')->join('estados','prevision.disponible','=','estados.id')->select('prevision.*','estados.nombre_estado')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      $contador2=1;
      alert('Especialidad Creada!','success')->autoclose(10000);
      return view('admin/hora/especialidades')->with('tareas',$tareas)->with('estados',$estados)->with('prevision',$prevision)->with('especialidades',$especialidades)->with('contador',$contador)->with('mensajes',$mensajes)->with('contador2',$contador2);
      }
    public function post_prevision(Request $request)
    {
      $this->validate($request, array(
            'nombre'=>'required|max:255',
            'estado'=>'required'
        ));
      $previsiones=new Prevision;
      $previsiones->nombre_prevision= $request->nombre;
      $previsiones->disponible=$request->estado;
      $previsiones->save();

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $especialidades=DB::table('especialidad')->join('estados','especialidad.disponible','=','estados.id')->select('especialidad.*','estados.nombre_estado')->get();
      $prevision=DB::table('prevision')->join('estados','prevision.disponible','=','estados.id')->select('prevision.*','estados.nombre_estado')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      $contador2=1;
      alert('Previsión Creada!','success')->autoclose(10000);
      return view('admin/hora/especialidades')->with('tareas',$tareas)->with('estados',$estados)->with('prevision',$prevision)->with('especialidades',$especialidades)->with('contador',$contador)->with('mensajes',$mensajes)->with('contador2',$contador2);
    }
    public function editar_especialidad($id)
    {
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $especialidad=DB::table('especialidad')->join('estados','especialidad.disponible','=','estados.id')->select('especialidad.*','estados.nombre_estado')->where('especialidad.id','=',$id)->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      return view('/admin/hora/editar_especialidad')->with('tareas',$tareas)->with('especialidad',$especialidad)->with('mensajes',$mensajes)->with('contador',$contador)->with('estados',$estados);
    }
    public function posteditar_especialidad(Request $request)
    {
      //dd($request);
      $this->validate($request, array(
          'id'=>'required',
          'nombre'=>'required',
          'descripcion'=>'required|max:10000',
          'estado'=>'required'
      ));
      $actualizar=Especialidad::find($request->id);
      $actualizar->nombre_especialidad=$request->nombre;
      $actualizar->descripcion=$request->descripcion;
      $actualizar->disponible=$request->estado;
      $actualizar->updated_at=date('Y-m-d h:i:s');
      $actualizar->save();

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $especialidades=DB::table('especialidad')->join('estados','especialidad.disponible','=','estados.id')->select('especialidad.*','estados.nombre_estado')->get();
      $prevision=DB::table('prevision')->join('estados','prevision.disponible','=','estados.id')->select('prevision.*','estados.nombre_estado')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      $contador2=1;
      alert('Especialidad Actualizada!','success')->autoclose(10000);
      return view('admin/hora/especialidades')->with('tareas',$tareas)->with('estados',$estados)->with('prevision',$prevision)->with('especialidades',$especialidades)->with('contador',$contador)->with('mensajes',$mensajes)->with('contador2',$contador2);
    }
    public function eliminar_especialidad($id)
    {
      $eliminar=DB::table('especialidad')->where('id','=',$id)->delete();

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $especialidades=DB::table('especialidad')->join('estados','especialidad.disponible','=','estados.id')->select('especialidad.*','estados.nombre_estado')->get();
      $prevision=DB::table('prevision')->join('estados','prevision.disponible','=','estados.id')->select('prevision.*','estados.nombre_estado')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      $contador2=1;
      alert('Especialidad Eliminada!','success')->autoclose(10000);
      return view('admin/hora/especialidades')->with('tareas',$tareas)->with('estados',$estados)->with('prevision',$prevision)->with('especialidades',$especialidades)->with('contador',$contador)->with('mensajes',$mensajes)->with('contador2',$contador2);
      }
    public function editar_prevision($id)
    {
      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $prevision=DB::table('prevision')->join('estados','prevision.disponible','=','estados.id')->select('prevision.*','estados.nombre_estado')->where('prevision.id','=',$id)->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      return view('/admin/hora/editar_prevision')->with('tareas',$tareas)->with('prevision',$prevision)->with('mensajes',$mensajes)->with('contador',$contador)->with('estados',$estados);
    }
    public function posteditar_prevision(Request $request)
    {
      //dd($request);
      $this->validate($request, array(
          'id'=>'required',
          'nombre'=>'required',
          'estado'=>'required'
      ));
      $actualizar=Prevision::find($request->id);
      $actualizar->nombre_prevision=$request->nombre;
      $actualizar->disponible=$request->estado;
      $actualizar->updated_at=date('Y-m-d h:i:s');
      $actualizar->save();

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $especialidades=DB::table('especialidad')->join('estados','especialidad.disponible','=','estados.id')->select('especialidad.*','estados.nombre_estado')->get();
      $prevision=DB::table('prevision')->join('estados','prevision.disponible','=','estados.id')->select('prevision.*','estados.nombre_estado')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      $contador2=1;
      alert('Prevision Actualizada!','success')->autoclose(10000);
      return view('admin/hora/especialidades')->with('tareas',$tareas)->with('estados',$estados)->with('prevision',$prevision)->with('especialidades',$especialidades)->with('contador',$contador)->with('mensajes',$mensajes)->with('contador2',$contador2);
    }
     public function eliminar_prevision($id)
    {
      //dd($id);
      $eliminar=DB::table('prevision')->where('id','=',$id)->delete();

      $mensajes=DB::table('contacto')->select('*')->where('estado','=','1')->orderBy('id','desc')->limit('3')->get();
      $tareas=DB::table('hora_medica')->select('*')->where('estado','=','2')->count('*');
      $especialidades=DB::table('especialidad')->join('estados','especialidad.disponible','=','estados.id')->select('especialidad.*','estados.nombre_estado')->get();
      $prevision=DB::table('prevision')->join('estados','prevision.disponible','=','estados.id')->select('prevision.*','estados.nombre_estado')->get();
      $estados=DB::table('estados')->select('*')->get();
      $contador=1;
      $contador2=1;
      alert('Prevision Eliminada!','success')->autoclose(10000);
      return view('admin/hora/especialidades')->with('tareas',$tareas)->with('estados',$estados)->with('prevision',$prevision)->with('especialidades',$especialidades)->with('contador',$contador)->with('mensajes',$mensajes)->with('contador2',$contador2);
    }
}
