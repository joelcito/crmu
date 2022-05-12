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
            
            .title > .border {
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

    {{-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard-pro/pages/dashboards/analytics.html " target="_blank">
            <img src="http://crmu.test/assets/img/iconU.png" class="navbar-brand-img h-100" alt="main_logo">
            
            <span class="ms-1 font-weight-bold text-white"><img src="http://crmu.test/assets/img/logo_unandes.png" alt="" height="40"></span>
        </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mb-2 mt-0">
            <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button" aria-expanded="false">
                <img src="http://crmu.test/assets/img/team-3.jpg" class="avatar">
                <span class="nav-link-text ms-2 ps-1">Brooklyn Alice</span>
            </a>
            <div class="collapse" id="ProfileNav" style="">
                <ul class="nav ">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../../pages/pages/profile/overview.html">
                    <span class="sidenav-mini-icon"> MP </span>
                    <span class="sidenav-normal  ms-3  ps-1"> My Profile </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../../pages/pages/account/settings.html">
                    <span class="sidenav-mini-icon"> S </span>
                    <span class="sidenav-normal  ms-3  ps-1"> Settings </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../../pages/authentication/signin/basic.html">
                    <span class="sidenav-mini-icon"> L </span>
                    <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
                    </a>
                </li>
                </ul>
            </div>
            </li>
            <hr class="horizontal light mt-0">
            
            <li class="nav-item mt-3">       
            <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">CAMPAÑA</h6>
            </li>
            <li class="nav-item">
            <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link text-white  " aria-controls="pagesExamples" role="button" aria-expanded="false">
                <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">image</i>
                <span class="nav-link-text ms-2 ps-1">Campaña</span>
            </a>
            <div class="collapse  " id="pagesExamples">
                <ul class="nav">
                
                <li class="nav-item ">
                    <a class="nav-link text-white  " href="http://crmu.test/Campania/Listado">
                    <span class="sidenav-mini-icon"> P </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Listado de Campañas</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white  " href="http://crmu.test/Persona/listado">
                    <span class="sidenav-mini-icon"> R </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Listado de Clientes </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white " href="#">
                    <span class="sidenav-mini-icon"> W </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Listado de Formularios </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white " href="http://crmu.test/TipoCampania/listado">
                    <span class="sidenav-mini-icon"> C </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Tipo Campañas </span>
                    </a>
                </li>
                
                </ul>
            </div>
            </li>
            <li class="nav-item">
            <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link text-white " aria-controls="applicationsExamples" role="button" aria-expanded="false">
                <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">apps</i>
                <span class="nav-link-text ms-2 ps-1">Vendedores</span>
            </a>
            <div class="collapse " id="applicationsExamples">
                <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link text-white active" href="http://crmu.test/Vendedor/listado">
                    <span class="sidenav-mini-icon"> C </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Listado de vendedores </span>
                    </a>
                </li>
                
                </ul>
            </div>
            </li>
            <li class="nav-item">
            <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link text-white " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
                <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
                <span class="nav-link-text ms-2 ps-1">Configuraciones</span>
            </a>
            <div class="collapse " id="ecommerceExamples">
                <ul class="nav ">
                <li class="nav-item ">
                    <a class="nav-link text-white " href="#">
                    <span class="sidenav-mini-icon"> R </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Medio de Seguimientos </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white " href="#">
                    <span class="sidenav-mini-icon"> R </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Medio Publicitario </span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#ordersExample">
                    <span class="sidenav-mini-icon"> O </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Estado <b class="caret"></b></span>
                    </a>
                    <div class="collapse " id="ordersExample">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                        <a class="nav-link text-white " href="#">
                            <span class="sidenav-mini-icon"> O </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Estado seguimiento </span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white " href="#">
                            <span class="sidenav-mini-icon"> O </span>
                            <span class="sidenav-normal  ms-2  ps-1"> Estado Final </span>
                        </a>
                        </li>
                    </ul>
                    </div>
                </li>
                
                </ul>
            </div>
            </li>
            <li class="nav-item">
            <a data-bs-toggle="collapse" href="#authExamples" class="nav-link text-white " aria-controls="authExamples" role="button" aria-expanded="false">
                <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">content_paste</i>
                <span class="nav-link-text ms-2 ps-1">Asignaciones</span>
            </a>
            <div class="collapse " id="authExamples">
                <ul class="nav ">
                <li class="nav-item ">
                    <a class="nav-link text-white " href="#">
                    <span class="sidenav-mini-icon"> R </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Mis Asignaciones </span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link text-white " href="http://crmu.test/Asignacion/tareas">
                    <span class="sidenav-mini-icon"> T </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Tareas </span>
                    </a>
                </li>
                </ul>
                
            </div>
            </li>
            
        </ul>
        </div>
    </aside> --}}

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        {{-- <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                <a class="opacity-3 text-dark" href="javascript:;">
                    <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>shop </title>
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                        <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(0.000000, 148.000000)">
                            <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                            <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                            </g>
                        </g>
                        </g>
                    </g>
                    </svg>
                </a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sales</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Sales</h6>
            </nav>
            <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
            <a href="javascript:;" class="nav-link text-body p-0">
                <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                </div>
            </a>
            </div>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                <label class="form-label">Search here</label>
                <input type="text" class="form-control">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item">
                <a href="../../pages/authentication/signin/illustration.html" class="nav-link text-body p-0 position-relative" target="_blank">
                    <i class="material-icons me-sm-1">
                account_circle
                </i>
                </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
                </li>
                <li class="nav-item px-3">
                <a href="javascript:;" class="nav-link text-body p-0">
                    <i class="material-icons fixed-plugin-button-nav cursor-pointer">
                settings
                </i>
                </a>
                </li>
                <li class="nav-item dropdown pe-2">
                <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="material-icons cursor-pointer">
                notifications
                </i>
                    <span class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger border border-white small py-1 px-2">
                    <span class="small">11</span>
                    <span class="visually-hidden">unread notifications</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
                    <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                        <div class="d-flex align-items-center py-1">
                        <span class="material-icons">email</span>
                        <div class="ms-2">
                            <h6 class="text-sm font-weight-normal my-auto">
                            Check new messages
                            </h6>
                        </div>
                        </div>
                    </a>
                    </li>
                    <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                        <div class="d-flex align-items-center py-1">
                        <span class="material-icons">podcasts</span>
                        <div class="ms-2">
                            <h6 class="text-sm font-weight-normal my-auto">
                            Manage podcast session
                            </h6>
                        </div>
                        </div>
                    </a>
                    </li>
                    <li>
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                        <div class="d-flex align-items-center py-1">
                        <span class="material-icons">shopping_cart</span>
                        <div class="ms-2">
                            <h6 class="text-sm font-weight-normal my-auto">
                            Payment successfully completed
                            </h6>
                        </div>
                        </div>
                    </a>
                    </li>
                </ul>
                </li>
            </ul>
            </div>
        </div>
        </nav> --}}
        
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <form action="{{ url('Formulario/guardarRespuestaFormulario') }}" method="post" target="_target">
                            @csrf
                            <div class="row">
                            <div class="col-md-12">
                                <div class="title">
                                    <div class="border"></div>
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
                            
                            @foreach ( $preguntas_form as $p)
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
                                                    <label for="vehicle_{{ $key }}"> {{ $v->valor }}</label>
                                                    <input type="checkbox" name="respuestas[{{ $p->id }}][]" id="vehicle_{{ $key }}" name="vehicle1" value="{{ $v->valor }}"><br>
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
                                <button class="btn btn-outline-success btn-circle btn-block">ENVIAR RESPUESTA</button>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
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

    {{-- <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
            <div class="float-start">
            <h5 class="mt-3 mb-0">Material UI Configurator</h5>
            <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                <i class="material-icons">clear</i>
            </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
            <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors my-2 text-start">
                <span class="badge filter bg-gradient-primary" data-color="primary" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-success active" data-color="success" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
            </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
            <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
            <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
            <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
            <h6 class="mb-0">Navbar Fixed</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
            </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
            <h6 class="mb-0">Sidenav Mini</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize" onclick="navbarMinimize(this)">
            </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
            <h6 class="mb-0">Light / Dark</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
            </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Buy now</a>
            <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard">Free demo</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
            <div class="w-100 text-center">
            <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
            <h6 class="mt-3">Thank you for sharing!</h6>
            <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20PRO%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-pro" class="btn btn-dark mb-0 me-2" target="_blank">
                <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard-pro" class="btn btn-dark mb-0 me-2" target="_blank">
                <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
            </a>
            </div>
        </div>
        </div>
    </div> --}}

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