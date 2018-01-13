@extends('layouts.principalCliente')
@section('contenido')

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('imagenes/img1.jpg')}}">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('imagenes/img2.jpg')}}">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('imagenes/img3.jpg')}}">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('imagenes/img4.jpg')}}">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <img src="{{asset('imagenes/index2.jpg')}}" width="100%" align="middle">
</div>
<hr>
<section class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <h3 class="mt-5">Nos enfocamos en distribuir productos químicos que ofrezcan verdaderas soluciones a problemas cotidianos</h3>
            <p class="lead">Tenemos como objetivo social la comercialización de insumos químicos, farmacéuticos, médicos, alimenticios entre los que destacamos las materias primas de uso alimenticio, farmacéutico, material de laboratorio.
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <img src="{{asset('imagenes/index1.jpg')}}" width="100%">
        </div>
    </div>
</section>

@endsection