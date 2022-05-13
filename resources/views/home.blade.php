@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-sm-4">
          <div class="card">
          <div class="card-body p-3 position-relative">
              <div class="row">
              <div class="col-7 text-start">
                  <p class="text-sm mb-1 text-capitalize font-weight-bold">Presupuesto invertido</p>
                  <h5 class="font-weight-bolder mb-0">
                  $230,220
                  </h5>
                  <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+55% <span class="font-weight-normal text-secondary">desde el mes pasado</span></span>
              </div>
              <div class="col-5">
                  <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="text-xs text-secondary">4 Abr - 4 May</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers1">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul>
                  </div>
              </div>
              </div>
          </div>
          </div>
      </div>
      <div class="col-sm-4 mt-sm-0 mt-4">
          <div class="card">
          <div class="card-body p-3 position-relative">
              <div class="row">
              <div class="col-7 text-start">
                  <p class="text-sm mb-1 text-capitalize font-weight-bold">Clientes</p>
                  <h5 class="font-weight-bolder mb-0">
                  3.200
                  </h5>
                  <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span class="font-weight-normal text-secondary">desde el mes pasado</span></span>
              </div>
              <div class="col-5">
                  <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers2" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="text-xs text-secondary">4 Abr - 4 May</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers2">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul>
                  </div>
              </div>
              </div>
          </div>
          </div>
      </div>
      <div class="col-sm-4 mt-sm-0 mt-4">
          <div class="card">
          <div class="card-body p-3 position-relative">
              <div class="row">
              <div class="col-7 text-start">
                  <p class="text-sm mb-1 text-capitalize font-weight-bold">Promedio Ingresos</p>
                  <h5 class="font-weight-bolder mb-0">
                  $1.200
                  </h5>
                  <span class="font-weight-normal text-secondary text-sm"><span class="font-weight-bolder text-success">+$213</span>desde el mes pasado</span>
              </div>
              <div class="col-5">
                  <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers3" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="text-xs text-secondary">4 Abr - 4 May</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers3">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul>
                  </div>
              </div>
              </div>
          </div>
          </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-4 col-sm-6">
          <div class="card h-100">
          <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
              <h6 class="mb-0">Canales de Publicacion</h6>
              <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="See traffic channels">
                  <i class="material-icons text-sm">priority_high</i>
              </button>
              </div>
          </div>
          <div class="card-body pb-0 p-3 mt-4">
              <div class="row">
              <div class="col-7 text-start">
                  <div class="chart">
                  <canvas id="chart-pie" class="chart-canvas" height="200"></canvas>
                  </div>
              </div>
              <div class="col-5 my-auto">
                  <span class="badge badge-md badge-dot me-4 d-block text-start">
                  <i class="bg-info"></i>
                  <span class="text-dark text-xs">Facebook</span>
                  </span>
                  <span class="badge badge-md badge-dot me-4 d-block text-start">
                  <i class="bg-primary"></i>
                  <span class="text-dark text-xs">Instragam</span>
                  </span>
                  <span class="badge badge-md badge-dot me-4 d-block text-start">
                  <i class="bg-dark"></i>
                  <span class="text-dark text-xs">Twiter</span>
                  </span>
                  <span class="badge badge-md badge-dot me-4 d-block text-start">
                  <i class="bg-secondary"></i>
                  <span class="text-dark text-xs">Linkedln</span>
                  </span>
              </div>
              </div>
          </div>
          <div class="card-footer pt-0 pb-0 p-3 d-flex align-items-center">
              <div class="w-60">
              <p class="text-sm">
                  Mas de <b>1,000</b> ventas hasta la fecha <b>800</b>, por las redes sociales.
              </p>
              </div>
              <div class="w-40 text-end">
              <a class="btn bg-light mb-0 text-end" href="javascript:;">Leer Mas</a>
              </div>
          </div>
          </div>
      </div>
      <div class="col-lg-8 col-sm-6 mt-sm-0 mt-4">
          <div class="card">
          <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
              <h6 class="mb-0">Ingresos</h6>
              <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="See which ads perform better">
                  <i class="material-icons text-sm">priority_high</i>
              </button>
              </div>
              <div class="d-flex align-items-center">
              <span class="badge badge-md badge-dot me-4">
                  <i class="bg-primary"></i>
                  <span class="text-dark text-xs">Facebook Ads</span>
              </span>
              <span class="badge badge-md badge-dot me-4">
                  <i class="bg-dark"></i>
                  <span class="text-dark text-xs">Google Ads</span>
              </span>
              </div>
          </div>
          <div class="card-body p-3">
              <div class="chart">
              <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
          </div>
          </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-8">
          <div class="card h-100">
          <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
              <h6 class="mb-0">Ventas por edad</h6>
              </div>
          </div>
          <div class="card-body p-3">
              <div class="chart">
              <canvas id="chart-bar" class="chart-canvas" height="340"></canvas>
              </div>
          </div>
          </div>
      </div>
      <div class="col-lg-4 mt-lg-0 mt-4">
          <div class="card">
          <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
              <h6 class="mb-0">Ventas por Departamento</h6>
              </div>
          </div>
          <div class="card-body p-3">
              <ul class="list-group list-group-flush list my--3">
              <li class="list-group-item px-0 border-0">
                  <div class="row align-items-center">
                  <div class="col-auto">
                      <!-- Country flag -->
                      <img src="{{ asset('assets/img/icons/flags/lp.png') }}" width="40" alt="Country flag">
                  </div>
                  <div class="col">
                      <p class="text-xs font-weight-bold mb-0">Departamento:</p>
                      <h6 class="text-sm font-weight-normal mb-0">La Paz</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Ventas:</p>
                      <h6 class="text-sm font-weight-normal mb-0">2500</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Espera:</p>
                      <h6 class="text-sm font-weight-normal mb-0">29.9%</h6>
                  </div>
                  </div>
                  <hr class="horizontal dark mt-3 mb-1">
              </li>
              <li class="list-group-item px-0 border-0">
                  <div class="row align-items-center">
                  <div class="col-auto">
                      <!-- Country flag -->
                      <img src="{{ asset('assets/img/icons/flags/sc.jpg') }}" width="40" alt="Country flag">
                  </div>
                  <div class="col">
                      <p class="text-xs font-weight-bold mb-0">Departamento:</p>
                      <h6 class="text-sm font-weight-normal mb-0">Santa Cruz</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Ventas:</p>
                      <h6 class="text-sm font-weight-normal mb-0">3.900</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Espera:</p>
                      <h6 class="text-sm font-weight-normal mb-0">40.22%</h6>
                  </div>
                  </div>
                  <hr class="horizontal dark mt-3 mb-1">
              </li>
              {{-- <li class="list-group-item px-0 border-0">
                  <div class="row align-items-center">
                  <div class="col-auto">
                      <!-- Country flag -->
                      <img src="{{ asset('assets/img/icons/flags/GB.png') }}" alt="Country flag">
                  </div>
                  <div class="col">
                      <p class="text-xs font-weight-bold mb-0">Country:</p>
                      <h6 class="text-sm font-weight-normal mb-0">Great Britain</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm font-weight-normal mb-0">1.400</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm font-weight-normal mb-0">23.44%</h6>
                  </div>
                  </div>
                  <hr class="horizontal dark mt-3 mb-1">
              </li> --}}
              {{-- <li class="list-group-item px-0 border-0">
                  <div class="row align-items-center">
                  <div class="col-auto">
                      <!-- Country flag -->
                      <img src="{{ asset('assets/img/icons/flags/BR.png') }}" alt="Country flag">
                  </div>
                  <div class="col">
                      <p class="text-xs font-weight-bold mb-0">Country:</p>
                      <h6 class="text-sm font-weight-normal mb-0">Brasil</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm font-weight-normal mb-0">562</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm font-weight-normal mb-0">32.14%</h6>
                  </div>
                  </div>
                  <hr class="horizontal dark mt-3 mb-1">
              </li> --}}
              {{-- <li class="list-group-item px-0 border-0">
                  <div class="row align-items-center">
                  <div class="col-auto">
                      <!-- Country flag -->
                      <img src="{{ asset('assets/img/icons/flags/AU.png') }}" alt="Country flag">
                  </div>
                  <div class="col">
                      <p class="text-xs font-weight-bold mb-0">Country:</p>
                      <h6 class="text-sm font-weight-normal mb-0">Australia</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Sales:</p>
                      <h6 class="text-sm font-weight-normal mb-0">400</h6>
                  </div>
                  <div class="col text-center">
                      <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                      <h6 class="text-sm font-weight-normal mb-0">56.83%</h6>
                  </div>
                  </div>
              </li> --}}
              </ul>
          </div>
          </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12">
          <div class="card mb-4">
          <div class="card-header pb-0">
              <h6>Carreras mas solicitados</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                  <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Carrera</th>
                      {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Value</th> --}}
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ads Spent</th> --}}
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>
                      <div class="d-flex px-3 py-1">
                          <div>
                          <img src="{{ url('assets/img/pople/gastronomia-y-hoteleria.jpg') }}" class="avatar me-3" alt="image">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">GASTRONOMÍA Y HOTELERÍA</h6>
                          <p class="text-sm font-weight-normal text-secondary mb-0"><span class="text-success">8.232</span> Personas</p>
                          </div>
                      </div>
                      </td>
                      {{-- <td>
                      <p class="text-sm font-weight-normal mb-0">$130.992</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-sm font-weight-normal mb-0">$9.500</p>
                      </td> --}}
                      <td class="align-middle text-end">
                      <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                          <p class="text-sm font-weight-normal mb-0">13</p>
                          <i class="ni ni-bold-down text-sm ms-1 text-success"></i>
                      </div>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <div class="d-flex px-3 py-1">
                          <div>
                          <img src="{{ url('assets/img/pople/derecho.jpg') }}" class="avatar me-3" alt="image">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">DERECHO</h6>
                          <p class="text-sm font-weight-normal text-secondary mb-0"><span class="text-success">12.821</span> orders</p>
                          </div>
                      </div>
                      </td>
                      {{-- <td>
                      <p class="text-sm font-weight-normal mb-0">$80.250</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-sm font-weight-normal mb-0">$4.200</p>
                      </td> --}}
                      <td class="align-middle text-end">
                      <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                          <p class="text-sm font-weight-normal mb-0">40</p>
                          <i class="ni ni-bold-down text-sm ms-1 text-success"></i>
                      </div>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <div class="d-flex px-3 py-1">
                          <div>
                          <img src="{{ url('assets/img/pople/educacion-parvularia.jpg') }}" class="avatar me-3" alt="image">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">EDUCACIÓN PARVULARIA</h6>
                          <p class="text-sm font-weight-normal text-secondary mb-0"><span class="text-success">2.421</span> orders</p>
                          </div>
                      </div>
                      </td>
                      {{-- <td>
                      <p class="text-sm font-weight-normal mb-0">$40.600</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-sm font-weight-normal mb-0">$9.430</p>
                      </td> --}}
                      <td class="align-middle text-end">
                      <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                          <p class="text-sm font-weight-normal mb-0">54</p>
                          <i class="ni ni-bold-up text-sm ms-1 text-danger"></i>
                      </div>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <div class="d-flex px-3 py-1">
                          <div>
                          <img src="{{ url('assets/img/pople/ingenieria-comercial.jpg') }}" class="avatar me-3" alt="image">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">INGENIERÍA COMERCIAL</h6>
                          <p class="text-sm font-weight-normal text-secondary mb-0"><span class="text-success">5.921</span> orders</p>
                          </div>
                      </div>
                      </td>
                      {{-- <td>
                      <p class="text-sm font-weight-normal mb-0">$91.300</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-sm font-weight-normal mb-0">$7.364</p>
                      </td> --}}
                      <td class="align-middle text-end">
                      <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                          <p class="text-sm font-weight-normal mb-0">5</p>
                          <i class="ni ni-bold-down text-sm ms-1 text-success"></i>
                      </div>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      <div class="d-flex px-3 py-1">
                          <div>
                          <img src="{{ url('assets/img/pople/marketing.jpg') }}" class="avatar me-3" alt="image">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">MARKETING</h6>
                          <p class="text-sm font-weight-normal text-secondary mb-0"><span class="text-success">921</span> orders</p>
                          </div>
                      </div>
                      </td>
                      {{-- <td>
                      <p class="text-sm font-weight-normal mb-0">$140.925</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                      <p class="text-sm font-weight-normal mb-0">$20.531</p>
                      </td> --}}
                      <td class="align-middle text-end">
                      <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                          <p class="text-sm font-weight-normal mb-0">121</p>
                          <i class="ni ni-bold-up text-sm ms-1 text-danger"></i>
                      </div>
                      </td>
                  </tr>
                  </tbody>
              </table>
              </div>
          </div>
          </div>
      </div>
    </div>
@stop
@section('js')
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var ctx2 = document.getElementById("chart-pie").getContext("2d");
    var ctx3 = document.getElementById("chart-bar").getContext("2d");

    // Line chart
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
            label: "Facebook Ads",
            tension: 0,
            pointRadius: 5,
            pointBackgroundColor: "#e91e63",
            pointBorderColor: "transparent",
            borderColor: "#e91e63",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: [50, 100, 200, 190, 400, 350, 500, 450, 700],
            maxBarThickness: 6
          },
          {
            label: "Google Ads",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "#3A416F",
            pointBorderColor: "transparent",
            borderColor: "#3A416F",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: [10, 30, 40, 120, 150, 220, 280, 250, 280],
            maxBarThickness: 6
          }
        ],
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
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: '#c1c4ce5c'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#9ca2b7',
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
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5],
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


    // Pie chart
    new Chart(ctx2, {
      type: "pie",
      data: {
        labels: ['Facebook', 'Direct', 'Organic', 'Referral'],
        datasets: [{
          label: "Projects",
          weight: 9,
          cutout: 0,
          tension: 0.9,
          pointRadius: 2,
          borderWidth: 1,
          backgroundColor: ['#17c1e8', '#e91e63', '#3A416F', '#a8b8d8'],
          data: [15, 20, 12, 60],
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
              color: '#c1c4ce5c'
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
              color: '#c1c4ce5c'
            },
            ticks: {
              display: false,
            }
          },
        },
      },
    });

    // Bar chart
    new Chart(ctx3, {
      type: "bar",
      data: {
        labels: ['16-20', '21-25', '26-30', '31-36', '36-42', '42-50', '50+'],
        datasets: [{
          label: "Ventas por edad",
          weight: 5,
          borderWidth: 0,
          borderRadius: 4,
          backgroundColor: '#3A416F',
          data: [15, 20, 12, 60, 20, 15, 25],
          fill: false
        }],
      },
      options: {
        indexAxis: 'y',
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
              color: '#c1c4ce5c',
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
              color: '#9ca2b7'
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
