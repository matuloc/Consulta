<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contacto;
use App\Especialidad;
use App\Blog;

class InformacionController extends Controller
{
    public function contacto()
    {
      return view('informacion/contacto')->with('especialidades',Especialidad::all());
    }

    public function enviar_correo(Request $request)
    {
      //dd($request);
      $this->validate($request, array(
            'nombre'=>'required|regex:/^[\pL\s\-]+$/u|min:2|max:100',
            'correo'=>'required|email|max:30',
            'asunto'=>'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
            'mensaje'=>'required|max:250'
        ));

        $contacto=new Contacto;
        $contacto->nombre= $request->nombre;
        $contacto->correo= $request->correo;
        $contacto->asunto=$request->asunto;
        $contacto->mensaje=$request->mensaje;
        $contacto->estado=1;
        $contacto->save();
        alert('Mensaje Enviado!','success')->autoclose(10000);
        return redirect()->back();
    }
    public function especialidades()
    {
        return view('informacion/especialidades')->with('especialidades',Especialidad::all());
    }
    public function ubicacion()
    {
      return view('informacion/ubicacion');
    }
    public function quienes_somos()
    {
      return view('informacion/quienes_somos')->with('especialidades',Especialidad::all());
    }
    public function info_especialidad($id)
    {
        $info_especialidad=DB::table('especialidad')->select('*')->where('id','=',$id)->get();
        return view('informacion/info_especialidad')->with('info_especialidad',$info_especialidad)->with('especialidades',Especialidad::all());
    }
}
