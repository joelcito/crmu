@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 mt-4 mt-lg-0">
        <div class="card">
            <div class="card-header pb-0 p-3">
                <div class="d-flex align-items-center">
                    <h6 class="mb-0">Torta de Gastos</h6>
                    <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto" data-bs-toggle="tooltip" data-bs-placement="bottom" title="See the consumption per room">
                        <i class="fas fa-info"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-5 text-center">
                        <div class="chart">
                            <canvas id="chart-consumption" class="chart-canvas" height="197"></canvas>
                        </div>
                        <h4 class="font-weight-bold mt-n8">
                            <span>{{ $presupuesto }} Bs.</span>
                            <span class="d-block text-body text-sm">Presupuesto Actual</span>
                        </h4>
                    </div>
                    <div class="col-7">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    @foreach ($gastosTotales as $gt)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-0">
                                                    {{-- <span class="badge bg-gradient-primary me-3"> </span> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $gt->gasto->nombre }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs">{{ $gt->TotalGastado }} Bs.</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="text-gradient text-success">
                            <span id="ingreso" countto="{{ $totalIngreso }}">{{ $totalIngreso }}</span>
                            <span class="text-lg ms-n2">Bs.</span>
                        </h1>
                        <h6 class="mb-0 font-weight-bolder">Ingreso</h6>
                        <p class="opacity-8 mb-0 text-sm">Total Ingreso</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="text-gradient text-primary">
                            <span id="egreso" countto="{{ $totalEgreso }}">{{ $totalEgreso }}</span>
                            <span class="text-lg ms-n2">Bs.</span>
                        </h1>
                        <h6 class="mb-0 font-weight-bolder">Egreso</h6>
                        <p class="opacity-8 mb-0 text-sm">Total Egreso</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Listado de Ingresos</h5>
                <table id="datatable-search" class="">
                    <thead>
                        <tr>
                            <th>Monto</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingresos as $ing)
                            @php
                                // PARA LA FECHA HORA EN ESPAÑOL
                                $utilidades = new App\librerias\Utilidades();
                                $fechaHoraEs = $utilidades->fechaHoraCastellano($ing->fecha);
                            @endphp
                            <tr>
                                <td class="text-success"><b>{{ $ing->ingreso }} Bs.</b></td>
                                <td>{{ $ing->descripcion }}</td>
                                <td>{{ $fechaHoraEs }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Listado de Egreso</h5>
                <table id="datatable-egresos" class="">
                    <thead>
                        <tr> 
                            <th>Monto</th>
                            <th>Medio</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Comprobante</th>
                            <th>Nro. Comprobante</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($egresos as $egre)
                            @php
                                // PARA LA FECHA HORA EN ESPAÑOL
                                $utilidades = new App\librerias\Utilidades();
                                $fechaHoraEs = $utilidades->fechaHoraCastellano($egre->fecha);

                                // BUSCAMOS SU COMPROBANTE
                                $comprobante = App\Models\Comprobante::where('presupuesto_id', $egre->id)->first();
                            @endphp
                            <tr>
                                <td class="text-danger"><b>{{ $egre->egreso }} Bs.</b></td>
                                <td>{{ $egre->gasto->nombre }}</td>
                                <td>{{ $egre->descripcion }}</td>
                                <td>{{ $fechaHoraEs }}</td>
                                <td>
                                    @if ($comprobante)
                                    <figure class="ms-3" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                        {{-- <a href="{{ asset("imagenesComprobantes/$comprobante->nombre") }}" itemprop="contentUrl" data-size="500x600"> --}}
                                            <img src="{{ asset("imagenesComprobantes/$comprobante->nombre") }}" alt="" width="50">
                                        {{-- </a> --}}
                                    </figure>
                                        {{-- {{ $comprobante->nombre }} --}}
                                    @endif    
                                </td>
                                <td>
                                    @if ($comprobante)
                                        {{ $comprobante->nro_comprobante }}
                                    @endif    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="pswp__bg"></div>
    
    <div class="pswp__scroll-wrap">
    
    
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="btn btn-white btn-sm pswp__button pswp__button--close">Close (Esc)</button>
                <button class="btn btn-white btn-sm pswp__button pswp__button--fs">Fullscreen</button>
                <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--left">Prev
                </button>
                <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--right">Next
                </button>
                
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="{{ asset('assets/js/plugins/countup.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script src="{{ asset('assets/js/plugins/photoswipe.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/photoswipe-ui-default.min.js') }}"></script>

<script>

    var dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: false,
    });

    var dataTableSearch = new simpleDatatables.DataTable("#datatable-egresos", {
        searchable: true,
        fixedHeight: false,
    });

    
    // Chart Doughnut Consumption by room
    var ctx1 = document.getElementById("chart-consumption").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    new Chart(ctx1, {
        type: "doughnut",
        data: {
            labels: [
                @php
                    foreach( $gastosTotales as $gt){
                        echo "'".$gt->gasto->nombre."', ";
                    }
                @endphp
                // 'Living Room', 'Kitchen', 'Attic', 'Garage', 'Basement'
            ],
            datasets: [{
            label: "Consumption",
            weight: 9,
            cutout: 90,
            tension: 0.9,
            pointRadius: 2,
            borderWidth: 2,
            backgroundColor: ['#FF0080', '#9E9E9E', '#03A9F4', '#4CAF50', '#ff667c'],
            data: [
                @php
                    foreach( $gastosTotales as $gt){
                        echo $gt->TotalGastado.", ";
                    }
                @endphp
                // 15, 20, 13, 32, 20
            ],
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

    if (document.getElementById('ingreso')) {
      const countUp = new CountUp('ingreso', document.getElementById("ingreso").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }

    if (document.getElementById('egreso')) {
      const countUp = new CountUp('egreso', document.getElementById("egreso").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
</script>
@endsection