<?php

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

Route::get("/", "Publico@start");
//seccion de administracion
Route::group(["prefix" => "admin"], function() {
    Route::get("/", "Admin@home");
    Route::get("login", "Admin@login");
    Route::any("verificar", "Admin@verificar");
    //módulos
    //ajustes
    Route::group(["prefix" => "ajustes"], function () {
        Route::get("idiomas", "Admin@ajustes_idiomas");
        Route::get("textos", "Admin@ajustes_textos");
        Route::get("imagenes", "Admin@ajustes_imagenes");
        //peticiones ajax
        Route::group(["prefix" => "ajax", "namespace" => "Ajax"], function () {
            Route::get("lista-idiomas", "Admin@lista_idiomas");
            Route::any("guarda-idioma", "Admin@guarda_idioma");
            Route::any("lista-textos", "Admin@lista_textos");
        });
    });
    //catalogos
    Route::group(["prefix" => "catalogo"], function() {
        Route::get("ciudades", "Admin@catalogo_ciudades");
        Route::get("destinos", "Admin@catalogo_destinos");
        Route::get("paquetes", "Admin@catalogo_paquetes");
        //peticiones ajax
        Route::group(["prefix" => "ajax", "namespace" => "Ajax"], function () {
            Route::get("lista-ciudades", "Admin@lista_ciudades");
            Route::any("guarda-ciudad", "Admin@guardar_ciudad");
            Route::get("lista-destinos", "Admin@lista_destinos");
            Route::any("guardar-destino", "Admin@guardar_destino");
            Route::get("lista-paquetes", "Admin@lista_paquetes");
            Route::any("guardar-paquete", "Admin@guardar_paquete");
        });
    });
});
//pagina principal
Route::group(["prefix" => "{lang}"], function() {
    Route::get("/", "Publico@home");
    Route::get("no-language", "Publico@errlanguage");
    Route::get("paquetes-viaje", "Publico@paquetes_viaje");
    //ajax
    Route::group(["prefix" => "ajax", "namespace" => "Ajax"], function() {
        Route::any("detalle-destino", "Publico@detalle_destino");
    });
});
