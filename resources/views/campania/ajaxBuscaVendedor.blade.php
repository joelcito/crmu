<div class="table-responsive">
    <table class="table table-flush" id="table-busca-campanias">
        <thead class="thead-light">
            <tr>
                <th>Listado de vendedores</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $vendedores as $ven)
                <tr>
                    <td class="text-sm font-weight-normal">
                        {{ $ven->nombres." ".$ven->apellido_paterno." ".$ven->apellido_materno }}
                    </td>
                    <td>
                        <button class="btn btn-success btn-icon" onclick="guardaVendedor('{{ $ven->id }}', '{{ $ven->nombres.' '.$ven->apellido_paterno.' '.$ven->apellido_materno }}')"><i class="fas fa-arrow-up"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>