var ListaCiudades;

async function GuardarCiudad(event) {
    event.preventDefault();
    $('#table-container').empty();
    let result;
    try {
        result = await $.ajax({
            url: 'ajax/guarda-ciudad',
            method: 'post',
            data: { nombre: document.getElementById('rg-nombre').value },
            dataType: 'json'
        });
        if(result.error) {
            alert(result.error);
            return;
        }
        $('#modal-registro').modal('hide');
        alert('¡Ciudad registrada!');
        ListaCiudades = result.data.ciudades;
        EscribirListaCiudades();
    }
    catch(err) {
        console.error(err);
    }
}

EscribirListaCiudades = () => {
    let container = $('#table-container');
    if (ListaCiudades.length > 0) {
        let div = $('<div>').addClass('row');
        for (iCiudad of ListaCiudades) {
            div.append(
                $('<div>').append(
                    $('<div>').append(
                        $('<div>').append(
                            $('<div>').append(
                                $('<div>').append(
                                    $('<div>').html('Ciudad de').addClass('text-xs font-weight-bold text-primary text-uppercase mb-1')
                                ).append(
                                    $('<div>').html(iCiudad.text).addClass('h5 mb-0 font-weight-bold text-gray-800')
                                ).addClass('col mr-2')
                            ).append(
                                $('<div>').append(
                                    $('<i>').addClass('fas fa-map-marker-alt')
                                ).addClass('col-auto')
                            ).addClass('row no-gutters align-items-center')
                        ).addClass('card-body')
                    ).addClass('card border-left-primary shadow h-100 py-2')
                ).addClass('col-xl-3 col-md-6 mb-4')
            );
        }
        container.append(div);
    }
    else {
        container.append(
            $('<p>').html('No hay ciudades registradas').addClass('h5 mb-0 text-gray-900')
        );
    }
}

CargarListaCiudades = async () => {
    $('#table-container').empty();
    let result;
    try {
        result = await $.ajax({
            url: 'ajax/lista-ciudades',
            method: 'get',
            dataType: 'json'
        });
        if (result.error) {
            alert(result.error);
            return;
        }
        ListaCiudades = result.data.ciudades;
        EscribirListaCiudades();
    }
    catch(err) {
        console.error(err);
    }
}

ModalRegistroOnShow = (event) => {
    document.getElementById('rg-nombre').value = '';
}

IniciarComponentes = () => {
    CargarListaCiudades();
    $('#modal-registro .btn-primary').on('click', GuardarCiudad);
    $('#modal-registro').on('show.bs.modal', ModalRegistroOnShow);
}