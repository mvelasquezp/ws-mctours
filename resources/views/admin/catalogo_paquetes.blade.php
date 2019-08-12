
                    <style>
                        .bg-flag{background-position:4px center;background-repeat:no-repeat;background-size:16px 12px;padding-left:24px !important;}
                    </style>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Paquetes de viaje</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modal-registro"><i class="fas fa-plus fa-sm text-white-50"></i> Crear paquete</a>
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
                                    <h5 class="modal-title text-gray-900">Nuevo paquete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row">
                                        <div class="col">
                                            <!-- -->
                                            <div class="form-group mb-0">
                                                <label class="text-primary mb-0">Descripción del paquete</label>
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
                                                        <label class="text-gray-900" for="rg-nombre-{{ $idioma->alias }}">Nombre del paquete</label>
                                                        <input type="text" class="form-control form-control-sm text-nombre" id="rg-nombre-{{ $idioma->alias }}" placeholder="Ingresa nombre del paquete">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-gray-900" for="rg-descripcion-{{ $idioma->alias }}">Descripción del paquete</label>
                                                        <textarea class="form-control form-control-sm text-descripcion" rows="2" id="rg-descripcion-{{ $idioma->alias }}" placeholder="Ingresa una descripción acerca del paquete" style="resize:none;"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-gray-900" for="rg-incluye-{{ $idioma->alias }}">¿Qué incluye el paquete?</label>
                                                        <textarea class="form-control form-control-sm text-incluye" rows="2" id="rg-incluye-{{ $idioma->alias }}" placeholder="Detalle si el paquete incluye añadidos, como movilidad, hospedaje, comida, etc." style="resize:none;"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-gray-900" for="rg-duracion-{{ $idioma->alias }}">Duración</label>
                                                        <input type="text" class="form-control form-control-sm text-duracion" id="rg-duracion-{{ $idioma->alias }}" placeholder="¿Cuántos días dura el paquete?">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <!-- -->
                                            <div class="form-group">
                                                <label class="text-primary" for="rg-precio">Precio del paquete</label>
                                                <input type="text" class="form-control form-control-sm" id="rg-precio" placeholder="Defina el precio del paquete">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <table class="table table-sm table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-primary" width="30%"">Ciudad</th>
                                                        <th class="text-primary" width="50%"">Lugar</th>
                                                        <th class="text-primary" width="10%"">Precio</th>
                                                        <th class="text-primary" width="10%""></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($lugares as $i => $lugar)
                                                    <tr>
                                                        <td class="text-gray-900">{{ $lugar->ciudad }}</td>
                                                        <td class="text-gray-900">{{ $lugar->nombre }}</td>
                                                        <td class="text-gray-900">{{ $lugar->precio }}</td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="{{ $lugar->lugar }}" data-precio="{{ $lugar->precio }}" id="input-{{ $i }}">
                                                                <label class="form-check-label text-gray-900" for="input-{{ $i }}">Seleccionar</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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