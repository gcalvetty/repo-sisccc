
<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header">
        <div class="container h-100">

            <div class="col-12 h-100">
                <div class="header-content h-100 d-flex align-items-center justify-content-between">
                    <div class="academy-logo">
                        <a href="index.html"><img src="{{ asset('paralax/img/core-img/logo-ccc.png') }}" alt=""></a>
                    </div>
                    <div class="login-content">
                        <ul class=" nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())               
                            <li><a href="{{ route('acceder') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> @lang('auth.login')</a></li> 

                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->ape_paterno .' '. Auth::user()->nombre }} 
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="">
                                        <a href="{{ session('Ruta-Acceso') }}"><i class="fa fa-desktop" aria-hidden="true"></i> @lang('auth.dashbord')
                                        </a>

                                        <form id="logout-form" action="{{ route('cerrar-acceso') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('cerrar-acceso') }}"
                                           onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> @lang('auth.logout')
                                        </a>

                                        <form id="logout-form" action="{{ route('cerrar-acceso') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>                        
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

</header>
<!-- ##### Header Area End ##### -->   
<div class="home-cont3" style="margin-bottom: 20px">        
    <div class="container ns panel-body">    
        <div class="row">
            @if (true)
            <div class="logeado col-lg-10 col-xs-push-1">
                <h1>Usuario, Logeado!!!</h1>            
                <p><a class="btn btn-primary btn-lg " href="{{ session('Ruta-Acceso') }}" role="button"><i class="fa fa-desktop" aria-hidden="true"></i> @lang('auth.dashbord')</a></p>
            </div>                
            @endif
        </div><!-- /row -->
    </div><!-- Container -->
</div>