var ListaImagenes, ListaDestinos;

async function fileListToBase64(fileList) {
    function getBase64(file) {
        const reader = new FileReader()
        return new Promise(resolve => {
            reader.onload = ev => {
                resolve(ev.target.result)
            }
            reader.readAsDataURL(file)
        })
    }
    const promises = []
    for (let i = 0; i < fileList.length; i++) {
        promises.push(getBase64(fileList[i]))
    }
    return await Promise.all(promises)
}

async function RegistraLugar(event) {
    event.preventDefault();
    if (ListaImagenes.length == 0) {
        alert('No ha registrado imágenes para el destino. Debe agregar por lo menos una imagen.');
    }
    else {
        let CiudadDestino = document.getElementById('rg-ciudad').value;
        let PrecioDestino = document.getElementById('rg-precio').value;
        if(CiudadDestino != 0) {
            if (PrecioDestino != '' && !isNaN(PrecioDestino)) {
                let TabsIdiomas = $('.tab-pane');
                let ContenidosTexto = [];
                let ready = true;
                $.each(TabsIdiomas, function () {
                    let tab = $(this);
                    let tabId = tab.attr('id');
                    ContenidosTexto.push({
                        idioma: tab.data('idioma'),
                        nombre: $('#' + tabId + ' input').val(),
                        descripcion: $('#' + tabId + ' textarea').val()
                    });
                    ready == ready && (ContenidosTexto.nombre != '') && (ContenidosTexto.descripcion != '');
                });
                if (!ready) {
                    alert('No ha completado los textos para todos los idiomas. Recuerde completarlos más adelante.');
                }
                //formatea las imagenes
                let ArrayImg = [];
                for (imagen of ListaImagenes) {
                    ArrayImg.push(imagen.substring(23));
                }
                let result;
                try {
                    result = await $.ajax({
                        url: 'ajax/guardar-destino',
                        method: 'post',
                        data: {
                            ciudad: CiudadDestino,
                            imagenes: ArrayImg,
                            contenidos: ContenidosTexto,
                            precio: PrecioDestino
                        },
                        dataType: 'json'
                    });
                    if (result.error) {
                        alert(result.error);
                        return;
                    }
                    $('#modal-registro').modal('hide');
                    alert('Destino registrado con éxito');
                    $('#table-container').empty();
                    CargarListaDestinos();
                }
                catch (err) {
                    console.error(err);
                    return;
                }
            }
            else {
                alert('Ingrese un precio válido.');
            }
        }
        else {
            alert('Debes seleccionar la ciudad del destino.');
        }
    }
}

async function ActivarEdicionDestino(event) {
    event.preventDefault();
}

ResetearModalRegistro = (event) => {
    document.getElementById('rg-imagenes').value = '';
    $('#img-lista').empty().append(
        $('<p>').html('No ha cargado ninguna imagen').addClass('text-gray-900')
    );
    $('#rg-ciudad option[value=0]').prop('selected', true);
    $('#modal-registro input[type=text]').val('');
    $('#modal-registro textarea').val('');
}

EscribirListaDestinos = () => {
    let tbody = $('<tbody>');
    for(destino of ListaDestinos) {
        let TdNombre = $('<td>');
        let TdDescripcion = $('<td>');
        for(TxIdioma of destino.textos) {
            TdNombre.append(
                $('<hr>').addClass('m-1')
            ).append(
                $('<p>').append(
                    $('<span>').html(TxIdioma.nombre).addClass('text-gray-800')
                ).append(
                    $('<input>').hide()
                ).addClass('w-100 bg-flag m-0').css('background-image', 'url(' + TxIdioma.icono + ')')
            );
            TdDescripcion.append(
                $('<hr>').addClass('m-1')
            ).append(
                $('<p>').append(
                    $('<span>').html(TxIdioma.descripcion).addClass('text-gray-800')
                ).append(
                    $('<input>').hide()
                ).addClass('w-100 bg-flag m-0').css('background-image', 'url(' + TxIdioma.icono + ')')
            );
        }
        TdNombre.children().eq(0).remove();
        TdDescripcion.children().eq(0).remove();
        tbody.append(
            $('<tr>').append(
                $('<td>').append(
                    $('<img>').attr('src', destino.imagenes[0]).addClass('w-100')
                ).append(
                    $('<p>').html(destino.imagenes.length + ' imágenes').addClass('m-0 text-gray-800').css('font-size','12px')
                ).addClass('p-2')
            ).append(TdNombre).append(
                $('<td>').html(destino.ciudad).addClass('text-gray-800')
            ).append(TdDescripcion).append(
                $('<td>').html('S/ ' + destino.precio).addClass('text-gray-800')
            ).append(
                $('<td>').append(
                    $('<a>').append(
                        $('<i>').addClass('fas fa-edit')
                    ).attr({
                        'href': '#',
                        'data-codigo': destino.id
                    }).addClass('btn btn-xs btn-primary').on('click', ActivarEdicionDestino)
                )
            )
        );
    }
    let table = $('<table>').append(
        $('<thead>').append(
            $('<tr>').append(
                $('<th>').html('').addClass('text-gray-900').attr('width', '10%')
            ).append(
                $('<th>').html('Destino').addClass('text-gray-900').attr('width','15%')
            ).append(
                $('<th>').html('Ciudad').addClass('text-gray-900').attr('width', '10%')
            ).append(
                $('<th>').html('Descripción').addClass('text-gray-900')
            ).append(
                $('<th>').html('Precio').addClass('text-gray-900').attr('width', '5%')
            ).append(
                $('<th>').html('').addClass('text-gray-900').attr('width', '5%')
            )
        )
    ).append(tbody).addClass('table table-sm table-striped table-hover');
    $('#table-container').append(table);
}

CargarListaDestinos = async () => {
    let ContainerDestinos = $('#table-container');
    let result;
    try {
        result = await $.ajax({
            url: 'ajax/lista-destinos',
            method: 'get',
            dataType: 'json'
        });
        if(result.error) {
            alert(result.error);
            return;
        }
        ListaDestinos = result.data.destinos;
        if (ListaDestinos.length > 0) {
            EscribirListaDestinos();
        }
        else {
            ContainerDestinos.append(
                $('<p>').html('No hay destinos registrados').addClass('h5 mb-0 text-gray-900')
            );
        }
    }
    catch(err) {
        console.error(err);
    }
}

RecibirImagenes = async () => {
    let input = document.getElementById('rg-imagenes');
    const ImagesContainer = $('#img-lista');
    ImagesContainer.empty();
    ListaImagenes = await fileListToBase64(input.files);
    for(image of ListaImagenes) {
        ImagesContainer.append(
            $('<img>').addClass('m-2 w-100').attr('src',image)
        );
    }
}

IniciarComponentes = () => {
    $('#rg-imagenes').on('change', RecibirImagenes);
    $('#modal-registro').on('show.bs.modal', ResetearModalRegistro);
    $('#modal-registro .btn-primary').on('click', RegistraLugar);
    CargarListaDestinos();
}