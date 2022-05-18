<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/iconU.png') }}">
        {{-- <meta name="csrf-token" content="SxmuSWNnlnRZAAtjBcT5BhDSjkN1ZyGg0JqFy0Bp" /> --}}
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>
            CRM - FORMULARIO
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.3') }}" rel="stylesheet" />
        <link id="pagestyle" href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
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
    </head>

<body class="g-sidenav-show  bg-gray-200">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
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

                            <input type="text" value="{{ $campania_id }}" name="campania_id">
                            <input type="text" value="{{ $formulario->id }}" name="formulario_id">
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
                            
                            @foreach ( $preguntas_form as $keyFrom => $p)
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

                                                <div class="input-group input-group-static mb-4">
                                                    <select  name="respuestas[{{ $p->id }}][]" class="form-control" id="exampleFormControlSelect1">
                                                        @foreach ( $valores as $v)
                                                            {{-- <option value="{{ $v->valor }}">{{ $v->valor }}</option> --}}
                                                            <option value="{{ $v->id }}">{{ $v->valor }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                @else

                                                @foreach ($valores as $key => $v)
                                                    <label for="vehicle_{{ $key }}_{{ $keyFrom }}"> {{ $v->valor }}</label>
                                                    {{-- <input type="checkbox" name="respuestas[{{ $p->id }}][]" id="vehicle_{{ $key }}_{{ $keyFrom }}" name="vehicle1" value="{{ $v->valor }}"><br> --}}
                                                    <input type="checkbox" name="respuestas[{{ $p->id }}][]" id="vehicle_{{ $key }}_{{ $keyFrom }}" name="vehicle1" value="{{ $v->id }}"><br>
                                                @endforeach

                                                @endif

                                            @elseif ($p->componente_id == 2)

                                            <textarea name="respuestas[{{ $p->id }}][]" id="" cols="30" rows="2" placeholder="Tu respuesta.." class="boredes-cajas"></textarea>

                                            @else

                                            <input style="padding:20px" name="respuestas[{{ $p->id }}][]" type="text" class="boredes-cajas" placeholder="Tu respuesta..">

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
                                <button class="btn btn-outline-success btn-circle btn-block">ENVIAR RESPUESTA</button>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                {{-- <div class="col-md-12"> --}}
                    
                {{-- </div> --}}
            </div>
            <footer class="footer py-4  ">
                <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                        document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                        for a better web.
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                        <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </footer>
        </div>
    </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <!-- Kanban scripts -->
  <script src="{{ asset('assets/js/plugins/dragula/dragula.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jkanban/jkanban.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>

  
  <script src="{{ asset('assets/js/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/select2.min.js') }}"></script>


  
  <script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="http://crmu.test/assets/js/material-dashboard.min.js?v=3.0.3"></script>
  
  <script  type="text/javascript">

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

    </script>
</body>

</html>