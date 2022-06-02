<?php

namespace App\librerias;

class Autentication{
    
    public static function logeo($session){

        if($session){

            return true;

        }
        else{

            // $ruta = env('ROUTE_LOGEO')."control_panel_administrador";

            // return redirect($ruta);

            return false;
        }

    }

}