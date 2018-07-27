<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blog;

class InicioController extends Controller
{
    public function inicio()
  	{
  		$blog=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->orderBy('blog.id','desc')->first();
	    return view('inicio/principal')->with('blog',$blog);
  	}
    
  	public function blog_post()
  	{
      $blog_post=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->orderBy('blog.id','desc')->get();
      $ultimo_post=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->orderBy('blog.id','desc')->first();
    	return view('inicio/seguir_leyendo')->with('ultimo_post',$ultimo_post)->with('blog_post',$blog_post);
  	}
    public function novedades($id)
    {
        $novedades=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->where('blog.id','=',$id)->orderBy('blog.id','desc')->get();
        $blog_post=DB::table('blog')->join('users','blog.id_users','=','users.id_usuario')->select('blog.*','users.name')->orderBy('blog.id','desc')->get();
        return view('inicio/novedades')->with('novedades',$novedades)->with('blog_post',$blog_post);
    }
}
