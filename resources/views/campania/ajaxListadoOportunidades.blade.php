<div class="table-responsive">
    <table class="table table-flush" id="tabla-oportunidades">
        <thead class="thead-light">
            <tr>
                <th>Nombres</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($oportunidades as $opor)
            <tr>
            <td>
                {{ $opor->nombres }}
            </td>
            <td>
                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center" onclick="asignacion('{{ $opor->id }}')"><i class="material-icons text-lg">expand_more</i></button>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>