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
    let currentDirection = inHamburger.value;
    const nextDirection = currentDirection === 'open' ? 'close' : 'open';
  
    Object.entries(direction[nextDirection]).forEach(([property, value]) => {
      document.documentElement.style.setProperty(`--${property}`, value);
    });
  
    inHamburger.value = nextDirection;
  });