<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
        <title>Contáctenos</title>
        @include('publico.common_head')
    </head>
    <body>
        <!-- header -->
        @include('publico.common_header')
        <!-- fin header -->
        <!-- start banner Area -->
        <section class="relative about-banner">	
            <div class="overlay overlay-bg"></div>
            <div class="container">				
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">{{ $textos["contacto_titulo"] }}</h1>
                        <p class="text-white link-nav"><a href="{{ url($lang) }}">{{ $textos["navbar_inicio"] }} </a> <span class="lnr lnr-arrow-right"></span> <a href="{{ url($lang, ['contacto']) }}"> {{ $textos["contacto_titulo"] }}</a></p>
                    </div>	
                </div>
            </div>
        </section>
        <!-- End banner Area -->				  

        <!-- Start contact-page Area -->
        <section class="contact-page-area section-gap">
            <div class="container">
                <div class="row">
                    <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
                    <div class="col-lg-4 d-flex flex-column address-wrap">
                        <div class="single-contact-address d-flex flex-row">
                            <div class="icon">
                                <span class="lnr lnr-home"></span>
                            </div>
                            <div class="contact-details">
                                <h5>La Victoria, Lima</h5>
                                <p>Jr. Carlos Gutierrez Noriega 310</p>
                            </div>
                        </div>
                        <div class="single-contact-address d-flex flex-row">
                            <div class="icon">
                                <span class="lnr lnr-phone-handset"></span>
                            </div>
                            <div class="contact-details">
                                <h5>(01) 324-6666</h5>
                                <p>Lunes a viernes - 9am a 6 pm</p>
                            </div>
                        </div>
                        <div class="single-contact-address d-flex flex-row">
                            <div class="icon">
                                <span class="lnr lnr-envelope"></span>
                            </div>
                            <div class="contact-details">
                                <h5>ventas@mctours.pe</h5>
                                <p>Envíanos tu consulta cuando desees</p>
                            </div>
                        </div>														
                    </div>
                    <div class="col-lg-8">
                        <form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
                            <div class="row">	
                                <div class="col-lg-6 form-group">
                                    <input name="name" placeholder="{{ $textos["contacto_form_nombre"] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos["contacto_form_nombre"] }}'" class="common-input mb-20 form-control" required="" type="text">
                                    <input name="email" placeholder="{{ $textos["contacto_form_email"] }}" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos["contacto_form_email"] }}'" class="common-input mb-20 form-control" required="" type="email">
                                    <input name="subject" placeholder="{{ $textos["contacto_form_asunto"] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos["contacto_form_asunto"] }}'" class="common-input mb-20 form-control" required="" type="text">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <textarea class="common-textarea form-control" name="message" placeholder="{{ $textos["contacto_form_mensaje"] }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $textos["contacto_form_mensaje"] }}'" required="" style="resize:none;"></textarea>				
                                </div>
                                <div class="col-lg-12">
                                    <div class="alert-msg" style="text-align: left;"></div>
                                    <button class="genric-btn primary" style="float: right;">{{ $textos["contacto_form_boton"] }}</button>											
                                </div>
                            </div>
                        </form>	
                    </div>
                </div>
            </div>	
        </section>
        <!-- End contact-page Area -->
        <!-- start footer Area -->
        @include('publico.common_footer')
        <!-- End footer Area -->
        @include('publico.common_scripts')
        <!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script-->
    </body>
</html>