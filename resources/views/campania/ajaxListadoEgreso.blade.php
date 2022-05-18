@php
    // $utilidades = new Utilidades();
    $utilidades = new App\librerias\Utilidades();

@endphp

<table width="100%" id="table-egresos">

    @foreach ( $egresos as $egre )
        @php
            $comprobante = App\Models\Comprobante::where('presupuesto_id',$egre->id)->first();
        @endphp
        <tr>
        <td>

            <div id="listadoEgreso">

            <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                <div class="d-flex">
                <div class="d-flex align-items-center">
                    <button onclick="editEgreso('{{ $egre->id }}', '{{ $egre->gasto_id }}', '{{ $egre->egreso }}', '{{ $egre->descripcion }}', '{{ ($comprobante)? $comprobante->nro_comprobante: '' }}', '{{ ($comprobante)? $comprobante->id : '0' }}')" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">edit</i></button>
                    <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">{{ $egre->gasto->nombre }}</h6>
                    <span class="text-xs">
                        @php
                        $fechaHoraEs = $utilidades->fechaHoraCastellano($egre->fecha);

                        echo $fechaHoraEs;
                        @endphp
                    </span>
                    </div>
                </div>
                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold ms-auto">
                    {{$egre->egreso}} Bs.
                </div>
                </div>
                <hr class="horizontal dark mt-3 mb-2" />
            </li>

            </div>
            
        </td>
        </tr>  
    @endforeach
</table>

<script>

    var dataTableSearch = new simpleDatatables.DataTable("#table-egresos", {

        searchable: false,
        fixedHeight: false,
        perPage: 5,

    });

</script>