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
        <div class=" bg-dark text-white">
            <h1 class=" p-3 mb-3 text-center fs-3">FELIZ DIA DEL PADRE</h1>
        </div>
        <div class="bg-transparent text-dark">PUBLICADO EL: 12 DE JUNIO DEL 2022 A LAS 13:00PM</div>
        <div class="text-center">
            <img src="{{ url('img/padre.png')}}" class="img-fluid" alt="...">

            <div class="p-5 mb-5">
                <p class="lh-lg">
                    La herencia más bella y sorprendente que un padre puede dejar a su hijo, es la formación del carácter y mostrar los pasos a seguir. ¡Feliz día del padre!Gracias papá por no decirme cómo vivir. Tú viviste y me enseñaste con tu ejemplo.Ser un padre es: reír, llorar, sufrir, esperar… Gracias por la oportunidad de tener todos los días un padre como tú. ¡Feliz día del padre!No te lo puse fácil, y aun así nunca dejaste de apoyarme y quererme ¡Gracias por tu compañía, feliz día del padre!La vida no viene con un manual de instrucciones, pero con suerte la mía vino con el mejor papá para guiarme.
                </p>
            </div>
        </div>
    </div>
    <!--Pie de pagina-->
    @include('layouts.components.footer')
    <!--enlaces para el bootstrap, la flecha de regresar de arriba-->
    <script src="{{ url('js/app.js') }}"></script>

</body>

</html>
