@extends('layouts.principalCliente')
@section('contenido')

<section class="container text-justify">

        <h2>RESEÑA HISTORICA</h2>
        <p class="lead">La empresa INQUIFARMED es una empresa unipersonal a nombre de Mary Loly Montaño Espinoza, inicia sus operaciones el 20 de noviembre de 2013, teniendo ubicación en la Av. Radial 17 ½ sexto anillo N°002, manzano 48 zona oeste. Tal como lo establece ella Matricula de Comercio N° 00271312. Emitida en la ciudad de Santa Cruz de la Sierra de nuestro país Bolivia.</p>
        <p class="lead">Esta es una empresa familiar en la que actualmente trabajan 4 personas.
            INQUIFARMED tiene como objetivo social la comercialización de insumos químicos, farmacéuticos, médicos, alimenticios entre los que destacamos las materias primas de uso alimenticio, farmacéutico, material de laboratorio. También incursiona en el procesamiento y comercialización de suplementos alimenticios.</p>
        <p class="lead">En INQUIFARMED trabajamos arduamente para posesionarnos en el mercado como una empresa reconocida por la producción de suplementos alimenticios así como por la comercialización de material de laboratorio e insumos químicos, esto debido a que va más allá de la simple comercialización brindando asesoría técnica y de salud a nuestros clientes.</p>


</section>



<div class="container marketing">

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 pt-4 text-justify">
            <h2 class="featurette-heading">MISIÓN</h2>
            <p class="lead">INQUIFARMED tiene como misión, satisfacer las necesidades de los consumidores a través de la comercialización de materias primas, reactivos químicos, material de laboratorio, suplementos alimenticios, garantizando la calidad de los mismos y asesorando al cliente en todas sus necesidades.</p>
        </div>
        <div class="col-md-5">
            <img src="{{asset('imagenes/02.jpg')}}" width="100%">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2 pt-4 text-justify">
            <h2 class="featurette-heading">VISIÓN</h2>
            <p class="lead">INQUIFARMED es una empresa que tiene como visión lograr la supremacía en el mercado del sector a través de la captación e incremento de la cartera de clientes.</p>
            <p class="lead">Ser la empresa líder de su ramo en el mercado nacional y llegar a participar en el mercado internacional satisfaciendo las necesidades y exigencias de sus clientes, con producto y servicios de la más alta calidad a precios competitivos, utilizando recursos humanos altamente calificados, los mejores insumos, para lograr ser una empresa altamente rentable.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="{{asset('imagenes/01.jpg')}}" width="100%">
    </div>


    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

    </div>
</div>



@endsection