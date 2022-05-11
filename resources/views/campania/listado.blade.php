@extends('layouts.app')

@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('css')


@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="modaNuevoCampania" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Formulario de campaña</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="formularioNuevoCampania">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nombre de la campaña</label>
                            <input type="text" name="nombre_campania" id="nombre_campania" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group input-group-static my-3">
                            <label>Fecha inicio</label>
                            <input type="date" min="{{ date('Y-m-d') }}" onchange="validafechaini()" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static my-3">
                            <label>Fecha fin</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static my-3">
                            <label>Presupuesto</label>
                            <input type="number" name="presupuesto" id="presupuesto" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group input-group-outline my-3">
                            <textarea name="descripcion_campania" id="descripcion_campania" cols="5" rows="5" class="form-control" placeholder="Descripcion de la Campaña" required></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn bg-gradient-success" onclick="guarda()">Guardar</button>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-0">Lista de Campañas</h5>
                        <p class="text-sm mb-0">
                            Listado de todas las campañas recgistrados
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <button class="btn btn-success btn-block" onclick="abreModal()"><i class="fa fa-plus"></i> Nueva Campaña</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <div id="tabla-campania">

                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
{{-- <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script> --}}

<script type="text/javascript">

    $( document ).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        ajaxListado();

    });

    function ajaxListado(){
        
        $.ajax({
            url: "{{ url('Campania/ajaxListado') }}",
            // data: datos,
            type: 'POST',
            success: function(data) {

                $('#tabla-campania').html(data);

            },
            error: function(error){

            }
        });

    }

    function formulario(campania){
        
        window.location.href = "{{ url('Campania/home') }}/"+campania;
    }

    function abreModal(){
        
        $('#formularioNuevoCampania')[0].reset()

        $('#modaNuevoCampania').modal('show');

    }

    function guarda(){

        if($('#formularioNuevoCampania')[0].checkValidity()){
            var datos = $('#formularioNuevoCampania').serialize();
            $.ajax({
                url: "{{ url('Campania/guarda') }}",
                data: datos,
                type: 'POST',
                success: function(data) {
                    let campania = JSON.parse(data);
                    $('#_fecha_inicio, #_nombre_campania, #_fecha_fin, #_descripcion_campania').text('');
                    if(campania.success === false){
                        $.each(campania.errors, function(index, value){
                            $('#_'+index).text(value);
                        });    
                    }else{
                        Swal.fire({
                            title: 'Exito!',
                            text: 'Se guardo los datos con exito',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                        setTimeout(function(){
                            $('#modal-nuevo').modal('hide');
                        }, 3000);
                        
                        window.location.href = "{{ url('Campania/home')}}/"+campania.id;
                        ajaxListado();
                    }
                },
                error: function(error){
                }
            });
        }else{
            $('#formularioNuevoCampania')[0].reportValidity()
        }

    }

    function validafechaini(){

        $("#fecha_fin").attr("min",$('#fecha_inicio').val());
    }

    // document.querySelectorAll(".export").forEach(function(el) {
    //   el.addEventListener("click", function(e) {
    //     var type = el.dataset.type;

    //     var data = {
    //       type: type,
    //       filename: "material-" + type,
    //     };

    //     if (type === "csv") {
    //       data.columnDelimiter = "|";
    //     }

    //     dataTableSearch.export(data);
    //   });
    // });

</script>

@endsection