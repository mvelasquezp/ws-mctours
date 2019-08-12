<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
        <title>Paquetes de viaje</title>
        @include('publico.common_head')
        <style>
            .section-gap{padding:30px 0 !important;}
        </style>
    </head>
    <body>
        <!-- header -->
        @include('publico.common_header')
        <!-- fin header -->
        <!-- start banner Area -->
        <section class="about-banner relative">
            <div class="overlay overlay-bg"></div>
            <div class="container">				
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">{{ $textos["paquetes_titulo"] }}</h1>	
                        <p class="text-white link-nav"><a href="{{ url($lang) }}">{{ $textos["navbar_inicio"] }} </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ url($lang, ['paquetes']) }}"> {{ $textos["paquetes_titulo"] }}</a></p>
                    </div>	
                </div>
            </div>
        </section>
        <!-- End banner Area -->	

        <!-- Start hot-deal Area -->
        <!--section class="hot-deal-area section-gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">Today’s Hot Deals</h1>
                            <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day to.</p>
                        </div>
                    </div>
                </div>						
                <div class="row justify-content-center">
                    <div class="col-lg-10 active-hot-deal-carusel">
                        <div class="single-carusel">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="img/packages/hot-deal.jpg" alt="">
                            </div>
                            <div class="price-detials">
                                <a href="#" class="price-btn">Starting From <span>$250</span></a>
                            </div>
                            <div class="details">
                                <h4 class="text-white">Ancient Architecture</h4>
                                <p class="text-white">
                                    Cairo, Egypt
                                </p>
                            </div>								
                        </div>
                        <div class="single-carusel">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="img/packages/hot-deal.jpg" alt="">
                            </div>
                            <div class="price-detials">
                                <a href="#" class="price-btn">Starting From <span>$250</span></a>
                            </div>
                            <div class="details">
                                <h4 class="text-white">Ancient Architecture</h4>
                                <p class="text-white">
                                    Cairo, Egypt
                                </p>
                            </div>								
                        </div>
                        <div class="single-carusel">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="img/packages/hot-deal.jpg" alt="">
                            </div>
                            <div class="price-detials">
                                <a href="#" class="price-btn">Starting From <span>$250</span></a>
                            </div>
                            <div class="details">
                                <h4 class="text-white">Ancient Architecture</h4>
                                <p class="text-white">
                                    Cairo, Egypt
                                </p>
                            </div>								
                        </div>														
                    </div>
                </div>
            </div>	
        </section-->
        <!-- End hot-deal Area -->

        <!-- Start destinations Area -->
        <section class="destinations-area section-gap">
            <div class="container">					
                <div class="row">
                    @foreach($paquetes as $paquete)
                    <div class="col-lg-6">
                        <div class="single-destinations">
                            <div class="thumb">
                                <!--img src="{{ asset('img/packages/d1.jpg') }}" alt=""-->
                                <div id="carousel-{{ $paquete->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($paquete->textos->ids as $i => $imagen)
                                        @if($i == 0)
                                        <div class="carousel-item active">
                                        @else
                                        <div class="carousel-item">
                                        @endif
                                            <img src="{{ asset('img/catalogo/destinos/' . $imagen . '/0.png') }}" class="d-block w-100" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="details">
                                <h4>{{ $paquete->textos->nombre }}</h4>
                                <p>{{ $paquete->textos->descripcion }}</p>
                                <ul class="package-list">
                                    <li class="d-flex justify-content-between align-items-center">
                                        <p class="w-50 mb-0">Destinos</p>
                                        <p class="w-50 mb-0"><b>{{ $paquete->textos->destinos }}</b></p>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <p class="w-50 mb-0">Duración</p>
                                        <p class="w-50 mb-0 text-gray-900">{{ $paquete->textos->duracion }}</p>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <p class="w-50 mb-0">Incluye</p>
                                        <p class="w-50 mb-0 text-gray-900">{{ $paquete->textos->incluye }}</p>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>Precio por persona</span>
                                        <a href="#" class="price-btn text-light">S/ {{ $paquete->precio }}</a>
                                    </li>													
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>	
        </section>
        <!-- End destinations Area -->
        <!-- Start home-about Area -->
        <section class="home-about-area">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-end">
                    <div class="col-lg-6 col-md-12 home-about-left">
                        <h1>{{ $textos["destinos_donde_viajar"] }}</h1>
                        <p>{{ $textos["destinos_donde_desc"] }}</p>
                        <a href="#" class="primary-btn text-uppercase">{{ $textos["destinos_solicite"] }}</a>
                    </div>
                    <div class="col-lg-6 col-md-12 home-about-right no-padding">
                        <img class="img-fluid" src="{{ asset('img/hotels/about-img.jpg') }}" alt="">
                    </div>
                </div>
            </div>	
        </section>
        <!-- End home-about Area -->
        <!-- start footer Area -->
        @include('publico.common_footer')
        <!-- End footer Area -->
        @include('publico.common_scripts')
    </body>
</html>