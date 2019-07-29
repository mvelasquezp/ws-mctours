<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Admin extends Controller {
    
    public function lista_idiomas() {
        $idiomas = DB::select("call sp_mctours_lista_idiomas()");
        return response()->json([
            "data" => compact("idiomas")
        ]);
    }

    public function guarda_idioma() {
        extract(request()->input());
        if(isset($nombre, $abreviatura, $defecto, $icono)) {
            DB::table("tours_idiomas")->insert([
                "de_descripcion" => $nombre,
                "de_abreviatura" => $abreviatura,
                "st_default" => $defecto
            ]);
            //guarda la imagen
            $img_path = implode(DIRECTORY_SEPARATOR,[env("APP_IMG_PUBLIC"),"lenguajes",$abreviatura . ".png"]);
            list($type,$data) = explode(';',$icono);
            list(,$data)      = explode(',',$data);
            $data = base64_decode($data);
            file_put_contents($img_path,$data);
            //respuesta
            return response()->json([
                "res" => "ok"
            ]);
        }
        return response()->json([
            "error" => "Parámetros incorrectos"
        ]);
    }

    public function lista_textos() {
        extract(request()->input());
        if(isset($idioma)) {
            $textos = DB::select("call sp_mctours_textos_pagina(?)", [$idioma]);
            return response()->json([
                "data" => compact("textos")
            ]);
        }
        return response()->json([
            "error" => "Parámetros incorrectos"
        ]);
    }

    //catalogo

    public function lista_ciudades() {
        $ciudades = DB::select("call sp_mctours_lista_ciudades");
        return response()->json([
            "data" => compact("ciudades")
        ]);
    }

    public function guardar_ciudad() {
        extract(request()->input());
        if(isset($nombre)) {
            DB::table("tours_ciudades")->insert([
                "de_ciudad" => $nombre
            ]);
            $ciudades = DB::select("call sp_mctours_lista_ciudades");
            return response()->json([
                "data" => compact("ciudades")
            ]);
        }
        return response()->json([
            "error" => "Parámetros incorrectos"
        ]);
    }

    public function lista_destinos() {
        $destinos = DB::select("call sp_mctours_lista_lugares");
        foreach($destinos as $i => $destino) {
            $textos_destinos = DB::select("call sp_mctours_textos_lugares(?)", [$destino->id]);
            $tx_idiomas = [];
            foreach($textos_destinos as $tx_idioma) {
                $tx_idiomas[] = [
                    "idioma" => $tx_idioma->idioma,
                    "alias" => $tx_idioma->alias,
                    "icono" => asset("img/catalogo/lenguajes/" . $tx_idioma->alias . ".png"),
                    "nombre" => $tx_idioma->nombre,
                    "descripcion" => $tx_idioma->descripcion
                ];
            }
            $destinos[$i]->textos = $tx_idiomas;
            //carga lista de imagenes
            $images_url = [];
            $img_folder = implode(DIRECTORY_SEPARATOR, [env("APP_IMG_PUBLIC"),"destinos",$destino->id]);
            $imagenes = array_slice(scandir($img_folder),2);
            foreach($imagenes as $imagen) {
                $images_url[] = asset("img/catalogo/destinos/" . $destino->id . "/" . $imagen);
            }
            $destinos[$i]->imagenes = $images_url;
        }
        return response()->json([
            "data" => compact("destinos")
        ]);
    }

    public function guardar_destino() {
        extract(request()->input());
        if(isset($ciudad,$imagenes,$contenidos)) {
            //inserta el lugar
            $id_lugar = DB::table("tours_lugares")->insertGetId([
                "id_ciudad" => $ciudad
            ]);
            //inserta los labels
            foreach($contenidos as $contenido) {
                extract($contenido);
                DB::table("tours_textos_lugares")->insert([
                    "id_lugar" => $id_lugar,
                    "id_idioma" => $idioma,
                    "des_nombre" => $nombre,
                    "des_texto" => $descripcion
                ]);
            }
            //guarda las imagenes
            foreach($imagenes as $i => $data) {
                $img_folder = implode(DIRECTORY_SEPARATOR, [env("APP_IMG_PUBLIC"),"destinos",$id_lugar]);
                @mkdir($img_folder, 0744, true);
                $img_name = $i . ".png";
                $img_path = $img_folder . DIRECTORY_SEPARATOR . $img_name;
                file_put_contents($img_path, base64_decode($data));
            }
            //carga la lista de destinos
            $destinos = [];
            //response
            return response()->json([
                "data" => compact("destinos")
            ]);
        }
        return response()->json([
            "error" => "Parámetros incorrectos"
        ]);
    }

    public function lista_paquetes() {
        $paquetes = DB::select("call sp_mctours_lista_paquetes");
        foreach($paquetes as $paquete) {
            $textos_paquetes = DB::select("call sp_mctours_textos_paquetes(?)", [$paquete->id]);
            $tx_idiomas = [];
            foreach($textos_paquetes as $i => $tx_idioma) {
                $tx_idiomas[] = [
                    "idioma" => $tx_idioma->idioma,
                    "alias" => $tx_idioma->alias,
                    "icono" => asset("img/catalogo/lenguajes/" . $tx_idioma->alias . ".png"),
                    "nombre" => $tx_idioma->nombre,
                    "duracion" => $tx_idioma->duracion,
                    "destinos" => $tx_idioma->destinos
                ];
            }
            $paquetes[$i]->textos = $tx_idiomas;
        }
        return response()->json([
            "data" => compact("paquetes")
        ]);
    }

    public function guardar_paquete() {
        extract(request()->input());
        if(isset($precio,$contenidos,$destinos)) {
            //inserta el paquete
            $id_paquete = DB::table("tours_paquete")->insertGetId([
                "im_precio" => $precio
            ]);
            //inserta los labels
            foreach($contenidos as $contenido) {
                extract($contenido);
                DB::table("tours_textos_paquete")->insert([
                    "id_paquete" => $id_paquete,
                    "id_idioma" => $idioma,
                    "de_nombre" => $nombre,
                    "de_descripcion" => $descripcion,
                    "de_incluye" => $incluye,
                    "de_duracion" => $duracion
                ]);
            }
            //registra los destinos
            foreach($destinos as $destino) {
                DB::table("tours_lugares_paquete")->insert([
                    "id_paquete" => $id_paquete,
                    "id_lugar" => $destino
                ]);
            }
            //respuesta
            return response()->json([
                "data" => "ok"
            ]);
        }
        return response()->json([
            "error" => "Parámetros incorrectos"
        ]);
    }
}
