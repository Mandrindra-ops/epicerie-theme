document.addEventListener('DOMContentLoaded', function () {
    var button = document.querySelector('.nav-toggle');
    var menu = document.querySelector('.site-nav');

    if (!button || !menu) {
        return;
    }

    button.addEventListener('click', function () {
        var isOpen = button.getAttribute('aria-expanded') === 'true';

        button.setAttribute('aria-expanded', String(!isOpen));
        menu.classList.toggle('is-open', !isOpen);
    });
});
