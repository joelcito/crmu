
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
        <tr>
            <td>1</td>
            <td>Campaña de medios tradicionales</td>
            <td>15/04/2022</td>
            <td>20/05/2022</td>
            <td>
                <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 40%"></div>
                </div>
            </td>
            <td>
                <span class="badge bg-danger">55%</span>
            </td>
            <td>
                <span class="badge badge-danger">Baja</span>
            </td>
            <td>
                <button class="btn btn-info btn-icon" title="Formulario" onclick="formulario()"><i class="fa fa-list"></i></button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Campaña de empuje estacional</td>
            <td>15/04/2022</td>
            <td>20/05/2022</td>
            <td>
                <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 90%"></div>
                </div>
            </td>
            <td>
                <span class="badge bg-success">95%</span>
            </td>
            <td>
                <span class="badge badge-success">Alto</span>
            </td>
            <td>
                <button class="btn btn-info btn-icon" title="Formulario" onclick="formulario()"><i class="fa fa-list"></i></button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Campaña de publicidad</td>
            <td>15/04/2022</td>
            <td>20/05/2022</td>
            <td>
                <div class="progress progress-xs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
            </td>
            <td>
                <span class="badge bg-warning">70%</span>
            </td>
            <td>
                <span class="badge badge-warning">Media</span>
            </td>
            <td>
                <button class="btn btn-info btn-icon" title="Formulario" onclick="formulario()"><i class="fa fa-list"></i></button>
            </td>
        </tr>
        {{-- @foreach ($campanias as $ca)
            <tr>
                <td>{{ $ca->id }}</td>
                <td>{{ $ca->nombre }}</td>
                <td>{{ $ca->fecha_inicio }}</td>
                <td>{{ $ca->fecha_fin }}</td>
                <td>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 55%">
                        </div>
                    </div>
                </td>
                <td>
                    <span class="badge bg-warning">70%</span>
                </td>
                <td>
                    <button class="btn btn-info btn-icon" title="Formulario" onclick="formulario()"><i class="fa fa-list"></i></button>
                </td>
            </tr>
        @endforeach --}}
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