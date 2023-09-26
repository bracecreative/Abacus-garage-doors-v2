if( screen.width < 1024) {

    let nav_toggle = document.querySelector('.site-header .nav-toggle');
    nav_toggle.addEventListener('click', function(e) {
        e.preventDefault();

        nav_toggle.parentElement.querySelector('.nav-menu').classList.toggle('hidden');
    });

    let submenu_toggle = document.querySelectorAll('.site-header .nav-wrapper .nav-menu .menu li.menu-item-has-children > a');
    submenu_toggle.forEach((submenu) => {
        submenu.addEventListener('click', function(e) {
            e.preventDefault();

            let submenus = document.querySelectorAll('.site-header .nav-wrapper .nav-menu .menu li.menu-item-has-children .sub-menu');
            submenus.forEach((sub) => {
                sub.classList.remove('open');
                sub.parentElement.classList.remove('open');
            });

            submenu.classList.toggle('open');
            submenu.parentElement.querySelector('.sub-menu').classList.toggle('open');
        });
    });
}