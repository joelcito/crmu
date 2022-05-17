@extends('layouts.app')

@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('css')
    <style>
        :root {
            --color-one: #f0ebf8;
            --color-two: #ffffff;
            --color-three: #673ab7;
            --color-four: #202124;
            --color-five: #72767a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        .title {
            align-items: center;
            border-radius:10px;

            background: var(--color-two);

            color: var(--color-four);

            border:1px solid #E4DFDE;

            overflow: hidden;
        }
        
        .title > .borderColor {
            height: 10px;
            background: var(--color-three);
        }

        .title > h1 {
            padding: 2rem 1rem;
            font-weight: lighter;
        }

        .boredes-cajas{
        
            border-top: none;
            border-left: none;
            border-right: none;
            border-radius: 4px;
            display: block;
            width: 100%;
            padding: 8px;
            font-size: 14px; 
            text-decoration: none;
            border:0px;
            outline: none;
            border-bottom: 1px dotted gray;

        }
        .boredes-cajas:focus{
        
            box-shadow: 8px 8px 15px -5px  rgb(177, 185, 175)
        
        }

        .listaul{
            list-style-type: circle;
        }


        /* para el boton de subir file */
        .subir{
            padding: 5px 10px;
            background: #f55d3e;
            color:#fff;
            border:0px solid #fff;
        }
        
        .subir:hover{
            color:#fff;
            background: #f7cb15;
        }
    </style>
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ url('Formulario/guardarEditadoFormulario') }}" method="post" target="_target" id="formularioEditaFormulario"  enctype="multipart/form-data" >
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                                EDICIÓN FORMULARIO
                                {{-- @dd($formulario->color) --}}
                            </div>
                            <div class="col-md-3"></div>
                            {{-- <div class="col-md-3"></div> --}}
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p style="display: none;" id="urlFormulario_fb">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $formulario->id,"fb"]) }}</p>
                                        <p style="display: none;" id="urlFormulario_wa">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $formulario->id,"wa"]) }}</p>
                                        <p style="display: none;" id="urlFormulario_ig">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $formulario->id,"ig"]) }}</p>
                                        <p style="display: none;" id="urlFormulario_tw">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $formulario->id,"tw"]) }}</p>
                                        <button onclick="copiaLinkRedes('fb')" class="btn btn-icon-only btn-rounded btn-dark mb-0 p-1"><i class="fa fa-facebook"></i></button>
                                        <button onclick="copiaLinkRedes('wa')" class="btn btn-icon-only btn-rounded btn-success mb-0 p-1"><i class="fa fa-whatsapp"></i></button>
                                        <button onclick="copiaLinkRedes('ig')" class="btn btn-icon-only btn-rounded btn-danger mb-0 p-1"><i class="fa fa-instagram"></i></button>
                                        <button onclick="copiaLinkRedes('tw')" class="btn btn-icon-only btn-rounded btn-info mb-0 p-1"><i class="fa fa-twitter"></i></button>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 border">
                                                <center>
                                                    <label for="file-upload" class="subir">
                                                        <i class="fas fa-cloud-upload-alt"></i> Subir archivo
                                                    </label>
            
                                                    <input id="file-upload" type="file" style='display: none;' name="img-formulario" accept="image/*"/>
                                                    <br>
                                                    <small class="text-success">(720px X 150px Max.)</small>
                                                    <div id="info">
            
                                                    </div>
                                                </center>
                                            </div>
                                            <div class="col-md-6 border">

                                                <label for="">Color</label>
                                                <input type="color" class="form-control" id="color-form" name="color-form" value="{{ $formulario->color }}" onchange="cambiaColor()">
                                                
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="title">
                                <div class="col-md-12">
                                    <center>
                                        <div style="max-height:200px;">
                                            <img id="image-previw" src="{{ ($formulario->imagen)? asset("imagenesFormulario/$formulario->imagen") : asset('blanco.jpg') }}" alt="">
                                        </div>
                                    </center>
                                    <div style="display: none; position: absolute; margin-top:-50px;" id="bnt-elimina-img">
                                        <button type="button" class="btn btn-icon-only btn-rounded btn-danger mb-0 p-1" onclick="quitaImgFormulario()"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <div class="borderColor"></div>
                                <h1>
                                <div>
                                    <input type="text" name="nombre_formulario" id="nombre_formulario" class="boredes-cajas" placeholder="TITULO DEL FORMULARIO" value="{{ $formulario->nombre }}"/>
                                    <p style="padding: 2px"></p>
                                    <textarea class="boredes-cajas" name="descripcion_formulario" id="descripcion_formulario" cols="30" rows="2" placeholder="DESCRIPCION DEL FORMULARIO" >{{ $formulario->descripcion }}</textarea>
                                </div>
                                </h1>
                            </div>
                        </div>
                        </div>

                        <input type="hidden" value="{{ $campania_id }}" name="campania_id">
                        <input type="hidden" value="{{ $formulario->id }}" name="formulario_id">
                        <input type="hidden" value="{{ $formulario->color }}" name="color_formulario" id="color_formulario">
                        <input type="hidden" name="removeCombos" id="removeCombos">
                        <input type="hidden" name="removeBlock" id="removeBlock">
                        
                        <br>

                        <div class="row">

                            <div class="col-md-4" style="border-right: 1px solid #ccc; border-radius:5px">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" height="100%" disabled name="apellido_paterno_in" id="apellido_paterno_in" class="boredes-cajas" placeholder="APELLIDO PATERNO"/>
                                    </div>
                                    <div class="col-md-2" style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc">
                                        <p style="margin-bottom:10px;"></p>
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" name="apellido_paterno" id="flexSwitchCheckDefault" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="border-right: 1px solid #ccc; border-radius:5px">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" height="100%" disabled name="apellido_materno_in" id="apellido_materno_in" class="boredes-cajas" placeholder="APELLIDO MATERNO"/>
                                    </div>
                                    <div class="col-md-2" style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc">
                                        <p style="margin-bottom:10px;"></p>
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" name="apellido_materno" id="flexSwitchCheckDefault" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="border-right: 1px solid #ccc; border-radius:5px">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" height="100%" disabled name="nombres_in" id="nombres_in" class="boredes-cajas" placeholder="NOMBRES  COMPLETOS"/>
                                    </div>
                                    <div class="col-md-2" style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc">
                                        <p style="margin-bottom:10px;"></p>
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" name="nombres" id="flexSwitchCheckDefault" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-3" style="border-right: 1px solid #ccc; border-radius:5px">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" disabled name="email_in" id="email_in" class="boredes-cajas" placeholder="EMAIL"/>
                                    </div>
                                    <div class="col-md-3" style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc">
                                        <p style="margin-bottom:10px;"></p>
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" name="email" id="flexSwitchCheckDefault" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="border-right: 1px solid #ccc; border-radius:5px">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="number" disabled name="celular_in" id="celular_in" class="boredes-cajas" placeholder="CELULAR"/>
                                    </div>
                                    <div class="col-md-3" style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc">
                                        <p style="margin-bottom:10px;"></p>
                                        <div class="form-check form-switch ps-0">
                                            <p style="margin-bottom:10px;"></p>
                                            <div class="form-check form-switch ps-0">
                                                <input class="form-check-input ms-auto" type="checkbox" name="celular" id="flexSwitchCheckDefault" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="border-right: 1px solid #ccc; border-radius:5px">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="number" disabled name="cedula_in" id="cedula_in" class="boredes-cajas" placeholder="CEDULA"/>
                                    </div>
                                    <div class="col-md-3" style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc">
                                        <p style="margin-bottom:10px;"></p>
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" name="cedula" id="flexSwitchCheckDefault" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="border-right: 1px solid #ccc; border-radius:5px">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" disabled name="expedido_in" id="expedido_in" class="boredes-cajas" placeholder="EXPEDIDO"/>
                                    </div>
                                    <div class="col-md-3" style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc">
                                        <p style="margin-bottom:10px;"></p>
                                        <div class="form-check form-switch ps-0">
                                            <input class="form-check-input ms-auto" type="checkbox" name="expedido" id="flexSwitchCheckDefault" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-3">
                                <div class="title">
                                    <h6 style="padding:10px">Email <b class="text-danger">{{ ($email->requerido == 1)? '*' : ''}}</b></h6>
                                    <input style="padding:10px" name="email" {{ ($email->requerido == 1)? 'required' : ''}}  type="text" class="boredes-cajas" placeholder="Tu respuesta..">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="title">
                                    <h6 style="padding:10px">Celular <b class="text-danger">{{ ($celular->requerido == 1)? '*' : ''}}</b></h6>
                                    <input style="padding:10px" name="celular" {{ ($celular->requerido == 1)? 'required' : ''}} type="text" class="boredes-cajas" placeholder="Tu respuesta..">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="title">
                                    <h6 style="padding:10px">Cedula <b class="text-danger">{{ ($cedula->requerido == 1)? '*' : ''}}</b></h6>
                                    <input style="padding:10px" name="cedula" {{ ($cedula->requerido == 1)? 'required' : ''}} type="text" class="boredes-cajas" placeholder="Tu respuesta..">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="title">
                                    <h6 style="padding:10px">Expedido <b class="text-danger">{{ ($expedido->requerido == 1)? '*' : ''}}</b></h6>
                                    <input style="padding:10px" name="expedido" {{ ($expedido->requerido == 1)? 'required' : ''}}  type="text" class="boredes-cajas" placeholder="Tu respuesta..">
                                </div>
                            </div> --}}
                        </div>
                        @php
                                                    
                            $keyselct = 0;
                            $keyChek = 0; 

                        @endphp
                        
                        @foreach ( $preguntas_form as $key => $p)
                        <br>
                        <div class="row" id="bloque_{{ $key }}">
                            <div class="col-md-12">
                                <div class="title">
                                    <div style="padding:25px;">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <input type="text" id="" name="nombre_pregunta['{{ $p->id }}']" class="boredes-cajas" placeholder="Nombre de la pregunta" value="{{ $p->nombre }}"/>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group input-group-static mb-4">
                                                    <select name="componente_tipo[]" id="" class="form-control" onchange="addComponent(this,{{ $key }})">
                                                        <option>Seleccione una opcion</option>

        
                                                        @foreach ($componentes as $con )
                                                            <option value="{{ $con->nombre }}" {{ ($con->id == $p->componente_id)? 'selected' : '' }}>{{ $con->descripcion }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="component_{{ $key }}">
                                                    <p style="padding: 2px;"></p>
                                                    @if ($p->componente_id == 3 || $p->componente_id == 4)

                                                        <ol class="listaul" id="{{ ($p->componente_id == 3)? 'select' : 'check'  }}_lista_{{ $key }}">
                                                            @if (count($p->valoresCombo) > 0 )

                                                                @foreach ($p->valoresCombo  as $keeyCom => $vaCo)
                                                                    <li id="option_{{ $key }}_{{ $keeyCom }}">
                                                                        <div class="row">
                                                                            <div class="col-md-11">
                                                                                <input type="text" class="boredes-cajas" name="{{ ($p->componente_id == 3)? 'select' : 'checkbox' }}_{{ $key }}[]" value="{{ $vaCo->valor }}">
                                                                            </div>
                                                                            <div class="col-md-1">
                                                                                <p style='padding:1px;'></p><i class='fa fa-window-close' onclick='removeItem({{ ($p->componente_id == 3)? "select" : "check"  }}_lista_{{ $key }}, option_{{ $key }}_{{ $keeyCom }}, {{ $vaCo->id }})'></i>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ol>

                                                        @if ($p->componente_id == 3)
                                                            <button type="button" class="text-info" style="border:none;outline: none;" onclick="addOptionSelect('{{ $key }}')">Adicionar opcion</button>
                                                        @else
                                                            <button type="button" class="text-info" style="border:none;outline: none;" onclick="addOptionCheck('{{ $key }}')">Adicionar opcion</button>
                                                        @endif
                                                        
                                                        @php
                                                            if(count($p->valoresCombo) > 0){

                                                                if($p->componente_id == 3){

                                                                    $keyselct = $keeyCom;

                                                                }else{

                                                                    $keyChek = $keeyCom;

                                                                }                                                                
                                                            }

                                                        @endphp

                                                    @else
                                                        @if ($p->componente_id == 1)

                                                            <input type="text" name="input_{{ $key }}[]" class="boredes-cajas" placeholder="ESCRIBA SU RESPUESTA"/>

                                                        @elseif($p->componente_id == 2)

                                                            <textarea class="boredes-cajas" name="textarea_{{ $key }}[]" id="" cols="30" rows="2" placeholder="Respuesta Larga"></textarea>

                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="footer">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    
                                                </div>
                                                <div class="col-md-5">

                                                </div>
                                                <div class="col-md-2 float-right">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            @if ($key != 0)
                                                                <button type="button" class="btn btn-outline-danger btn-circle btn-sm" onclick="deleteBlock({{ $key }}, {{ $p->id }})"><i class="fa fa-trash-o"></i></button>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="button" class="btn btn-outline-success btn-circle btn-sm" onclick="addBlock()"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div id="cuerpos_form" class="sortable1">
                            
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-outline-success btn-circle btn-block" type="button" onclick="guardaFormulario()" >EDITAR RESPUESTA</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('js')

  <script  type="text/javascript">

    var arrayRemoveCombo  =  new Array();
    var arrayRemoveBlock  =  new Array();

    $( document ).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.borderColor').css('background', "{{ $formulario->color }}");


    });

    function addComponent(select, bloque){

        console.log("entre a ddd"); 

        console.log(select.value);

        addComponentInput(select.value, bloque);

    }

    function addComponentInput(type, bloque){

        if(type == 'input'){

            var component =  '<input type="text" name="input_'+bloque+'[]" class="boredes-cajas" placeholder="ESCRIBA SU RESPUESTA"/>';
        }else if(type == 'select'){

            var component =  '<ol class="listaul"  id="select_lista_'+bloque+'"><li><input type="text" name="select_'+bloque+'[]" class="boredes-cajas" value="Opcion 1"/></li></ol><button type="button" class="text-info" style="border:none;outline: none;" onclick="addOptionSelect('+bloque+')">Adicionar opcion</button>';

        }else if(type == 'textarea'){
            var component =  '<textarea class="boredes-cajas" name="textarea_'+bloque+'[]" id="" cols="30" rows="2" placeholder="Respuesta Larga"></textarea>';
        }else if(type == 'file'){

            var component =  '<div class="row"><div class="col-md-4"><input type="number" name="checkbox_'+bloque+'[]" class="boredes-cajas" placeholder="Cantidad de archivos requeridos"/></div><div class="col-md-4"><input type="number" class="boredes-cajas" placeholder="Tamaño maximo del archivo"/></div></div>';
        }else{

            var component =  '<ol  class="listaul"  id="check_lista_'+bloque+'"><li><input type="text" name="checkbox_'+bloque+'[]" class="boredes-cajas" value="Check 1"/></li></ol><button type="button"  class="text-info" style="border:none;outline: none;" onclick="addOptionCheck('+bloque+')">Adicionar Check</button>';
        }

        $('#component_'+bloque).html(component);

    }

    var cantaddOptionSelect = {{ $keyselct }};

    function addOptionSelect(bloque){

        cantaddOptionSelect++;

        const listid = "select_lista_"+bloque;

        const optionid = "option_"+cantaddOptionSelect;

        $("#select_lista_"+bloque).append("<li id="+optionid+"><div class='row'><div class='col-md-11'><input type='text' name='select_"+bloque+"[]' class='boredes-cajas' value='Opcion "+cantaddOptionSelect+"'/></div><div class='col-md-1'><p style='padding:1px;'></p><i class='fa fa-window-close' onclick='removeItem("+listid.toString()+","+optionid.toString()+",0)'></i></div></div></li>");

    }

    function removeItem(listid, li, combo) {

        if(combo != 0){

            arrayRemoveCombo.push(combo)

        }

        Swal.fire({
            title: 'Esta seguro de eliminar la opcion?',
            text: "Se perdera la pregunta!",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {

            if (result.isConfirmed) {

                listid.removeChild(li);
            }
        })

    }

    var cantaddOptionCheck = {{ $keyChek }};

    function addOptionCheck(bloque){

        cantaddOptionCheck++;

        const listidCheck = "check_lista_"+bloque;

        const optionCheckid = "optionCehck_"+cantaddOptionCheck;

        // $("#check_lista_"+bloque).append("<li id="+optionCheckid+"><div class='row'><div class='col-md-11'><input type='text' name='checkbox_"+bloque+"[]' class='boredes-cajas' value='Check "+cantaddOptionCheck+"'/></div><div class='col-md-1'><p style='padding:1px;'></p><i class='fa fa-window-close' onclick='removeItemCheck("+listidCheck.toString()+","+optionCheckid.toString()+",0)'></i></div></div></li>");
        $("#check_lista_"+bloque).append("<li id="+optionCheckid+"><div class='row'><div class='col-md-11'><input type='text' name='checkbox_"+bloque+"[]' class='boredes-cajas' value='Check "+cantaddOptionCheck+"'/></div><div class='col-md-1'><p style='padding:1px;'></p><i class='fa fa-window-close' onclick='removeItem("+listidCheck.toString()+","+optionCheckid.toString()+",0)'></i></div></div></li>");
    }

    var cantaddBlock = {{ $key + 1 }};

    function addBlock(){

        // ✅ Create element
        const el = document.createElement('div');

        el.addEventListener('click', function handleClick(event) {
            console.log('element clicked 🎉🎉🎉', event);
        });

        var componentes = @json($componentes);

        var option = "<option>Seleccione una opcion</option>";

        for (var i = 0; i < componentes.length; i++) {
            option = option + '<option value="'+componentes[i]['nombre']+'">'+componentes[i]['descripcion']+'</option>';
        }

        // ✅ Add text content to element
        // var content = "<input type='text' class='form-control'/>"
        // el.textContent = content;

        // ✅ Or set the innerHTML of the element
        // el.innerHTML = `<span>Hello world</span>`;
        // el.innerHTML = `<input type="text" class="form-control"/>`;
        var dato = '<br><div class="row s1" id="bloque_'+cantaddBlock+'">'+
                    '<div class="col-md-12">'+
                        '<div class="title">'+
                        '<div style="padding: 25px;">'+
                            '<div class="row">'+
                            '<div class="col-md-9">'+
                                '<input type="text" id="nombre_pregunta" name="nombre_pregunta[]" class="boredes-cajas" placeholder="Nombre de la pregunta"/>'+
                            '</div>'+
                            '<div class="col-md-3">'+
                                '<select name="componente_tipo[]" id="" class="form-control" onchange="addComponent(this, '+cantaddBlock+')">'+
                                // '<option value="select">Seleccion Unica</option>'+
                                // '<option value="checkbox">Seleccion Multiple</option>'+
                                // '<option value="input">Respuesta Corta</option>'+
                                // '<option value="textarea">Respuesta Largo</option>'+
                                // '<option value="file">Adjuntar Archivo</option>'+
                                option+
                                '</select>'+
                            '</div>'+
                            '</div>'+
                            '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<p style="padding: 2px"></p>'+
                                '<div id="component_'+cantaddBlock+'">'+

                                '</div>'+
                                '<hr>'+
                                '<div class="footer">'+
                                    '<div class="row">'+
                                        '<div class="col-md-5">'+

                                        '</div>'+
                                        '<div class="col-md-5">'+

                                        '</div>'+
                                        '<div class="col-md-2 float-right">'+
                                        '<div class="row">'+
                                            '<div class="col-md-6">'+
                                                '<button type="button" class="btn btn-outline-danger btn-circle btn-sm" onclick="deleteBlock('+cantaddBlock+')"><i class="fa fa-trash-o"></i></button>'+
                                            '</div>'+
                                            '<div class="col-md-6">'+
                                                '<button type="button" class="btn btn-outline-success btn-circle btn-sm" onclick="addBlock()"><i class="fa fa-plus"></i></button>'+
                                            '</div>'+
                                        '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                            '</div>'+
                        '</div>'+
                        '</div>'+
                    '</div>'+
                    '</div>';

                    // console.log(dato);

        el.innerHTML = dato;


        // el.style.backgroundColor = 'salmon';
        // el.style.width = '150px';
        // el.style.height = '150px';

        // ✅ add element to DOM
        const box = document.getElementById('cuerpos_form');
        box.appendChild(el);

        cantaddBlock++;
    }

    function deleteBlock(bloque, pregunta){

        arrayRemoveBlock.push(pregunta);

        Swal.fire({
            title: 'Esta seguro de eliminar el bloque?',
            text: "Se perdera la pregunta!",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {

            if (result.isConfirmed) {

                $("#bloque_"+bloque).remove();

            }
        })

    }


//   $(".sortable1").sortable({
//     items: ".s1"
//   });

//   $(".sortable1").disableSelection();

//   $(".sortable1").on("sortstop", function(event, ui) {
//     alert('ordenar detener a los padres');
//     console.log('sortstop padres Evento =', event, ' interfaz de usuario = ', ui);
//     console.log(ui.item);
//     if ($(ui.item).hasClass('s1')) {

//       console.log($(ui.item).hasClass('s1'));
//       console.log($(ui.item));

//       alert('es el elemento principal que se acaba de mover. Aquí puede hacer las cosas específicas de los elementos ordenables principales.');
//     } 
//   });


    function copiaLinkRedes(redSocial){
        
        var element_id = "urlFormulario_"+redSocial;
        var aux = document.createElement("input");
        aux.setAttribute("value", document.getElementById(element_id).innerHTML);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);

        Swal.fire({
            title: 'Excelente!',
            text: "Link Copiado!",
            icon: 'success',
            timer: 1500
        })
        
    }

    function guardaFormulario(){

        console.log(arrayRemoveCombo);
        console.log("----------------");
        console.log(arrayRemoveBlock);

        $('#removeCombos').val(arrayRemoveCombo);
        $('#removeBlock').val(arrayRemoveBlock);

        Swal.fire({
            title: 'Esta seguro de editar el formulario?',
            text: "No podra revertir eso!",
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Editar!'
        }).then((result) => {

            if (result.isConfirmed) {

                if ($("#formularioEditaFormulario")[0].checkValidity()) {

                    $("#formularioEditaFormulario").submit();

                }else{

                    $("#formularioEditaFormulario")[0].reportValidity();
                }

            }
        })
    }

    // function cambiar(){
    //     var pdrs = document.getElementById('file-upload').files[0].name;
    //     document.getElementById('info').innerHTML = pdrs;
    // }

     // PARA SUBIR LA IMAGEN Y PREVISULIR ESE RATO
     function readImage (input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image-previw').attr('src', e.target.result); // Renderizamos la imagen
        }
        reader.readAsDataURL(input.files[0]);
        }
    }


    $("#file-upload").change(function () {

        // par cambiar el estilo del boton file
        var pdrs = document.getElementById('file-upload').files[0].name;
        document.getElementById('info').innerHTML = pdrs;


        // Código a ejecutar cuando se detecta un cambio de archivO
        readImage(this);
        $('#bnt-elimina-img').toggle('show');

    });

    function cambiaColor(){

        $('#color_formulario').val($('#color-form').val());

        $(".borderColor").css("background", $('#color-form').val());

    }

    function quitaImgFormulario(){
        
        var ruta = "{{ url('blanco.jpg') }}";

        $('#image-previw').attr('src', ruta); // Renderizamos la imagen
        $('#bnt-elimina-img').toggle('show');
        $('#file-upload').val('');
        $('#info').text('');

    }
    </script>
@endsection