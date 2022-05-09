<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-flush" id="tabla-vendedores">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Oportunidades</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendedores as $hey => $ven)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input"{{ ($hey == 0)? 'checked' : ''}} type="radio" name="listaVendedorReasignacion" id="listaVendedorReasignacion{{ $hey }}" value="{{ $ven->id }}">
                                            <label class="custom-control-label" for="listaVendedorReasignacion{{ $hey }}">{{ $ven->nombres." ".$ven->apellido_paterno." ".$ven->apellido_materno }}</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $cant = App\Models\Asignacion::where('vendedor_id', $ven->id)->count();

                                        echo $cant;
                                    @endphp
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-sm" aria-hidden="true">done</i></button>
                                        <span>Disponible</span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-info btn-lg w-100" onclick="reasignarVendedor()">REASIGNAR</button>
    </div>
</div>