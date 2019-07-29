var ListaPaquetes;

async function RegistraPaquete(event) {
    event.preventDefault();
    let PrecioPaquete = document.getElementById('rg-precio').value;
    if (!isNaN(PrecioPaquete)) {
        let TabsIdiomas = $('.tab-pane');
        let ContenidosTexto = [];
        let ready = true;
        $.each(TabsIdiomas, function () {
            let tab = $(this);
            let tabId = tab.attr('id');
            ContenidosTexto.push({
                idioma: tab.data('idioma'),
                nombre: $('#' + tabId + ' .text-nombre').val(),
                descripcion: $('#' + tabId + ' .text-descripcion').val(),
                incluye: $('#' + tabId + ' .text-incluye').val(),
                duracion: $('#' + tabId + ' .text-duracion').val()
            });
            ready == ready && (ContenidosTexto.nombre != '') && (ContenidosTexto.descripcion != '');
        });
        if (!ready) {
            alert('No ha completado los textos para todos los idiomas. Recuerde completarlos más adelante.');
        }
        let ListaPaquetes = [];
        let inputs = $('.form-check-input:checked');
        $.each(inputs, function() {
            let input = $(this);
            ListaPaquetes.push(input.val());
        });
        if(ListaPaquetes.length > 0) {
            let result;
            try {
                result = await $.ajax({
                    url: 'ajax/guardar-paquete',
                    method: 'post',
                    data: {
                        precio: PrecioPaquete,
                        contenidos: ContenidosTexto,
                        destinos: ListaPaquetes
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
                CargarListaPaquetes();
            }
            catch (err) {
                console.error(err);
                return;
            }
        }
        else {
            alert('Debe seleccionar al menos un destino para que forme parte del paquete');
        }
    }
    else {
        alert('Ingrese un precio válido');
    }
}

async function ActivarEdicionPaquete(event) {
    event.preventDefault();
    alert('Editar!');
}

EscribirListaPaquetes = () => {
    let tbody = $('<tbody>');
    for (paquete of ListaPaquetes) {
        let TdNombre = $('<td>');
        let TdDestinos = $('<td>');
        let TdDuración = $('<td>');
        for (TxIdioma of paquete.textos) {
            TdNombre.append(
                $('<hr>').addClass('m-1')
            ).append(
                $('<p>').append(
                    $('<span>').html(TxIdioma.nombre).addClass('text-gray-800')
                ).append(
                    $('<input>').hide()
                ).addClass('w-100 bg-flag m-0').css('background-image', 'url(' + TxIdioma.icono + ')')
            );
            TdDestinos.append(
                $('<hr>').addClass('m-1')
            ).append(
                $('<p>').append(
                    $('<span>').html(TxIdioma.destinos).addClass('text-gray-800')
                ).append(
                    $('<input>').hide()
                ).addClass('w-100 bg-flag m-0').css('background-image', 'url(' + TxIdioma.icono + ')')
            );
            TdDuración.append(
                $('<hr>').addClass('m-1')
            ).append(
                $('<p>').append(
                    $('<span>').html(TxIdioma.duracion).addClass('text-gray-800')
                ).append(
                    $('<input>').hide()
                ).addClass('w-100 bg-flag m-0').css('background-image', 'url(' + TxIdioma.icono + ')')
            );
        }
        TdNombre.children().eq(0).remove();
        TdDestinos.children().eq(0).remove();
        TdDuración.children().eq(0).remove();
        tbody.append(
            $('<tr>').append(TdNombre).append(TdDestinos).append(
                $('<td>').html(paquete.precio).addClass('text-gray-800')
            ).append(TdDuración).append(
                $('<td>').append(
                    $('<a>').append(
                        $('<i>').addClass('fas fa-edit')
                    ).attr({
                        'href': '#',
                        'data-codigo': paquete.id
                    }).addClass('btn btn-xs btn-primary').on('click', ActivarEdicionPaquete)
                )
            )
        );
    }
    let table = $('<table>').append(
        $('<thead>').append(
            $('<tr>').append(
                $('<th>').html('Paquete').addClass('text-gray-900').attr('width', '25%')
            ).append(
                $('<th>').html('Destinos').addClass('text-gray-900').attr('width', '35%')
            ).append(
                $('<th>').html('Precio').addClass('text-gray-900').attr('width', '15%')
            ).append(
                $('<th>').html('Duración').addClass('text-gray-900').attr('width', '20%')
            ).append(
                $('<th>').html('').addClass('text-gray-900').attr('width', '5%')
            )
        )
    ).append(tbody).addClass('table table-sm table-striped table-hover');
    $('#table-container').append(table);
}

CargarListaPaquetes = async () => {
    let ContainerDestinos = $('#table-container');
    let result;
    try {
        result = await $.ajax({
            url: 'ajax/lista-paquetes',
            method: 'get',
            dataType: 'json'
        });
        if (result.error) {
            alert(result.error);
            return;
        }
        ListaPaquetes = result.data.paquetes;
        if (ListaPaquetes.length > 0) {
            EscribirListaPaquetes();
        }
        else {
            ContainerDestinos.append(
                $('<p>').html('No hay paquetes registrados').addClass('h5 mb-0 text-gray-900')
            );
        }
    }
    catch (err) {
        console.error(err);
    }
}

ModalRegistroOnShow = (event) => {
    $('.form-check-input').prop('checked', false);
    $('#rg-precio').val(''),
    $('#modal-registro .text-nombre').val(''),
    $('#modal-registro .text-descripcion').val(''),
    $('#modal-registro .text-incluye').val(''),
    $('#modal-registro .text-duracion').val('')
}

IniciarComponentes = () => {
    $('#modal-registro').on('show.bs.modal', ModalRegistroOnShow);
    $('#modal-registro .btn-primary').on('click', RegistraPaquete);
    CargarListaPaquetes();
}