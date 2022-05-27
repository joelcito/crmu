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
    <div class="row">
        <div class="col-md-6">
            <h5 class="mb-0">Reporte por Redes Sociales</h5>
            {{-- <p class="text-sm mb-0">
                Charts on this page use Chart.js - Simple yet flexible JavaScript charting for designers & developers.
            </p> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-ms-12">

            {{-- <div class="row mt-4"> --}}
                {{-- <div class="col-lg-6 col-12"> --}}
                    <div class="card z-index-2 mt-4">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 me-3 float-start">
                                <i class="material-icons opacity-10">leaderboard</i>
                            </div>
                            <h6 class="mb-0">Redes Sociales</h6>
                            <p class="mb-0 text-sm">Respuestas de formulario por redes sociales</p>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="chart">
                                <canvas id="bar-chart" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
                {{-- <div class="col-lg-6 col-12 mt-md-0 mt-4">
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
                </div> --}}
            {{-- </div> --}}

        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h5 class="mb-0">Reporte de Preguntas del formulario</h5>
            {{-- <p class="text-sm mb-0">
                Charts on this page use Chart.js - Simple yet flexible JavaScript charting for designers & developers.
            </p> --}}
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

        // dd($cantidadPreguntas);

        $contador = 0;
    @endphp

    @while ($contador < $cantidadPreguntas)

        <div class="row">
            @for ($i = 0; $i < 2; $i++)

                @if ($contador < $cantidadPreguntas)

                    @if (count($preguntas[$contador]->valoresCombo) > 0)
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
                                    </div>
                                    <div class="table-responsive w-50">
                                        <table class="table align-items-center mb-0">
                                            <tbody>
                                                @foreach ( $preguntas[$contador]->valoresCombo as $valor)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $valor->valor }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">

                                                            @php

                                                                $RespuestaCombo = App\Models\RespuestaCombo::cantidadRespuesta($valor->id);

                                                                echo     $RespuestaCombo;

                                                            @endphp

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
                            // $contadorDiv++;
                        @endphp

                    @endif

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

                                                    @foreach ($preguntasFormulario as $pre)

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
                                                            <td>
                                                                @if ($res->pregunta)

                                                                    {{ $res->respuesta }}

                                                                @endif
                                                            </td>
                                                        @endforeach

                                                    </tr>
                                                @empty
                                                    
                                                @endforelse
                                            </tbody>
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

        for($i = 0; $i < $cantidadPreguntasScript; $i++){

            if(count($preguntas[$i]->valoresCombo) > 0){

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

    // Bar chart
    var ctx5 = document.getElementById("bar-chart").getContext("2d");

    new Chart(ctx5, {
      type: "bar",
      data: {
        // labels: ['16-20', '21-25', '26-30', '31-36', '36-42', '42+'],
        labels: @json($redesSociales),
        datasets: [{
          label: "Respuestas",
          weight: 5,
          borderWidth: 0,
          borderRadius: 4,
          backgroundColor: ['#3A416F','#D6E680', '#80E6C2', '#80C1E6', '#9A80E6', '#BB80E6', '#D680E6', '#E680AD', '#E6A780'],
        //   data: [15, 20, 12, 60, 20, 15],
          data: @json($canRedSocial),
          fill: false,
          maxBarThickness: 35
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
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: '#c1c4ce5c'
            },
            ticks: {
              display: true,
              padding: 10,
              color: ['#9ca2b7'],//esto es color de los numeros como tal
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: true,
              drawTicks: true,
              color: '#c1c4ce5c'
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

</script>
@endsection


