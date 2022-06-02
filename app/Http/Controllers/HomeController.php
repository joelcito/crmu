<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
// use App\librerias\Autentication;
use App\librerias\Autentication;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function __construct(){
        
    }

    public function home(Request $request){

        if(Autentication::logeo(session('user'))){

            return view('home');

        }else{
            
            // $ruta = env('ROUTE_LOGEO')."control_panel_administrador";
            $ruta = env('ROUTE_LOGEO').env('ROUTE_LOGEO_CONT');

            return redirect($ruta);

        }

    }

    // private function llamadaLogeo(){

    //     $utilidades = new Autentication();
    //     $logueo = $utilidades->logeo();

    //     return $logueo;

    // }
}
