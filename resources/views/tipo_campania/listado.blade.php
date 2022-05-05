@extends('layouts.app')

@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="modaNuevoTipoCampania" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Formulario tipo campania</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="formularioNuevoTipoCampania">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>                       
                        <small class="text-danger" id="_nombre"></small>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                        </div>
                        <small class="text-danger" id="_descripcion"></small>
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

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-0">Tipo de Campañas</h5>
                        <p class="text-sm mb-0">
                            {{-- A lightweight, extendable, dependency-free javascript HTML table plugin. --}}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button class="btn btn-success" onclick="abreModal()"> <i class="fa fa-plus"></i> Nuevo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabla-tipo">
                {{-- <div class="table-responsive">
                    <table class="table table-flush" id="datatable-search">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $tiposCampanias as $tc)
                                <tr>
                                    <td class="text-sm font-weight-normal">{{ $tc->nombre}}</td>
                                    <td class="text-sm font-weight-normal">{{ $tc->descripcion }}</td>
                                    <td class="text-sm font-weight-normal"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
    <script type="text/javascript">

        $( document ).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            ajaxListado();

        });

        function abreModal(){

            $('#modaNuevoTipoCampania').modal('show');

        }

        function guarda(){

            if($('#formularioNuevoTipoCampania')[0].checkValidity()){
                var datos = $('#formularioNuevoTipoCampania').serialize();
                $.ajax({
                    url: "{{ url('TipoCampania/guarda') }}",
                    data: datos,
                    type: 'POST',
                    success: function(data) {

                        let vendedor = JSON.parse(data);

                        $('#_nombre, #_descripcion').text('');
                        
                        if(vendedor.success === false){
                            $.each(vendedor.errors, function(index, value){
                                $('#_'+index).text(value);
                            });    
                        }else{

                            Swal.fire({
                                title: 'Exito!',
                                text: 'Se guardo los datos con exito',
                                icon: 'success',
                                timer: 2000,
                                confirmButtonText: 'Ok'
                            });

                            setTimeout(function(){
                                $('#modaNuevoTipoCampania').modal('hide');
                            }, 3000);
                            
                            ajaxListado();
                        }
                    },
                    error: function(error){
                    }
                });
            }else{
                $('#formularioNuevoTipoCampania')[0].reportValidity()
            }

        }

        function ajaxListado(){

            $.ajax({
                url: "{{ url('TipoCampania/ajaxListado') }}",
                // data: datos,
                type: 'POST',
                success: function(data) {

                    $('#tabla-tipo').html(data);

                },
                error: function(error){

                }
            });

        }
    
    </script>

@endsection