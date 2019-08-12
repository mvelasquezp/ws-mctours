
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
                    <a href="{{ url($lang) }}"><img src="{{ asset('img/logo.png') }}" alt="" title="MC Tours" style="height:30px;width:145px;" /></a>
                    </div>
                    <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="{{ url($lang) }}">{{ $textos["navbar_inicio"] }}</a></li>
                        <li><a href="{{ url($lang, ['nosotros']) }}">{{ $textos["navbar_nosotros"] }}</a></li>
                        <li><a href="{{ url($lang, ['destinos']) }}">{{ $textos["navbar_destinos"] }}</a></li>
                        <li><a href="{{ url($lang, ['paquetes']) }}">{{ $textos["navbar_paquetes"] }}</a></li>
                        <li><a href="{{ url($lang, ['contacto']) }}">{{ $textos["navbar_contacto"] }}</a></li>
                    </ul>
                    </nav><!-- #nav-menu-container -->					      		  
                </div>
            </div>
        </header>