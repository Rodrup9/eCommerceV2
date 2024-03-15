<aside class="asideDesplegable">
    <nav class="navAsideDes">
        <ul class="ulNavAsideDes">
            @if ($nameView == 'Home' || $nameView == 'Catalogo')
                <li>
                    <h2>Inicio</h2>
                    <ul>
                        <li><a href="#">Ofertas del dias</a></li>
                        <li><a href="#">Lo más vendido</a></li>
                        <li><a href="#">Descuentos</a></li>
                    </ul>
                </li>
                <li>
                    <h2>Categorias</h2>
                    <ul>
                        <li><a href="#">Tecnologia</a></li>
                        <li><a href="#">Hogar</a></li>
                        <li><a href="#">Accesorios PC</a></li>
                        <li><a href="#">gamming</a></li>
                        <li><a href="#">Electrodomesticos</a></li>
                        <li><a href="#">Sala de estar</a></li>
                        <li><a href="#">Arte</a></li>
                        <li><a href="#">Ropa</a></li>
                    </ul>
                </li>
                <li>
                    <h2>Perfil</h2>
                    <ul>
                        <li><a href="#">Iniciar sesión</a></li>
                        <li><a href="#">Registrarse</a></li>
                        <li><a href="{{route('homeShoppingCart')}}">Carrito de Compras</a></li>
                    </ul>
                </li>
                <li>
                    <h2>Opcion de prueba Admin</h2>
                    <ul>
                        <li><a href="/adminEcommerce">Admin Ecommerce</a></li>
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
                        <li><a href="/adminListaEcommerce/vendedores">Vendedores</a></li>
                        <li><a href="/adminListaEcommerce/usuarios">Usuarios</a></li>
                        <li><a href="/adminListaEcommerce/reportes">Reportes</a></li>
                        <li><a href="/adminListaEcommerce/productos">Productos</a></li>
                        <li><a href="/adminListaEcommerce/comentarios">Comentarios</a></li>
                        <li><a href="#">Perfil</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
</aside>