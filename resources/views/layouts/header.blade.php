{{-- Plantilla principal con Menu --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/globals.css">
    <link rel="stylesheet" href="/css/headers.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/sesionStyles/lista.css">
    @yield('cssPage')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- El nombre la pagina es pasado por la ruta desde el controlador --}}
    <title>Ecommerce | {{$nameView}}</title>
</head>
<body>
    <header class="menuGeneral">
        <nav class="menuPrincipal">
            <div class="menuRight">
                <i class="logo">
                    
                </i>
                <form method="get" action="{{ route('search') }}" class="boxBuscador">
                    @csrf
                    <button id="buscarLupa" type="button" class="lupa">
                        <i class='bx bx-search'></i>
                    </button>
                    <input type="search" name="searching" class="buscador" id="searching" placeholder="Buscar">
                    <button id="searchBtn" class="btnHidden" type="submit"></button>
                </form>
            </div>
            <div class="menuLeft">
                <button id="changeColorButton" class="changeColorButton" type="button" value="oscuro" onclick="changeColor()">
                    <i class='bx bx-sun'></i>
                </button>
                @if ($nameView != 'shoppingCart')
                    <a href="/shoppingCart" class="changeColorButton">
                        <i class='bx bx-cart'></i>
                    </a>
                @endif
                @if ($nameView != "Home")
                    <a href="/home" class="opcionPrincipal">Home</a>
                @endif

                @guest
                    <a href="{{route('login')}}" class="opcionPrincipal">Iniciar sesión</a>
                    <a href="{{route('register')}}" class="opcionPrincipal">Registrarse</a>
                @else
                <form action="{{route('logOut')}}" method="POST">
                    @csrf
                    <div class="dropdown">
                        <div class="select">
                            <img src="/img/user.png" id="dropdownIcon" class="clikeao" alt="Dropdown Icon">
                            <div class="caret"></div>
                        </div>
                        <ul class="menu">
                            <li><a href="{{route('perfil')}}" class="opcionPrincipal">Ver perfil</a></li>
                            <li><a href="{{route('historialShopping')}}">Pedidos</a></li>
                            <li><a href="#" onclick="this.closest('form').submit()" class="opcionPrincipal">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </form>
                    {{-- <a href="{{route('logOut')}}" class="opcionPrincipal">Cerrar sesión</a> --}}
                @endguest
                
            </div>
        </nav>
        @section('subMenu')
            {{-- El subMenu se agrega por separado, para las vistas que lo requieran, incluirlo desde la vista --}}
        @show
    </header>
    <section class="sectionMainPrincipal">
        @section('main')

            {{-- Contenido de la pagina --}}
        @show
    </section>

    <footer class="footer">
        @section('footer')

        @show
    </footer>
    @yield('jsPage')

    <script src="/js/globals.js"></script>
    <script src="/js/headers.js"></script>
    <script src="/js/sesion/vendedor.js"></script>
    
</body>
</html>