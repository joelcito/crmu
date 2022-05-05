<div class="table-responsive">
    <table class="table table-flush" id="table-busca-campanias">
        <thead class="thead-light">
            <tr>
                <th>Nombre Campaña</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $campanias as $c)
                <tr>
                    <td class="text-sm font-weight-normal">{{ $c->nombre }}</td>
                    </td>
                    <td>
                        <button class="btn btn-success btn-icon btn-sm" onclick="muestraFormularios('{{ $c->id }}')"><i class="fas fa-arrow-right"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script> --}}
<script>
    // var dataTableSearch = new simpleDatatables.DataTable("#datatable-searcha", {
    //     searchable: true,
    //     fixedHeight: true
    // });
    
</script>