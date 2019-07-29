<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
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
        $this->middleware("language");
        $this->lang = \Route::current()->parameter("lang");
    }
    
    public function detalle_destino() {
        extract(request()->input());
        if(isset($destino)) {
            $detalle = DB::select("call sp_mctours_detalle_lugar(?,?)", [$destino, $this->lang])[0];
            //carga lista de imagenes
            $enlaces = [];
            $img_folder = implode(DIRECTORY_SEPARATOR, [env("APP_IMG_PUBLIC"),"destinos",$detalle->id]);
            $imagenes = array_slice(scandir($img_folder),2);
            foreach($imagenes as $imagen) {
                $enlaces[] = asset("img/catalogo/destinos/" . $detalle->id . "/" . $imagen);
            }
            //escribe respuesta
            return response()->json([
                "data" => compact("detalle","enlaces")
            ]);
        }
        return response()->json([
            "error" => "Parámetros incorrectos"
        ]);
    }
}
