
<table id="datatable-search" class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Progreso</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($campanias as $ca)
            <tr>
                <td>{{ $ca->id }}</td>
                <td>{{ $ca->nombre }}</td>
                <td>{{ date('d/m/Y', strtotime($ca->fecha_inicio)) }}</td>
                <td>{{ date('d/m/Y', strtotime($ca->fecha_fin))  }}</td>
                <td>

                    @php
                        $fecha1 = new DateTime($ca->fecha_inicio);
                        $fecha2= new DateTime($ca->fecha_fin);

                        $diff = $fecha1->diff($fecha2);

                        $diasTotales = $diff->days;


                        // ahora sacamos los dias que pasaron
                        $fecha1 = new DateTime($ca->fecha_inicio);
                        $fechaHoy = date('d-m-Y');
                        $fecha2= new DateTime($fechaHoy);

                        $diff = $fecha1->diff($fecha2);

                        // El resultados son los dias que pasaron
                        $diasPasaron = $diff->days;

                        if( $fecha1 < $fecha2 || $diasPasaron == 0 ){

                            echo $diff->days . ' dias';

                            if($diasTotales != 0){

                                $porcentaje = ($diasPasaron/$diasTotales) * 100;

                            }else{

                                $porcentaje = 0;

                            }
                        }else{

                            echo "Aun no Inicia la Capaña";
                            $porcentaje = 0;

                        }

                    @endphp

                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: {{ intval($porcentaje) }}%">
                        </div>
                    </div>
                </td>
                <td>
                    @php

                        if( ($fecha1 < $fecha2 || $diasPasaron == 0) && $diasPasaron < $diasTotales){

                            echo '<span class="badge bg-success">Iniciado</span>';

                        }else if($diasPasaron > $diasTotales){

                            echo '<span class="badge bg-danger">Finalizado</span>';

                        }else{

                            echo '<span class="badge bg-info">No Iniciado</span>';

                        }

                    @endphp
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