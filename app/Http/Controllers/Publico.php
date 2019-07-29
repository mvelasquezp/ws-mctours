<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class Publico extends Controller {
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    
    private $lang;

    public function __construct() {
        $this->middleware("language")->except(["start"]);
        $this->lang = \Route::current()->parameter("lang");
    }

    public function start() {
        //return implode(DIRECTORY_SEPARATOR, [resource_path(),"assets","strings",]);
        return redirect("es");
    }

    public function home() {
    	$idiomas = DB::select("call sp_mctours_lista_idiomas");
        $data = DB::select("call sp_mctours_textos_pagina(?)", [$this->lang]);
        $textos = [];
        foreach($data as $texto) {
        	$textos[$texto->codigo] = $texto->texto;
        }
        $populares = DB::select("call sp_mctours_lugares_destacados(?)", [$this->lang]);
        return view("publico.home")->with(compact("idiomas","textos","populares"));
    }

    public function paquetes_viaje() {
        return view("publico.paquetes");
    }

}