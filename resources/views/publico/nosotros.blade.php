<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
        <title>Nosotros</title>
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
                        <h1 class="text-white">{{ $textos["acerca_nosotros"] }}</h1>	
                        <p class="text-white link-nav"><a href="{{ url($lang) }}">{{ $textos["navbar_inicio"] }} </a><span class="lnr lnr-arrow-right"></span> <a href="{{ url($lang, ['nosotros']) }}"> {{ $textos["acerca_nosotros"] }}</a></p>
                    </div>	
                </div>
            </div>
        </section>
        <!-- End banner Area -->	

        <!-- Start about-info Area -->
        <section class="about-info-area section-gap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 info-left">
                        <img class="img-fluid" src="{{ asset('img/about/info-img.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-6 info-right">
                        <h6>{{ $textos["acerca_nosotros"] }}</h6>
                        <h1>{{ $textos["quienes_somos"] }}</h1>
                        <p>{{ $textos["nosotros_descripcion"] }}</p>
                    </div>
                </div>
            </div>	
        </section>
        <!-- End about-info Area -->

        <!-- Start other-issue Area -->
        <section class="price-area section-gap">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-9">
                        <div class="title text-center">
                            <h1 class="mb-10">{{ $textos["nosotros_servicios"] }}</h1>
                            <p>{{ $textos["nosotros_servicios_subt"] }}</p>
                        </div>
                    </div>
                </div>					
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-other-issue">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset('img/o1.jpg') }}" alt="">					
                            </div>
                            <a href="#">
                                <h4>Rent a Car</h4>
                            </a>
                            <p>
                                The preservation of human life is the ultimate value, a pillar of ethics and the foundation.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-other-issue">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset('img/o2.jpg') }}" alt="">					
                            </div>
                            <a href="#">
                                <h4>Cruise Booking</h4>
                            </a>
                            <p>
                                I was always somebody who felt quite sorry for myself, what I had not got compared.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-other-issue">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset('img/o3.jpg') }}" alt="">					
                            </div>
                            <a href="#">
                                <h4>To Do List</h4>
                            </a>
                            <p>
                                The following article covers a topic that has recently moved to center stage–at least it seems.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-other-issue">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset('img/o4.jpg') }}" alt="">					
                            </div>
                            <a href="#">
                                <h4>Food Features</h4>
                            </a>
                            <p>
                                There are many kinds of narratives and organizing principles. Science is driven by evidence.
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
                            <h1 class="mb-10">{{ $textos["nosotros_testimonios"] }}</h1>
                            <p>{{ $textos["nosotros_testimonios_subt"] }}</p>
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
                                    Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.		     
                                </p>
                                <h4>Harriet Maxwell</h4>
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
                                    A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
                                </p>
                                <h4>Carolyn Craig</h4>
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
                                    Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.		     
                                </p>
                                <h4>Harriet Maxwell</h4>
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
                                    A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
                                </p>
                                <h4>Carolyn Craig</h4>
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
                                    Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills, the bigger the payoff you.		     
                                </p>
                                <h4>Harriet Maxwell</h4>
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
                                    A purpose is the eternal condition for success. Every former smoker can tell you just how hard it is to stop smoking cigarettes. However.
                                </p>
                                <h4>Carolyn Craig</h4>
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
        <!-- start footer Area -->
        @include('publico.common_footer')
        <!-- End footer Area -->
        @include('publico.common_scripts')
    </body>
</html>