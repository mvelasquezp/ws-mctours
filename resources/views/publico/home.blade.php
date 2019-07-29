<html class="no-js">
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="img/fav.png">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta charset="utf-8">

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body>
        <header id="header">
            <div class="header-top">
                <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                        <ul>
                    	@foreach($idiomas as $idioma)
                        	@if(strcmp($idioma->defecto,"S") == 0)
                        	<li class="active"><a href="{{ url($idioma->alias) }}" class="text-lowercase">{{ $idioma->idioma }}</a></li>
                        	@else
                        	<li><a href="{{ url($idioma->alias) }}" class="text-lowercase">{{ $idioma->idioma }}</a></li>
                        	@endif
                    	@endforeach
                        </ul>			
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                        <div class="header-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>			  					
                </div>
            </div>
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                    <a href="index.html"><img src="img/logo.png" alt="" title="MC Tours" /></a>
                    </div>
                    <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="index.html">{{ $textos["navbar_inicio"] }}</a></li>
                        <li><a href="about.html">{{ $textos["navbar_nosotros"] }}</a></li>
                        <li><a href="packages.html">{{ $textos["navbar_destinos"] }}</a></li>
                        <li><a href="packages.html">{{ $textos["navbar_paquetes"] }}</a></li>
                        <li><a href="contact.html">{{ $textos["navbar_contacto"] }}</a></li>
                    </ul>
                    </nav><!-- #nav-menu-container -->					      		  
                </div>
            </div>
        </header><!-- #header -->
        
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
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                                <form class="form-wrap">
                                    <input type="text" class="form-control" name="destino" placeholder="{{ $textos['form_paquete_destino'] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos['form_paquete_destino'] }} '">
                                    <br>
                                    <input type="text" class="form-control date-picker" name="fecha" placeholder="{{ $textos['form_paquete_fecha'] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos['form_paquete_fecha'] }} '">
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
        <footer class="footer-area section-gap">
            <div class="container">

                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>{{ $textos["acerca_de"] }}</h6>
                            <p>{{ $textos["acerca_descripcion"] }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6></h6>
                            <div class="row">
                                <div class="col">
                                    <span></span>
                                </div>
                            </div>							
                        </div>
                    </div>							
                    <div class="col-lg-6  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>{{ $textos["acerca_noticias"] }}</h6>
                            <p>{{ $textos["acerca_texto"] }}</p>								
                            <div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscription relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="email" placeholder="{{ $textos['acerca_email'] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos['acerca_email'] }} '" required="" type="email">
                                        <button class="btn bb-btn"><span class="lnr lnr-location"></span></button>		
                                    </div>
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>						
                </div>

                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> MC Tours - Todos los derechos reservados
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->	

        <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
        <!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script-->
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/easing.min.js') }}"></script>
        <script src="{{ asset('js/hoverIntent.js') }}"></script>
        <script src="{{ asset('js/superfish.min.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
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
        </script>
    </body>
</html>