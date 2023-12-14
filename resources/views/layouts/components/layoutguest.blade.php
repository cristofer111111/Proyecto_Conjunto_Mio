<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/jpg" href="{{ url('img/logoicon.png') }}">

    <link rel="stylesheet" href="{{ url('css/guestLoginStyles.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

</head>

<body>
    <div id="contenedor" style="width:100%; height:88%;">
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
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        @yield('content')
        <!--JS-->
        <script src="{{ url('js/app.js') }}"></script>
    </div>
    <!--Pie de pagina-->

</body>
<div class="footer-basic">
    <footer>
        <div class="social">
            <a href="#"><i class="icon ion-social-instagram"></i></a>
            <a href="#"><i class="icon ion-social-twitter"></i></a>
            <a href="#"><i class="icon ion-social-facebook"></i></a>
        </div>
        <p class="copyright">CONJUNTOMIO © 2021</p>
    </footer>
</div>

</html>
