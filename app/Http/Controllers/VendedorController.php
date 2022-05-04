<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendedorController extends Controller
{

    public function listado(Request $request){

        $vendedores = Vendedor::all();

        return view('vendedor.listado')->with(compact('vendedores'));
        // dd("holas");
    }

    public function guarda(Request $request){
        
        if($request->ajax()){

            $validator = Validator::make($request->all(), [
                'ap_paterno' => 'required',
                'ap_materno' => 'required',
                'nombres' => 'required',
                'email' => 'required',
                'celular' => 'required',
                'cedula' => 'required'
            ]);

            if ($validator->fails()) {

                return json_encode(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            }else{

                $vendedor = new Vendedor();

                $vendedor->nombres             = $request->input('nombres');
                $vendedor->apellido_paterno   = $request->input('ap_paterno');
                $vendedor->apellido_materno   = $request->input('ap_materno');
                $vendedor->cedula             = $request->input('cedula');
                $vendedor->celular            = $request->input('celular');
                $vendedor->email              = $request->input('email');

                $vendedor->save();

                // return json_encode(['success' => true, 'id' => $campania->id]);
                return json_encode(['success' => true]);
            }
        }else{

        }

    }

    public function ajaxListado(){

        $vendedores = Vendedor::all();

        return view('vendedor.ajaxListado')->with(compact('vendedores'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendedor $vendedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendedor $vendedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedor)
    {
        //
    }
}
