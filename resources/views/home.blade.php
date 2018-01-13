@extends('layouts.admin')
@section('contenido')
    <div class="card">
        <div class="content all-icons">
            <div class="row">

                @if(Auth::user() -> tipo == "Administrador")
                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/empleados')}}">
                            <div class="font-icon-detail" style="color: #000000"><i class="pe-7s-users"></i>
                                <p>EMPLEADOS</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/proveedores')}}">
                            <div class="font-icon-detail" style="color: #8b4513"><i class="pe-7s-car"></i>
                                <p>PROVEEDORES</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/categorias')}}">
                            <div class="font-icon-detail" style="color: #06b7ff"><i class="pe-7s-folder"></i>
                                <p>CATEGORIAS</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/productos')}}">
                            <div class="font-icon-detail" style="color: #1f20ff"><i class="pe-7s-box2"></i>
                                <p>PRODUCTOS</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/compras')}}">
                            <div class="font-icon-detail" style="color: #ff5a35"><i class="pe-7s-cart"></i>
                                <p>COMPRAS</p>
                            </div>
                        </a>
                    </div>


                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/clientes')}}">
                            <div class="font-icon-detail" style="color: #fd37ff"><i class="pe-7s-smile"></i>
                                <p>CLIENTES</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/ventas')}}">
                            <div class="font-icon-detail" style="color: #008000"><i class="pe-7s-piggy"></i>
                                <p>VENTAS</p>
                            </div>
                        </a>
                    </div>
                @elseif(Auth::user() -> tipo == "Compra")
                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/proveedores')}}">
                            <div class="font-icon-detail" style="color: #8b4513"><i class="pe-7s-car"></i>
                                <p>PROVEEDORES</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/productos')}}">
                            <div class="font-icon-detail" style="color: #1f20ff"><i class="pe-7s-box2"></i>
                                <p>PRODUCTOS</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/compras')}}">
                            <div class="font-icon-detail" style="color: #ff5a35"><i class="pe-7s-cart"></i>
                                <p>COMPRAS</p>
                            </div>
                        </a>
                    </div>

                @elseif(Auth::user() -> tipo == "Venta")

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/productos')}}">
                            <div class="font-icon-detail" style="color: #1f20ff"><i class="pe-7s-box2"></i>
                                <p>PRODUCTOS</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/clientes')}}">
                            <div class="font-icon-detail" style="color: #fd37ff"><i class="pe-7s-smile"></i>
                                <p>CLIENTES</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/ventas')}}">
                            <div class="font-icon-detail" style="color: #008000"><i class="pe-7s-piggy"></i>
                                <p>VENTAS</p>
                            </div>
                        </a>
                    </div>
                @else
                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/proveedores')}}">
                            <div class="font-icon-detail" style="color: #8b4513"><i class="pe-7s-car"></i>
                                <p>PROVEEDORES</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/categorias')}}">
                            <div class="font-icon-detail" style="color: #06b7ff"><i class="pe-7s-folder"></i>
                                <p>CATEGORIAS</p>
                            </div>
                        </a>
                    </div>

                    <div class="font-icon-list col-lg-2 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{url('/adm/productos')}}">
                            <div class="font-icon-detail" style="color: #1f20ff"><i class="pe-7s-box2"></i>
                                <p>PRODUCTOS</p>
                            </div>
                        </a>
                    </div>
                @endif



            </div>
        </div>
    </div>


@endsection
