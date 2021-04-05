$(document).ready(function () {

    $('.modal__close').click(function () {
        overflowShow();
        $(this).parents('.modal_form').fadeOut();
    })

    $(document).mouseup(function (e) {
        var div = $('.form');
        if (!div.is(e.target) && div.has(e.target).length === 0) {
            $('.modal_form').fadeOut();
            overflowShow();
        }
    });

    function overflowHide() {
        $('html, body').css('overflow', 'hidden');
    }

    function overflowShow() {
        $('html, body').css('overflow', 'visible');
    }

    // Бургер меню
    $('.js-nav__burger').click(function () {
        $(this).parent().toggleClass('active');
    })

    $(document).mouseup(function (e) {
        var $nav = $('.nav');
        if (!$nav.is(e.target) && $nav.has(e.target).length === 0) {
            $nav.removeClass('active');
        }
    });

    var lastScrollTop = 0;
    $(window).scroll(function () {
        var $header = $('.header').outerHeight();
        var st = $(this).scrollTop();
        if (st < lastScrollTop && st >= 0) {
            $('.header').addClass('mobile');
            $('body').css('padding-top', $header);
            $('.nav__body').removeClass('mobile');
        } else {
            $('body').css('padding-top', '0');
            $('.header').removeClass('mobile');
            $('.nav__body').addClass('mobile');
        }
        lastScrollTop = st;
    });

    // Отправка формы
    // $('.form').submit(function (e) {
    //     e.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: "send.php",
    //         data: $(this).serialize(),
    //         success: function () {
    //             $('.modal_form').fadeOut();
    //             overflowShow();
    //         }
    //     })
    // });

    // Маска
    $('.form__field').each(function() {
        if($(this).val() != '') {
            $(this).addClass('form__field_active')
        } else {
            $(this).removeClass('form__field_active')
        }
    })

    $('.form__field').focus(function () {
        $(this).addClass('form__field_active')
    }).blur(function () {
        if ($(this).val() == "") {
            $(this).removeClass('form__field_active')
        }
    })

    // Слайдер
    $('.js-commits__box').owlCarousel({
        loop: true,
        autoHeight: true,
        margin: 40,
        responsive: {
            320: {
                items: 1
            },

            768: {
                items: 2
            },

            1280: {
                items: 3
            }
        }
    });

    // Логика блока question
    $('.question__open').click(function() {
        $(this).parents('.question__item').children('.question__info').stop().slideToggle();
    })

});