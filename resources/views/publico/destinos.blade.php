<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
        <title>Nuestros destinos</title>
        @include('publico.common_head')
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
                        <h1 class="text-white">{{ $textos["destinos_titulo"] }}</h1>	
                        <p class="text-white link-nav"><a href="{{ url($lang) }}">{{ $textos["navbar_inicio"] }} </a>  <span class="lnr lnr-arrow-right"></span> <a href="{{ url($lang, ['destinos']) }}"> {{ $textos["destinos_titulo"] }}</a></p>
                    </div>	
                </div>
            </div>
        </section>
        <!-- End banner Area -->	
        <!-- Start destinations Area -->
        <section class="destinations-area section-gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-40 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">{{ $textos["destinos_populares"] }}</h1>
                            <p>{{ $textos["destinos_populares_subt"] }}</p>
                        </div>
                    </div>
                </div>						
                <div class="row">
                    @foreach($destinos as $destino)
                    <div class="col-lg-6">
                        <div class="single-destinations">
                            <div class="thumb">
                                <img src="{{ asset('img/catalogo/destinos/' . $destino->lugar . '/0.png') }}" alt="">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <span>{{ $destino->nombre }}</span>                              	
                                    <div class="star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>				
                                    </div>	
                                </h4>
                                <p>{{ $destino->textos->descripcion }}</p>
                                <ul class="package-list">
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>Ubicación</span>
                                        <span><b>{{ $destino->ciudad }}</b></span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>Paquetes disponibles</span>
                                        <a href="#" class="price-btn">Ver</a>
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