<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Publico extends Controller {
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function __construct() {
        //$this->middleware("guest")->except(["logout", "home", "ver"]);
    }

    public function home() {
        return view("publico.home");
    }

}