@extends('layouts.app')

@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('css')

<style>
  .mi-boton {
    position: sticky;
    top: 80vh;
    left: 50px;
  }
</style>
@endsection

@section('content')
<!-- Modal NUEVO INGRESO -->
<div class="modal fade" id="modalcopiaLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-normal" id="exampleModalLabel">Modal de para compartir link</h6>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">

        <div class="d-flex align-items-center mb-2">
          <div class="form-group w-70">
            <div class="input-group bg-gray-200 border-radius-md">
              <input class="form-control form-control-sm border-radius-md" id="url-fb" type="text" disabled>
              <button type="button" class="btn btn-icon-only btn-rounded btn-facebook mb-0 p-1"><i class="fa fa-facebook"></i></button>
              <span class="input-group-text bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Referral code expires in 24 hours"><i class="material-icons text-sm me-2">timer</i></span>
            </div>
          </div>
          <button onclick="clickBoton('fb')" class="">Link</button>
          <a href="javascript:;" class="btn btn-sm btn-outline-secondary ms-2 px-3 mb-0">Ifreme</a>
        </div>

        <div class="d-flex align-items-center mb-2">
          <div class="form-group w-70">
            <div class="input-group bg-gray-200 border-radius-md">
              <input class="form-control form-control-sm border-radius-md" id="url-wa" type="text" disabled>
              <button type="button" class="btn btn-icon-only btn-rounded btn-success mb-0 p-1"><i class="fa fa-whatsapp"></i></button>
              <span class="input-group-text bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Referral code expires in 24 hours"><i class="material-icons text-sm me-2">timer</i></span>
            </div>
          </div>
          <a onclick="copyToClipboard('wa')" class="btn btn-sm btn-outline-secondary ms-2 px-3 mb-0">Link</a>
          <a href="javascript:;" class="btn btn-sm btn-outline-secondary ms-2 px-3 mb-0">Ifreme</a>
        </div>

        <div class="d-flex align-items-center mb-2">
          <div class="form-group w-70">
            <div class="input-group bg-gray-200 border-radius-md">
              <input class="form-control form-control-sm border-radius-md" id="url-ig" type="text" disabled>
              <button type="button" class="btn btn-icon-only btn-rounded btn-danger mb-0 p-1"><i class="fa fa-instagram"></i></button>
              <span class="input-group-text bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Referral code expires in 24 hours"><i class="material-icons text-sm me-2">timer</i></span>
            </div>
          </div>
          <a onclick="copyToClipboard('ig')" class="btn btn-sm btn-outline-secondary ms-2 px-3 mb-0">Link</a>
          <a href="javascript:;" class="btn btn-sm btn-outline-secondary ms-2 px-3 mb-0">Ifreme</a>
        </div>

        <div class="d-flex align-items-center mb-2">
          <div class="form-group w-70">
            <div class="input-group bg-gray-200 border-radius-md">
              <input class="form-control form-control-sm border-radius-md" id="url-tw" type="text" disabled>
              <button type="button" class="btn btn-icon-only btn-rounded btn-info mb-0 p-1"><i class="fa fa-twitter"></i></button>
              <span class="input-group-text bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Referral code expires in 24 hours"><i class="material-icons text-sm me-2">timer</i></span>
            </div>
          </div>
          <a onclick="copyToClipboard('tw')" class="btn btn-sm btn-outline-secondary ms-2 px-3 mb-0">Link</a>
          <a href="javascript:;" class="btn btn-sm btn-outline-secondary ms-2 px-3 mb-0">Ifreme</a>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn bg-gradient-success" onclick="guardarIngreso()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal NUEVO EGRESO -->
<div class="modal fade" id="modalNuevoEgreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-normal" id="exampleModalLabel">Formulario de egreso <span id="monto-actual" class="text-success">Presupuesto actual {{ $presupuesto }} Bs.</span></h6>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">


            <form action="" id="formulario_egreso" enctype="multipart/form-data">
              <input type="hidden" name="campania_id_egreso" id="campania_id_egreso" value="{{ $campania_id }}">
              <input type="hidden" name="presupuesto_id" id="presupuesto_id" value="0">
              <input type="hidden" name="comprobante_id" id="comprobante_id" value="0">
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Seleccion el tipo</label>
                      <select class="form-control" name="gasto_egreso" id="gasto_egreso">
                        <option value="">Seleccion el tipo de gasto</option>
                        @foreach($gastos as $gas)
                            <option value="{{ $gas->id }}">{{ $gas->nombre }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div style="margin-top:15px"></div>
                  <div id="div_gasto_egreso" class="input-group input-group-outline mb-4">
                    <label class="form-label">Monto de gasto en Bs.</label>
                    <input type="number" name="monto_egreso" id="monto_egreso" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div id="div_descripcion_egreso" class="input-group input-group-static mb-4">
                    <label class="form-label">Descripcion del Egreso</label>
                    <input type="text" name="descripcion_egreso" id="descripcion_egreso" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group input-group-static mb-4">
                    <input type="file" name="comprobante" id="comprobante" class="form-control">
                    <small class="text-success" style="font-size: 11px;">Si desea Remplazar o Subir un comporbante de egreso puede subir un archivo</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div  id="div_comprobante_egreso" class="input-group input-group-static mb-4">
                    <label class="form-label">Nro de Comprobante</label>
                    <input type="number" name="nro_comprobante" id="nro_comprobante" class="form-control">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn bg-gradient-success" onclick="guardarEgreso()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal NUEVO INGRESO -->
<div class="modal fade" id="modalNuevoIngreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title font-weight-normal" id="exampleModalLabel">Formulario de nuevo ingreso</h6>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">


            <form action="" id="formulario_ingreso">
              <input type="hidden" name="campania_id_ingreso" id="campania_id_ingreso" value="{{ $campania_id }}">
              <div class="row">
                <div class="col-md-4">
                  {{-- <div class="input-group input-group-outline my-3">
                      <div class="input-group input-group-static mb-4">
                        <label for="exampleFormControlSelect1" class="ms-0">Seleccion el tipo</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          @foreach($gastos as $gas)
                              <option value="{{ $gas->id }}">{{ $gas->nombre }}</option>
                          @endforeach
                        </select>
                      </div>
                  </div> --}}
                  <div class="input-group input-group-outline mb-4">
                    <label class="form-label">Monto de ingreso en Bs.</label>
                    <input type="number" name="monto_ingreso" id="monto_ingreso" class="form-control">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="input-group input-group-outline mb-4">
                    <label class="form-label">Descripcion del Ingreso</label>
                    <input type="text" name="descripcion_ingreso" id="descripcion_ingreso" class="form-control">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn bg-gradient-success" onclick="guardarIngreso()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modatramsferenciaAsignacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Detalle de Seguimiento de <span id="persona_asignacion" class="text-info"></span></h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">

            <input type="hidden" id="asignacion_tramsferencia_id">
            <input type="hidden" id="oportunidad_tramsferencia_id">

            <div class="card">
              <div class="card-body">
                <div id="asignaciones-listado">

                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-success" onclick="ajaxListadoVendedorTramsferencia()">REASIGNAR A OTRO VENDEDOR</button>
                  </div>
                </div>
                <div id="listado-vendedores-reasignar" style="display: none;">
                  <div id="tabla-ajax-reasignarVendedor">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn bg-gradient-success" onclick="guarda()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal NUEVO EVENTO-->
<div class="modal fade" id="modalNuevoEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Formulario de Evento</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <form action="" id="formulario_evento">
                <input type="text" name="evento_id" id="evento_id" value="0">

                <div class="container">

                  <div class="row">
                    <label for="">Agendar para</label>
                    <div class="col-md-6">
  
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="vendedoreslabel" name="vendedores" onchange="verificas(this)">
                        <label class="form-check-label" for="vendedoreslabel">Vendedores</label>
                      </div>                       
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="destinatarioslabel" name="destinatarios" onchange="verificas(this)">
                        <label class="form-check-label" for="destinatarioslabel">Destinatarios</label>
                      </div>
                      {{-- <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="verificas(this)">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Destinatarios</label>
                      </div> --}}
  
                    </div>
  
                    <div class="col-md-6">
  
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="todoslabel" name="todos" onchange="verificas(this)">
                        <label class="form-check-label" for="todoslabel">Todos</label>
                      </div>                       
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="privabolabel" name="privado" onchange="verificas(this)">
                        <label class="form-check-label" for="privabolabel">Privado</label>
                      </div>
                      {{-- <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Checked switch</label>
                      </div> --}}
  
                    </div>
                  </div>

                  <div class="row" style="display: none" id="bloque-privado">
                    <label class="mt-4 form-label">Buscar Persona</label>
                    <select class="form-control" name="personasSeleccionadas[]" id="personasSeleccionadas" multiple>
                      @foreach ( $vendedoresAgenda as $vage)
                        <option value="{{ $vage->id }}">{{ $vage->nombres." ".$vage->apellido_paterno." ".$vage->apellido_materno }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group input-group-outline mb-4 focusable">
                        <label class="form-label">Nombre del Evento</label>
                        <input type="text" name="nombre_evento" id="nombre_evento" class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="input-group input-group-static">
                        <label>Fecha Inicio</label>
                        <input class="form-control datetimepicker" type="text" data-input name="fecha_ini" id="fecha_ini" min="{{ date('Y-m-d') }}">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group input-group-static">
                        <label>Fecha Fin</label>
                        <input class="form-control datetimepicker" type="text" data-input name="fecha_fin" id="fecha_fin">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label for="">Todo el día</label>
                    <div class="col-md-6">
                      
                      <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="todoDia" id="customRadio1" value="Si" onchange="verificaTodoDia(this)" checked>
                        <label class="custom-control-label" for="customRadio1">Si</label>
                      </div>
                      

                    </div>
                    <div class="col-md-6">

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="todoDia" id="customRadio2" value="No" onchange="verificaTodoDia(this)">
                        <label class="custom-control-label" for="customRadio2">No</label>
                      </div>

                    </div>
                  </div>

                  <div class="row" style="display: none;" id="bloque-todoDia">
                    {{-- <div class="col-md-6">
                      <div class="input-group input-group-outline mb-4 focusable">
                        <label class="form-label">Fecha Inicio</label>
                        <input type="datetime-local" name="fecha_ini" id="fecha_ini" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group input-group-outline mb-4 focusable">
                        <label class="form-label">Fecha Fin</label>
                        <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="form-control">
                      </div>
                    </div> --}}
                    <div class="col-md-6">
                      <div class="input-group input-group-outline mb-4 focusable">
                        <label class="form-label">Fecha Inicio</label>
                        <input type="time" name="hora_ini" id="hora_ini" class="form-control" value="00:00">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="input-group input-group-outline mb-4 focusable">
                        <label class="form-label">Fecha Inicio</label>
                        <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="23:59">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div id="tipo_agenda_selct">
                        <div class="input-group input-group-static mb-4">
                          <label for="tipo_agenda_id" class="ms-0">Tipo de Agenda</label>
                          <select class="form-control" id="tipo_agenda_id" name="tipo_agenda_id" style="width:100%;">
                              @foreach ($tipoAgendas as $ta)
                                <option value="{{ $ta->id }}">{{ $ta->nombre }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group input-group-outline mb-4">
                        <textarea name="descripcion_agenda" id="descripcion_agenda" cols="60" rows="5" class="form-control" placeholder="Descripcion"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group input-group-static mb-4">
                        <label for="tipo_agenda_id" class="ms-0">Prioridades</label>
                          <select class="form-control" id="prioridad_id" name="prioridad_id" style="width:100%;">
                            @foreach ($prioridades as $prio)
                              <option value="{{ $prio->id }}">{{ $prio->nombre }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                  </div>

                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <div class="row">
          <div class="col-md-4">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn bg-gradient-success" onclick="guardaEvent()">Guardar</button>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn bg-gradient-danger" onclick="eliminarEvent()">Eliminar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal NUEVO TIPO AGENDA-->
<div class="modal fade" id="modalNuevoTipoEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Formulario de Tipo Agenda</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <form action="" id="formulario_tipo_agenda">
                <input type="hidden" name="tipo_agenda_id" id="tipo_agenda_id" value="0">
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group input-group-outline mb-4 focusable">
                      <label class="form-label">Nombre del Agenda</label>
                      <input type="text" name="nombre_agenda" id="nombre_agenda" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group input-group-outline mb-4 focusable">
                      <label class="form-label">Color</label>
                      <input type="color" name="color_agenda" id="color_agenda" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group input-group-outline mb-4">
                      <textarea name="descripcion_agenda" id="descripcion_agenda" cols="60" rows="5" class="form-control" placeholder="Descripcion de agenda"></textarea>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn bg-gradient-success" onclick="guardaTipoAgenda()">Guardar</button>
      </div>
    </div>
  </div>
</div>


<div class="row mt-5">
  <div class="col-xl-8 col-lg-7">
    <div class="row">

      <div class="col-sm-3">
        <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-info shadow-success border-radius-lg py-2 pe-1">
            <a href="{{ url('Campania/balanceGeneral',[$campania_id]) }}">
              <div class="chart">
                <canvas id="chart-line-presupuesto" class="chart-canvas" height="100"></canvas>
              </div>
            </a>
          </div>
        </div>
        <div class="card-body py-3">
          <p class="text-sm mb-0">Presupuesto actual</p>
          <h6 class="font-weight-bolder mb-0">
            <span id="presupuestoActualCampania">{{ $presupuesto }}</span> Bs.
            {{-- <span class="text-success text-sm font-weight-bolder">+55%</span> --}}
          </h6>
        </div>
        </div>
      </div>

      <div class="col-sm-3">
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

      <div class="col-sm-3 mt-md-0 mt-5">
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

      <div class="col-sm-3 mt-md-0 mt-5">
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

          </div>
        </div>
      </div>
      <div class="col-lg-12 col-sm-6">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-md-6">
                <h6 class="mb-0">Tipos de Agendas</h6>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary btn-sm" onclick="abreModalTipoAgenda()">Nuevo Tipo Agenda</button>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <ul class="list-group">
              <div id="lista-tipo-agendas">

                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 shadow text-center">
                      <button class="btn btn-icon-only btn-rounded mb-0 p-1 bg-gradient-dark" onclick="cargaEventos('0')">
                        <i class="material-icons opacity-10">arrow_back</i>
                      </button>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Todos</h6>
                      <span class="text-xs">Mostrar todos los eventos</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    {{-- <button onclick="" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">edit</i></button> --}}
                  </div>
                </li>

                @foreach ($tipoAgendas as $ta)

                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 shadow text-center">
                        <button class="btn btn-icon-only btn-rounded mb-0 p-1" onclick="cargaEventos('{{ $ta->id }}')" style="background: {{ $ta->color }}">
                          <i class="material-icons opacity-10">arrow_back</i>
                        </button>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">{{ $ta->nombre }}</h6>
                        <span class="text-xs">{{ $ta->descripcion }}</span>
                      </div>
                    </div>
                    <div class="d-flex">
                      <button onclick="" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">edit</i></button>
                    </div>
                  </li>  

                @endforeach

              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="col-md-6">

    <div class="card mt-4">
      <div class="card-header pb-0 p-3">
        <h6 class="mb-0">Formularios</h6>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <div class="accordion-1">
            <div class="container">
              <div class="row">
                <div class="col-md-12 mx-auto">
                  <div class="accordion" id="accordionRental">
                    @foreach ($formularios as $key => $f)
                      @if ($f->formulario)
                        <div class="accordion-item mb-3">
                          <h6 class="accordion-header" id="headingOne">
                            <div class="row">
                              <div class="col-md-1">
                                <a href="{{ url('Formulario/respuestaFormulario', [$f->campania_id, $f->formulario_id]) }}" class="btn btn-sm btn-icon-only btn-rounded btn-outline-info mb-0 p-0" onclick="editaFormulario('{{ $f->formulario->id }}')"><i class="fa fa-eye"></i></a>
                              </div>
                              <div class="col-md-1">
                                <button class="btn btn-sm btn-icon-only btn-rounded btn-outline-warning mb-0 p-0" onclick="editaFormulario('{{ $f->formulario->id }}')"><i class="fa fa-edit"></i></button>
                              </div>
                              <div class="col-md-1">
                                <a href="{{ url('Campania/estadistica', [$f->campania_id, $f->formulario_id]) }}" class="btn btn-sm btn-icon-only btn-rounded btn-outline-dark mb-0 p-0" onclick="editaFormulario('{{ $f->formulario->id }}')"><i class="fa fa-list"></i></a>
                              </div>

                              <div class="col-md-9" style="margin-top:-10px;">
                                <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $key }}" aria-expanded="false" aria-controls="collapseOne">
                                  {{ $f->formulario->nombre }}
                                  <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                  <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                </button>
                              </div>
                            </div>


                          </h6>
                          <div id="collapseOne{{ $key }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
                            <div class="accordion-body text-sm opacity-8">
                                        
                              <p style="display: none;" id="urlFormulario_fb_{{ $f->id }}">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"fb"]) }}</p>
                              <p style="display: none;" id="urlFormulario_wa_{{ $f->id }}">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"wa"]) }}</p>
                              <p style="display: none;" id="urlFormulario_ig_{{ $f->id }}">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"ig"]) }}</p>
                              <p style="display: none;" id="urlFormulario_tw_{{ $f->id }}">{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"tw"]) }}</p>
                              <p style="display: none;" id="iframeFormulario_fb_{{ $f->id }}">&lt;iframe src="{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"fb"]) }}" width=”100%” height=”60%” &gt;&lt;/iframe&gt;</p>
                              <p style="display: none;" id="iframeFormulario_wa_{{ $f->id }}">&lt;iframe src="{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"wa"]) }}" width=”100%” height=”60%” &gt;&lt;/iframe&gt; </p>
                              <p style="display: none;" id="iframeFormulario_ig_{{ $f->id }}">&lt;iframe src="{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"ig"]) }}" width=”100%” height=”60%” &gt;&lt;/iframe&gt; </p>
                              <p style="display: none;" id="iframeFormulario_tw_{{ $f->id }}">&lt;iframe src="{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"tw"]) }}" width=”100%” height=”60%” &gt;&lt;/iframe&gt; </p>

                              <div class="d-flex align-items-center mb-2">
                                <div class="form-group w-100">
                                  <div class="input-group bg-gray-200 border-radius-md">
                                    <input class="form-control form-control-sm border-radius-md" id="url-fb" type="text" disabled value="{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"fb"]) }}">
                                    <button type="button" class="btn btn-icon-only btn-rounded btn-facebook mb-0 p-1"><i class="fa fa-facebook"></i></button>
                                    <span class="input-group-text bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Referral code expires in 24 hours"><i class="material-icons text-sm me-2">timer</i></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <button onclick="copyToClipboard('fb', '{{ $f->id }}')" class="btn w-100 btn-sm btn-outline-secondary ms-2 px-3 mb-0">Link</button>
                                </div>
                                <div class="col-md-6">
                                  <a onclick="copyToIframe('fb', '{{ $f->id }}')" class="btn w-100 btn-sm btn-outline-secondary ms-2 px-3 mb-0">Ifreme</a>
                                </div>
                              </div>
                              <hr>

                              <div class="d-flex align-items-center mb-2">
                                <div class="form-group w-100">
                                  <div class="input-group bg-gray-200 border-radius-md">
                                    <input class="form-control form-control-sm border-radius-md" id="url-wa" value="{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"wa"]) }}" type="text" disabled>
                                    <button type="button" class="btn btn-icon-only btn-rounded btn-success mb-0 p-1"><i class="fa fa-whatsapp"></i></button>
                                    <span class="input-group-text bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Referral code expires in 24 hours"><i class="material-icons text-sm me-2">timer</i></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <a onclick="copyToClipboard('wa', '{{ $f->id }}')" class="btn w-100 btn-sm btn-outline-secondary ms-2 px-3 mb-0">Link</a>
                                </div>
                                <div class="col-md-6">
                                  <a onclick="copyToIframe('wa', '{{ $f->id }}')" class="btn w-100 btn-sm btn-outline-secondary ms-2 px-3 mb-0">Ifreme</a>
                                </div>
                              </div>
                              <hr>

                              <div class="d-flex align-items-center mb-2">
                                <div class="form-group w-100">
                                  <div class="input-group bg-gray-200 border-radius-md">
                                    <input class="form-control form-control-sm border-radius-md" id="url-ig" value="{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"ig"]) }}" type="text" disabled>
                                    <button type="button" class="btn btn-icon-only btn-rounded btn-danger mb-0 p-1"><i class="fa fa-instagram"></i></button>
                                    <span class="input-group-text bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Referral code expires in 24 hours"><i class="material-icons text-sm me-2">timer</i></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <a onclick="copyToClipboard('ig', '{{ $f->id }}')" class="btn w-100 btn-sm btn-outline-secondary ms-2 px-3 mb-0">Link</a>
                                </div>
                                <div class="col-md-6">
                                  <a onclick="copyToIframe('ig', '{{ $f->id }}')" class="btn w-100 btn-sm btn-outline-secondary ms-2 px-3 mb-0">Ifreme</a>
                                </div>
                              </div>
                              <hr>
                      
                              <div class="d-flex align-items-center mb-2">
                                <div class="form-group w-100">
                                  <div class="input-group bg-gray-200 border-radius-md">
                                    <input class="form-control form-control-sm border-radius-md" value="{{ url('Formulario/respuestaFormularioCompartir', [$campania_id, $f->formulario_id,"tw"]) }}" id="url-tw" type="text" disabled>
                                    <button type="button" class="btn btn-icon-only btn-rounded btn-info mb-0 p-1"><i class="fa fa-twitter"></i></button>
                                    <span class="input-group-text bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Referral code expires in 24 hours"><i class="material-icons text-sm me-2">timer</i></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <a onclick="copyToClipboard('tw', '{{ $f->id }}')" class="btn w-100 btn-sm btn-outline-secondary ms-2 px-3 mb-0">Link</a>
                                </div>
                                <div class="col-md-6">
                                  <a onclick="copyToIframe('tw', '{{ $f->id }}')" class="btn w-100 btn-sm btn-outline-secondary ms-2 px-3 mb-0">Ifreme</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>  
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </ul>
      </div>
    </div>

  </div>
  <div class="col-md-6">

  </div>
</div>

<div class="row mt-4">
  <div class="col-sm-6 mt-sm-0 mt-4">
    <div class="card h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-4">
            <h6 class="mb-0">Ingresos</h6>
          </div>
          <div class="col-md-4">
            <button class="btn btn-success btn-sm" onclick="nuevoIngreso()">Nuevo Ingreso </button>
          </div>
          <div class="col-md-4 d-flex justify-content-end align-items-center">
            <i class="material-icons me-2 text-lg">date_range</i>
            <small>
              @php
                $utilidades = new App\librerias\Utilidades();
                $mesLiteral = $utilidades->mesLiteral(date('n'));

                echo $mesLiteral." ".date('Y');

              @endphp
            </small>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">

          <div id="listadoIngresos">
            @foreach ( $ingresos as $in)
              <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                <div class="d-flex">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">{{ $in->descripcion }}</h6>
                      <span class="text-xs">
                        @php
                          $fechaHoraEs = $utilidades->fechaHoraCastellano($in->fecha);
                          echo $fechaHoraEs;
                        @endphp
                      </span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
                    {{ $in->ingreso }} Bs.
                  </div>
                </div>
                <hr class="horizontal dark mt-3 mb-2" />
              </li>  
            @endforeach
          </div>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card h-100">
      <div class="card-header pb-0 p-3">
        <div class="row">
          <div class="col-md-4">
            <h6 class="mb-0">Gastos</h6>
          </div>
          <div class="col-md-4">
            <button class="btn btn-sm btn-info" onclick="nuevoEgreso()">Nuevo Gasto</button>
          </div>
          <div class="col-md-4 d-flex justify-content-end align-items-center">
            <i class="material-icons me-2 text-lg">date_range</i>
            <small>
              @php
                $mesLiteral = $utilidades->mesLiteral(date('n'));
                
                echo $mesLiteral." ".date('Y');

              @endphp
            </small>
          </div>
        </div>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">

          <div id="listadoEgreso">

            <table width="100%" id="table-egresos">

              @foreach ( $egresos as $egre )
                @php
                  $comprobante = App\Models\Comprobante::where('presupuesto_id',$egre->id)->first();
                @endphp
                <tr>
                  <td>

                    {{-- <div id="listadoEgreso"> --}}

                      <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                        <div class="d-flex">
                          <div class="d-flex align-items-center">
                            <button onclick="editEgreso('{{ $egre->id }}', '{{ $egre->gasto_id }}', '{{ $egre->egreso }}', '{{ $egre->descripcion }}', '{{ ($comprobante)? $comprobante->nro_comprobante: '' }}', '{{ ($comprobante)? $comprobante->id : '0' }}')" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">edit</i></button>
                            <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark text-sm">{{ $egre->gasto->nombre }}</h6>
                              <span class="text-xs">
                                @php
                                  $fechaHoraEs = $utilidades->fechaHoraCastellano($egre->fecha);
        
                                  echo $fechaHoraEs;
                                @endphp
                              </span>
                            </div>
                          </div>
                          <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold ms-auto">
                            {{$egre->egreso}} Bs.
                          </div>
                        </div>
                        <hr class="horizontal dark mt-3 mb-2" />
                      </li>

                    {{-- </div> --}}
                    
                  </td>
                </tr>  
              @endforeach
            </table>

            <hr><br>
          </div>
        </ul>
      </div>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h6 class="text-center">ASIGNACIONES DE OPORTUNIDADES</h6>
      </div>
      <div class="card-body">
        <form action="" id="formulario-asignacion">
          <div class="row">
            <div class="col-md-5">
              <ul class="list-group">
                <div id="tabla-oportunidades-show">
      
                </div>
              </ul>
            </div>
            <div class="col-md-1">
              <button class="btn btn-success mi-boton" type="button"  onclick="asignarOportunidades()">Asignar <i class="fas fa-arrow-right"></i></button>
            </div>
            <div class="col-md-6">
              <ul class="list-group">
                <div id="tabla-vendedores-show">
      
                </div>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="col-md-12">
        <div id="tabla_listado_clientes_asignados">

        </div>
  </div>
</div>

@stop

@section('js')
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/flatpickr.min.js') }}"></script>

<script>
    var ctx1 = document.getElementById("chart-line-1").getContext("2d");

    var ctx2 = document.getElementById("chart-line-2").getContext("2d");

    var presupuesto = document.getElementById("chart-line-presupuesto").getContext("2d");

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

    new Chart(presupuesto, {
      type: "line",
      data: {
        labels: [
              @php
                foreach ($egresos as $egre){
                    echo "'".$egre->gasto->nombre."',";
                }
              @endphp
                // "Abr", "May", "Jun", "Jul", "Agu", "Sept", "Oct", "Non", "Dic"
              ],
        datasets: [{
          label: "Income",
          tension: 0.5,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#fff",
          borderWidth: 2,
          backgroundColor: "transparent",
          data: [
            @php
              foreach ($egresos as $egre){
                  echo "'".$egre->egreso."',";
              }
            @endphp
            // 60, 80, 75, 90, 67, 100, 90, 110, 120
          ],
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

    // lista las oportuniades recientes
    ajaxListadoOportunidades();

    // lista las vendedores disponibles
    ajaxListadoVendedores();

    // lista de clientes asignados a un vendedor
    ajaxListadoClientesAsignados();


    var dataTableSearch = new simpleDatatables.DataTable("#table-egresos", {

        searchable: false,
        fixedHeight: false,
        perPage: 5,

    });

    // LISTADO DE AGENDAS
    listadoEventos();

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

    Swal.fire({
      title: 'Esta seguro de realizar la asignación?',
      text: "No podrás revertir esto.!",
      icon: 'warning',
      showCancelButton: true,
      // confirmButtonColor: '#3085d6',
      // cancelButtonColor: '#d33',
      confirmButtonText: 'Si, asignar!'

    }).then((result) => {
      if (result.isConfirmed) {
        if ($('#navbarFixed').prop('checked')) {
          if( $('#navbarMinimize').prop('checked')){
            var desminuir = 2;
          }else{
            var desminuir = 1;
          }
          if (($('input[type=checkbox]:checked').length-desminuir) != 0) {
            var datos = $('#formulario-asignacion').serialize();

            $.ajax({
              url: "{{ url('Campania/asignacionVendedorCampania') }}",
              data: datos,
              type: 'POST',
              success: function(data) {

                Swal.fire({
                  title: 'Correcto',
                  text: "Se realizo la asignacion!",
                  icon: 'success',
                  timer: 800
                })

                ajaxListadoOportunidades();
                ajaxListadoVendedores();
                ajaxListadoClientesAsignados();

              },
                error: function(error){
                  
                }
            });
          }
          else{
            Swal.fire({
                title: 'Alerta!',
                text: "Debe seleccionar al menos una oportunidad!",
                icon: 'warning',
              })
          }
        }
      }

    })

    
  }

  function ajaxListadoClientesAsignados(){

    $.ajax({
        url: "{{ url('Campania/ajaxListadoClientesAsignados') }}",
        data: {
            campania:{{ $campania_id }}
        },
        type: 'POST',
        success: function(data) {

            $('#tabla_listado_clientes_asignados').html(data);

        },
        error: function(error){

        }
    });
    
  }

  function abreModaltramsferencia(asignacion, nombre, oportunidad) {

    $('#persona_asignacion').text(nombre)

    $('#asignacion_tramsferencia_id').val(asignacion);
    $('#oportunidad_tramsferencia_id').val(oportunidad);
    
    $('#modatramsferenciaAsignacion').modal('show');


    $.ajax({

        url: "{{ url('Campania/ajaxListadoSeguimientos') }}",
        data: {

          asignacion: asignacion,
          oportunidad:oportunidad

        },
        type: 'POST',
        success: function(data) {

          $('#asignaciones-listado').html(data);

        },
        error: function(error){

        }

    });

  }

  function ajaxDetalleOportunidad(){  

    $.ajax({
        url: "{{ url('Campania/ajaxListadoVendedores') }}",
        data: {
            campania:{{ $campania_id }}
        },
        type: 'POST',
        success: function(data) {

            $('#tabla-vendedores-show').html(data);

        },
        error: function(error){

        }
    });

  }

  function ajaxListadoVendedorTramsferencia(){

    $.ajax({
        url: "{{ url('Campania/ajaxListadoVendedorTramsferencia') }}",
        type: 'POST',
        success: function(data) {

            $('#tabla-ajax-reasignarVendedor').html(data);
            $('#listado-vendedores-reasignar').toggle('show');

        },
        error: function(error){

        }
    });



  }

  function reasignarVendedor(){

    Swal.fire({
      title: 'Esta seguro de hacer la tramsferencia?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      // confirmButtonColor: '#3085d6',
      // cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Tramsferir!'
    }).then((result) => {

      if (result.isConfirmed) {

        var ven= $("input[name='listaVendedorReasignacion']:checked").val();
        var  asignacion = $('#asignacion_tramsferencia_id').val();
        var oportunidad = $('#oportunidad_tramsferencia_id').val();

        $.ajax({
            url: "{{ url('Campania/tramsferirOportunidadVendedor') }}",
            data: {
                vendedor:ven,
                asignacion:asignacion,
                oportunidad:oportunidad
            },
            type: 'POST',
            success: function(data) {

              Swal.fire({
                title: 'Correcto',
                text: "Se realizo la tramsferencia!",
                icon: 'success',
                timer: 800
              })

              ajaxListadoVendedorTramsferencia();
              ajaxListadoOportunidades();
              ajaxListadoVendedores();
              ajaxListadoClientesAsignados();

              $('#modatramsferenciaAsignacion').modal('hide');

            },
            error: function(error){

            }
        });
      }
    })

  }

  function nuevoIngreso(){

    $('#modalNuevoIngreso').modal('show');

    $('#monto_ingreso').val('');
    $('#descripcion_ingreso').val('');

  }

  function guardarIngreso(){
  
    Swal.fire({
      title: 'Esta seguro ingresar el monto?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      // confirmButtonColor: '#3085d6',
      // cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Ingresar!'
    }).then((result) => {

      if (result.isConfirmed) {

        var datosFormulario = $('#formulario_ingreso').serialize();


        $.ajax({
            url: "{{ url('Campania/guardaIngreso') }}",
            data: datosFormulario,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
              
              console.log(data);

              $('#listadoIngresos').html(data.lista);
              $('#presupuestoActualCampania').text(data.presupuesto);

              Swal.fire({
                title: 'Correcto',
                text: "Se guardo el ingreso!",
                icon: 'success',
                timer: 800
              })

              $('#modalNuevoIngreso').modal('hide');

            },
            error: function(error){

            }
        });
      }
    })
  
  }

  function nuevoEgreso(){
    
    $('#modalNuevoEgreso').modal('show');
    $('#presupuesto_id').val(0);

    $('#formulario_egreso')[0].reset();
    $("#div_gasto_egreso, #div_descripcion_egreso, #div_comprobante_egreso").removeClass("is-focused");

  }

  function guardarEgreso(){

    Swal.fire({
      title: 'Esta seguro guardar el egreso?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      // confirmButtonColor: '#3085d6',
      // cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Ingresar!'
    }).then((result) => {

      if (result.isConfirmed) {

        // var datosFormulario = $('#formulario_egreso').serialize();
        // console.log(datosFormulario);

        var formulario = new FormData($('#formulario_egreso')[0]);

        $.ajax({
            url: "{{ url('Campania/guardaEgreso') }}",
            // data:datosFormulario,
            data:formulario,
            processData: false,
            contentType: false, 
            type: 'POST',
            dataType: 'json',
            success: function(data) {

              console.log(data.lista);

              $('#listadoEgreso').html(data.lista);
              $('#presupuestoActualCampania').text(data.presupuesto);
              $('#monto-actual').text('Presupuesto actual '+data.presupuesto+' Bs');

              Swal.fire({
                title: 'Correcto',
                text: "Se guardo el Egreso!",
                icon: 'success',
                timer: 800
              })

              $('#modalNuevoEgreso').modal('hide');

            },
            error: function(error){
              console.log(error);
            }
        });
      }
    })
  }

  function editEgreso(presupuesto, gasto, monto, descripcion, nro_comprobante, comprobante){

    $('#presupuesto_id').val(presupuesto);
    $('#gasto_egreso').val(gasto);
    $('#monto_egreso').val(monto);
    $('#descripcion_egreso').val(descripcion);
    $('#nro_comprobante').val(nro_comprobante);
    $('#comprobante_id').val(comprobante)

    $("#div_gasto_egreso, #div_descripcion_egreso, #div_comprobante_egreso").addClass("is-focused");
    
    $('#modalNuevoEgreso').modal('show');

  }

  function copyToClipboard(red, formulario) {

    var redsocial = "";
    if(red == "fb"){redsocial = "Facebook";}else if(red == "wa"){redsocial = "Whatsapp";}else if(red == "ig"){redsocial = "Instagram";}else if(red == "tw"){redsocial = "twitter";}

    var elemento = "#urlFormulario_"+red+"_"+formulario;
    
    var $temp = $("<input>")
    $("body").append($temp);
    $temp.val($(elemento).text()).select();
    console.log($temp);
    document.execCommand("copy");
    $temp.remove();

    Swal.fire({
      title: 'Correcto',
      text: "Se copio el link de "+redsocial+"!",
      icon: 'success',
      timer: 1000
    })
  }

  function copyToIframe(red, formulario){

    
    var redsocial = "";
    if(red == "fb"){redsocial = "Facebook";}else if(red == "wa"){redsocial = "Whatsapp";}else if(red == "ig"){redsocial = "Instagram";}else if(red == "tw"){redsocial = "twitter";}

    var elemento = "#iframeFormulario_"+red+"_"+formulario;

    var $temp = $("<input>")
    $("body").append($temp);
    $temp.val($(elemento).text()).select();
    console.log($temp);
    console.log($temp);
    document.execCommand("copy");
    $temp.remove();

    Swal.fire({
      title: 'Correcto',
      text: "Se copio el iframe de "+redsocial+"!",
      icon: 'success',
      timer: 1000
    })

  }

  function editaFormulario(formulario){

    window.location.href = "{{ url('Formulario/editaFormulario') }}/"+{{ $campania_id }}+"/"+formulario;

  }

  //
  // Widget Calendar
  //

  if (document.querySelector('[data-toggle="widget-calendar"]')) {

    var tipoAgendaGlobal = 0;

    var calendarEl = document.querySelector('[data-toggle="widget-calendar"]');
    var today = new Date();
    var mYear = today.getFullYear();
    var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var mDay = weekday[today.getDay()];
  
    var m = today.getMonth();
    var d = today.getDate();

    document.getElementsByClassName('widget-calendar-year')[0].innerHTML = mYear;
    document.getElementsByClassName('widget-calendar-day')[0].innerHTML = mDay;

    var calendar = new FullCalendar.Calendar(calendarEl, {

      customButtons: {
        // myCustomButton: {
        //   text: 'Nuevo Tipo Agenda',
        //   click: function() {
        //     abreModalTipoAgenda();
        //   }
        // },

        // eliminar: {
        //   text: 'Eliminar Evento',
        //   click: function() {
        //     deleteEvent();
        //   }
        // },

      },
      
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },

      locales: 'es',

      // contentHeight: 'auto',
      // initialView: 'dayGridMonth',
      // selectable: true,
      // initialDate: '2022-05-25',
      // headerToolbar: false,

      
      editable: true,
      navLinks: true, // muestra la barra de navegación




      // events:enventos,
      events:[],

      eventClick: function(info) {

        $('#evento_id').val(info.event.id);
        $('#nombre_evento').val(info.event.title);
        $('#fecha_ini').val((info.event.startStr).replace('-04:00', ''));
        $('#fecha_fin').val((info.event.endStr).replace('-04:00', ''));
        $('#tipo_agenda').val(info.event.extendedProps.tipo_agenda_id);
        $('#descripcion_agenda').val(info.event.extendedProps.text);

        $(".focusable").addClass("is-focused");

        $('#modalNuevoEvento').modal('show');

        // console.log((info.event.startStr).replace('-04:00', ''))
        // console.log((info.event.endStr).replace('-04:00', ''))
        // console.log("-------------------------")

        // // $('#fecha_ini').val('2022-05-05T08:00');



        // console.log(info);
        // console.log("----------------------------------------------------------------");
        // console.log(info.event);
        // console.log("----------------------------------------------------------------");
        // console.log(info.event.id);
        // console.log("----------------------------------------------------------------");
        // console.log(info.event.extendedProps.text);

        // // info.jsEvent.preventDefault(); // don't let the browser navigate

        // // if (info.event.url) {
        // //   // window.open(info.event.url);
        // //   console.log("holas que haces");
        // // }

      },

      dateClick: function(info) {

        var actual = new Date();

        var fechaCalendar = sumarDias(info.date, 1);

        if(fechaCalendar >= actual){
          
          var fechaIni = info.dateStr;
          var fechaFin = info.dateStr;

          $('#evento_id').val(0);
          $('#nombre_evento').val('');
          $('#fecha_ini').val(fechaIni);
          $('#fecha_fin').val(fechaFin);
          $('#tipo_agenda').val();
          $('#descripcion_agenda').val('');

          // $(".focusable").removeClass("is-focused");
          
          $(".focusable").addClass("is-focused");


          $('#modalNuevoEvento').modal('show');

          // alert('Clicked on: ' + info.dateStr);
          // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
          // alert('Current view: ' + info.view.type);
          // // change the day's background color just for fun

          console.log('Clicked on: ' + info.dateStr)
          console.log('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY)
          console.log('Current view: ' + info.view.type)

          // info.dayEl.style.backgroundColor = 'red';
          
          $("#vendedoreslabel").prop('checked', false);
          $("#destinatarioslabel").prop('checked', false);
          $("#todoslabel").prop('checked', false);
          $("#privabolabel").prop('checked', false);

        }
        else{

          // alert("Esto no es posible amigo");}
          console.log("no es posible")

        }

      }, 

      eventDragStart: function(a) { 

        console.log(a.event)
        console.log("Drag start", a.event.startStr); 

      },

      eventDragStop: function(a) { 

        
        // var inicio  = a.event.startStr;
        // var fin     = a.event.endStr;
        // var evento  = a.event.id;
        
        // guardarEventoDrop(inicio, fin, evento);

        console.log(a.event);
        console.log("Drag stop", a.event.endStr); 

      }, 
      
      eventDrop: function(a){

        // console.log(a.event.startStr);
        // console.log(a.event.endStr);

        var inicio  = a.event.startStr;
        var fin     = a.event.endStr;
        var evento  = a.event.id;


        guardarEventoDrop(inicio, fin, evento);

      },
      

      eventResize: function(info) {
        alert(info.event.title + " end is now " + info.event.end.toISOString());

        if (!confirm("is this okay?")) {
          info.revert();
        }
      },

    });

    calendar.render();

  }

  function listadoEventos(){

    $.ajax({
        url: "{{ url('Agenda/listado') }}",
        type: 'GET',
        data:{
          tipo_agenda : tipoAgendaGlobal
        },
        dataType: 'json',
        success: function(data) {

          var vectorPersonas = data; 

          $.each(vectorPersonas, function (ind, value) { 

            calendar.addEvent(value)

          });

        },
        error: function(error){

        }
    });

  }

  function guardaEvent(){

    Swal.fire({
      title: 'Esta seguro guardar el evento?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      // confirmButtonColor: '#3085d6',
      // cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Ingresar!'
    }).then((result) => {

      if (result.isConfirmed) {

        var datos = $('#formulario_evento').serialize();

        $.ajax({
          url: "{{ url('Agenda/nuevoAgenda') }}",
          type: 'POST',
          data: datos,
          // dataType: 'json',
          success: function(data) {

            $('#modalNuevoEvento').modal('hide');

            calendar.removeAllEvents();
            listadoEventos();

          },
          error: function(error){

          }
        });

      }
    })

  }

  function guardarEventoDrop(inicio, fin, evento){

    Swal.fire({
      title: 'Esta seguro de mover de fechas al evento?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      // confirmButtonColor: '#3085d6',
      // cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Ingresar!'
    }).then((result) => {

      if (result.isConfirmed) {

        $.ajax({
          url: "{{ url('Agenda/editaDrop') }}",
          type: 'POST',
          data: {
            evento : evento,
            fechaIni : inicio,
            fechaFin : fin
          },
          // dataType: 'json',
          success: function(data) {

            $('#modalNuevoEvento').modal('hide');

          },
          error: function(error){

          }
        });

      }else{

        calendar.removeAllEvents();
        listadoEventos();

      }

    })

  }

  function abreModalTipoAgenda(){

    $('#modalNuevoTipoEvento').modal('show');

  }

  function guardaTipoAgenda(){

    Swal.fire({
      title: 'Esta seguro de guardar los datos de agenda?',
      text: "No se podra revertir!",
      icon: 'warning',
      showCancelButton: true,
      // confirmButtonColor: '#3085d6',
      // cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Agregar!'
    }).then((result) => {

      if (result.isConfirmed) {

        var datos = $('#formulario_tipo_agenda').serialize();

        $.ajax({
          url: "{{ url('TipoAgenda/nuevo') }}",
          type: 'POST',
          data: datos,
          dataType: 'json',
          success: function(data) {

            if(data.success){

              console.log(data.select)

              $('#lista-tipo-agendas').html(data.lista);
              $('#tipo_agenda_selct').html(data.select);
              

              $('#modalNuevoTipoEvento').modal('hide');

              Swal.fire({
                icon: 'success',
                title: 'Exito!',
                text: 'Se agrego el registro',
                timer: 1500
              })
            }


          },
          error: function(error){

          }
        });

      }

    })
  }

  function cargaEventos(tipoAgenda){

    tipoAgendaGlobal = tipoAgenda;

    console.log(tipoAgendaGlobal);

    $.ajax({
        url: "{{ url('Agenda/ajaxListado') }}",
        type: 'POST',
        data: {
          tipoAgenda:tipoAgenda
        },
        dataType: 'json',
        success: function(data) {

          var vectorPersonas = data; 

          calendar.removeAllEvents();

          $.each(vectorPersonas, function (ind, value) { 

            calendar.addEvent(value)

          });

        },
        error: function(error){

        }
      });

  }


  if (document.getElementById('personasSeleccionadas')) {

    var element = document.getElementById('personasSeleccionadas');
    
    const example = new Choices(element, {

      removeItemButton: true

    });

    // example.setChoices(
    //   [{
    //       value: 'One',
    //       label: 'Label One',
    //       disabled: true
    //     },
    //     {
    //       value: 'Two',
    //       label: 'Label Two',
    //       selected: true
    //     },
    //     {
    //       value: 'Three',
    //       label: 'Label Three'
    //     },
    //   ],
    //   'value',
    //   'label',
    //   false,
    // );

  }

  function verificas(select){

    console.log(select)
    console.log("--------------------------------");
    console.log(select.checked)
    console.log("--------------------------------");
    console.log(select.id)

    if(select.id == "destinatarioslabel"){

      $('#bloque-privado').toggle('show');
      
      $("#vendedoreslabel").prop('checked', false);
      $("#todoslabel").prop('checked', false);
      $("#privabolabel").prop('checked', false);

    }else if(select.id == "privabolabel"){

      $("#vendedoreslabel").prop('checked', false);
      $("#todoslabel").prop('checked', false);
      $("#destinatarioslabel").prop('checked', false);

    }else if(select.id == "todoslabel"){

      $("#vendedoreslabel").prop('checked', true);
      $("#privabolabel").prop('checked', true);

    }else if(select.id == "vendedoreslabel"){

      $("#destinatarioslabel").prop('checked', false);
      $("#todoslabel").prop('checked', false);
      $("#privabolabel").prop('checked', false);

    }

  }

  function verificaTodoDia(radio){

    $('#bloque-todoDia').toggle('show')

  }

  if (document.querySelector('.datetimepicker')) {

    $(".datetimepicker").flatpickr({
      // locale: "es",
      // dateFormat: "d/m/Y",
      minDate: "today",

      locale: {
        firstDayOfWeek: 1,
        weekdays: {
          shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
          longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],         
        }, 
        months: {
          shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
          longhand: ['Enero', 'Febreo', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        },
      },
      onChange: function(selectedDates, dateStr, instance) {
        console.log("se guardo");
        console.log(this);
        console.log(selectedDates+"/"+dateStr)
        console.log("--------------------------------")
        console.log(dateStr)

        $('#fecha_fin').flatpickr({

          minDate: dateStr,

        });

        $('#fecha_fin').val(dateStr);
      },

    })

    // console.log($(".datetimepicker").flatpickr());
  }

  function sumarDias(fecha, dias){
    fecha.setDate(fecha.getDate() + dias);
    return fecha;
  }
    
</script>
@endsection
