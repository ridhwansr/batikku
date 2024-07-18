document.addEventListener('DOMContentLoaded', function () {
    const hamburgerIcon = document.querySelector('.hamburger-menu');
    const menuItems = document.querySelector('header nav ul');
    const navLogin = document.querySelector('#nav-login');

    hamburgerIcon.addEventListener('click', function () {
        menuItems.classList.toggle('active');
        navLogin.classList.remove('login');
        navLogin.classList.remove('logout');
    });

    document.addEventListener('click', function (event) {
        const isClickInside = hamburgerIcon.contains(event.target) || menuItems.contains(event.target);

        if (!isClickInside) {
            menuItems.classList.remove('active');
            navLogin.classList.toggle('login');
            navLogin.classList.toggle('logout');
        }
    });
});
