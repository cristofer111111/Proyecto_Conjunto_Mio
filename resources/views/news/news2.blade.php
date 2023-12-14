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
            <img src="{{ url('img/image1.png')}}" class="imgLogo" alt="">
        </div>
        <!--boton inicio sesion-->
        <div class="col-sm-2 sesion">
            <a href="{{ url('login') }}">
                <button class="boton">Iniciar Sesión</button></a>
        </div>
    </div>
    <div class="bg-light bg-gradient">
    <div class=" bg-dark text-white">
    <h1 class=" p-3 mb-3 text-center fs-3">UNETE AL CONSEJO</h1>
    </div>
    <div class="bg-transparent text-dark">PUBLICADO EL: 12 DE JUNIO DEL 2022 A LAS 11:00AM</div>
    <div class="text-center">
        <img src="{{ url('img/CONCEJO.png')}}" class="img-fluid" alt="...">
</div>
        <div class="p-5 mb-5 ">
            <p class="lh-lg">
                El consejo de administración es un órgano de control generalmente constituido en las propiedades horizontales o copropiedades. Este comité tiene como finalidad ejercer funciones de intermediario entre los copropietarios y el administrador.

Es fundamental señalar que no es obligatorio constituir este órgano en todos los edificios o conjuntos bajo el Régimen de Propiedad Horizontal. En los exclusivamente residenciales es potestativo de los copropietarios.

Sin embargo, en aquellos de uso comercial o mixto, con más de 30 bienes privados sí es de obligatorio cumplimiento. Cabe destacar, que para este caso no se deben tomar en cuenta los parqueaderos ni depósitos.

En aquellas propiedades de uso comercial o mixto, pero con menos de 30 bienes privados su constitución, es voluntaria o potestativa.

A pesar de lo descrito, en los estatutos de un edificio o conjunto residencial es posible establecer la constitución obligatoria de esta figura. Al menos, hasta que se haga una reforma estatutaria y se elimine su obligatoriedad.
            </p>
        </div>
    </div>
    <!--Pie de pagina-->
    @include('layouts.components.footer')
    <!--enlaces para el bootstrap, la flecha de regresar de arriba-->
    <script src="{{ url('js/app.js') }}"></script>

</body>

</html>
