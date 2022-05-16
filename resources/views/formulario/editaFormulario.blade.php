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
    </style>
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            FORMULARIO
                            {{-- @dd($formulario->color) --}}
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <p style="display: none;" id="urlFormulario_fb">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $formulario->id,"fb"]) }}</p>
                            <p style="display: none;" id="urlFormulario_wa">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $formulario->id,"wa"]) }}</p>
                            <p style="display: none;" id="urlFormulario_ig">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $formulario->id,"ig"]) }}</p>
                            <p style="display: none;" id="urlFormulario_tw">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $formulario->id,"tw"]) }}</p>
                            <button onclick="copiaLinkRedes('fb')" class="btn btn-icon-only btn-rounded btn-dark mb-0 p-1"><i class="fa fa-facebook"></i></button>
                            <button onclick="copiaLinkRedes('wa')" class="btn btn-icon-only btn-rounded btn-success mb-0 p-1"><i class="fa fa-whatsapp"></i></button>
                            <button onclick="copiaLinkRedes('ig')" class="btn btn-icon-only btn-rounded btn-danger mb-0 p-1"><i class="fa fa-instagram"></i></button>
                            <button onclick="copiaLinkRedes('tw')" class="btn btn-icon-only btn-rounded btn-info mb-0 p-1"><i class="fa fa-twitter"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <form action="{{ url('Formulario/guardarEditadoFormulario') }}" method="post" target="_target">
                    @csrf
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

                    <input type="text" value="{{ $campania_id }}" name="campania_id">
                    <input type="text" value="{{ $formulario->id }}" name="formulario_id">
                    <input type="text" value="#673ab7" name="color_formulario" id="color_formulario">
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

                        {{-- <div class="col-md-4">
                            <div class="title">
                                <h6 style="padding:10px">Apellido Paterno <b class="text-danger">{{ ($ap_paterno->requerido == 1)? '*' : ''}}</b></h6>
                                <input style="padding:10px" name="apellido_paterno" {{ ($ap_paterno->requerido == 1)? 'required' : ''}} type="text" class="boredes-cajas" placeholder="Tu respuesta..">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="title">
                                <h6 style="padding:10px">Apellido Materno <b class="text-danger">{{ ($ap_materno->requerido == 1)? '*' : ''}}</b></h6>
                                <input style="padding:10px" name="apellido_materno" type="text"  {{ ($ap_materno->requerido == 1)? 'required' : ''}} class="boredes-cajas" placeholder="Tu respuesta..">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="title">
                                <h6 style="padding:10px">Nombre Completo <b class="text-danger">{{ ($nombre->requerido == 1)? '*' : ''}}</b></h6>
                                <input style="padding:10px" name="nombre" type="text" {{ ($nombre->requerido == 1)? 'required' : ''}}  class="boredes-cajas" placeholder="Tu respuesta..">
                            </div>
                        </div> --}}
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
                                                <select name="componente_tipo[]" id="" class="form-control" onchange="addComponent(this,1)">
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
                                            <p style="padding: 2px;"></p>
                                            @if ($p->componente_id == 3 || $p->componente_id == 4)
                                                <ol class="listaul" id="select_lista_{{ $key }}">
                                                    @foreach ($p->valoresCombo  as $keeyCom => $vaCo)
                                                        <li id="option_{{ $key }}_{{ $keeyCom }}">
                                                            <div class="row">
                                                                <div class="col-md-11">
                                                                    <input type="text" class="boredes-cajas" name="select_{{ $key }}[]" value="{{ $vaCo->valor }}">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <p style='padding:1px;'></p><i class='fa fa-window-close' onclick='removeItem(select_lista_{{ $key }}, option_{{ $key }}_{{ $keeyCom }})'></i>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                                <button type="button" class="text-info" style="border:none;outline: none;" onclick="addOptionSelect('{{ $key }}')">Adicionar opcion</button>

                                                @php
                                                
                                                    if($p->componente_id == 3){

                                                        $keyselct = $keeyCom;

                                                    }else{

                                                        $keyChek = $keeyCom;

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
                                                            <button type="button" class="btn btn-outline-danger btn-circle btn-sm" onclick="deleteBlock(1)"><i class="fa fa-trash-o"></i></button>
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
                        <button class="btn btn-outline-success btn-circle btn-block" >EDITAR RESPUESTA</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')

  <script  type="text/javascript">


    $( document ).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $('.borderColor').css('background', 'red');
        
        $('.borderColor').css('background', "{{ $formulario->color }}");
        // $('.borderColor').css('background', "red");


        // showQuestions();

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
            var component =  '<ol  class="listaul"  id="check_lista_'+bloque+'"><li><input type="text" class="boredes-cajas" value="Check 1"/></li></ol><button type="button"  class="text-info" style="border:none;outline: none;" onclick="addOptionCheck('+bloque+')">Adicionar Check</button>';
        }

        $('#component_'+bloque).html(component);

    }

    var cantaddOptionSelect = {{ $keyselct }};

    function addOptionSelect(bloque){

        console.log("apretaste add optin select");

        cantaddOptionSelect++;

        const listid = "select_lista_"+bloque;

        const optionid = "option_"+cantaddOptionSelect;

        $("#select_lista_"+bloque).append("<li id="+optionid+"><div class='row'><div class='col-md-11'><input type='text' name='select_"+bloque+"[]' class='boredes-cajas' value='Opcion "+cantaddOptionSelect+"'/></div><div class='col-md-1'><p style='padding:1px;'></p><i class='fa fa-window-close' onclick='removeItem("+listid.toString()+","+optionid.toString()+")'></i></div></div></li>");

        console.log(listid);
        console.log(optionid);

    }

    function removeItem(listid, li) {
 
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

        $("#check_lista_"+bloque).append("<li id="+optionCheckid+"><div class='row'><div class='col-md-11'><input type='text' name='checkbox_"+bloque+"[]' class='boredes-cajas' value='Check "+cantaddOptionCheck+"'/></div><div class='col-md-1'><p style='padding:1px;'></p><i class='fa fa-window-close' onclick='removeItemCheck("+listidCheck.toString()+","+optionCheckid.toString()+")'></i></div></div></li>");
    }

    function removeItemCheck(listid, li) {

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

    function deleteBlock(bloque){

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
    </script>
@endsection