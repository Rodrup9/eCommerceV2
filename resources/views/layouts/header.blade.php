{{-- Plantilla principal con Menu --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/globals.css">
    <link rel="stylesheet" href="/css/headers.css">
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
                <div class="boxBuscador">
                    <button id="buscarLupa" type="button" class="lupa">
                        <i class='bx bx-search'></i>
                    </button>
                    <input type="search" name="" class="buscador" id="" placeholder="Buscar">
                </div>
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
                <a href="{{route('login')}}" class="opcionPrincipal">Iniciar sesión</a>
                <a href="{{route('register')}}" class="opcionPrincipal">Registrarse</a>
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
    @yield('jsPage')

    <script src="/js/globals.js"></script>
    <script src="/js/headers.js"></script>
    
</body>
</html>