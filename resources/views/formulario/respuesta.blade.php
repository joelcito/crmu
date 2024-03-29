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

        /* .title {
            align-items:center;
        
            background: var(--color-two);
            color: var(--color-four);
        
            border-radius: 10px;
            overflow: hidden;
            margin: 1rem;
        } */
        
        .title > .borderColor {
            height: 10px;
            background: var(--color-three);
        }

        .title > h1 {
            padding: 2rem 1rem;
            font-weight: lighter;
        }


        /* .actual-question {
            font-size: 1.1rem;
        } */
        
        /* .container {
            display: block;
            cursor: pointer;
            position: relative;
            margin: 1rem 0;
        
            font-size: 1rem;
        
            display: flex;
            align-items: center;
            justify-content: flex-start;
        
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        } */
        
        /* .checkmark {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            position: relative;
        
            margin-right: 1rem;
        
            background: var(--color-two);
            border: 2px solid var(--color-five);
        } */
        
        /* .container:hover input ~ .checkmark {
            -webkit-box-shadow: 0px 0px 0px 10px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0px 0px 0px 10px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 0px 0px 10px rgba(0, 0, 0, 0.05);
        } */
        
        /* .container input:checked ~ .checkmark {
            border: 2px solid var(--color-three);
        } */
        
        /* .checkmark:after {
            content: "";
            display: none;
        } */
        
        /* .container input:checked ~ .checkmark:after {
            display: block;
        } */
        
        /* .container .checkmark:after {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 10px;
            border-radius: 50%;
        
            background: var(--color-three);
        } */
        
        /* .submition {
            width: 100%;
            max-width: 650px;
        } */
        
        /* .submition input {
            cursor: pointer;
            padding: 0.7rem 1rem;
            background: var(--color-three);
            color: var(--color-one);
            border: 0;
            border-radius: 5px;
            margin-right: auto;
            font-size: large;
        } */

        /* .submition input:hover {
            opacity: 0.9;
        } */
        
        /* .form-control input{
            border-bottom: 1px dotted gray;
            border-top: none;
            border-left: none;
            border-right: none;
            border-radius: 4px;
            display: block;
            width: 50%;
            padding: 8px;
            font-size: 14px; 
        } */

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
                  <form action="{{ url('Formulario/guardarRespuestaFormulario') }}" method="post" target="_target">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <center>
                                    <div style="max-height:200px;">
                                        <img src='{{ asset("imagenesFormulario/$formulario->imagen") }}' alt="Aqui la imagen">
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="title">
                            <div class="borderColor"></div>
                            <h1>
                              <div>
                                  <h2>{{ $formulario->nombre }}</h2>
                                  <p style="padding: 2px"></p>
                                  <hr>
                                  <h6>{{ $formulario->descripcion }}</h6>
                              </div>
                            </h1>
                        </div>
                      </div>
                    </div>

                    <input type="hidden" value="{{ $campania_id }}" name="campania_id">
                    <input type="hidden" value="{{ $formulario->id }}" name="formulario_id">
                    <br>
                    <div class="row">
                        <div class="col-md-4">
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
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
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
                        </div>
                    </div>
                    
                    @foreach ( $preguntas_form as $keyFomr => $p)
                    <br>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="title">
                                  <h6 style="padding:20px">{{ $p->nombre }}</h6>

                                  <div style="padding: 20px">
                                    @if ($p->componente_id == 3 || $p->componente_id == 4)

                                        @php
                                          $valores = $p->valoresCombo;
                                        @endphp

                                        @if ($p->componente_id == 3)

                                          {{-- <input type="radio" id="html" name="fav_language" value="HTML">
                                            <label for="html">HTML</label><br>
                                            <input type="radio" id="css" name="fav_language" value="CSS">
                                            <label for="css">CSS</label><br>
                                            <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                                            <label for="javascript">JavaScript</label> --}}

                                          <div class="input-group input-group-static mb-4">
                                            {{-- <label for="exampleFormControlSelect1" class="ms-0">Example select</label> --}}
                                            <select  name="respuestas[{{ $p->id }}][]" class="form-control" id="exampleFormControlSelect1">
                                                @foreach ( $valores as $v)
                                                    <option value="{{ $v->valor }}">{{ $v->valor }}</option>
                                                @endforeach
                                            </select>
                                          </div>

                                        {{-- <select name="respuestas[{{ $p->id }}][]" id="" class="form-control">
                                            @foreach ( $valores as $v)
                                            <option value="{{ $v->valor }}">{{ $v->valor }}</option>
                                            @endforeach
                                        </select>  --}}
                                        {{-- <input type="text" name="pregunta_ids[]" value="{{ $p->id }}"> --}}    
                                          
                                        @else

                                          @foreach ($valores as $key => $v)
                                            <label for="vehicle_{{ $key }}_{{ $keyFomr }}"> {{ $v->valor }}</label>
                                            <input type="checkbox" name="respuestas[{{ $p->id }}][]" id="vehicle_{{ $key }}_{{ $keyFomr }}" name="vehicle1" value="{{ $v->valor }}"><br>
                                          @endforeach
                                          {{-- <input type="text" name="pregunta_ids[]" value="{{ $p->id }}"> --}}

                                        @endif

                                    @elseif ($p->componente_id == 2)

                                      <textarea name="respuestas[{{ $p->id }}][]" id="" cols="30" rows="2" placeholder="Tu respuesta.." class="boredes-cajas"></textarea>
                                      {{-- <input type="text" name="pregunta_ids[]" value="{{ $p->id }}"> --}}

                                    @else

                                      <input style="padding:20px" name="respuestas[{{ $p->id }}][]" type="text" class="boredes-cajas" placeholder="Tu respuesta..">
                                      {{-- <input type="text" name="pregunta_ids[]" value="{{ $p->id }}"> --}}

                                    @endif
                                  </div>                                      
                                  <br>
                              </div>
                          </div>
                      </div>
                    @endforeach
                    <div id="cuerpos_form" class="sortable1">
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <button class="btn btn-outline-success btn-circle btn-block" disabled >ENVIAR RESPUESTA</button>
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
            var component =  '<ul  id="select_lista_'+bloque+'"><li><input type="text" name="select_'+bloque+'[]" class="boredes-cajas" value="Opcion 1"/></li></ul><button type="button" class="text-info" style="border:none;outline: none;" onclick="addOptionSelect('+bloque+')">Adicionar opcion</button>';
        }else if(type == 'textarea'){
            var component =  '<textarea class="boredes-cajas" name="textarea_'+bloque+'[]" id="" cols="30" rows="2" placeholder="Respuesta Larga"></textarea>';
        }else if(type == 'file'){
            var component =  '<div class="row"><div class="col-md-4"><input type="number" name="checkbox_'+bloque+'[]" class="boredes-cajas" placeholder="Cantidad de archivos requeridos"/></div><div class="col-md-4"><input type="number" class="boredes-cajas" placeholder="Tamaño maximo del archivo"/></div></div>';
        }else{
            var component =  '<ul  id="check_lista_'+bloque+'"><li><input type="text" class="boredes-cajas" value="Check 1"/></li></ul><button type="button"  class="text-info" style="border:none;outline: none;" onclick="addOptionCheck('+bloque+')">Adicionar Check</button>';
        }

        $('#component_'+bloque).html(component);

    }

    var cantaddOptionSelect = 1;

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

        console.log("entre a remove li");

        console.log(listid);
        console.log(li);
        console.log(li.id);
 
        // Declaring a variable to get select element
        // var a = document.getElementById("list");
        // var candidate = document.getElementById("candidate");
        // var item = document.getElementById(candidate.value);
        // a.removeChild(item);

        // listid.removeChild(li.id);
        listid.removeChild(li);
    }

    var cantaddOptionCheck = 1;

    function addOptionCheck(bloque){

        cantaddOptionCheck++;

        const listidCheck = "check_lista_"+bloque;

        const optionCheckid = "optionCehck_"+cantaddOptionCheck;

        $("#check_lista_"+bloque).append("<li id="+optionCheckid+"><div class='row'><div class='col-md-11'><input type='text' name='checkbox_"+bloque+"[]' class='boredes-cajas' value='Check "+cantaddOptionCheck+"'/></div><div class='col-md-1'><p style='padding:1px;'></p><i class='fa fa-window-close' onclick='removeItemCheck("+listidCheck.toString()+","+optionCheckid.toString()+")'></i></div></div></li>");
    }

    function removeItemCheck(listid, li) {

        console.log("entre a remove li");

        console.log(listid);
        console.log(li);
        console.log(li.id);

        listid.removeChild(li);
    }

    var cantaddBlock = 2;

    // function addBlock(){

    //   // ✅ Create element
    //   const el = document.createElement('div');

    //   el.addEventListener('click', function handleClick(event) {
    //       console.log('element clicked 🎉🎉🎉', event);
    //   });


    //   var option = "<option>Seleccione una opcion</option>";

    //   for (var i = 0; i < componentes.length; i++) {
    //     option = option + '<option value="'+componentes[i]['nombre']+'">'+componentes[i]['descripcion']+'</option>';
    //   }

    //   // ✅ Add text content to element
    //   // var content = "<input type='text' class='form-control'/>"
    //   // el.textContent = content;

    //   // ✅ Or set the innerHTML of the element
    //   // el.innerHTML = `<span>Hello world</span>`;
    //   // el.innerHTML = `<input type="text" class="form-control"/>`;
    //   var dato = '<div class="row s1" id="bloque_'+cantaddBlock+'">'+
    //                 '<div class="col-md-12">'+
    //                   '<div class="title">'+
    //                     '<div style="padding: 25px;">'+
    //                       '<div class="row">'+
    //                         '<div class="col-md-9">'+
    //                           '<input type="text" id="nombre_pregunta" name="nombre_pregunta[]" class="boredes-cajas" placeholder="Nombre de la pregunta"/>'+
    //                         '</div>'+
    //                         '<div class="col-md-3">'+
    //                           '<select name="componente_tipo[]" id="" class="form-control" onchange="addComponent(this, '+cantaddBlock+')">'+
    //                             // '<option value="select">Seleccion Unica</option>'+
    //                             // '<option value="checkbox">Seleccion Multiple</option>'+
    //                             // '<option value="input">Respuesta Corta</option>'+
    //                             // '<option value="taxtarea">Respuesta Largo</option>'+
    //                             // '<option value="file">Adjuntar Archivo</option>'+
    //                             option+
    //                           '</select>'+
    //                         '</div>'+
    //                       '</div>'+
    //                       '<div class="row">'+
    //                         '<div class="col-md-12">'+
    //                           '<p style="padding: 2px"></p>'+
    //                           '<div id="component_'+cantaddBlock+'">'+

    //                           '</div>'+
    //                           '<hr>'+
    //                           '<div class="footer">'+
    //                               '<div class="row">'+
    //                                   '<div class="col-md-5">'+

    //                                   '</div>'+
    //                                   '<div class="col-md-6">'+

    //                                   '</div>'+
    //                                   '<div class="col-md-1 float-right">'+
    //                                       '<button type="button" class="btn btn-outline-success btn-circle btn-sm" onclick="addBlock()"><i class="fa fa-plus"></i></button>'+
    //                                   '</div>'+
    //                               '</div>'+
    //                           '</div>'+
    //                         '</div>'+
    //                       '</div>'+
    //                     '</div>'+
    //                   '</div>'+
    //                 '</div>'+
    //               '</div>';
      
    //               // console.log(dato);

    //   el.innerHTML = dato;


    //   // el.style.backgroundColor = 'salmon';
    //   // el.style.width = '150px';
    //   // el.style.height = '150px';

    //   // ✅ add element to DOM
    //   const box = document.getElementById('cuerpos_form');
    //   box.appendChild(el);

    //   cantaddBlock++;
    // }


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