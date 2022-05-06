@extends('layouts.app')

@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('css')
{{-- <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.min.css?v=3.0.3') }}" rel="stylesheet" /> --}}
@endsection

@section('content')
{{-- <script>
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
  </script> --}}

<div class="row mt-5">
  <div class="col-xl-8 col-lg-7">
    <div class="row">
      <div class="col-sm-4">
        <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-success shadow-success border-radius-lg py-2 pe-1">
            <div class="chart">
              <canvas id="chart-line-1" class="chart-canvas" height="100"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body py-3">
          <p class="text-sm mb-0">Ventas ganadas</p>
          <h5 class="font-weight-bolder mb-0">
            5,927
            <span class="text-success text-sm font-weight-bolder">+55%</span>
          </h5>
        </div>
        </div>
      </div>
      <div class="col-sm-4 mt-md-0 mt-5">
        <div class="card">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-2 pe-1">
              <div class="chart">
                <canvas id="chart-line-2" class="chart-canvas" height="100"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body py-3">
            <p class="text-sm mb-0">Venta espera</p>
            <h5 class="font-weight-bolder mb-0">
              {{-- $130,832 --}}
              1,927
              <span class="text-danger mb- text-sm font-weight-bolder">+10%</span>
            </h5>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mt-md-0 mt-5">
        <div class="card h-100">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg py-2 pe-1 d-flex align-items-center text-center">
              <a href="{{ url('Formulario/formulario', [$campania_id]) }}" class="mx-auto my-3">
                <i class="material-icons text-white text-xl mb-1" aria-hidden="true">add</i>
                <h6 class="text-white font-weight-normal"> Nuevo Formulario </h6>
              </a>
            </div>
          </div>
          <div class="card-body pt-1 pb-2 d-flex flex-column justify-content-center text-center">
            <p class="mb-0 text-sm">Creacion de nuevo formulario.</p>
            {{-- <p class="mb-0 text-sm">Press the button above and complete the new tab data.</p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12">
        <div class="card widget-calendar h-100">
          <div class="card-header p-3 pb-0">
            <h6 class="mb-0">Calendar</h6>
            <div class="d-flex">
              <div class="p text-sm mb-0 widget-calendar-day"></div>
              <span>,&nbsp;</span>
              <div class="p text-sm mb-1 widget-calendar-year"></div>
            </div>
          </div>
          <div class="card-body p-3">
            <div data-toggle="widget-calendar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-5 mt-lg-0 mt-4">
    <div class="row">
      <div class="col-lg-12 mt-4 mt-lg-0">
        <div class="card">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="overflow-hidden position-relative border-radius-lg shadow-dark bg-cover h-100" style="background-image: url('../../assets/img/ivancik.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 h-100 p-3">
                <h6 class="text-white font-weight-bolder mb-3">Hola Lucero Tapia!</h6>
                {{-- <p class="text-white mb-3">Wealth creation is an evolutionarily recent positive-sum game. It is all about who take the opportunity first.</p> --}}
                <p class="text-white mb-3">Te ofrecemos un reporte de avance sobre la campaña <span class="text-success mb-3"> RECOPILACION DE DATOS</span></p>
              </div>
            </div>
          </div>
          <div class="card-body py-3">
            {{-- <a class="btn btn-round btn-sm btn-outline-dark mb-0" href="{{ url('Formulario/formulario',[1]) }}">
            Read More
            <i class="material-icons text-sm ms-1">chevron_right</i>
            </a> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-sm-6">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Formularios</h6>
          </div>
          <div class="card-body p-3">
            <ul class="list-group">

              @foreach ($formularios as $f)
                @if ($f->formulario)
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="material-icons opacity-10">launch</i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">{{ $f->formulario->nombre }}</h6>
                        {{-- <span class="text-xs">2150 personas resgistradas, <span class="font-weight-bold">346+ sold</span></span> --}}
                        <span class="text-xs">2150 personas resgistradas</span>
                      </div>
                    </div>
                    <div class="d-flex">
                      {{-- <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button> --}}
                      <a href="{{ url('Formulario/respuestaFormulario', [$f->campania_id, $f->formulario_id]) }}" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></a>
                    </div>
                  </li>
                @endif
              @endforeach
              {{-- <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="material-icons opacity-10">launch</i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Devices</h6>
                    <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li> --}}
              {{-- <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="material-icons opacity-10">book_online</i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                    <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li> --}}
              {{-- <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="material-icons opacity-10">priority_high</i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                    <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                  </div>
                </div>
                <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li> --}}
            </ul>
          </div>
        </div>
      </div>
      {{-- <div class="col-lg-12 col-sm-6">
        <div class="card mt-5">
          <div class="card-body p-3 pt-0">
            <div class="row">
              <div class="col-4">
                <img src="../../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow shadow-dark w-100 mt-n4">
              </div>
              <div class="col-8 my-auto">
                <p class="text-muted text-sm mt-3">
                Today is Mike's birthday. Wish him the best of luck!
                </p>
                <a href="javascript:;" class="btn btn-sm bg-gradient-dark mb-0">Send message</a>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-sm-6">
    <div class="card h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-6">
            <h6 class="mb-0">Inversion Medio publicitario</h6>
          </div>
          <div class="col-md-6 d-flex justify-content-end align-items-center">
            <i class="material-icons me-2 text-lg">date_range</i>
            <small>01 - 10 Mayo 2022</small>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_more</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Facebook Ads</h6>
                  <span class="text-xs">04 Mayo 2022, at 12:30 PM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold ms-auto">
              - $ 2,500
              </div>
            </div>
            <hr class="horizontal dark mt-3 mb-2" />
          </li>
          <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Google Ads</h6>
                  <span class="text-xs">04 Mayo 2022, at 04:30 AM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
                + $ 2,000
              </div>
            </div>
            <hr class="horizontal dark mt-3 mb-2" />
          </li>
          <li class="list-group-item border-0 justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Televisora</h6>
                  <span class="text-xs">04 Mayo 2022, at 02:50 AM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
                  + $ 1,400
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mt-sm-0 mt-4">
    <div class="card h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-6">
            <h6 class="mb-0">Ingresos</h6>
          </div>
          <div class="col-md-6 d-flex justify-content-end align-items-center">
            <i class="material-icons me-2 text-lg">date_range</i>
            <small>01 - 10 Mayo 2022</small>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">via PayPal</h6>
                  <span class="text-xs">07 June 2021, at 09:00 AM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
                + $ 4,999
              </div>
            </div>
            <hr class="horizontal dark mt-3 mb-2" />
          </li>
          <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Partner #90211</h6>
                  <span class="text-xs">07 June 2021, at 05:50 AM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
              + $ 700
              </div>
            </div>
            <hr class="horizontal dark mt-3 mb-2" />
          </li>
          <li class="list-group-item border-0 justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex">
              <div class="d-flex align-items-center">
                <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_more</i></button>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Services</h6>
                  <span class="text-xs">07 June 2021, at 07:10 PM</span>
                </div>
              </div>
              <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold ms-auto">
                - $ 1,800
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<br>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    
    <div class="card h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-12 text-center">
            <h6 class="mb-0">Buscar Vendedor</h6>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <div class="row">
          <div class="col-md-12">
            
            <div id="bloque-cambiar">
              
            </div>

            <div id="bloque-buscar">
              <div class="input-group input-group-outline my-3">
                <label class="form-label">Buscar Vendedor</label>
                <input type="text" class="form-control" name="busca_vendedor" id="busca_vendedor">
              </div>
            </div>

            <div id="bloque-buscador-lista">
    
            </div>
          </div>
        </div>

        <input type="hidden" name="vendedor_id" id="vendedor_id">
        
        <div id="lista-vendedores">
          
        </div>
        
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>

<br>

  <form action="" id="formulario-asignacion">
    <div class="row">
      <div class="col-md-6">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            {{-- <div class="row">
              <div class="col-md-6">
                <h6 class="mb-0">Oportunidades Recientes</h6>
              </div>
              <div class="col-md-6 d-flex justify-content-end align-items-center">
                <i class="material-icons me-2 text-lg">date_range</i>
                <small>01 - 10 Mayo 2022</small>
              </div>
            </div> --}}
          </div>
          <div class="card-body p-3">
            <ul class="list-group">
              <div id="tabla-oportunidades-show">
    
                {{-- <div class="table-responsive">
                  <table class="table table-flush" id="tabla-oportunidades">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombres</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($oportunidades as $opor)
                        <tr>
                          <td>
                            {{ $opor->persona->nombres." ".$opor->persona->apellido_paterno." ".$opor->persona->apellido_materno }}
                          </td>
                          <td>
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" onclick="asignacion('{{ $opor->id }}')"><i class="material-icons text-lg">expand_more</i></button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div> --}}
    
              </div>
            </ul>
          </div>
        </div>
      </div>
    
      <div class="col-md-6">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            {{-- <div class="row">
              <div class="col-md-6">
                <h6 class="mb-0">Vendedores</h6>
              </div>
              <div class="col-md-6 d-flex justify-content-end align-items-center">
                <i class="material-icons me-2 text-lg">date_range</i>
                <small>01 - 10 Mayo 2022</small>
              </div>
            </div> --}}
          </div>
          <div class="card-body p-3">
            <ul class="list-group">
              <div id="tabla-vendedores-show">
    
                {{-- <div class="table-responsive">
                  <table class="table table-flush" id="tabla-vendedores">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombres</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($vendedores as $ven)
                        <tr>
                          <td>
                            {{ $ven->nombres." ".$ven->apellido_paterno." ".$ven->apellido_materno }}
                          </td>
                          <td>
                            <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" onclick="asignacion()"><i class="material-icons text-lg">expand_more</i></button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div> --}}
    
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </form>


<br>
<div class="row">
  <div class="col-md-12">
    <button class="btn btn-success w-100" onclick="asignarOportunidades()">Asignar</button>
  </div>
</div>

@stop

@section('js')
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
    var ctx1 = document.getElementById("chart-line-1").getContext("2d");

    var ctx2 = document.getElementById("chart-line-2").getContext("2d");

    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Abr", "May", "Jun", "Jul", "Agu", "Sept", "Oct", "Non", "Dic"],
        datasets: [{
          label: "Visitors",
          tension: 0.5,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#fff",
          borderWidth: 2,
          backgroundColor: "transparent",
          data: [50, 45, 60, 60, 80, 65, 90, 80, 100],
          maxBarThickness: 6,
          fill: true
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
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
            }
          },
        },
      },
    });

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Abr", "May", "Jun", "Jul", "Agu", "Sept", "Oct", "Non", "Dic"],
        datasets: [{
          label: "Income",
          tension: 0.5,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#fff",
          borderWidth: 2,
          backgroundColor: "transparent",
          data: [60, 80, 75, 90, 67, 100, 90, 110, 120],
          maxBarThickness: 6,
          fill: true
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
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'

            },
            ticks: {
              callback: function(value, index, values) {
                return '$' + value;
              },
              display: true,
              padding: 10,
              color: '#f8f9fa',
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
            }
          },
        },
      },
    });
</script>
<script>
    $( document ).ready(function() {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      // var dataTableSearch = new simpleDatatables.DataTable("#tabla-oportunidades", {
      //     searchable: true,
      //     fixedHeight: true
      // })

      
      // var dataTableSearch = new simpleDatatables.DataTable("#tabla-vendedores", {
      //     searchable: true,
      //     fixedHeight: true
      // })

      $("#busca_vendedor").on('keyup', function(){

        console.log($('#busca_vendedor').val());
        var vendedor = $('#busca_vendedor').val();

        $.ajax({
            url: "{{ url('Campania/ajaxBuscaVendedor') }}",
            data: {
                vendedor:vendedor
            },
            type: 'POST',
            success: function(data) {

                $('#lista-vendedores').html(data);

            },
            error: function(error){

            }
        });

      }).keyup();

      ajaxListadoOportunidades();
      ajaxListadoVendedores();

    });

    var win = navigator.platform.indexOf('Win') > -1;

    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
        damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    function guardaVendedor(vendedor, nombre){
      var html = "<button class='btn btn-success btn-lg w-100'  onclick='buscarVendedor()'>"+nombre+"</button>";

      $('#vendedor_id').val(vendedor);

      $('#bloque-cambiar').html(html);

      $('#bloque-buscar').toggle('show');

      $('#bloque-buscador-lista').toggle('hide');

      setTimeout(function(){
        $('#lista-vendedores').toggle('hide');
      }, 500);


    }

    function buscarVendedor(){

      $('#vendedor_id').val(0);

      $('#bloque-buscar').toggle('show');
      // $('#bloque-cambiar').toggle('hide');
      $('#lista-vendedores').html('');
      $('#lista-vendedores').toggle('show');
      
    }

    function asignacion(oportunidad){
      // console.log(oportunidad);
      var vendedor = $('#vendedor_id').val();

      if(vendedor != 0){


        $.ajax({
            url: "{{ url('Campania/asignacionVendedorCampania') }}",
            data: {
                oportunidad:oportunidad,
                vendedor:vendedor
            },
            type: 'POST',
            success: function(data) {
              ajaxListadoOportunidades();
              ajaxListadoVendedores();
                // $('#lista-vendedores').html(data);

            },
            error: function(error){

            }
        });

      }else{

        Swal.fire({
          icon: 'error',
          title: 'No se pudo completar',
          text: 'Debe elegir primero un vendedor',
          // footer: '<a href="">Why do I have this issue?</a>'
        })

      }
    }

    function ajaxListadoOportunidades(){
      
      $.ajax({
          url: "{{ url('Campania/ajaxListadoOportunidades') }}",
          data: {
              campania:{{ $campania_id }}
          },
          type: 'POST',
          success: function(data) {

              // $('#lista-vendedores').html(data);
              $('#tabla-oportunidades-show').html(data);

          },
          error: function(error){

          }
      });

    }

    function ajaxListadoVendedores(){
      
      $.ajax({
          url: "{{ url('Campania/ajaxListadoVendedores') }}",
          data: {
              campania:{{ $campania_id }}
          },
          type: 'POST',
          success: function(data) {

              // $('#lista-vendedores').html(data);
              $('#tabla-vendedores-show').html(data);

          },
          error: function(error){

          }
      });

    }

    function asignarOportunidades(){

      var datos = $('#formulario-asignacion').serialize();

      $.ajax({
          url: "{{ url('Campania/asignacionVendedorCampania') }}",
          data: datos,
          type: 'POST',
          success: function(data) {
            ajaxListadoOportunidades();
            ajaxListadoVendedores();
              // $('#lista-vendedores').html(data);

          },
          error: function(error){

          }
      });
    }



    

</script>
@endsection