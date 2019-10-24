<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="header-content h-100 d-flex align-items-center justify-content-between">
                        <div class="academy-logo">
                            <a href="index.html"><img src="{{ asset('paralax/img/core-img/logo-ccc.png') }}" alt=""></a>
                        </div>
                        <div class="login-content">
                            <a href="{{ route('acceder') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Acceso SIS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="academy-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="academyNav">

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ route('homeCCC') }}">Home</a></li>
                                <li><a href="{{ route('Home.Act') }}">Actividades</a></li>
                                <li><a href="{{ route('Home.Comu') }}">Comunicados</a></li>
                                <li><a href="http://ccc.edu.bo/menu/" target="_blank">Menú del Mes</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>

                    <!-- Calling Info -->
                    <div class="calling-info">
                        <div class="call-center">
                            <a href="tel:+5914372142"><i class="icon-telephone-2"></i> <span>(+591) 4372142</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>