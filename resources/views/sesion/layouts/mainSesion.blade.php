<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/globals.css">
    @yield('cssPage')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/sesionStyles/main.css">
    {{--La ruta se pasa desde el controlador que hace uso de esta plantilla --}}
    <title>Ecommerce | {{$nameView}}</title>
</head>
<body>

    <section class="sectionMainPrincipal">
        <div class="container">
            @section('main')
                {{-- Contenido de la pagina --}}
                
            @show

            
            <button id="changeColorButton" class="changeColorButton btn-flotante" type="button" value="oscuro" onclick="changeColor()">
                <i class='bx bx-sun'></i>
            </button>
            
        </div>
        
    </section>

    
    @yield('jsPage')
    <script src="/js/globals.js"></script>
</body>
</html>