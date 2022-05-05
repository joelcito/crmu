<div class="table-responsive">
    <table class="table table-flush" id="datatable-searcha">
        <thead class="thead-light">
            <tr>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Nombres</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Progreso</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $vendedores as $v)
                <tr>
                    <td class="text-sm font-weight-normal">{{ $v->apellido_paterno }}</td>
                    <td class="text-sm font-weight-normal">{{ $v->apellido_materno }}</td>
                    <td class="text-sm font-weight-normal">{{ $v->nombres }}</td>
                    <td class="text-sm font-weight-normal">{{ $v->email }}</td>
                    <td class="text-sm font-weight-normal">{{ $v->celular }}</td>
                    <td class="text-sm font-weight-normal">
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-warning" style="width: {{ rand(0, 100) }}%">
                            </div>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-info" onclick="asignarCampania('{{ $v->id }}', '{{ $v->nombres.' '.$v->apellido_paterno.' '.$v->apellido_materno }}')"><i class="fa fa-plus"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
    var dataTableSearch = new simpleDatatables.DataTable("#datatable-searcha", {
        searchable: true,
        fixedHeight: true
    });
</script>