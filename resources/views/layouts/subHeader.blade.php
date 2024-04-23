{{-- Sub menu --}}

<nav class="menuSecundario">
    <div id="menuHamburger" class="menuHamburger">
        <i class='bx bx-menu iconMenu'></i>
        <input id="inHamburger" type="hidden" value="open">
    </div>
    <div class="listaOption">
{{-- Agreguen un elseif y condicionen el nombre de su modulo con la variable, utilicen las misma estructura de las 'a' para poner sus opciones--}}
        @if ($nameView == "Home" || $nameView == "Catalogo")
            
        {{-- ejemplo
        @elseif ($nameView == "Prueba")
            <a href="#" class="opcionSecundaria">Ropa</a>
        --}}
        @else
            {{-- <p>Parece haber un problema: sin opciones</p> --}}
        @endif
    </div>
    @if ($nameView == "Catalogo")
        <div class="opcionsBoxIcons">
            <div class="layoutViewChange opcionsIcons">
                <i id="flexColumn" onclick="layoutViewChange(true)" class='bx bxs-grid bxMy iconActivate'></i>
                <i id="flexRow" onclick="layoutViewChange(false)" class='bx bx-list-ul bxMy'></i>   
            </div>
        </div>
    @endif
</nav>