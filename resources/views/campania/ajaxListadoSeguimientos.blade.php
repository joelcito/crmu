<div class="table-responsive">
    <table class="table" id="">
        <thead class="thead-light">
            <tr>
                <th>Vendedor</th>
                <th>Medio de Seguimiento</th>
                <th>Respuesta</th>
                <th>Descripcion</th>
                <th>Fecha</th>
            </tr>
        </thead>

        <tbody> 
            @foreach ($seguimientos as $se)
                @php

                    if($se->respuesta_seguimiento->nombre == "Respondio"){

                        $text = "class='text-success'";

                    }else if($se->respuesta_seguimiento->nombre == "Espera"){

                        $text = "class='text-warning'";

                    }else{

                        $text = "class='text-danger'";

                    }
                @endphp
                <tr>
                    <td>{{ $se->asignacion->vendedor->nombres." ".$se->asignacion->vendedor->apellido_paterno." ".$se->asignacion->vendedor->apellido_materno }}</td>
                    <td>{{ $se->medio_seguimiento->nombre }}</td>
                    <td><span {!! $text !!}>{{ $se->respuesta_seguimiento->nombre }}</span></td>
                    <td>{{ $se->descripcion }}</td>
                    <td>{{ $se->fecha }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>