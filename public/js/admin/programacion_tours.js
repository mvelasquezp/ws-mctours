var ProgramacionTours;

CargarProgramacionTours = async () => {
    let TableContainer = $('#table-container');
    TableContainer.empty();
    let result;
    try {
        result = await $.ajax({
            url: 'ajax/lista-proximas-salidas',
            method: 'get',
            dataType: 'json'
        });
        if (result.error) {
            console.err(error);
            return;
        }
        ProgramacionTours = result.data.salidas;
        let tbody = $('<tbody>');
        for (programacion of ProgramacionTours) {
            tbody.append(
                $('<tr>').attr('data-id',programacion.id).append(
                    $('<td>').addClass('text-gray-900').html(programacion.fecha)
                ).append(
                    $('<td>').addClass('text-gray-900').html(programacion.ciudad)
                ).append(
                    $('<td>').addClass('text-gray-900').html(programacion.lugar)
                ).append(
                    $('<td>').addClass('text-gray-900 text-right').html(programacion.comprados + ' de ' + programacion.capacidad)
                ).append(
                    $('<td>').addClass('text-gray-900 text-right').html(programacion.limite - programacion.paquetes)
                ).append(
                    $('<td>').addClass('text-gray-900').html('')
                )
            );
        }
        let table = $('<table>').append(
            $('<thead>').append(
                $('<tr>').append(
                    $('<th>').attr('width', '15%').html('Fecha')
                ).append(
                    $('<th>').attr('width', '15%').html('Ciudad')
                ).append(
                    $('<th>').attr('width', '45%').html('Destino')
                ).append(
                    $('<th>').attr('width', '10%').html('Disponibles')
                ).append(
                    $('<th>').attr('width', '10%').html('Disp. paquetes')
                ).append(
                    $('<th>').attr('width', '5%').html('')
                )
            )
        ).append(tbody).addClass('table table-sm table-striped table-hover');
        TableContainer.append(table);
    }
    catch(err) {
        console.err(err);
    }
}

CargarListaLugares = async (event) => {
    event.preventDefault();
    let result;
    let SelectLugares = $('#rg-destino');
    try {
        let iCiudad = document.getElementById('rg-ciudad').value;
        SelectLugares.empty().append(
            $('<option>').prop('selected',true).val(0).html('- Seleccione -')
        );
        result = await $.ajax({
            url: 'ajax/lista-lugares-ciudad',
            method: 'post',
            data: { ciudad: iCiudad },
            type: 'json'
        });
        if(result.error) {
            alert(result.error);
            return;
        }
        let lugares = result.data.lugares;
        for(lugar of lugares) {
            SelectLugares.append(
                $('<option>').val(lugar.value).html(lugar.text)
            );
        }
    }
    catch(err) {
        console.error(err);
    }
}

ProgramarSalida = async (event) => {
    event.preventDefault();
    let params = {
        fecha: document.getElementById('rg-fecha').value,
        hora: document.getElementById('rg-hora').value,
        destino: document.getElementById('rg-destino').value,
        cupos: document.getElementById('rg-cupos').value,
        uregistra: IdUsuario
    };
    if (params.fecha == '') {
        alert('Debe seleccionar la fecha de la salida');
        return;
    }
    if (params.hora == '') {
        alert('Debe seleccionar la hora de la salida');
        return;
    }
    if (params.destino == '0') {
        alert('Debe seleccionar el destino de la salida');
        return;
    }
    if (params.cupos == '' || params.cupos == '0') {
        alert('Debe especificar el número de cupos que tendrá la salida');
        return;
    }
    let result;
    try {
        result = await $.ajax({
            url: 'ajax/programar-salida',
            method: 'post',
            data: params,
            type: 'json'
        });
        if (result.error) {
            alert(result.error);
            return;
        }
        $('#modal-registro').modal('hide');
        alert('Salida programada con éxito para el ' + params.fecha + ' a las ' + params.hora);
        CargarProgramacionTours();
    }
    catch(err) {
        console.err(err);
    }
}

CargarSalidasDia = async (event) => {
    let container = $('#dv-salidas');
    container.empty();
    let params = {
        fecha: document.getElementById('rg-fecha').value,
        destino: document.getElementById('rg-destino').value
    };
    if (params.fecha != '' && params.destino != '0') {
        let result;
        try {
            result = await $.ajax({
                url: 'ajax/lista-salidas-dia',
                method: 'post',
                data: params,
                dataType: 'json'
            });
            if (result.error) {
                alert(result.error);
                return;
            }
            let salidas = result.data.salidas;
            console.log(salidas);
        }
        catch (err) {
            console.err(err);
            return;
        }
    }
}

SeleccionarDiaSalida = async (event, type) => {
    if (type == 'day') {
        CargarSalidasDia();
    }
}

ModalRegistroOnShow = (event) => {
    document.getElementById('rg-fecha').value = '';
    document.getElementById('rg-hora').value = '';
    document.getElementById('rg-cupos').value = '';
    $('#rg-ciudad option[value=0]').prop('selected',true);
    $('#rg-destino').empty().append(
        $('<option>').val(0).html('- Primero seleccione ciudad -')
    );
}

IniciarComponentes = () => {
    CargarProgramacionTours();
    $('#modal-registro').on('show.bs.modal', ModalRegistroOnShow);
    $('#modal-registro .modal-footer .btn-primary').on('click', ProgramarSalida);
    $('.datepicker').attr('width','160').datepicker({
        format: 'dd/mm/yyyy',
        minDate: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate()),
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        select: SeleccionarDiaSalida
    });
    $('.timepicker').attr('width', '160').timepicker();
    $('#rg-ciudad').on('change', CargarListaLugares);
    $('#rg-destino').on('change', CargarSalidasDia);
}