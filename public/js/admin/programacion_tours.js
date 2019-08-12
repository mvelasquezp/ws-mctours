var ProgramacionTours;

CargarProgramacionTours = async () => {
    let TableContainer = $('#table-container');
    TableContainer.empty();
    //ProgramacionTours = await ...
    ProgramacionTours = [];
    let tbody = $('<tbody>');
    for(programacion of ProgramacionTours) {
        tbody.append(
            $('<tr>')
        );
    }
    let table = $('<table>').append(
        $('<thead>').append(
            $('<tr>').append(
                $('<th>').html('Fecha')
            ).append(
                $('<th>').html('Ciudad')
            ).append(
                $('<th>').html('Destino')
            ).append(
                $('<th>').html('Capacidad')
            )
        )
    ).append(tbody).addClass('table table-sm table-striped table-hover');
    TableContainer.append(table);
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

IniciarComponentes = () => {
    CargarProgramacionTours();
    $('#rg-ciudad').on('change', CargarListaLugares);
}