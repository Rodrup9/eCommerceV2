@extends('layouts.header')

@section('cssPage')
    <link rel="stylesheet" href="/css/sesionStyles/vendedor.css">
@endsection

@section('main')
    <section class="contact-form" id="vamos">
        <h1 class="heading">Vuelvete vendedor</h1>
        <p class="para">Ofrece a todos tus clientes seguridad y confianza, proporcionando información de tu tienda.</p>

        <div class="contactForm">
            <form action="{{ route('convencion') }}" method="POST" class="form" id="form">

                @csrf

                <h1 class="sub-heading">Registra tu tienda</h1>
                <p class="para para2">Ayudanos a saber más de ti</p>

                @foreach ($errors->get('tienda') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
                <input type="text" class="input" name="tienda" placeholder="Nombre de su tienda" value="{{old('tienda')}}">

                @foreach ($errors->get('correo') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
                <input type="email" class="input" name="correo" placeholder="Correo electrónico de su tienda" value="{{old('correo')}}">

                @foreach ($errors->get('telefono') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
                <input type="tel" class="input" name="telefono" placeholder="Numero de teléfono" value="{{old('telefono')}}">

                @foreach ($errors->get('descripcion') as $item)
                    <span class="alert">*{{ $item }}</span>
                    <br>
                @endforeach
                <textarea class="input" cols="30" rows="5" name="descripcion" placeholder="Descripcion de su tienda"></textarea>


                <div class="pac-card" id="pac-card">
                    <div>
                        <div id="title">Encuentra tu ubicación</div>
                        <div id="type-selector" class="pac-controls">
                            <input type="radio" name="type" id="changetype-all" checked="checked" />
                            <label for="changetype-all">Todos</label>

                            <input type="radio" name="type" id="changetype-establishment" />
                            <label for="changetype-establishment">Establecimientos</label>

                            <input type="radio" name="type" id="changetype-address" />
                            <label for="changetype-address">Direcciónes</label>

                            <input type="radio" name="type" id="changetype-geocode" />
                            <label for="changetype-geocode">Geocodigos</label>

                            <input type="radio" name="type" id="changetype-cities" />
                            <label for="changetype-cities">Ciudades</label>

                            <input type="radio" name="type" id="changetype-regions" />
                            <label for="changetype-regions">Regiones</label>
                        </div>
                        <br>
                        <div id="strict-bounds-selector" class="pac-controls">
                            <input type="checkbox" id="use-location-bias" value="" checked />
                            <label for="use-location-bias">Sesgo para mapear la vista</label>

                            <input type="checkbox" id="use-strict-bounds" value="" />
                            <label for="use-strict-bounds">Límites estrictos</label>
                        </div>
                    </div>
                    <div id="pac-container">
                        <input id="pac-input" name="direccion" type="text" placeholder="Enter a location" value="{{old('direccion')}}"/>
                        @foreach ($errors->get('direccion') as $item)
                            <span class="alert">*{{ $item }}</span>
                            <br>
                        @endforeach
                    </div>
                </div>

                <div class="map-container">
                    <div id="map"></div>
                    <div id="infowindow-content">
                        <span id="place-name" class="title"></span><br>
                        <span id="place-address"></span>
                    </div>
                </div>

                <input type="submit" class="input submit" value="Send Message">
            </form>
        </div>
    </section>
@endsection


@section('jsPage')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script type="module" src="js/sesion/map.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-2-eXlAtZWWQkr8eTYgoSo9m0huIy2pY&callback=initMap&libraries=places&v=weekly"
        defer></script>
@endsection
