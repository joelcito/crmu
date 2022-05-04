@extends('layouts.app')

@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="modaNuevoVendedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Formulario vendedor</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="formularioNuevoVendedor">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Apellido Paterno</label>
                            <input type="text" name="ap_paterno" id="ap_paterno" class="form-control" required>
                        </div>                       
                        <small class="text-danger" id="_ap_paterno"></small>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Apellido Materno</label>
                            <input type="text" name="ap_materno" id="ap_materno" class="form-control" required>
                        </div>
                        <small class="text-danger" id="_ap_materno"></small>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="nombres" id="nombres" class="form-control" required>
                        </div>
                        <small class="text-danger" id="_nombres"></small>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>                       
                        <small class="text-danger" id="_email"></small>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Celular</label>
                            <input type="number" name="celular" id="celular" class="form-control" required>
                        </div>
                        <small class="text-danger" id="_celular"></small>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Cedula</label>
                            <input type="number" name="cedula" id="cedula" class="form-control" required>
                        </div>
                        <small class="text-danger" id="_cedula"></small>
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
                        <h5 class="mb-0">Listado de Vendedores</h5>
                        <p class="text-sm mb-0">
                            {{-- A lightweight, extendable, dependency-free javascript HTML table plugin. --}}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success" onclick="abreModalNuevoVendedor()"><i class="fa fa-plus"></i> Nuevo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tabla-vendedores">
                {{-- <div class="table-responsive">
                    <table class="table table-flush" id="datatable-search">
                        <thead class="thead-light">
                            <tr>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombres</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Cedula</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $vendedores as $v)
                                <tr>
                                    <td class="text-sm font-weight-normal">{{ $v->apellido_paterno }}</td>
                                    <td class="text-sm font-weight-normal">{{ $v->apellido_materno }}</td>
                                    <td class="text-sm font-weight-normal">{{ $v->nombre }}</td>
                                    <td class="text-sm font-weight-normal">{{ $v->email }}</td>
                                    <td class="text-sm font-weight-normal">{{ $v->celular }}</td>
                                    <td class="text-sm font-weight-normal">{{ $v->cedula }}</td>
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

    // const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
    //     searchable: true,
    //     fixedHeight: true
    // });

    function abreModalNuevoVendedor(){

        $('#modaNuevoVendedor').modal('show');

    }

    function guarda(){

        if($('#formularioNuevoVendedor')[0].checkValidity()){
            var datos = $('#formularioNuevoVendedor').serialize();
            $.ajax({
                url: "{{ url('Vendedor/guarda') }}",
                data: datos,
                type: 'POST',
                success: function(data) {

                    let vendedor = JSON.parse(data);

                    $('#_ap_paterno, #_ap_materno, #_nombres, #_email, #_celular, #_cedula').text('');
                    
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
                            $('#modaNuevoVendedor').modal('hide');
                        }, 3000);
                        
                        ajaxListado();
                    }
                },
                error: function(error){
                }
            });
        }else{
            $('#formularioNuevoVendedor')[0].reportValidity()
        }

    }

    function ajaxListado(){
        $.ajax({
            url: "{{ url('Vendedor/ajaxListado') }}",
            // data: datos,
            type: 'POST',
            success: function(data) {

                $('#tabla-vendedores').html(data);

            },
            error: function(error){

            }
        });
    }
    
</script>   

@endsection