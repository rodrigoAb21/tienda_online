@extends('layouts.principalCliente')
@section('contenido')
<section class="container">
    @if(session()->has('flash'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session()->get('flash')}}
    </div>
    @endif
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="container">
                <div id="map" style="width: 100%; height: 500px; background-color: gray"></div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <form class="container" method="post" role="form" action="{{route('mensaje')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input type="text" class="form-control" name="asunto" id="asunto" required>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control" name="mensaje" id="mensaje" rows="9" required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-dark btn-block" >Enviar</button>
            </form>
        </div>
    </div>
</section>
@push('scripts')
<script>
    function initMap() {
        var myLatLng = {lat: -17.8202404, lng: -63.2284749};

        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -17.819342, lng: -63.227016},
            zoom: 17
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });
    }

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPTexUsXgEQhRlOybpOk0AOqjSoAjE_v0&callback=initMap">
</script>
@endpush
@endsection