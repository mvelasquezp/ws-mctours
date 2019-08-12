
                    <style>
                        .bg-flag{background-position:4px center;background-repeat:no-repeat;background-size:16px 12px;padding-left:24px !important;}
                    </style>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Destinos</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal-registro"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo destino</a>
                    </div>
                    <!-- grid -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div id="table-container" class="card-body"></div>
                    </div>
                    <!-- modals -->
                    <div id="modal-registro" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-gray-900">Nuevo destino</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="container">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label class="text-primary" for="rg-ciudad">¿Dónde se encuentra el destino?</label>
                                                    <select class="form-control form-control-sm" id="rg-ciudad">
                                                        <option value="0" selected disabled>- Seleccione -</option>
                                                        @foreach($ciudades as $ciudad)
                                                        <option value="{{ $ciudad->value }}">{{ $ciudad->text }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-primary" for="rg-imagenes">Fotos del destino</label>
                                                    <input type="file" class="form-control-file" id="rg-imagenes" accept="image/jpeg" multiple>
                                                    <small id="images-help" class="form-text text-muted">Puede cargar una o varias imágenes al mismo tiempo</small>
                                                </div>
                                                <!-- -->
                                                <div class="form-group mb-0">
                                                    <label class="text-primary mb-0">Descripción del destino</label>
                                                </div>
                                                <ul class="nav nav-tabs" id="tab-idiomas" role="tablist">
                                                    @foreach($idiomas as $idioma)
                                                    <li class="nav-item">
                                                    @if(strcmp($idioma->defecto,"S") == 0)
                                                        <a class="nav-link active" id="{{ $idioma->alias }}-tab" data-toggle="tab" href="#{{ $idioma->alias }}" role="tab" aria-controls="{{ $idioma->alias }}" aria-selected="true" style="background-image:url({{ asset('img/catalogo/lenguajes/' . $idioma->alias . '.png') }});background-position:4px center;background-repeat:no-repeat;background-size:16px 12px;padding-left:24px;">{{ $idioma->idioma }}</a>
                                                    @else
                                                        <a class="nav-link" id="{{ $idioma->alias }}-tab" data-toggle="tab" href="#{{ $idioma->alias }}" role="tab" aria-controls="{{ $idioma->alias }}" aria-selected="true" style="background-image:url({{ asset('img/catalogo/lenguajes/' . $idioma->alias . '.png') }});background-position:4px center;background-repeat:no-repeat;background-size:16px 12px;padding-left:24px;">{{ $idioma->idioma }}</a>
                                                    @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content mb-0" id="myTabContent">
                                                    @foreach($idiomas as $idioma)
                                                    @if(strcmp($idioma->defecto,"S") == 0)
                                                    <div class="tab-pane fade show p-2 active" id="{{ $idioma->alias }}" role="tabpanel" aria-labelledby="{{ $idioma->alias }}-tab" data-idioma="{{ $idioma->id }}">
                                                    @else
                                                    <div class="tab-pane fade show p-2" id="{{ $idioma->alias }}" role="tabpanel" aria-labelledby="{{ $idioma->alias }}-tab" data-idioma="{{ $idioma->id }}">
                                                    @endif
                                                        <div class="form-group">
                                                            <label class="text-gray-900" for="rg-nombre-{{ $idioma->alias }}">Nombre destino</label>
                                                            <input type="text" class="form-control form-control-sm text-contenido" id="rg-nombre-{{ $idioma->alias }}" placeholder="Ingresa nombre del destino">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="text-gray-900" for="rg-descripcion-{{ $idioma->alias }}">Acerca del destino</label>
                                                            <textarea class="form-control form-control-sm text-contenido" rows="5" id="rg-descripcion-{{ $idioma->alias }}" placeholder="Ingresa una descripción acerca del destino" style="resize:none;"></textarea>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-primary" for="rg-precio">Precio</label>
                                                    <input type="text" class="form-control form-control-sm" id="rg-precio" placeholder="Indique el precio del destino">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="alert bg-light p-2 h-100" id="img-lista">
                                                    <p class="text-gray-900">No ha cargado ninguna imagen</p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>