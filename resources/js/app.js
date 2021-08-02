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
        document.cookie = 'theme=' + (currentTheme() == 'light' ? 'light' : 'dark') +
            '; Expires=' + endDate + ';'
    }
    if (cookieTheme() !== currentTheme()) {
        setColorMode();
    }

    colorModeButton.addEventListener('click', ev => {
        ev.preventDefault();
        ev.stopPropagation();

        document.cookie = 'theme=' + (cookieTheme() == 'light' ? 'dark' : 'light') +
            '; Expires=' + endDate + ';'

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
        body.classList.toggle('bg-AquaIsland');
        nav.classList.toggle('navbar-light');
        nav.classList.toggle('navbar-dark');
        colorModeIcon.classList.toggle('text-dark');
        colorModeIcon.classList.toggle('text-light');
    }
})
