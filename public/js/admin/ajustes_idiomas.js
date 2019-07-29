var ListaIdiomas;

EscribirListaIdiomas = () => {
    let TableContainer = $('#table-container');
    if (ListaIdiomas.length > 0) {
        let tbody = $('<tbody>');
        for (let i in ListaIdiomas) {
            let idioma = ListaIdiomas[i];
            let TagEstado, BotonDefecto;
            if (idioma.estado == 'S') {
                TagEstado = $('<span>').html('Vigente').addClass('btn btn-xs btn-success');
            }
            else {
                TagEstado = $('<span>').html('Retirado').addClass('btn btn-xs btn-danger');
            }
            if (idioma.defecto == 'S') {
                BotonDefecto = $('<a>').html('Si').addClass('btn btn-xs btn-success');
            }
            else {
                BotonDefecto = $('<a>').html('No').attr({
                    'href': '#',
                    'data-index': i
                }).addClass('btn btn-xs btn-success').on('click', ConfiguraIdiomaDefecto);
            }
            tbody.append(
                $('<tr>').append(
                    $('<td>').html(idioma.idioma).addClass('text-gray-900')
                ).append(
                    $('<td>').html(idioma.alias).addClass('text-gray-900')
                ).append(
                    $('<td>').append(TagEstado).addClass('text-light')
                ).append(
                    $('<td>').append(BotonDefecto).addClass('text-light')
                ).append(
                    $('<td>').html(idioma.registro).addClass('text-gray-900')
                )
            );
        }
        let table = $('<table>').append(
            $('<thead>').append(
                $('<tr>').append(
                    $('<th>').html('Idioma').addClass('text-gray-900')
                ).append(
                    $('<th>').html('Abrev.').addClass('text-gray-900')
                ).append(
                    $('<th>').html('Estado').addClass('text-gray-900')
                ).append(
                    $('<th>').html('Defecto').addClass('text-gray-900')
                ).append(
                    $('<th>').html('Registro').addClass('text-gray-900')
                )
            )
        ).append(tbody).addClass('table table-sm table-striped table-hover');
        TableContainer.append(table);
    }
    else {
        TableContainer.append(
            $('<p>').html('No hay idiomas registrados').addClass('h5 mb-0 text-gray-900')
        );
    }
}
CargarListaIdiomas = async () => {
    $('#table-container').empty();
    let result;
    try {
        result = await $.ajax({
            url: 'ajax/lista-idiomas',
            method: 'get',
            dataType: 'json'
        });
        if (result.error) {
            alert(result.error);
            return;
        }
        ListaIdiomas = result.data.idiomas;
        EscribirListaIdiomas();
    }
    catch(err) {
        console.error(err);
    }
}
async function RegistrarIdioma(event) {
    event.preventDefault();
    let file = document.getElementById('rg-imagen').files[0];
    let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = async () => {
            let result;
            try {
                result = await $.ajax({
                    url: 'ajax/guarda-idioma',
                    method: 'post',
                    data: {
                        nombre: document.getElementById('rg-nombre').value,
                        abreviatura: document.getElementById('rg-abreviatura').value,
                        defecto: $('#rg-defecto').prop('checked') ? 'S' : 'N',
                        icono: reader.result
                    },
                    dataType: 'json'
                });
                if (result.error) {
                    alert(result.error);
                    return;
                }
                $('#modal-registro').modal('hide');
                alert('Idioma registrado');
                CargarListaIdiomas();
            }
            catch (err) {
                console.error(err);
            }
        };
        reader.onerror = function (error) {
            alert('Error: ', error);
        };
}

function ConfiguraIdiomaDefecto(event) {
    event.preventDefault();
    alert('Convertir en default!');
}

IniciarComponentes = () => {
    CargarListaIdiomas();
    $('#modal-registro .btn-primary').on('click', RegistrarIdioma)
}