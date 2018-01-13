<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('imagenes/icono.png')}}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>INQUIFARMED | ADM</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('admin/assets/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('admin/assets/css/light-bootstrap-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('admin/assets/css/demo.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('admin/assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="{{asset('admin/assets/img/sidebar-5.jpg')}}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url('/adm')}}" class="simple-text">
                    <b> <i class="fa fa-flask"></i> INQUIFARMED</b>
                </a>
            </div>
            @if(Auth::user() -> tipo == "Administrador")
            <ul class="nav">
                <li>
                    <a href="{{url('/adm/empleados')}}">
                        <i class="pe-7s-users"></i>
                        <p>EMPLEADOS</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('/adm/proveedores')}}">
                        <i class="pe-7s-car"></i>
                        <p>PROVEEDORES</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('/adm/categorias')}}">
                        <i class="pe-7s-folder"></i>
                        <p>CATEGORIAS</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('/adm/productos')}}">
                        <i class="pe-7s-box2"></i>
                        <p>PRODUCTOS</p>
                    </a>
                </li>


                <li>
                    <a href="{{url('/adm/compras')}}">
                        <i class="pe-7s-cart"></i>
                        <p>COMPRAS</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('/adm/clientes')}}">
                        <i class="pe-7s-smile"></i>
                        <p>CLIENTES</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('/adm/ventas')}}">
                        <i class="pe-7s-piggy"></i>
                        <p>VENTAS</p>
                    </a>
                </li>
            </ul>
            @elseif(Auth::user() -> tipo == "Compra")
                <ul class="nav">

                    <li>
                        <a href="{{url('/adm/proveedores')}}">
                            <i class="pe-7s-car"></i>
                            <p>PROVEEDORES</p>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/adm/productos')}}">
                            <i class="pe-7s-box2"></i>
                            <p>PRODUCTOS</p>
                        </a>
                    </li>


                    <li>
                        <a href="{{url('/adm/compras')}}">
                            <i class="pe-7s-cart"></i>
                            <p>COMPRAS</p>
                        </a>
                    </li>

                </ul>
            @elseif(Auth::user() -> tipo == "Venta")
                <ul class="nav">

                    <li>
                        <a href="{{url('/adm/productos')}}">
                            <i class="pe-7s-box2"></i>
                            <p>PRODUCTOS</p>
                        </a>
                    </li>


                    <li>
                        <a href="{{url('/adm/clientes')}}">
                            <i class="pe-7s-smile"></i>
                            <p>CLIENTES</p>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/adm/ventas')}}">
                            <i class="pe-7s-piggy"></i>
                            <p>VENTAS</p>
                        </a>
                    </li>
                </ul>
            @else
            <ul class="nav">

                <li>
                    <a href="{{url('/adm/proveedores')}}">
                        <i class="pe-7s-car"></i>
                        <p>PROVEEDORES</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('/adm/categorias')}}">
                        <i class="pe-7s-folder"></i>
                        <p>CATEGORIAS</p>
                    </a>
                </li>

                <li>
                    <a href="{{url('/adm/productos')}}">
                        <i class="pe-7s-box2"></i>
                        <p>PRODUCTOS</p>
                    </a>
                </li>

            </ul>
            @endif
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->nombre }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>


                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            @yield('contenido')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!--   Core JS Files   -->
    <script src="{{asset('admin/assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{asset('admin/assets/js/bootstrap-checkbox-radio-switch.js')}}"></script>


    <!--  Notifications Plugin    -->
    <script src="{{asset('admin/assets/js/bootstrap-notify.js')}}"></script>


    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{asset('admin/assets/js/light-bootstrap-dashboard.js')}}"></script>

    @stack('scripts')

</body>


</html>

