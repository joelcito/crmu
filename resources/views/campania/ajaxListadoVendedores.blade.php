<div class="table-responsive">
    <table class="table table-flush" id="tabla-vendedores">
        <thead class="thead-light">
            <tr>
                <th>Nombres</th>
                <th>Cantidad</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($vendedores as $ven)
            <tr>
                <td>
                    {{ $ven->nombres." ".$ven->apellido_paterno." ".$ven->apellido_materno }}
                </td>
                <td>5</td>
                <td>
                    {{-- {{ $ven->holas }} --}}
                    {{-- <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" onclick="asignacion()"><i class="material-icons text-lg">expand_more</i></button> --}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>