// BANNER
document.addEventListener('DOMContentLoaded', function () {

    const swiperBanner = new Swiper('.swiper-banner', {
        speed: 700,
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-banner .swiper-button-next',
            prevEl: '.swiper-banner .swiper-button-prev',
        },
        pagination: {
            el: '.swiper-banner, .swiper-pagination',
            clickable: true,
        },
    })


}, false);

document.addEventListener('DOMContentLoaded', function () {
    const swiperTestimonials = new Swiper('.swiper-reviews', {
        speed: 700,
        spaceBetween: 20,
        slidesPerView: 4,
        pagination: {
            el: '.swiper-reviews .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-reviews .swiper-button-next',
            prevEl: '.swiper-reviews .swiper-button-prev',
        },
        breakpoints: {
            1200: {
                slidesPerView: 4,
            },
            900: {
                slidesPerView: 3,
            },
            600: {
                slidesPerView: 2,
            },
            0: {
                slidesPerView: 1,
            }
        }
    });
}, false);

// GALLERY

var $grid = $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    percentPosition: true,
    gutter: 20,
    horizontalOrder: true
});

$grid.imagesLoaded().progress(function () {
    $grid.masonry('layout');
});


// pop-up
$(function () {
    $('.magnific-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 2]
        },
        appendTo: '.gallery-wrap',
    });
});
// pop-up-inline-video
$(function () {
    $('.magnific-iframe').magnificPopup({
        type: 'iframe',
        iframe: {
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: 'https://www.youtube.com/embed/%id%?autoplay=1&rel=0'
                }
            }
        }
    });
});


// MODAL window

$(function () {
    $('.open-modal-form').magnificPopup({
        type: 'inline',
        midClick: true,
        removalDelay: 300,
        mainClass: 'mfp-fade'
    });
});

// fixed btn scroll
$(function () {
    var btn = $('#scrollToTopBtn');

    $(window).scroll(function () {
        if ($(window).scrollTop() > 1500) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 },
            {
                duration: 1000
            }, '700');
    });
});
// faq
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const item = question.closest('.faq-item');
        item.classList.toggle('open');
    });
});


//hamburger-menu 
document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    // клик по гамбургеру — открываем/закрываем меню
    hamburger.addEventListener('click', (e) => {
        e.stopPropagation();
        hamburger.classList.toggle('hamburger--active');
        navMenu.classList.toggle('active');

        const icon = hamburger.querySelector('i');
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
    });

    document.addEventListener('click', (e) => {
        if (
            navMenu.classList.contains('active') &&
            !navMenu.contains(e.target) &&
            !hamburger.contains(e.target)
        ) {
            navMenu.classList.remove('active');
            hamburger.classList.remove('hamburger--active');

            const icon = hamburger.querySelector('i');
            icon.classList.add('fa-bars');
            icon.classList.remove('fa-times');
        }
    });
});


$(function () {
    $('.nav-list-submenu--hover').hide();

    $('.nav-list-item-has-children').on('click', '> a, .open-submenu', function (e) {
        e.preventDefault();
        e.stopPropagation();

        const $li = $(this).closest('.nav-list-item-has-children');
        const $submenu = $li.find('.nav-list-submenu--hover').first();

        if ($submenu.hasClass('is-active')) {
            $submenu
                .removeClass('is-active')
                .slideUp(0);
            $li.removeClass('active');
        } else {
            $('.nav-list-submenu--hover.is-active')
                .removeClass('is-active')
                .slideUp(0)
                .closest('.nav-list-item-has-children')
                .removeClass('active');

            $submenu
                .addClass('is-active')
                .slideDown(0);
            $li.addClass('active');
        }
    })
        .on('mouseleave', function () {
            const $li = $(this);
            if ($li.hasClass('active')) {
                $li.removeClass('active')
                    .children('.nav-list-submenu--hover')
                    .slideUp(0);
            }
        });

    $(document).on('click', function () {
        $('.nav-list-submenu--hover.is-active')
            .removeClass('is-active')
            .slideUp(100)
            .closest('.nav-list-item-has-children')
            .removeClass('active');
    });
});





document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('commentform');
    const emailInput = document.getElementById('email');
    const nameInput = document.getElementById('author');
    const commentTextarea = document.getElementById('comment');

    form.addEventListener('submit', function (e) {
        // Проверка email
        if (!emailInput.checkValidity()) {
            emailInput.reportValidity(); // Показывает встроенный tooltip
            e.preventDefault();
            return;
        }
        // Проверка имени
        if (!nameInput.checkValidity()) {
            nameInput.reportValidity();
            e.preventDefault();
            return;
        }
        // Проверка текста комментария
        if (!commentTextarea.checkValidity()) {
            commentTextarea.reportValidity();
            e.preventDefault();
            return;
        }
    });
});