
<table id="datatable-search" class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Progreso</th>
            <th>Porcentaje</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($campanias as $ca)
            <tr>
                <td>{{ $ca->id }}</td>
                <td>{{ $ca->nombre }}</td>
                <td>{{ $ca->fecha_inicio }}</td>
                <td>{{ $ca->fecha_fin }}</td>
                <td>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: {{ rand(0, 100) }}%">
                        </div>
                    </div>
                </td>
                <td>
                    <span class="badge bg-warning">{{ rand(0, 100) }}%</span>
                </td>
                <td>
                    <button class="btn btn-info btn-icon" title="Formulario" onclick="formulario('{{ $ca->id }}')"><i class="fa fa-list"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Progreso</th>
            <th>Porcentaje</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </tfoot>
</table>

<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>

<script type="text/javascript">

    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: false,
    });
</script>