<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use Auth;
use DB;

class Admin extends Controller {

    public function __construct() {
        $this->middleware("admin")->except(["login", "verificar"]);
    }
    
    public function home() {
        return view("admin.home");
    }

    public function login() {
        if(Auth::check()) return redirect("admin");
        return view("admin.login");
    }

    public function verificar() {
        extract(Request::input());
        if(isset($user, $password)) {
            if(Auth::attempt(["de_alias" => $user, "password" => $password, "st_vigente" => "S"], true)) {
                return redirect("admin");
            }
            else {
                return "usuario y/o clave incorrectos [$user, $password]";
            }
        }
        else {
            return "ingrese correctamente su usuario y clave";
        }
    }

    //ajustes

    public function ajustes_idiomas() {
        $modulo = "admin.ajustes_idiomas";
        $script = "js/admin/ajustes_idiomas.js";
        return view("admin.home")->with(compact("modulo","script"));
    }

    public function ajustes_textos() {
        $modulo = "admin.ajustes_textos";
        $script = "js/admin/ajustes_textos.js";
        $idiomas = DB::select("call sp_mctours_lista_idiomas");
        return view("admin.home")->with(compact("modulo","script","idiomas"));
    }

    public function ajustes_imagenes() {
        $modulo = "admin.ajustes_imagenes";
        $script = "js/admin/ajustes_imagenes.js";
        return view("admin.home")->with(compact("modulo","script"));
    }

    //catalogo

    public function catalogo_ciudades() {
        $modulo = "admin.catalogo_ciudades";
        $script = "js/admin/catalogo_ciudades.js";
        return view("admin.home")->with(compact("modulo","script"));
    }

    public function catalogo_destinos() {
        $modulo = "admin.catalogo_destinos";
        $script = "js/admin/catalogo_destinos.js";
        $idiomas = DB::select("call sp_mctours_lista_idiomas");
        $ciudades = DB::select("call sp_mctours_lista_ciudades");
        return view("admin.home")->with(compact("modulo","script","idiomas","ciudades"));
    }

    public function catalogo_paquetes() {
        $modulo = "admin.catalogo_paquetes";
        $script = "js/admin/catalogo_paquetes.js";
        $lugares = DB::select("call sp_mctours_lugares");
        $idiomas = DB::select("call sp_mctours_lista_idiomas");
        return view("admin.home")->with(compact("modulo","script","idiomas","lugares"));
    }

    //programacion

    public function programacion_tours() {
        $modulo = "admin.programacion_tours";
        $script = "js/admin/programacion_tours.js";
        $ciudades = DB::select("call sp_mctours_lista_ciudades");
        $usuario = Auth::user()->id_usuario;
        $excss = ["https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css"];
        $exjs = [ asset("js/gijgo.1.9.13.min.js") ];
        return view("admin.home")->with(compact("modulo","script","ciudades","usuario","excss","exjs"));
    }

    public function programacion_paquetes() {
        $modulo = "admin.programacion_paquetes";
        $script = "js/admin/programacion_paquetes.js";
        return view("admin.home")->with(compact("modulo","script"));
    }
}
