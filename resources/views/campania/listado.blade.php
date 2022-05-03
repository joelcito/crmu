@extends('layouts.app')

@section('metadatos')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('css')

    {{-- <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}

@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Lista de Campañas</h5>
                <p class="text-sm mb-0">
                    Listado de todas las campañas recgistrados
                </p>
            </div>
            <div class="table-responsive">
                <div id="tabla-campania">

                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
{{-- <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script> --}}

<script type="text/javascript">

    $( document ).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        ajaxListado();

    });

    function ajaxListado(){
        
        $.ajax({
            url: "{{ url('Campania/ajaxListado') }}",
            // data: datos,
            type: 'POST',
            success: function(data) {

                $('#tabla-campania').html(data);

            },
            error: function(error){

            }
        });

    }

    function formulario(){
        // window.location.href = "{{ url('Campania/formulario') }}";
        window.location.href = "{{ url('Campania/home') }}";
    }

    // document.querySelectorAll(".export").forEach(function(el) {
    //   el.addEventListener("click", function(e) {
    //     var type = el.dataset.type;

    //     var data = {
    //       type: type,
    //       filename: "material-" + type,
    //     };

    //     if (type === "csv") {
    //       data.columnDelimiter = "|";
    //     }

    //     dataTableSearch.export(data);
    //   });
    // });

</script>

@endsection