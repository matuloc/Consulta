<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Prevision;
use App\Especialidad;
use App\Hora_medica;
use Alert;
use Freshwork\ChileanBundle\Rut;

class GestionHoraController extends Controller
{
    public function reserva()
    {
      return view('hora/reserva')->with('especialidades',Especialidad::all());;
    }
    public function consulta()
    {
      return view('hora/consulta')->with('especialidades',Especialidad::all());
    }
    public function consulta_hora(Request $request)
    {
      $this->validate($request, array(
          'rut'=>'required|cl_rut'
      ));
      $consulta=DB::table('hora_medica')->join('estado_atencion','hora_medica.estado','=','estado_atencion.id')->select('hora_medica.*','estado_atencion.nombre_estado_atencion')->where('rut','=',$request->rut)->orderBy('id','asc')->get();
      $contador=1;
      return view('hora/mostrar_consulta')->with('consulta',$consulta)->with('especialidades',Especialidad::all())->with('contador',$contador);
    }
    public function reserva_hora(Request $request)
    {
      $this->validate($request, array(
          'rut'=>'required|cl_rut',
          'nombre'=>'required|regex:/^[\pL\s\-]+$/u|min:3|max:50'
      ));
      return view('hora/datos_reserva')->with('info_paciente',$request)->with('especialidades',Especialidad::all())->with('prevision',Prevision::all());
    }
    public function reserva_datos(Request $request)
    {
      $this->validate($request, array(
            'date'=>'required',
            'hora'=>'required',
            'rut'=>'required',
            'nombre'=>'required',
            'especialidad'=>'required',
            'prevision'=>'required'
        ));
      //dd();
      $nueva_hora=new hora_medica;
      $nueva_hora->dia= date('Y-m-d',strtotime($request->date));
      $nueva_hora->hora= $request->hora;
      $nueva_hora->rut=$request->rut;
      $nueva_hora->nombre=$request->nombre;
      $nueva_hora->id_paciente=$request->rut.'_'.$request->nombre;
      $nueva_hora->id_especialidad=$request->especialidad;
      $nueva_hora->id_prevision=$request->prevision;
      $nueva_hora->estado=2;
      $nueva_hora->save();

       alert('Con su rut podrás revisar tus horas Médicas Tomadas', 'Hora Tomada!','success')->autoclose(10000);
      $blog=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->orderBy('blog.id','desc')->first();
      return view('inicio/principal')->with('blog',$blog);
    }
}
