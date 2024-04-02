// Componente de slider -------------------------------------------------------------------------------------------------------------

const sliderSections = document.querySelectorAll('.sectionSlider');

sliderSections.forEach((section) => {
  const arrowSliderLeft = section.querySelector('.arrowSliderLeft');
  const arrowSliderRight = section.querySelector('.arrowSliderRight');
  const slider = section.querySelector('.slider');
  const sliderBox = section.querySelector('.sliderBox');

  const rooStyles = slider.style;

  const sliderElements = section.querySelectorAll('.card');

  let sliderCounter = 0;

  const DIRECTION = {
    RIGHT: 'RIGHT',
    LEFT: 'LEFT',
  };

  const getTransformValue = () =>
    Number(rooStyles.getPropertyValue('--transformSlider').replace('px', ''));

  const moveSlider = (direction) => {
    const transformValue = getTransformValue();
    if (direction == DIRECTION.LEFT) {
      if (sliderCounter == 0) {
        
      } else {
        rooStyles.setProperty('--transformSlider', `${transformValue + sliderElements[sliderCounter].scrollWidth + 8}px`);
        sliderCounter--;
      }
    } else if (direction == DIRECTION.RIGHT) {
      if (sliderCounter == sliderElements.length - localStorage.getItem('numSlider') || slider.childElementCount < localStorage.getItem('numSlider')) {
        
      } else {
        rooStyles.setProperty('--transformSlider', `${transformValue - sliderElements[sliderCounter].scrollWidth - 8}px`);
        sliderCounter++;
      }
    }
    
  };

  arrowSliderLeft.addEventListener('click', () => moveSlider(DIRECTION.LEFT));
  arrowSliderRight.addEventListener('click', () => moveSlider(DIRECTION.RIGHT));
});

//Termina componente slider -------------------------------------------------------------------------------------------------------------
