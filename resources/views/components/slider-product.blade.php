<section class="section sectionSlider">
    <div class="tittle"><p>{{$nameSectionSlider}}</p> <a class="verMas" href="catalogo/{{$urlSectionSlider}}">Ver más</a></div>
    <div class="boxProductos">
        <div id="arrowSliderLeft" class="arrowSliderLeft arrow">
            <i class='bx bxs-chevron-left arrowIcon'></i>
        </div>
        <div id="sliderBox" class="sliderBox sliderProductos">
            <div id="slider" class="slider sliderBoxProductos">
                {{$slot}}
            </div>
        </div>
        <div id="arrowSliderRight" class="arrowSliderRight arrow">
            <i class='bx bxs-chevron-right arrowIcon'></i>
        </div>
    </div>
</section>