@extends('layouts.app')

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Listado de Clientes</h5>
                <p class="text-sm mb-0">
                    {{-- A lightweight, extendable, dependency-free javascript HTML table plugin. --}}
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-flush" id="datatable-search">
                    <thead class="thead-light">
                        <tr>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Nombres</th>
                            <th>Email</th>
                            <th>Celular</th>
                            <th>Cedula</th>
                            <th>Campaña</th>
                            <th>Formulario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $clientes as $c)
                            <tr>
                                <td class="text-sm font-weight-normal">{{ $c->persona->apellido_paterno }}</td>
                                <td class="text-sm font-weight-normal">{{ $c->persona->apellido_materno }}</td>
                                <td class="text-sm font-weight-normal">{{ $c->persona->nombres }}</td>
                                <td class="text-sm font-weight-normal">{{ $c->persona->email }}</td>
                                <td class="text-sm font-weight-normal">{{ $c->persona->celular }}</td>
                                <td class="text-sm font-weight-normal">{{ $c->persona->cedula }}</td>
                                <td class="text-sm font-weight-normal">{{ $c->campania->nombre }}</td>
                                <td class="text-sm font-weight-normal">{{ $c->formulario->nombre }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
    <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
    <script type="text/javascript">

        const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
            searchable: true,
            fixedHeight: true
        });
        
    </script>

@endsection