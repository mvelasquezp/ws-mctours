var ListaTextos;

async function CargarTextos(event) {
    event.preventDefault();
    let a = $(this);
    let idioma = a.data('abrev');
    let result;
    try {
        result = await $.ajax({
            url: 'ajax/lista-textos',
            method: 'post',
            data: { idioma: idioma },
            dataType: 'json'
        });
        ListaTextos = result.data.textos;
        EscribirListaTextos(idioma);
    }
    catch(err) {
        console.error(err);
        return;
    }
}

async function InputOnKeyup(event) {
	let input = $(this);
	let value = input.val();
	if(event.keyCode == 13) {
		//aqui hay que guardar
		let id = input.data('codigo');
		$('#sp-' + id).html(value).show();
		$('#tx-' + id).hide();
	}
}

function ActivarEdicionTexto(event) {
	event.preventDefault();
	let a = $(this);
	let id = a.data('codigo');
	$('#sp-' + id).hide();
	$('#tx-' + id).show();
}

EscribirListaTextos = (idioma) => {
    let tbody = $('<tbody>');
    for(iTexto of ListaTextos) {
        tbody.append(
            $('<tr>').append(
                $('<td>').html(iTexto.codigo).addClass('text-gray-900')
            ).append(
                $('<td>').append(
                    $('<span>').attr('id','sp-' + iTexto.codigo).html(iTexto.texto).addClass('text-gray-900')
                ).append(
                    $('<input>').attr({
                        'id': 'tx-' + iTexto.codigo,
                        'type': 'text',
                        'data-codigo': iTexto.codigo,
                        'data-idioma': idioma
                    }).addClass('form-control form-control-sm').val(iTexto.texto).hide().on('keyup',InputOnKeyup)
                )
            ).append(
                $('<td>').append(
                    $('<a>').append(
                        $('<i>').addClass('fas fa-edit')
                    ).attr({
                        'href': '#',
                        'data-codigo': iTexto.codigo,
                        'data-idioma': idioma
                    }).addClass('btn btn-xs btn-primary').on('click', ActivarEdicionTexto)
                )
            )
        );
    }
    let table = $('<table>').append(
        $('<thead>').append(
            $('<tr>').append(
                $('<th>').html('Código').attr('width','15%')
            ).append(
                $('<th>').html('Texto')
            ).append(
                $('<th>').html('Acción').attr('width', '5%')
            )
        )
    ).append(tbody).addClass('table table-sm table-striped table-hover');
    $('#table-container').empty().append(table);
}

IniciarComponentes = () => {
    $('.opt-idioma').on('click', CargarTextos);
}