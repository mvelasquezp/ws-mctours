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
        return redirect("es");
    }

    public function home() {
        $lang = $this->lang;
    	$idiomas = DB::select("call sp_mctours_lista_idiomas");
        $data = DB::select("call sp_mctours_textos_pagina(?,?)", [$lang, 'navbar,inicio,footer']);
        $textos = [];
        foreach($data as $texto) {
        	$textos[$texto->codigo] = $texto->texto;
        }
        $populares = DB::select("call sp_mctours_lugares_destacados(?,?)", [$lang,3]);
        $ciudades = DB::select("call sp_mctours_lista_ciudades");
        return view("publico.home")->with(compact("idiomas","textos","populares","lang","ciudades"));
    }

    public function nosotros() {
        $lang = $this->lang;
    	$idiomas = DB::select("call sp_mctours_lista_idiomas");
        $data = DB::select("call sp_mctours_textos_pagina(?,?)", [$lang, 'navbar,nosotros,footer']);
        $textos = [];
        foreach($data as $texto) {
        	$textos[$texto->codigo] = $texto->texto;
        }
        return view("publico.nosotros")->with(compact("idiomas","textos","lang"));
    }

    public function destinos() {
        $lang = $this->lang;
    	$idiomas = DB::select("call sp_mctours_lista_idiomas");
        $data = DB::select("call sp_mctours_textos_pagina(?,?)", [$lang, 'navbar,destinos,footer']);
        $textos = [];
        foreach($data as $texto) {
        	$textos[$texto->codigo] = $texto->texto;
        }
        //destinos populares
        $destinos = DB::select("call sp_mctours_lugares_destacados(?,?)", [$lang,6]);
        foreach($destinos as $i => $destino) {
            $tx_destino = DB::select("call sp_mctours_destino_tx_idioma(?,?)", [$destino->lugar, $lang]);
            $destinos[$i]->textos = $tx_destino[0];
        }
        return view("publico.destinos")->with(compact("idiomas","textos","lang","destinos"));
    }

    public function paquetes_viaje() {
        $lang = $this->lang;
    	$idiomas = DB::select("call sp_mctours_lista_idiomas");
        $data = DB::select("call sp_mctours_textos_pagina(?,?)", [$lang, 'navbar,destinos,paquetes,footer']);
        $textos = [];
        foreach($data as $texto) {
        	$textos[$texto->codigo] = $texto->texto;
        }
        //paquetes
        $paquetes = DB::select("call sp_mctours_paquetes_destacados");
        foreach($paquetes as $i => $paquete) {
            $textos_paquetes = DB::select("call sp_mctours_paquetes_tx_idioma(?,?)", [$paquete->id, $lang])[0];
            $textos_paquetes->ids = explode(",", $textos_paquetes->ids);
            $paquetes[$i]->textos = $textos_paquetes;
        }
        return view("publico.paquetes")->with(compact("idiomas","textos","paquetes","lang"));
    }

    public function contacto() {
        $lang = $this->lang;
    	$idiomas = DB::select("call sp_mctours_lista_idiomas");
        $data = DB::select("call sp_mctours_textos_pagina(?,?)", [$lang, 'navbar,contacto,footer']);
        $textos = [];
        foreach($data as $texto) {
        	$textos[$texto->codigo] = $texto->texto;
        }
        return view("publico.contacto")->with(compact("idiomas","textos","lang"));
    }

}