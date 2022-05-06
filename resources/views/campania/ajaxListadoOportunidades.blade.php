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
                <table class="table table-flush" id="datatable-search">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            {{-- <th>Apellido Paterno</th> --}}
                            {{-- <th>Apellido Materno</th> --}}
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($oportunidades as $hey => $opor)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="oportunidades[{{ $opor->opo }}]" id="customCheck{{ $hey }}">
                                        </div>
                                        <label for="customCheck{{ $hey }}">
                                            <p class="text-xs font-weight-normal ms-2 mb-0" style="padding-top: 10px;">{{ $opor->nombres." ".$opor->apellido_paterno." ".$opor->apellido_materno }}</p>
                                        </label>
                                    </div>
                                </td>
                                {{-- <td>
                                    <label for="customCheck{{ $hey }}">
                                        <span class="my-2 text-xs">{{ $opor->apellido_paterno }}</span>
                                    </label>
                                </td> --}}
                                {{-- <td>
                                    <label for="customCheck{{ $hey }}">
                                        <span class="my-2 text-xs">{{ $opor->apellido_materno }}</span>
                                    </label>
                                </td> --}}
                                <td>
                                    <label for="customCheck{{ $hey }}">
                                        <span class="my-2 text-xs">{{ $opor->email }}</span>
                                    </label>
                                </td>
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
    var dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true
    })
</script>

{{-- <div class="table-responsive">
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
</div> --}}