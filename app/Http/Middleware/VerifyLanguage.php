<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class VerifyLanguage {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $lang = $request->route("lang");
        $found = DB::table("tours_idiomas")->where("de_abreviatura",$lang)->where("st_activo","S")->count() > 0;
        if($found) return $next($request);
        return response("paquete de idiomas <b><i>$lang</i></b> no encontrado<br>", 404);
    }
}
