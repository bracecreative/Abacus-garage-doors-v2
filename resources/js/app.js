if( screen.width < 1024) {

    // Main Nav Toggle
    let nav_toggle = document.querySelector('.site-header .nav-toggle');
    nav_toggle.addEventListener('click', function(e) {
        e.preventDefault();

        nav_toggle.parentElement.querySelector('.nav-menu').classList.toggle('hidden');
    });

    // Submenu Toggle
    let submenu_toggle = document.querySelectorAll('.site-header .nav-wrapper .nav-menu .menu li.menu-item-has-children > a');
    submenu_toggle.forEach((submenu) => {
        submenu.addEventListener('click', function(e) {
            e.preventDefault();

            let submenus = document.querySelectorAll('.site-header .nav-wrapper .nav-menu .menu li.menu-item-has-children .sub-menu');
            submenus.forEach((sub) => {
                sub.classList.remove('open');
                sub.previousElementSibling.classList.remove('open');
            });

            submenu.classList.toggle('open');
            submenu.parentElement.querySelector('.sub-menu').classList.toggle('open');

        });
    });
}

// Scroll Up
let scroll_up = document.querySelector('.scroll-up');
scroll_up.addEventListener('click', function(e) {
    e.preventDefault();

    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Accordion Toggle
let accordions = document.querySelectorAll('.accordion .items .item');
if( accordions.length > 0 ) {

    accordions[0].querySelector('.header').classList.add('open');
    accordions[0].querySelector('.content').classList.remove('hidden');
    accordions[0].querySelector('.content').classList.add('open');

    accordions.forEach((item) => {
        item.querySelector('.header').addEventListener('click', function(e) {
            e.preventDefault();

            accordions.forEach((accordion) => {
                accordion.querySelector('.header').classList.remove('open');
                accordion.querySelector('.content').classList.add('hidden');
                accordion.querySelector('.content').classList.remove('open');
            });

            item.querySelector('.header').classList.add('open');
            item.querySelector('.content').classList.remove('hidden');
            item.querySelector('.content').classList.add('open');
        })
    });
}

// Side Buttons
let side_buttons = document.querySelectorAll('.side-buttons .form-btn');
if( side_buttons.length > 0 ) {
    side_buttons.forEach((button) => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            let footer_forms = document.querySelectorAll('.footer-form');
            footer_forms.forEach((forms) => {
                forms.style.display = "none";
            });

            let form_id = button.href;
                form_id = form_id.split('#')[1];

            let form = document.querySelector('#'+form_id).id;
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }

        });
    });
}

let close_form_modal = document.querySelectorAll('.close-form');
close_form_modal.forEach((form_close) => {
    form_close.addEventListener('click', function(e) {
        e.preventDefault();

        form_close.parentElement.parentElement.style.display = "none";
    });
});

// Gallery Modals
let gallery_images = document.querySelectorAll('.image-wrapper .gallery-modal');
if( gallery_images.length > 0 ) {
    gallery_images.forEach((images) => {
        images.addEventListener('click', function(e) {
            e.preventDefault();

            let gallery_modals = document.querySelectorAll('.gallery-modals .modal-wrapper');
            if( gallery_modals.length > 0 ) {
                gallery_modals.forEach((modal) => {
                    modal.style.display = 'none';
                });
            }

            let image_id = images.getAttribute('data-imgid');
            document.getElementById(image_id).style.display = 'block';
        })
    });

    let gallery_modals = document.querySelectorAll('.gallery-modals .modal-wrapper');
    if( gallery_modals.length > 0 ) {
        gallery_modals.forEach((modal) => {
            modal.addEventListener('click', function(e) {
                modal.style.display = 'none';
            });
        });
    }
}

// Form button links
let links = document.querySelectorAll('a');
if( links.length > 0 ) {
    links.forEach((link) => {
        link.addEventListener('click', function(e) {

            let cta_link = link.href;
            if( cta_link.includes('#footer') ) {
                e.preventDefault();
                cta_link = cta_link.split('#');
                cta_link = cta_link[1];

                let form_id = cta_link.split('_');
                    form_id = form_id[1];

                let form = document.querySelector('#footer-form_'+form_id);
                if( form ) {
                    if (form.style.display === "none") {
                        form.style.display = "block";
                    } else {
                        form.style.display = "none";
                    }
                }
            }
        });
    });
}