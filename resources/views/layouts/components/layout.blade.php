<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="icon" type="image/jpg" href="{{ url('img/logoicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ url('css/anuncio.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arimo">
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body>
    <!--Menu Principal-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('Anuncios')}}">
                <img src="{{ url('img/image1.png')}}" alt="" class="d-inline-block align-text-top" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @role('admin')
                    <li class="nav-item"><img src="{{ url('img/menu/hogar.png')}}" alt="" class="imgIcon"><a class="nav-link active" href="{{url('Anuncios')}}">Inicio</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/multitud.png')}}" alt="" class="imgIcon" class="imgIcon"><a class="nav-link" href="{{url('Usuarios/Residentes')}}">Residentes</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/empleado.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Usuarios/Funcionarios')}}">Funcionarios</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/mano.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Pagos')}}">Pagos</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/calendario.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Solicitudes/Admin')}}">Reservas</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/promocion.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Anuncios/create')}}"> Crear Anuncio</a></li>
                    @endrole
                    @role('Vigilante')
                    <li class="nav-item active"><img src="{{ url('img/menu/hogar.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Anuncios')}}">Inicio</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/multitud.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Visitantes')}}">Visitantes</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/multitud.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Visitantes/Parqueadero')}}">Visitantes Parqueadero</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/empleado.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Reportes')}}">Reportes</a></li>
                    @endrole
                    @role('Aseador')
                    <li class="nav-item active"><img src="{{ url('img/menu/hogar.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Anuncios')}}">Inicio</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/empleado.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Reportes')}}">Reportes</a></li>
                    @endrole
                    @role('residente')
                    <li class="nav-item active"><img src="{{ url('img/menu/hogar.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Anuncios')}}">Inicio</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/empleado.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('Solicitudes')}}"> Mis Solicitudes</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/empleado.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('MisPagos')}}">Mis Pagos</a></li>
                    <li class="nav-item active"><img src="{{ url('img/menu/empleado.png')}}" alt="" class="imgIcon"><a class="nav-link" href="{{url('MisReportes')}}">Mis Reportes</a></li>
                    @endrole
                    <li class="nav-item dropdown">
                    <img src="{{ url('img/menu/empleado.png')}}" alt="" class="imgIcon"> <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="javascript:void" onclick="$('#logout-form').submit();">Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                </ul>

            </div>
        </div>
    </nav>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <!--@yield('title')-->
    @yield('content')

    <!--Pie de pagina-->
    <div class="footer-basic">
        <footer>
            <div class="social">
            <a href="https://www.instagram.com/conjunto_mio/"><i class="icon ion-social-instagram"></i></a>
            <a href="#"><i class="icon ion-social-twitter"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100078945763334"><i class="icon ion-social-facebook"></i></a>
            </div>
            <p class="copyright">CONJUNTOMIO © 2022</p>
        </footer>
    </div>
    <!--JS-->
    <script src="{{ url('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
