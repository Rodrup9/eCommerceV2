
const colorThemes = {
    oscuro: {
        colorHeader: '#262626',
        colorSubHeader: '#474747',
        colorElements: '#474747',
        colorFondo:' #343532',
        fuenteHeader: '#ffffff',
        fuenteSubHeader: '#ffffff',
        fuenteElements:' #ffffff',
        hoverHeader: '#d99923',
        hoverSubHeader:'',
        hoverElements:' #d99923',
        hoverIconFondo: '#383936',
        boxShadowSubmenu: '0 0 0 transparent',
        borderCard: '1px solid transparent',
        verde: '#24c32e',
        formularioBox: '#474747',
        formularioBoxShadow: '#D9992340',
    },
    claro: {
        colorHeader: '#d99923',
        colorSubHeader: '#ffffff',
        colorElements: '#ffffff',
        colorFondo:' #e7e7e7',
        fuenteHeader: '#ffffff',
        fuenteSubHeader: '#0000000',
        fuenteElements:' #0000000',
        hoverHeader: '#3B1C0D',
        hoverSubHeader:'#d99923',
        hoverElements:' #d99923',
        hoverIconFondo: '#d1d1d1',
        boxShadowSubmenu: '2px 2px 5px #d1d1d1',
        borderCard: '1px solid #e7e7e7',
        verde: '#167f1d',
        formularioBox: '#D99923',
        formularioBoxShadow: '#32323340',
    },
};
  
  const button = document.getElementById('changeColorButton');
  
  button.addEventListener('click', () => {
      const currentTheme = localStorage.getItem('theme');
      const nextTheme = currentTheme === 'oscuro' ? 'claro' : 'oscuro';
    
      Object.entries(colorThemes[nextTheme]).forEach(([property, value]) => {
          document.documentElement.style.setProperty(`--${property}`, value);
      });
      button.innerHTML = '';
      if(currentTheme == 'claro'){
          button.innerHTML = `<i class='bx bx-sun'></i>`;
      }else{
          button.innerHTML = `<i class='bx bx-moon'></i>`;
      }
      localStorage.setItem('theme', nextTheme)
  });

if (!localStorage.getItem('theme')){
    localStorage.setItem('theme', 'oscuro')
}else{
    Object.entries(colorThemes[localStorage.getItem('theme')]).forEach(([property, value]) => {
        document.documentElement.style.setProperty(`--${property}`, value);
    });
}

