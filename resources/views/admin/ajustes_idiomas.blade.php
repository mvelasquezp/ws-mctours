
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Idiomas</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal-registro"><i class="fas fa-plus fa-sm text-white-50"></i> Añadir</a>
                    </div>
                    <!-- grid -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div id="table-container" class="card-body"></div>
                    </div>
                    <!-- modals -->
                    <div id="modal-registro" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-gray-900">Registrar idioma</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label class="text-gray-800" for="rg-nombre">Nombre</label>
                                            <input type="text" class="form-control" id="rg-nombre" placeholder="Ingrese nombre del idioma">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-gray-800" for="rg-abreviatura">Abreviatura</label>
                                            <input type="text" class="form-control" id="rg-abreviatura" placeholder="Abreviatura del idioma">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-gray-900" for="rg-imagen">Ícono (Formato PNG, de 32x24px)</label>
                                            <input type="file" class="form-control-file" id="rg-imagen" accept="image/png">
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="rg-defecto">
                                            <label class="text-gray-800 form-check-label" for="rg-defecto">Idioma por defecto</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>