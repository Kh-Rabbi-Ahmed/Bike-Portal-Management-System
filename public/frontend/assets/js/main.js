(function($) {
    "use strict";

    //Preloader
    $(window).on('load', function() {
        $('#preloader').delay(350).fadeOut('slow');
    });

    // WOW Init
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true
    });
    wow.init();

    // AJAX Search
    $.ajaxSetup({ cache: false });
    $('#keyword').on('keyup', function() {
        $('#datafetch').html('');
        $('#datafetch').show();
        var searchField = $('#keyword').val();
        var expression = new RegExp(searchField, "i");
        $.getJSON('data.json', function(data) {
            $.each(data, function(key, value) {
                if (value.name.search(expression) != -1) {
                    $('#datafetch').append('<li class="list-group-item link-class"><a href="' + value.url + '"><img src="' + value.image + '" height="40" width="40" class="img-thumbnail" /> ' + value.name + '</a></li>');
                }
            });
        });

        //  hide a DIV when the user clicks outside of it
        $(document).mouseup(function (e) { 
            if ($(e.target).closest("#datafetch").length 
                        === 0) { 
                $("#datafetch").hide(); 
            } 
        });
    });

    // Header Login
    $('#loginform').on('submit', function(event) {
        event.preventDefault();
        /* Act on the event */
        $('.user-logged-in').show('slow', function() {
            $('.header-profile-login').hide('slow');
        });
    });

    // Banner Carousel
    $(window).on("load", function() {
        $('.banner').show();
    });

    // Mega menu button
    $(function() {
        $('.dropdown-mega-menu-toggle').on('hover', function(event) {
            event.preventDefault();

            const dropdown = $(this).closest('.menu-item');

            if (dropdown.is('.open')) {
                dropdown.removeClass('open');
            } else {
                dropdown.addClass('open');
            }
        });

        $('.mega-menu-content').on('mouseenter', function(event) {
            $(this).closest('.menu-item').addClass('open');
        });

        $('.mega-menu-content').on('mouseleave', function(event) {
            $(this).closest('.menu-item').removeClass('open');
        });
    });

    // AJAX Blog Filter
    $('.blog-filter-item').on('click', function(event) {
        event.preventDefault();

        // After user click on tag, fade out list of posts
        $.ajax({
            url: sayaraPluginAjaxObj.ajaxurl,
            type: 'POST',
            data: {
                action: 'sayara_filter_blog',
                taxonomy: $(this).attr('data-blog-cat')
            },
            success: function(data) {
                $('.blog-items').html(data);
                // $('.product-items').fadeIn();
                $('.blog-items').slick('unslick');
                $('.blog-items').slick({
                    arrows: true,
                    rtl: rtl_slick(),
                    nextArrow: '<i class="fas fa-chevron-right"></i>',
                    prevArrow: '<i class="fas fa-chevron-left"></i>'
                });
            }
        });

    });

    // Show coupon
    $('.showcoupon').on('click', function(event) {
        event.preventDefault();
        $('.checkout_coupon').toggle('slow');
    });


    // blog items
    $('.blog-items').slick({
        arrows: true,
        rtl: rtl_slick(),
        nextArrow: '<i class="fas fa-chevron-right"></i>',
        prevArrow: '<i class="fas fa-chevron-left"></i>'
    });

    // Slick RTL Support
    function rtl_slick() {
        if ($('body').hasClass("rtl")) {
            return true;
        } else {
            return false;
        }
    }

    $('.product-image').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product-image-nav'
    });
    $('.product-image-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.product-image',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true
    });

    // product items
    $('.product-items').slick({
        arrows: true,
        infinite: true,
        rtl: rtl_slick(),
        "slidesToShow": 3,
        "slidesToScroll": 3,
        "responsive": [{
                "breakpoint": 1200,
                "settings": {
                    "slidesToShow": 3,
                    "slidesToScroll": 3
                }
            },
            {
                "breakpoint": 1024,
                "settings": {
                    "slidesToShow": 2,
                    "slidesToScroll": 2
                }
            },
            {
                "breakpoint": 600,
                "settings": {
                    "slidesToShow": 1,
                    "slidesToScroll": 1
                }
            }
        ],
        nextArrow: '<i class="fas fa-chevron-right"></i>',
        prevArrow: '<i class="fas fa-chevron-left"></i>'
    });

    // product items tab
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $('.product-items').slick('setPosition');
    });

    // testimonial
    $('.testimonials').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        rtl: rtl_slick(),
        asNavFor: '.testimonials-nav'
    });

    $('.testimonials-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.testimonials',
        dots: false,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
        rtl: rtl_slick(),
        centerMode: false,
        focusOnSelect: true
    });

    // MagnificPopup ajax view
    $('.ajax-quick-view-popup').magnificPopup({
        type: 'ajax'
    });

    // Departments menu button
    $(function() {
        $('.departments-menu-button').on('click', function(event) {
            event.preventDefault();

            const dropdown = $(this).closest('.departments-container');

            if (dropdown.is('.open')) {
                dropdown.removeClass('open');
            } else {
                dropdown.addClass('open');
            }
        });

        $(document).on('click', function(event) {
            $('.departments-container')
                .not($(event.target).closest('.departments-container'))
                .removeClass('open');
        });
    });

    // Shopping Cart menu button
    $(function() {
        $('.shopping-cart-button').on('click', function(event) {
            event.preventDefault();

            const dropdown = $(this).closest('.shopping-cart-widget');

            if (dropdown.is('.open')) {
                dropdown.removeClass('open');
            } else {
                dropdown.addClass('open');
            }
        });

        $(document).on('click', function(event) {
            $('.shopping-cart-widget')
                .not($(event.target).closest('.shopping-cart-widget'))
                .removeClass('open');
        });
    });

    // My Account menu button
    $(function() {
        $('.my-account-button').on('click', function(event) {
            event.preventDefault();

            const dropdown = $(this).closest('.my-account-widget');

            if (dropdown.is('.open')) {
                dropdown.removeClass('open');
            } else {
                dropdown.addClass('open');
            }
        });

        $(document).on('click', function(event) {
            $('.my-account-widget')
                .not($(event.target).closest('.my-account-widget'))
                .removeClass('open');
        });
    });

    //Navbar Fixed
    $(window).on('scroll', function() {
        if ($(document).scrollTop() > 80) {
            $('.sticky-header,.off-canvas-menu-bar').addClass('fixed-top');
        } else {
            $('.sticky-header,.off-canvas-menu-bar').removeClass('fixed-top');
        }
    });

    // WooCommerce Variations as Radio Buttons
    $(document).on('change', '.variation-radios input', function() {
        $('select[name="' + $(this).attr('name') + '"]').val($(this).val()).trigger('change');
    });

    //Accordion
    $('.sayara-accordion-item:first-child').addClass('active');
    $('.sayara-accordion-item:first-child .collapse').addClass('show');
    $('.collapse').on('shown.bs.collapse', function() {
        $(this).parent().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function() {
        $(this).parent().removeClass('active');
    });

    //Mobile Nav Hide Show
    if ($('.off-canvas-menu').length) {

        var mobileMenuContent = $('.desktop-menu>ul').html();
        $('.off-canvas-menu .navigation').append(mobileMenuContent);

        //Menu Toggle Btn
        $('.mobile-nav-toggler').on('click', function() {
            $('body').addClass('off-canvas-menu-visible');
        });

        //Menu Toggle Btn
        $('.off-canvas-menu .menu-backdrop,.off-canvas-menu .close-btn').on('click', function() {
            $('body').removeClass('off-canvas-menu-visible');
        });
    }

    $('.off-canvas-menu li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
    $('.off-canvas-menu li.menu-item-has-children .dropdown-btn').on('click', function() {
        $(this).prev('ul').slideToggle(500);
    });

    //Back to top
    $(window).on('scroll', function() {
        if ($(this).scrollTop() >= 700) {
            $('#backtotop').fadeIn(500);
        } else {
            $('#backtotop').fadeOut(500);
        }
    });

    $('#backtotop').on('click', function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });

})(jQuery);



// Custom Select
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "sayara-custom-select":*/
x = document.getElementsByClassName("sayara-custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
            /*when an item is clicked, update the original select box,
            and the selected item:*/
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);