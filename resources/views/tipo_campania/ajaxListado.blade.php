<div class="table-responsive">
    <table class="table table-flush" id="datatable-searcha">
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
</div>

<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
    var dataTableSearch = new simpleDatatables.DataTable("#datatable-searcha", {
        searchable: true,
        fixedHeight: true
    });
</script>