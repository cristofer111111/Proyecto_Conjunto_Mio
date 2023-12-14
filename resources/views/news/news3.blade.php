<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--titulo parte superior-->
    <title>CONJUNTOMIO</title>
    <!--icono del logo-->
    <link rel="icon" type="image/jpg" href="img/logoicon.png">
    <!--CSS-->
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!--extension para el tipo de letra-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arimo">
    <!--extension para animacion del boyon de subir y el login-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body>

    <!--boton hacia arriba-->
    <span class="ir-arriba"><img src="img/up-arrow.png" alt=""></span>
    <!--menu solo con inicio sesion-->
    <div class="container-fluid contenedorMenu">
        <!--imagen menu-->
        <div class="col-sm-10">
            <a href="{{ url('/') }}">
                <img src="{{ url('img/image1.png')}}" class="imgLogo" alt="">
            </a>
        </div>
        <!--boton inicio sesion-->
        <div class="col-sm-2 sesion">
            <a class="boton botonlogin" href="{{ url('/') }}">
                Home</a>
        </div>
    </div>
    <div class="bg-light bg-gradient">
        <div class="bg-dark text-white">
            <h1 class=" p-3 mb-3 text-center fs-3">CONOCE LA PAGINA WEB</h1>
        </div>
        <div class="bg-transparent text-dark">PUBLICADO EL: 12 DE JUNIO DEL 2022 A LAS 14:00PM</div>
        <div class="text-center">
            <img src="{{ url('img/APP.png')}}" class="img-fluid" alt="...">
        </div>
        <div class="p-5 mb-5 ">
            <p class="lh-lg">
                Nos alegra anunciar el lanzamiento de nuestra nueva página web www.conjutomio.com, con un diseño fresco y moderno que se alinea con la visión y metodología de nuestra firma. Las nuevas características de nuestra web hacen que la página sea más interactiva y navegable.

                Nuestro equipo es nuestro mayor activo y por este motivo hemos desarrollado un buscador para que puedas acceder a todos los pagos y reservass.

                Como siempre, no dudes en contactar con nosotros en cualquier momento para lo que necesites a través de los distintos formularios de contacto.
        </div>
    </div>
    <!--Pie de pagina-->
    @include('layouts.components.footer')
    <!--enlaces para el bootstrap, la flecha de regresar de arriba-->
    <script src="{{ url('js/app.js') }}"></script>

</body>

</html>
