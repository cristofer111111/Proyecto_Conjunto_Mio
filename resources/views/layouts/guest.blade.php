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
            <a class="boton botonlogin" href="{{ url('login') }}">Iniciar Sesión</a>
        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <!-- Carrusel de 3 imagenes -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <!--indicadores en la parte de abajo del carrusel-->
        <ol class="carousel-indicators">
            <!--comienza desde 0 -->
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        </ol>
        <!--espacio de la imagenes-->
        <div class="carousel-inner" role="listbox">
             <div class="carousel-item active">
                <!--imagen proxima aplicacion-->
                <img class="d-block w-100" alt="1" src="img/portada2.png">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
            <div class="carousel-item">
                <!--imagen del gif o portada-->
                <img class="d-block w-100" alt="1"  src="img/2.gif">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
            <div class="carousel-item">
                <!--imagen del gif o portada-->
                <img class="d-block w-100" alt="1"  src="img/3.gif">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
            <div class="carousel-item">
                <!-- imagen de consulta-->
                <img class="d-block w-100" alt="1"  src="img/portada3.gif">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>
        </div>
        <!--boton Anterior (es la flecha a la izquierda)-->
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <!--boton Anterior (es la flecha a la derecha)-->
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--paneles de mas informacion-->
    <div class="container">
        <div class="row align-items-start m-3">
            <div class="col-sm-4">
                <div class="card m-3">
                    <!--imagen-->
                    <img src="img/opcion2.jpeg " class="card-img-top" alt="...">
                    <div class="card-body">
                        <!--titulo-->
                        <h5 class="card-title">Celebra el día del Padre</h5>
                        <!--contenido-->
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <!--boton-->
                        <a href="celebracion-dia-padre" class="btn btn-primary">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card m-3">
                    <img src="img/opcion1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Únete a la Campaña</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="consejo-2022" class="btn btn-primary">Ver Mas</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card m-3">
                    <img src="img/opcion3.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Conoce la App</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="conoce-app" class="btn btn-primary">Ver Mas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Contáctenos -->
    <div class="container">
        <div class="row align-items-start m-3">
            <div class="col-sm-6">
                <h2>Mapa</h2>
                <!-- Mapa de google-->
                <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.994144243144!2d-74.11538828591!3d4.595070743845538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f992f8311082b%3A0x540b7afd366626e3!2sSena%20Ceet!5e0!3m2!1ses!2sco!4v1607267976813!5m2!1ses!2sco" width="400" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <!--contenido-->
            <div class="col-sm-6">
                <form id="contactanos" action="{{ route('Contactanos') }}" method="POST">
                    @csrf
                    <!-- formulario del contactenos-->
                    <h2>Contactanos</h2>
                    <div class="form-group">
                        <label id="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label id="correo">Correo Electronico:</label>
                        <input type="email" class="form-control" name="email" placeholder="Correo Electronico" required>
                    </div>
                    <div class="form-group">
                        <label id="asunto">Asunto:</label>
                        <input type="text" class="form-control" name="subject" placeholder="Asunto" required>
                    </div>
                    <div class="form-group">
                        <label id="mensaje" >Mensaje</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                    <button class="botonCrear boton" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <!--Pie de pagina-->
    @include('layouts.components.footer')
    <!--enlaces para el bootstrap, la flecha de regresar de arriba-->
    <script src="{{ url('js/app.js') }}"></script>

</body>

</html>
