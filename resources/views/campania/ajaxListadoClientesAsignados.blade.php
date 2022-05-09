<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Lista de oportunidades</h5>
                <p class="text-sm mb-0">
                    {{-- View all the orders from the previous year. --}}
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-flush" id="tabla-asignaciones">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Vendedor</th>
                            {{-- <th>Apellido Materno</th> --}}
                            <th>Alert</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($clientesAsigandos as $hey => $clieAsig)                        
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <p class="text-xs font-weight-normal ms-2 mb-0" style="padding-top: 10px;">{{ $clieAsig->nombres." ".$clieAsig->apellido_paterno." ".$clieAsig->apellido_materno }}</p>
                                    </div>
                                </td>
                                <td>
                                    <span class="my-2 text-xs">{{ $clieAsig->nombrev." ".$clieAsig->appaternov." ".$clieAsig->apmaternov }}</span>
                                </td>
                                <td>
                                    @php
                                        $configuracion = App\Models\Configuracion::find(1);

                                        $intento = App\Models\Seguimiento::where('asignacion_id', $clieAsig->id_asignacion)
                                                                        ->whereIn('respuesta_seguimiento_id',[2,3])
                                                                        ->count();

                                        if($intento >= $configuracion->valor || ($intento-1) >= $configuracion->valor){

                                            echo "<span class='text-danger'>Peligro</span>";

                                        }else if($intento == 1 || $intento == 2){

                                            echo "<span class='text-success'>Bueno</span>";

                                        }else if($intento < ($configuracion->valor/2) || $intento > ($configuracion->valor / 2)){
                                            echo "<span class='text-warning'>Observacion</span>";
                                        }else if($intento == 0){

                                        }

                                    @endphp
                                </td>
                                <td>
                                    @php

                                        $seguimiento = App\Models\Seguimiento::where('asignacion_id',$clieAsig->id_asignacion)->first();

                                        if($seguimiento){
                                            echo "<span class='badge bg-gradient-".$seguimiento->estado_seguimiento->color." '>".$seguimiento->estado_seguimiento->nombre."</span>";
                                        }else{
                                            echo "<span class='badge bg-gradient-info'>ASIGNADO</span>";
                                        }
                                        
                                    @endphp
                                </td>
                                <td>
                                    <button class="btn btn-dark btn-sm btn-icon" onclick="abreModaltramsferencia({{ $clieAsig->id_asignacion }}, '{{ $clieAsig->nombres." ".$clieAsig->apellido_paterno." ".$clieAsig->apellido_materno }}', '{{ $clieAsig->id_oportunidades }}')"><i class="fa fa-list"></i></button>                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>

<script type="text/javascript">

    var dataTableSearch = new simpleDatatables.DataTable("#tabla-asignaciones", {
        searchable: true,
        fixedHeight: true
    })

</script>