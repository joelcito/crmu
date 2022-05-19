@extends('layouts.app')

@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('css')
    <style>
        .async-hide {
        opacity: 0 !important
        }
    </style>
@endsection

@section('content')
{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
        <title>
            Material Dashboard 2 PRO by Creative Tim
        </title>


        <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />

        <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, material dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, material design, material dashboard bootstrap 5 dashboard">
        <meta name="description" content="Material Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">

        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@creativetim">
        <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim">
        <meta name="twitter:description" content="Material Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
        <meta name="twitter:creator" content="@creativetim">
        <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_bs5_thumbnail.jpg">

        <meta property="fb:app_id" content="655968634437471">
        <meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="https://demos.creative-tim.com/material-dashboard-pro/pages/dashboards/default.html" />
        <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_bs5_thumbnail.jpg" />
        <meta property="og:description" content="Material Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
        <meta property="og:site_name" content="Creative Tim" />

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

        <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />

        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

        <link id="pagestyle" href="../../assets/css/material-dashboard.min.css?v=3.0.3" rel="stylesheet" />

        <style>
            .async-hide {
            opacity: 0 !important
            }
        </style>
        <script>
            (function(a, s, y, n, c, h, i, d, e) {
            s.className += ' ' + y;
            h.start = 1 * new Date;
            h.end = i = function() {
                s.className = s.className.replace(RegExp(' ?' + y), '')
            };
            (a[n] = a[n] || []).hide = h;
            setTimeout(function() {
                i();
                h.end = null
            }, c);
            h.timeout = c;
            })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {
            'GTM-K9BGS8K': true
            });
        </script>

        <script>
            (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-46172202-22', 'auto', {
            allowLinker: true
            });
            ga('set', 'anonymizeIp', true);
            ga('require', 'GTM-K9BGS8K');
            ga('require', 'displayfeatures');
            ga('require', 'linker');
            ga('linker:autoLink', ["2checkout.com", "avangate.com"]);
        </script>


        <script>
            (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
        </script>

    </head>
<body class="g-sidenav-show  bg-gray-200">


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <div class="container-fluid py-4"> --}}
    <div class="row">
        <div class="col-md-6">
            <h5 class="mb-0">Charts</h5>
            <p class="text-sm mb-0">
                Charts on this page use Chart.js - Simple yet flexible JavaScript charting for designers & developers.
            </p>
        </div>
    </div>
    {{-- <div class="row mt-4">
        <div class="col-lg-6 col-12">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">insights</i>
                    </div>
                    <div class="d-block d-md-flex">
                        <div class="me-auto">
                            <h6 class="mb-0">Line chart</h6>
                            <p class="mb-0 text-sm">Product insights</p>
                        </div>
                        <span class="badge badge-lg badge-dot me-4 d-inline-block text-start">
                            <i class="bg-primary"></i>
                            <span class="text-dark">Organic</span>
                        </span>
                        <span class="badge badge-lg badge-dot me-4 d-inline-block text-start">
                            <i class="bg-dark"></i>
                            <span class="text-dark">Refferal</span>
                        </span>
                        <span class="badge badge-lg badge-dot me-4 d-inline-block text-start">
                            <i class="bg-info"></i>
                            <span class="text-dark">Direct</span>
                        </span>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <div class="chart">
                        <canvas id="line-chart" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mt-md-0 mt-4">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">show_chart</i>
                    </div>
                    <div class="d-block d-md-flex">
                        <div class="me-auto">
                            <h6 class="mb-0">Line chart without dots</h6>
                            <p class="mb-0 text-sm">Visits from devices</p>
                        </div>
                        <span class="badge badge-lg badge-dot me-4 d-inline-block text-start">
                            <i class="bg-primary"></i>
                            <span class="text-dark">Mobile Apps</span>
                        </span>
                        <span class="badge badge-lg badge-dot me-4 d-inline-block text-start">
                            <i class="bg-dark"></i>
                            <span class="text-dark">Websites</span>
                        </span>
                    </div>
                </div>
                <div class="card-body p-3 pt-0">
                    <div class="chart">
                        <canvas id="line-chart-gradient" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="row mt-4">
        <div class="col-lg-6 col-12">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">leaderboard</i>
                    </div>
                    <h6 class="mb-0">Bar chart</h6>
                    <p class="mb-0 text-sm">Sales related to age average</p>
                </div>
                <div class="card-body p-3 pt-0">
                    <div class="chart">
                        <canvas id="bar-chart" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mt-md-0 mt-4">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">splitscreen</i>
                    </div>
                    <h6 class="mb-0">Bar chart horizontal</h6>
                    <p class="mb-0 text-sm">Sales related to age average</p>
                </div>
                <div class="card-body p-3 pt-0">
                    <div class="chart">
                        <canvas id="bar-chart-horizontal" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="row mt-4">
        <div class="col-lg-6 col-12">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">auto_graph</i>
                    </div>
                    <h6 class="mb-0">Mixed chart</h6>
                    <p class="mb-0 text-sm">Analytics Insights</p>
                </div>
                <div class="card-body p-3 pt-0">
                    <div class="chart">
                        <canvas id="mixed-chart" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mt-md-0 mt-4">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">multiline_chart</i>
                    </div>
                    <h6 class="mb-0">Bubble chart</h6>
                    <p class="mb-0 text-sm">Users divided by regions</p>
                </div>
                <div class="card-body p-3 pt-0">
                    <div class="chart">
                        <canvas id="bubble-chart" class="chart-canvas" height="140"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @php
        $cantidadPreguntas = count($preguntas);

        $contador = 0;
        // dd($cantidadPreguntas);
    @endphp

    @while ($contador < $cantidadPreguntas)

        <div class="row">
            @for ($i = 0; $i < 2; $i++)

                @if ($contador < $cantidadPreguntas)

                    <div class="col-md-6">
                        <div class="card z-index-2 mt-4">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
                                    <i class="material-icons opacity-10">donut_small</i>
                                </div>
                                <h6 class="mb-0">{{ $preguntas[$contador]->nombre }}</h6>
                                <p class="mb-0 text-sm">Affiliates program</p>
                            </div>
                            <div class="card-body d-flex p-3 pt-0">
                                <div class="chart w-50">
                                    <canvas id="doughnut-chart_{{ $contador }}" class="chart-canvas" height="300"></canvas>
                                    {{-- <canvas id="doughnut-chart" class="chart-canvas" height="300"></canvas> --}}
                                </div>
                                {{-- @dd($preguntas[$contador]->valoresCombo) --}}
                                <div class="table-responsive w-50">
                                    <table class="table align-items-center mb-0">
                                        <tbody>

                                            @foreach ( $preguntas[$contador]->valoresCombo as $valor)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            {{-- <div>
                                                                <img src="{{ asset('assets/img/small-logos/devto.svg') }}" class="avatar avatar-sm me-2" alt="logo_xd">
                                                            </div> --}}
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $valor->valor }}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">

                                                        @php

                                                            $RespuestaCombo = App\Models\RespuestaCombo::cantidadRespuesta($valor->id);

                                                            // echo     $valor->id."<br>";

                                                            echo     $RespuestaCombo;

                                                        @endphp

                                                        {{-- <span class="text-xs font-weight-bold"> 25% </span> --}}
                                                    </td>
                                                </tr>    
                                            @endforeach
                                            {{-- <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('assets/img/small-logos/devto.svg') }}" class="avatar avatar-sm me-2" alt="logo_xd">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">DevTo</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 25% </span>
                                                </td>
                                            </tr> --}}
                                            {{-- <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('assets/img/small-logos/creative-tim.svg') }}" class="avatar avatar-sm me-2" alt="logo_atlassian">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">CreativeTim</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 13% </span>
                                                </td>
                                            </tr> --}}
                                            {{-- <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('assets/img/small-logos/bootstrap.svg') }}" class="avatar avatar-sm me-2" alt="logo_slack">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Bootsnip</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 12% </span>
                                                </td>
                                            </tr> --}}
                                            {{-- <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('assets/img/small-logos/github.svg') }}" class="avatar avatar-sm me-2" alt="logo_spotify">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Github</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> 37% </span>
                                                </td>
                                            </tr> --}}
                                            {{-- <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('assets/img/small-logos/google-webdev.svg') }}" class="avatar avatar-sm me-2" alt="logo_jira">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Codeinwp</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> 13% </span>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $contador++;       
                    @endphp
                    
                @endif

            @endfor
        </div>
    
    @endwhile

    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    

                    <div class="row">
                    <div class="col-12">
                    <div class="card">

                    <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Listado de Respuestas</h5>
                            {{-- <p class="text-sm mb-0">
                            A lightweight, extendable, dependency-free javascript HTML table plugin.
                            </p> --}}
                        </div>
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            {{-- <a href="./new-product.html" class="btn bg-gradient-primary btn-sm mb-0" target="_blank">+&nbsp; New Product</a>
                            <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                                Import
                            </button> --}}
                                <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog mt-lg-10">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                            <i class="material-icons ms-3">file_upload</i>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>You can browse your computer for a file.</p>
                                            <div class="input-group input-group-dynamic mb-3">
                                            <label class="form-label">Browse file...</label>
                                            <input type="email" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="importCheck" checked="">
                                            <label class="custom-control-label" for="importCheck">I accept the terms and conditions</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn bg-gradient-primary btn-sm">Upload</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button> --}}
                            <button class="btn btn-outline-success btn-sm export mb-0 mt-sm-0 mt-1" onclick="exportarExecel()" type="button" name="button"><i class="fa fa-file-excel"></i> Export</button>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                    <div class="table-responsive">

                    <table class="table table-flush" id="products-list">
                        <thead class="thead-light">
                            <tr>
                                <th>NOMBRE</th>

                                @foreach ($preguntas as $pre)

                                    <th>{{ $pre->nombre }}</th>

                                @endforeach

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($oportunidades as $opor)
                                <tr>
                                    <td>{{ $opor->persona->nombres." ".$opor->persona->apellido_paterno." ".$opor->persona->apellido_materno }}</td>

                                    @php

                                        $respuestas = App\Models\Respuesta::where('oportunidad_id',$opor->id)->get();

                                    @endphp

                                    @foreach ( $respuestas as $res)
                                        <td>{{ $res->respuesta }}</td>
                                    @endforeach

                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>SKU</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    {{-- @foreach ( as )
        
    @endforeach --}}

    {{-- <div class="row">
        <div class="col-md-6">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">donut_small</i>
                    </div>
                    <h6 class="mb-0">Doughnut chart</h6>
                    <p class="mb-0 text-sm">Affiliates program</p>
                </div>
                <div class="card-body d-flex p-3 pt-0">
                    <div class="chart w-50">
                        <canvas id="doughnut-chart" class="chart-canvas" height="300"></canvas>
                    </div>
                    <div class="table-responsive w-50">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/devto.svg') }}" class="avatar avatar-sm me-2" alt="logo_xd">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">DevTo</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> 25% </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/creative-tim.svg') }}" class="avatar avatar-sm me-2" alt="logo_atlassian">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">CreativeTim</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> 13% </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/bootstrap.svg') }}" class="avatar avatar-sm me-2" alt="logo_slack">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Bootsnip</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> 12% </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/github.svg') }}" class="avatar avatar-sm me-2" alt="logo_spotify">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Github</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> 37% </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/google-webdev.svg') }}" class="avatar avatar-sm me-2" alt="logo_jira">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Codeinwp</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <span class="text-xs font-weight-bold"> 13% </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">pie_chart</i>
                    </div>
                    <h6 class="mb-0">Pie chart</h6>
                    <p class="mb-0 text-sm">Analytics Insights</p>
                </div>
                <div class="card-body d-flex p-3 pt-0">
                    <div class="chart w-50">
                        <canvas id="pie-chart" class="chart-canvas" height="300"></canvas>
                    </div>
                    <div class="w-50 my-auto ms-5">
                        <span class="badge badge-lg badge-dot me-4 d-block text-start">
                            <i class="bg-info"></i>
                            <span class="text-dark">Facebook</span>
                        </span>
                        <span class="badge badge-lg badge-dot me-4 d-block text-start">
                            <i class="bg-primary"></i>
                            <span class="text-dark">Direct</span>
                        </span>
                        <span class="badge badge-lg badge-dot me-4 d-block text-start">
                            <i class="bg-dark"></i>
                            <span class="text-dark">Organic</span>
                        </span>
                        <span class="badge badge-lg badge-dot me-4 d-block text-start">
                            <i class="bg-secondary"></i>
                            <span class="text-dark">Referral</span>
                        </span>
                        <p class="text-sm mt-3">
                            More than <b>1,200,000</b> sales are made using referral marketing, and <b>700,000</b> are from social media.
                        </p>
                        <a class="btn bg-gradient-secondary mb-0" href="javascript:;">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="row mt-4">
        <div class="col-lg-6 col-12">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">donut_small</i>
                    </div>
                    <h6 class="mb-0">Doughnut chart</h6>
                    <p class="mb-0 text-sm">Affiliates program</p>
                </div>
                <div class="card-body d-flex p-3 pt-0">
                    <div class="chart w-50">
                        <canvas id="doughnut-chart" class="chart-canvas" height="300"></canvas>
                    </div>
                    <div class="table-responsive w-50">
                        <table class="table align-items-center mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/devto.svg') }}" class="avatar avatar-sm me-2" alt="logo_xd">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">DevTo</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> 25% </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/creative-tim.svg') }}" class="avatar avatar-sm me-2" alt="logo_atlassian">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">CreativeTim</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> 13% </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/bootstrap.svg') }}" class="avatar avatar-sm me-2" alt="logo_slack">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Bootsnip</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> 12% </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/github.svg') }}" class="avatar avatar-sm me-2" alt="logo_spotify">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Github</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> 37% </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets/img/small-logos/google-webdev.svg') }}" class="avatar avatar-sm me-2" alt="logo_jira">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Codeinwp</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                    <span class="text-xs font-weight-bold"> 13% </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mt-md-0 mt-4">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">pie_chart</i>
                    </div>
                    <h6 class="mb-0">Pie chart</h6>
                    <p class="mb-0 text-sm">Analytics Insights</p>
                </div>
                <div class="card-body d-flex p-3 pt-0">
                    <div class="chart w-50">
                        <canvas id="pie-chart" class="chart-canvas" height="300"></canvas>
                    </div>
                    <div class="w-50 my-auto ms-5">
                        <span class="badge badge-lg badge-dot me-4 d-block text-start">
                            <i class="bg-info"></i>
                            <span class="text-dark">Facebook</span>
                        </span>
                        <span class="badge badge-lg badge-dot me-4 d-block text-start">
                            <i class="bg-primary"></i>
                            <span class="text-dark">Direct</span>
                        </span>
                        <span class="badge badge-lg badge-dot me-4 d-block text-start">
                            <i class="bg-dark"></i>
                            <span class="text-dark">Organic</span>
                        </span>
                        <span class="badge badge-lg badge-dot me-4 d-block text-start">
                            <i class="bg-secondary"></i>
                            <span class="text-dark">Referral</span>
                        </span>
                        <p class="text-sm mt-3">
                            More than <b>1,200,000</b> sales are made using referral marketing, and <b>700,000</b> are from social media.
                        </p>
                        <a class="btn bg-gradient-secondary mb-0" href="javascript:;">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="row mt-4">
        <div class="col-md-6">
            <div class="card z-index-2 mt-4">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 me-3 float-start">
                        <i class="material-icons opacity-10">data_saver_on</i>
                    </div>
                    <h6 class="mb-0">Radar chart</h6>
                    <p class="mb-0 text-sm">Sciences score</p>
                </div>
                <div class="card-body p-5 pt-0">
                    <div class="chart">
                        <canvas id="radar-chart" class="chart-canvas" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-md-0 mt-4">
            <div class="card z-index-2 mt-4">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 me-3 float-start">
                    <i class="material-icons opacity-10">scatter_plot</i>
                </div>
                <h6 class="mb-0">Polar chart</h6>
                <p class="mb-0 text-sm">Analytics Insights</p>
            </div>
            <div class="card-body p-5 pt-0">
                <div class="chart">
                    <canvas id="polar-chart" class="chart-canvas" height="100"></canvas>
                </div>
            </div>
            </div>
        </div>
    </div> --}}
@stop

@section('js')
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>

    $( document ).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
    

    @php
    
        $cantidadPreguntasScript = count($preguntas);

        $contadorScript = 0;


        for($i = 0; $i < $cantidadPreguntasScript; $i++){

            // dd($preguntas);

            $array = json_encode($preguntas[$i]->valoresCombo);

            $arrayItem = array();
            $arrayCantItem = array();

            // para los valores de los labesl 
            foreach($preguntas[$i]->valoresCombo as $valorCom){

                array_push($arrayItem, $valorCom->valor);

            }

            $labes = json_encode($arrayItem);

            // para los valores de las cantidades
            foreach($preguntas[$i]->valoresCombo as $valorCom){

                $RespuestaCombo = App\Models\RespuestaCombo::cantidadRespuesta($valorCom->id);

                array_push($arrayCantItem, $RespuestaCombo);

            }
            $cantidades = json_encode($arrayCantItem);

            echo "
                var ctx3 = document.getElementById('doughnut-chart_$i').getContext('2d');

                new Chart(ctx3, {
                type: 'doughnut',
                data: {
                    // labels: ['Creative Tim', 'Github', 'Bootsnipp', 'Dev.to', 'Codeinwp'],
                    labels: $labes,
                    datasets: [{
                    label: 'Projects',
                    weight: 9,
                    cutout: 60,
                    tension: 0.9,
                    pointRadius: 2,
                    borderWidth: 2,
                    backgroundColor: ['#03A9F4', '#3A416F', '#fb8c00', '#a8b8d8', '#e91e63', '#EECFBB', '#EEE7BB', '#B8F369', '#69F36D', '#69F3CE', '#69D4F3', '#6991F3', '#8869F3', '#DE69F3'],
                    // data: [15, 20, 12, 60, 20],
                    data: $cantidades,
                    fill: false
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                    legend: {
                        display: false,
                    }
                    },
                    interaction: {
                    intersect: false,
                    mode: 'index',
                    },
                    scales: {
                    y: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        },
                        ticks: {
                        display: false
                        }
                    },
                    x: {
                        grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        },
                        ticks: {
                        display: false,
                        }
                    },
                    },
                },
                });
            ";
        }
    @endphp

    if (document.getElementById('products-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 5
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
            var type = el.dataset.type;

            var data = {
                type: type,
                filename: "material-" + type,
            };

            if (type === "csv") {
                data.columnDelimiter = "|";
            }

            dataTableSearch.export(data);
            });
        });
    };

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
        damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    // function exportarExecel(){
        
    //     $.ajax({
    //         // url: "{{ url('Campania/guardaIngreso', [$campania->id,$formulario->id]) }}",
    //         url: "{{ url('Campania/respuestaExcel') }}",
    //         // data: datosFormulario,
    //         data: {
    //             campania: {{ $campania->id }},
    //             formulario: {{ $formulario->id }}
    //         },

    //         type: 'POST',
    //         dataType: 'json',
    //         success: function(data) {

    //         },
    //         error: function(error){

    //         },
    //         beforeSend: function () {

    //         }
    //     });
    // }

    function exportarExecel(){
        
        window.location.href = "{{ url('Campania/respuestaExcel', [$campania->id,$formulario->id]) }}"
        
        // $.ajax({

        //     url: "{{ url('Campania/respuestaExcel', [$campania->id,$formulario->id]) }}",

        //     // url: "{{ url('Campania/respuestaExcel') }}",
        //     // data: datosFormulario,
        //     // data: {
        //     //     campania: {{ $campania->id }},
        //     //     formulario: {{ $formulario->id }}
        //     // },

        //     type: 'GET',
        //     // type: 'POST',
        //     dataType: 'json',
        //     success: function(data) {

        //     },
        //     error: function(error){

        //     },
        //     beforeSend: function () {

        //     }
        // });
    }
</script>
@endsection


