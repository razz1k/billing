require('./bootstrap');

document.addEventListener("DOMContentLoaded", function () {
  const body = document.querySelector('body'),
    nav = document.querySelector('nav.navbar'),
    colorModeButton = document.querySelector('button.color-mode__button'),
    colorModeIcon = colorModeButton.querySelector('.color-mode__icon');

  let cookie = document.cookie,
    endDate = new Date();

  endDate.setFullYear(endDate.getFullYear() + 10);

  if (cookie == null) {
    setCookie(currentTheme());
  }
  if (cookieTheme() !== currentTheme()) {
    setColorMode();
  }

  colorModeButton.addEventListener('click', ev => {
    ev.preventDefault();
    ev.stopPropagation();

    setCookie(cookieTheme());
    setColorMode();
  });

  function currentTheme() {
    let theme = colorModeButton.attributes.getNamedItem('data-current-theme').value;
    return theme;
  }

  function cookieTheme() {
    return document.cookie.match(/theme=dark/i) ? 'dark' : 'light';
  }

  function setColorMode() {
    body.classList.toggle('dark-theme');
    nav.classList.toggle('navbar-light');
    nav.classList.toggle('navbar-dark');
    colorModeIcon.classList.toggle('text-dark');
    colorModeIcon.classList.toggle('text-light');
  }

  function setCookie($color) {
    document.cookie = 'theme=' + ($color == 'light' ? 'dark' : 'light') +
      '; path=/' +
      '; Expires=' + endDate + ';'
  }
})
