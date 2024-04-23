<aside class="asideDesplegable">
    <nav class="navAsideDes">
        <ul class="ulNavAsideDes">
            @if ($nameView == 'Home' || $nameView == 'Catalogo')
                <li>
                    <h2>Inicio</h2>
                    {{--<ul>
                        <li><a href="#">Ofertas del dias</a></li>
                        <li><a href="#">Lo más vendido</a></li>
                        <li><a href="#">Descuentos</a></li>
                    </ul>--}}
                </li>
                <li>
                    <h2>Categorias</h2>
                    @foreach ($categorias as $categoria)  
                        <h3>{{$categoria->nombre}}</h3>
                            <ul>
                                @foreach ($categoria->subcategorias as $subcategoria)
                                    <li><a href="/catalogo/searchCategoria/{{$subcategoria->subcategoria_id}}">{{$subcategoria->nombreSubCategoria}}</a></li>
                                @endforeach                        
                            </ul> 
                    @endforeach
                </li>
                <li>
                    <h2>Perfil</h2>
                    <ul>
                        @guest
                            <li><a href="{{route('login')}}">Iniciar sesión</a></li>
                            <li><a href="{{route('register')}}">Registrarse</a></li>
                        @else
                            <li><a href="{{route('homeShoppingCart')}}">Carrito de Compras</a></li>
                            <li><a href="{{route('perfil')}}">Ver perfil</a></li>
                        @endguest
                    </ul>
                </li>
                <li>
                    <h2>Opcion de prueba Admin</h2>
                    <ul>
                        @auth
                            <li><a href="/adminEcommerce">Admin Ecommerce</a></li>
                            <li><a href="{{route('vendedor')}}">Vendedor</a></li>
                        @endauth
                    </ul>
                </li>
            @elseif ($nameView == 'Historial')
                <li>
                    <h2>Compras</h2>
                    <ul>
                        <li><a href="#">Historial</a></li>
                        <li><a href="#">Otrs opciones</a></li>
                    </ul>
                </li>
            @elseif ($nameView == 'Lista')
                <li>
                    <h2>Opciones</h2>
                    <ul>
                        <li><a href="/adminListaEcommerce/Vendedor">Vendedores</a></li>
                        <li><a href="/adminListaEcommerce/Cliente">Usuarios</a></li>
                        <li><a href="">Reportes</a></li>
                        <li><a href="">Productos</a></li>
                        <li><a href="">Comentarios</a></li>
                        <li><a href="#">Perfil</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
</aside>