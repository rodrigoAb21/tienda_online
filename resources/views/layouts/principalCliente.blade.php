<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inquifamed | LTDA</title>
    <link rel="icon" type="image/png" href="{{asset('imagenes/icono.png')}}" />

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/offcanvas.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    @stack('scripts')
</head>

<body>
<header>
    <nav class="navbar navbar-expand-md fixed-top navbar-dark">
        <a class="navbar-brand" href="{{url('/')}}"><b>INQUIFARMED</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/productos')}}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/nosotros')}}">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/contactenos')}}">Contáctenos</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/carrito')}}"><i class="fa fa-shopping-cart"></i></a>
                </li>
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="" data-target="#modal-login" data-toggle="modal">Login</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/registrarse')}}">Registrarse</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user() -> nombre }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: #000000">
                                <span><i class="fa fa-sign-out"></i> Logout</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>

    @include('cliente.login')
    @yield('contenido')


<!--Footer-->
<footer style="background-color: rgb(33,37,41); color: white;">

    <div style="background-color: #D50000; color: white">
        <div class="container">
            <!--Grid row-->
            <div class="row py-3 d-flex align-items-center">

                <!--Grid column-->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0 white-text">Conectate con nosotros a traves de nuestras redes!</h6>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <!--Facebook-->
                    <a class="icons-sm fb-ic ml-0"><i class="fa fa-facebook white-text mr-lg-4"> </i></a>
                    <!--Twitter-->
                    <a class="icons-sm tw-ic"><i class="fa fa-twitter white-text mr-lg-4"> </i></a>
                    <!--Google +-->
                    <a class="icons-sm gplus-ic"><i class="fa fa-google-plus white-text mr-lg-4"> </i></a>
                    <!--Linkedin-->
                    <a class="icons-sm li-ic"><i class="fa fa-linkedin white-text mr-lg-4"> </i></a>
                    <!--Instagram-->
                    <a class="icons-sm ins-ic"><i class="fa fa-instagram white-text mr-lg-4"> </i></a>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
    </div>

    <!--Footer Links-->
    <div class="container mt-3 mb-3 text-center text-md-left">
        <div class="row">

            <!--First column-->
            <div class="col-md-3 col-lg-4 col-xl-3 mb-r">
                <h6 class=""><strong>Inquifarmed</strong></h6>
                <hr class="" style="width: 60px; background-color:#D50000 ">
                <p align="justify">INQUIFARMED es una empresa nueva en la distribución de material de laboratorio, materias primas grado farmacéutico, alimenticio y técnico-industrial, con asesoría técnica personalizada.</p>
            </div>
            <!--/.First column-->

            <!--Third column-->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-r">
                <h6 class=""><strong>Mapa del Sitio</strong></h6>
                <hr class="" style="width: 60px; background-color:#D50000 ">
                <ul>
                    <li><a href="{{asset('/')}}">Inicio</a></li>
                    <li><a href="{{asset('/productos')}}">Productos</a></li>
                    <li><a href="{{asset('/nosotros')}}">Nosotros</a></li>
                    <li><a href="{{asset('/contactenos')}}">Contactenos</a></li>
                </ul>
            </div>
            <!--/.Third column-->

            <!--Fourth column-->
            <div class="col-md-4 col-lg-3 col-xl-3">
                <h6 class=""><strong>Contact</strong></h6>
                <hr class="" style="width: 60px; background-color:#D50000 ">
                <ul>
                    <li><i class="fa fa-envelope mr-2"></i>inquifarmed@gmail.com</li>
                    <li><i class="fa fa-phone mr-2"></i>  3 3565742</li>
                    <li><i class="fa fa-print mr-2"></i> 3 3532021</li>
                    <li><i class="fa fa-map-marker mr-3"></i>6to Anillo, Av. Radial 17 ½ #02 frente al complejo Oriente Petrolero</li>
                </ul>
            </div>
            <!--/.Fourth column-->

        </div>
    </div>
    <!--/.Footer Links-->

    <!-- Copyright-->

    <div style="background-color: rgb(33,37,41); color: white">
        <div class="container">
            <!--Grid row-->
            <div class="row py-2 d-flex align-items-center">
                <!--Grid column-->
                <div class="col-md-12 col-lg-12 text-center mb-4 mb-md-0">
                    <h6 class="mb-0 white-text"><a href="https://www.uagrm.edu.bo">UAGRM - FICCT</a></h6>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
    </div>
    <!--/.Copyright -->

</footer>
<!--/.Footer-->




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{asset('js/jquery-slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/offcanvas.js')}}"></script>


</body>
</html>