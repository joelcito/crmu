<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Session;
use Session;

class HomeController extends Controller
{

    public function __construct(){

        // $this->verification();
        // $this->middleware('auth:sanctum');
        
    }

    //

    // public function home(Request $request, $token){
    public function home(Request $request){

        if($this->verification()){

            return view('home');

        }else{

            return redirect('https://udelosandes.com/siac_desarrollo/control_panel_administrador');

        }

    }

    protected function verification(){

        $this->session = session('user');

        if(session('user')){

            return true;

        }
        else{

            return false;

        }

    }
}
