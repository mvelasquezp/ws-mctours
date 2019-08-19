
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Próximas salidas</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal-registro"><i class="fas fa-plus fa-sm text-white-50"></i> Programar salida</a>
                    </div>
                    <!-- grid -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div id="table-container" class="card-body"></div>
                    </div>
                    <!-- modals -->
                    <div id="modal-registro" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-gray-900">Nueva salida</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <form>
                                                <div class="form-group">
                                                    <label for="rg-fecha" class="text-gray-900">Fecha de la salida</label>
                                                    <input id="rg-fecha" type="text" class="form-control form-control-sm datepicker" placeholder="Ingrese fecha">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rg-hora" class="text-gray-900">Hora de la salida</label>
                                                    <input id="rg-hora" type="text" class="form-control form-control-sm timepicker" placeholder="Ingrese hora">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rg-ciudad" class="text-gray-900">Seleccione la ciudad</label>
                                                    <select id="rg-ciudad" class="form-control form-control-sm">
                                                        <option value="0" selected>- Seleccione -</option>
                                                        @foreach($ciudades as $ciudad)
                                                        <option value="{{ $ciudad->value }}">{{ $ciudad->text }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                                                </div>
                                                <div class="form-group">
                                                    <label for="rg-destino" class="text-gray-900">Seleccione el destino</label>
                                                    <select id="rg-destino" class="form-control form-control-sm">
                                                        <option value="0" selected>- Primero seleccione ciudad -</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rg-cupos" class="text-gray-900">Cantidad de cupos</label>
                                                    <input id="rg-cupos" type="text" class="form-control form-control-sm" placeholder="¿Cuántos cupos se venderán?">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-7" id="dv-salidas"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        const IdUsuario = {{ $usuario }};
                    </script>