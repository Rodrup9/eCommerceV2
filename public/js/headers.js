const direction = {
    open: {
        displayAside: 'none',
        widhtComponentSlider: '1335px',
        widhtBoxCards: '1197px',
        /*transformAside: '0',*/
    },
    close: {
        displayAside: 'flex',
        widhtComponentSlider: '1047px',
        widhtBoxCards: '894px',
        /*transformAside: '1',*/
    },
  };
  
  const menu = document.getElementById('menuHamburger');
  const inHamburger = document.getElementById('inHamburger');
  
  menu.addEventListener('click', () => {
    let currentDirection = localStorage.getItem('aside');
    const nextDirection = currentDirection === 'open' ? 'close' : 'open';
  
    Object.entries(direction[nextDirection]).forEach(([property, value]) => {
      document.documentElement.style.setProperty(`--${property}`, value);
    });
    if (localStorage.getItem('aside') === 'close'){
      localStorage.setItem('numSlider', 4)
    }else{
      localStorage.setItem('numSlider', 3)
    }
  
    localStorage.setItem('aside', nextDirection)
  });

  if (!localStorage.getItem('aside')){
    localStorage.setItem('numSlider', 4)
    localStorage.setItem('aside', 'close')
  }else{
    Object.entries(direction[localStorage.getItem('aside')]).forEach(([property, value]) => {
      document.documentElement.style.setProperty(`--${property}`, value);
    });
    if (localStorage.getItem('aside') === 'close'){
      localStorage.setItem('numSlider', 3)
    }else{
      localStorage.setItem('numSlider', 4)
    }
  }

const searching = document.getElementById('searching');
const search = document.getElementById('search');

