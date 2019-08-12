<html class="no-js">
    <head>
        <title>Bienvenido a MC Tours</title>
        @include('publico.common_head')
    </head>
    <body>
        <!-- header -->
        @include('publico.common_header')
        <!-- fin header -->
        
        <!-- start banner Area -->
        <section class="banner-area relative">
            <div class="overlay overlay-bg"></div>				
            <div class="container">
                <div class="row fullscreen align-items-center justify-content-between">
                    <div class="col-lg-6 col-md-6 banner-left">
                        <h6 class="text-white">{{ $textos["subtitulo_1"] }}</h6>
                        <h1 class="text-white">{{ $textos["titulo_1"] }}</h1>
                        <p class="text-white">
                            {{ $textos["descripcion_1"] }}
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6 banner-right">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link text-uppercase active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">{{ $textos["form_paquete"] }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">{{ $textos["form_pasajes"] }}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-container">
                            <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                                <form class="form-wrap">
                                    <select id="pq-destino" class="form-control">
                                        <option value="0" selected="true">{{ $textos['form_paquete_destino'] }}</option>
                                        @foreach($ciudades as $ciudad)
                                        <option value="{{ $ciudad->value }}">{{ $ciudad->text }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <input type="text" class="form-control date-picker" id="pq-fecha" placeholder="{{ $textos['form_paquete_fecha'] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos['form_paquete_fecha'] }} '">
                                    <br>
                                    <a href="#" class="primary-btn text-uppercase">{{ $textos["form_paquete_boton"] }}</a>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                                <form class="form-wrap">
                                    <input type="text" class="form-control" name="origen" placeholder="{{ $textos['form_pasajes_origen'] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos['form_pasajes_origen'] }}'">
                                    <input type="text" class="form-control" name="destino" placeholder="{{ $textos['form_pasajes_destino'] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos['form_pasajes_destino'] }}'">
                                    <input type="text" class="form-control date-picker" name="partida" placeholder="{{ $textos['form_pasajes_partida'] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos['form_pasajes_partida'] }}'">
                                    <input type="text" class="form-control date-picker" name="llegada" placeholder="{{ $textos['form_pasajes_llegada'] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos['form_pasajes_llegada'] }}'">
                                    <a href="#" class="primary-btn text-uppercase">{{ $textos["form_pasajes_boton"] }}</a>									
                                </form>							  	
                            </div>
                        </div>
                    </div>
                </div>
            </div>					
        </section>
        <!-- End banner Area -->

        <!-- Start popular-destination Area -->
        <section class="popular-destination-area section-gap price-area">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">{{ $textos["titulo_2"] }}</h1>
                            <p>{{ $textos["descripcion_2"] }}</p>
                        </div>
                    </div>
                </div>						
                <div class="row">
                    @foreach($populares as $destino)
                    <div class="col-lg-4">
                        <div class="single-destination relative">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset('img/catalogo/destinos/' . $destino->lugar . '/0.png') }}" alt="">
                            </div>
                            <div class="desc">	
                                <a href="#" class="price-btn" data-toggle="modal" data-target="#modal-destino" data-id="{{ $destino->lugar }}">Ver</a>
                                <h4>{{ $destino->nombre }}</h4>
                                <p>{{ $destino->ciudad }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach														
                </div>
            </div>	
        </section>
        <!-- End popular-destination Area -->
        

        <!-- Start other-issue Area -->
        <section class="other-issue-area section-gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-9">
                        <div class="title text-center">
                            <h1 class="mb-10">{{ $textos["titulo_3"] }}</h1>
                            <p>{{ $textos["descripcion_3"] }}</p>
                        </div>
                    </div>
                </div>					
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-other-issue">
                            <div class="thumb">
                                <img class="img-fluid" src="img/o1.jpg" alt="">					
                            </div>
                            <a href="#">
                                <h4>SERVICIO 1</h4>
                            </a>
                            <p>
                                DESCRIPCION SERVICIO 1 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-other-issue">
                            <div class="thumb">
                                <img class="img-fluid" src="img/o2.jpg" alt="">					
                            </div>
                            <a href="#">
                                <h4>SERVICIO 2</h4>
                            </a>
                            <p>
                                DESCRIPCION SERVICIO 2 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-other-issue">
                            <div class="thumb">
                                <img class="img-fluid" src="img/o3.jpg" alt="">					
                            </div>
                            <a href="#">
                                <h4>SERVICIO 3</h4>
                            </a>
                            <p>
                                DESCRIPCION SERVICIO 3 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-other-issue">
                            <div class="thumb">
                                <img class="img-fluid" src="img/o4.jpg" alt="">					
                            </div>
                            <a href="#">
                                <h4>SERVICIO 4</h4>
                            </a>
                            <p>
                                DESCRIPCION SERVICIO 4 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                            </p>
                        </div>
                    </div>																		
                </div>
            </div>	
        </section>
        <!-- End other-issue Area -->
        

        <!-- Start testimonial Area -->
        <section class="testimonial-area section-gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">{{ $textos["titulo_4"] }}</h1>
                            <p>{{ $textos["descripcion_4"] }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="active-testimonial">
                        <div class="single-testimonial item d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid" src="img/elements/user1.png" alt="">
                            </div>
                            <div class="desc">
                                <p>
                                    TESTIMONIO CLIENTE 1 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                                </p>
                                <h4>NOMBRE CLIENTE 1</h4>
                                <div class="star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>				
                                </div>	
                            </div>
                        </div>
                        <div class="single-testimonial item d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid" src="img/elements/user2.png" alt="">
                            </div>
                            <div class="desc">
                                <p>
                                    TESTIMONIO CLIENTE 2 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                                </p>
                                <h4>NOMBRE CLIENTE 2</h4>
                                <div class="star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>			
                                </div>	
                            </div>
                        </div>
                        <div class="single-testimonial item d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid" src="img/elements/user1.png" alt="">
                            </div>
                            <div class="desc">
                                <p>
                                    TESTIMONIO CLIENTE 3 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                                </p>
                                <h4>NOMBRE CLIENTE 3</h4>
                                <div class="star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>				
                                </div>	
                            </div>
                        </div>
                        <div class="single-testimonial item d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid" src="img/elements/user2.png" alt="">
                            </div>
                            <div class="desc">
                                <p>
                                    TESTIMONIO CLIENTE 4 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                                </p>
                                <h4>NOMBRE CLIENTE 4</h4>
                                <div class="star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>			
                                </div>	
                            </div>
                        </div>
                        <div class="single-testimonial item d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid" src="img/elements/user1.png" alt="">
                            </div>
                            <div class="desc">
                                <p>
                                    TESTIMONIO CLIENTE 5 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                                </p>
                                <h4>NOMBRE CLIENTE 5</h4>
                                <div class="star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>				
                                </div>	
                            </div>
                        </div>
                        <div class="single-testimonial item d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid" src="img/elements/user2.png" alt="">
                            </div>
                            <div class="desc">
                                <p>
                                    TESTIMONIO CLIENTE 6 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, unde! Atque nostrum maxime nobis similique? Praesentium at tempore sequi eligendi accusamus! Vel, suscipit temporibus earum maiores voluptates beatae tenetur nihil!
                                </p>
                                <h4>NOMBRE CLIENTE 6</h4>
                                <div class="star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                        </div>		                    		                    
                    </div>
                </div>
            </div>
        </section>
        <!-- End testimonial Area -->

        <!-- Start home-about Area -->
        <section class="home-about-area">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-end">
                    <div class="col-lg-6 col-md-12 home-about-left">
                        <h1>{{ $textos["titulo_5"] }}</h1>
                        <p>{{ $textos["descripcion_5"] }}</p>
                        <a href="#" class="primary-btn text-uppercase">Solicite una cotización</a>
                        <br><br>
                    </div>
                    <div class="col-lg-6 col-md-12 home-about-right no-padding">
                        <img class="img-fluid" src="img/about-img.jpg" alt="">
                    </div>
                </div>
            </div>	
        </section>
        <!-- End home-about Area -->

        <!-- modals -->
        <div id="modal-destino" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div id="carrusel-container" class="mb-4 h-50"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="modal-title"></div>
                                <p class="text-gray-900 mb-0 mr-3 mt-2 text-justify modal-descripcion"></p>
                            </div>
                            <div class="col">
                                <p class="text-gray-900 mb-0 mr-3 mt-2 text-justify">saddsasadsad</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modals -->

        <!-- start footer Area -->
        @include('publico.common_footer')
        <!-- End footer Area -->	
        @include('publico.common_scripts')
        <script>
            async function CargarInfoDestino(event) {
                let a = event.relatedTarget.dataset;
                $('#carrusel-container').empty();
                let result;
                try {
                    result = await $.ajax({
                        url: window.location + '/ajax/detalle-destino',
                        method: 'post',
                        data: { destino: a.id },
                        dataType: 'json'
                    });
                    if(result.error) {
                        console.log(result.error);
                        return;
                    }
                    let detalle = result.data.detalle;
                    let CarruselContainer = $('#carrusel-container');
                    $('#modal-destino .modal-title').empty().append(
                        $('<h5>').html(detalle.lugar).addClass('mb-1')
                    ).append(
                        $('<span>').html(detalle.ciudad).addClass('text-secondary text-italic')
                    );
                    $('#modal-destino .modal-descripcion').html(detalle.descripcion);
                    let Carrusel = $('<div>').attr('id', 'carrusel-destino');
                    let CarruselIndicadores = $('<ol>').addClass('carousel-indicators');
                    let CarruselItems = $('<div>').addClass('carousel-inner');
                    let enlaces = result.data.enlaces;
                    for(let i in enlaces) {
                        let iEnlace = enlaces[i];
                        CarruselIndicadores.append(
                            $('<li>').attr({
                                'data-target': '#carrusel-destino',
                                'data-slide-to': i
                            })
                        );
                        CarruselItems.append(
                            $('<div>').append(
                                $('<img>').attr('src',iEnlace).addClass('d-block w-100')
                            ).addClass('carousel-item')
                        );
                    }
                    CarruselIndicadores.children().eq(0).addClass('active');
                    CarruselItems.children().eq(0).addClass('active');
                    Carrusel.append(CarruselIndicadores).append(CarruselItems).append(
                        $('<a>').attr({
                            'href': '#carrusel-destino',
                            'role': 'button',
                            'data-slide': 'prev'
                        }).append(
                            $('<span>').addClass('carousel-control-prev-icon').attr('aria-hidden',true)
                        ).append(
                            $('<span>').addClass('sr-only').html('Previous')
                        ).addClass('carousel-control-prev')
                    ).append(
                        $('<a>').attr({
                            'href': '#carrusel-destino',
                            'role': 'button',
                            'data-slide': 'next'
                        }).append(
                            $('<span>').addClass('carousel-control-next-icon').attr('aria-hidden',true)
                        ).append(
                            $('<span>').addClass('sr-only').html('Previous')
                        ).addClass('carousel-control-next')
                    );
                    CarruselContainer.empty().append(
                        Carrusel.addClass('carousel slide').attr('data-ride','carousel').carousel()
                    );
                }
                catch(err) {
                    console.error(err);
                }
            }
            $('#modal-destino').on('show.bs.modal', CargarInfoDestino);
            $('#pq-destino option[value=0]').prop('selected',true);
        </script>
    </body>
</html>