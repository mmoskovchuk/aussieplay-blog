//COPY CODE
//-------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    function selectText(elementId) {
        var doc = document,
            text = doc.getElementById(elementId),
            range,
            selection;
        if (doc.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(text);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();
            range = document.createRange();
            range.selectNodeContents(text);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }

    $(".copy").click(function () {
        selectText(this.id);
        document.execCommand("copy");
    });
});

//ANIMATE SEARCH
//-------------------------------------------------

var $body = $('body');
var $menu = $('#blog-menu');
var $menuItems = $(document).find('.aussie-casino__blog-menu_ul-block > .menu-item-object-category');
var $searchWrapper = $('.aussie-casino__blog-menu_search');
var $searchFormWrapper = $('.aussie-casino__blog-menu_search');
var $searchBtn = $('#blog-search');
var val_search = $('.aussie-casino__search_result--top span').text();

function displaySearch() {
    if (!$body.hasClass('search-on')) {
        $body.addClass('search-on');
        // Fade out the menu items
        $menu.velocity({
            opacity: 0,
            duration: 195,
            easing: [20]
        });
        $menuItems.velocity({
            opacity: 0,
            scale: 0.70,
            duration: 110,
            easing: [20]
        });
        // Display the search
        $searchWrapper.addClass('search-displayed');
        $searchBtn.velocity({
            opacity: 1,
            duration: 600,
            easing: 'easeOutSine'
        });
        // Change search icon to x
        $searchBtn.html('<img src="/blog/wp-content/themes/aussie-blog/img/close.svg" alt="aussie-casino">');
        $searchFormWrapper.html('<div class="aussie-casino__blog-menu_search-wrap"><form role="search" method="get" id="searchform" class="aussie-casino__blog-menu_search-form"><input class="aussie-casino__blog-menu_search-field" placeholder="Search..." type="text" value="' + val_search + '" name="s" id="s"/></form></div>');

        if ($(document).width() > 1700) {
            $('.search-displayed .aussie-casino__blog-menu_search-field').velocity({
                width: '50%',
                opacity: 1,
                duration: 600,
                easing: 'easeOutSine',
            });
        } else if ($(document).width() > 1440) {
            $('.search-displayed .aussie-casino__blog-menu_search-field').velocity({
                width: '47%',
                opacity: 1,
                duration: 600,
                easing: 'easeOutSine',
            });
        } else if ($(document).width() > 1250) {
            $('.search-displayed .aussie-casino__blog-menu_search-field').velocity({
                width: '40%',
                opacity: 1,
                duration: 600,
                easing: 'easeOutSine',
            });
        }


    } else {
        $body.removeClass('search-on');
        $searchWrapper.removeClass('search-displayed');
        $menu.velocity('reverse');
        $searchBtn.velocity('reverse');
        $menuItems.velocity({
            opacity: 1,
            scale: 1,
            duration: 200,
            easing: [20],
            stagger: 100
        });
        $searchFormWrapper.html('');
        $searchBtn.html('<img src="/blog/wp-content/themes/aussie-blog/img/search.svg" alt="aussie-casino">');
    }

}

$searchBtn.on('click', function () {
    displaySearch();
});

$(document).ready(function () {
    if ($body.hasClass('search')) {
        displaySearch();
    }
});

//SWIPER READ MORE
//-------------------------------------------------

$(document).ready(function () {
    //initialize swiper when document ready
    var mySwiperMoreRead = new Swiper('.swiper-container-read-more', {
        slidesPerView: 'auto',
        spaceBetween: 100,
        loop: true,
        pagination: {
            el: '.swiper-pagination-read-more',
            type: 'fraction',
            clickable: true,
            paginationClickable: true,
            formatFractionCurrent: function (number) {
                switch (number) {
                    case 1:
                        myNum = '01';
                        break;
                    case 2:
                        myNum = '02';
                        break;
                    case 3:
                        myNum = '03';
                        break;
                    case 4:
                        myNum = '04';
                        break;
                    case 5:
                        myNum = '05';
                        break;
                    case 6:
                        myNum = '06';
                        break;
                    case 7:
                        myNum = '07';
                        break;
                    case 8:
                        myNum = '08';
                        break;
                    case 9:
                        myNum = '09';
                        break;
                    default:
                        myNum = number
                }
                return myNum;
            },
            formatFractionTotal: function (number) {
                switch (number) {
                    case 5:
                        myNum = '05';
                        break;
                    case 6:
                        myNum = '06';
                        break;
                    case 7:
                        myNum = '07';
                        break;
                    case 8:
                        myNum = '08';
                        break;
                    case 9:
                        myNum = '09';
                        break;
                    default:
                        myNum = number
                }
                return myNum;
            },
            renderFraction: function (currentClass1, totalClass1) {
                return '<div class="aussie-casino-single__block-right_read-more--pag-wrap"><div class="aussie-casino-single__block-right_read-more--pag-wrap-el"><p class="' + currentClass1 + '"></p></div>' + '<div class="aussie-casino-single__block-right_read-more--pag-wrap-el"><p class="aussie-casino-single__block-right_read-more--fraction-of'
                    + '">/</p></div>' +
                    '<div class="aussie-casino-single__block-right_read-more--pag-wrap-el"><p class="' + totalClass1 + '"></p></div></div>';
            },
        },
        breakpoints: {
            1024: {
                slidesPerView: 'auto',
                spaceBetween: 20,
                loop: true,
            }
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
});

//SWIPER LATEST ARTICLE
//-------------------------------------------------

$(document).ready(function () {
    //initialize swiper when document ready
    var mySwiper = new Swiper('.swiper-container-latest-articles', {
        slidesPerView: 'auto',
        spaceBetween: 150,
        loop: true,
        pagination: {
            el: '.swiper-pagination-latest',
            type: 'fraction',
            clickable: true,
            formatFractionCurrent: function (number) {
                switch (number) {
                    case 1:
                        myNum = '01';
                        break;
                    case 2:
                        myNum = '02';
                        break;
                    case 3:
                        myNum = '03';
                        break;
                    case 4:
                        myNum = '04';
                        break;
                    case 5:
                        myNum = '05';
                        break;
                    case 6:
                        myNum = '06';
                        break;
                    case 7:
                        myNum = '07';
                        break;
                    case 8:
                        myNum = '08';
                        break;
                    case 9:
                        myNum = '09';
                        break;
                    default:
                        myNum = number
                }
                return myNum;
            },
            formatFractionTotal: function (number) {
                switch (number) {
                    case 5:
                        myNum = '05';
                        break;
                    case 6:
                        myNum = '06';
                        break;
                    case 7:
                        myNum = '07';
                        break;
                    case 8:
                        myNum = '08';
                        break;
                    case 9:
                        myNum = '09';
                        break;
                    default:
                        myNum = number
                }
                return myNum;
            },
            renderFraction: function (currentClass, totalClass) {
                return '<div class="aussie-casino__latest-articles_pag-wrap"><div class="aussie-casino__latest-articles_pag-wrap-el"><span class="' + currentClass + '"></span></div>' + '<div class="aussie-casino__latest-articles_pag-wrap-el"><span class="aussie-casino__latest-articles_fraction-of'
                    + '">/</span></div>' +
                    '<div class="aussie-casino__latest-articles_pag-wrap-el"><span class="' + totalClass + '"></span></div></div>';
            }
        },
        breakpoints: {
            768: {
                spaceBetween: 50,
            },
            640: {
                spaceBetween: 50,
            }
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
});


//FILTER WINNING GUIDES
//-------------------------------------------------

//home page winning guides
$(function ($) {
    $('#filter').change(function () {
        var filter = $(this);
        $.ajax({
            url: my_ajax_object.ajax_url, // обработчик
            data: filter.serialize(),
            type: filter.attr('method'),
            beforeSend: function (xhr) {
                /*filter.find('button').text('Загружаю...');*/ // изменяем текст кнопки

            },
            success: function (data) {
                filter.find('button').text('Применить фильтр'); // возвращаеи текст кнопки
                $('#response').html(data);
            }
        });
        return false;
    });
});

$(document).ready(function () {
    $(".aussie-casino__winning-guides select[name=categoryfilter]").val("3").change();

});

//category page winning guides (filter)
$(function ($) {
    $('#filter-category').change(function () {


            var filter = $(this);
            $.ajax({
                url: my_ajax_object.ajax_url, // обработчик
                data: filter.serialize(),
                type: filter.attr('method'),
                beforeSend: function (xhr) {
                    /*filter.find('button').text('Загружаю...');*/ // изменяем текст кнопки

                },
                success: function (data) {
                    filter.find('button').text('Применить фильтр'); // возвращаеи текст кнопки
                    $('#response').html(data);
                }
            });
            return false;

    });
});

$(document).ready(function () {
    $('.label-btn').on('click', function () {
        $('.label-btn').removeClass("active");
        $(this).addClass("active");
    });
    $("#wg-3").click();
    $("[for='wg-3']").click();

});


//FILTER GAMES REVIEWS
//-------------------------------------------------

$(function ($) {
    $('#filtergames').change(function () {
        var filter = $(this);
        $.ajax({
            url: my_ajax_object.ajax_url, // обработчик
            data: filter.serialize(),
            type: filter.attr('method'),
            beforeSend: function (xhr) {
                /*filter.find('button').text('Загружаю...');*/ // изменяем текст кнопки
            },
            success: function (data) {
                filter.find('button').text('Применить фильтр'); // возвращаеи текст кнопки
                $('#responsegames').html(data);
            }
        });
        return false;
    });
});

$(document).ready(function () {
    $(".aussie-casino__games-reviews select[name=categoryfiltergames]").val("4").change();
});

$(document).ready(function () {
    $("#gr-4").click();
    $("[for='gr-4']").click();
});

//FILTER GAMES REVIEWS
//-------------------------------------------------

$(document).ready(function () {
    $("#news-6").click();
    $("[for='news-6']").click();
});

//MOBILE MENU
//-------------------------------------------------

$('.menu-burger, .menu-items').on('click', function () {
    $('.menu-bg, .menu-items, .menu-burger, .menu-burger-icon').toggleClass('fs');
    $('.menu-burger .menu-burger-icon').text() == "☰" ? $('.menu-burger .menu-burger-icon').text('✕') : $('.menu-burger .menu-burger-icon').text('☰');
});


//ANIMATED HEADER
//-------------------------------------------------
(function ($) {
    var fixedItem = $('#blog-menu'),
        animeClass = 'animated',
        minMarginTop;

    if (fixedItem.size()) {

        var scrollTopValue = function () {
            return $(window).scrollTop();
        };

        var addCustomClass = function (cls) {
            fixedItem.addClass(cls);
        };

        var removeCustomClass = function (cls) {
            fixedItem.removeClass(cls);
        };

        var toggleAnimeFunc = function () {
            minMarginTop = fixedItem.height();

            if (scrollTopValue() > 500) {
                addCustomClass(animeClass);
            } else if (scrollTopValue() < 550) {
                removeCustomClass(animeClass);
            }
        };

        $(window).on('scroll', toggleAnimeFunc);
        $(window).on('load', toggleAnimeFunc);
    }

})(jQuery);

//SCROLL TOP BUTTON
//-------------------------------------------------
(function ($) {
    var findWindowHeight = function () {
        return windowHeight = $(window).height();
    };

    var scrollPage = function () {
        $('body, html').animate({
            scrollTop: 0
        }, 800);
    };

    var windowHeight = findWindowHeight();


    $(window).resize(findWindowHeight);

    $('body').on('click', '#btn-top', scrollPage);
})(jQuery);

// FIXED RIGHT SIDEBAR
//-------------------------------------------------

$.fn.extend({
    toggleText: function (a, b) {
        return this.text(this.text() == b ? a : b);
    }
});

function change() {
    var sidebar = document.getElementById("fixed-sidebar");
    sidebar.classList.toggle("active");
    $('.fixed-sidebar__btn_title-1').toggleText('Aussie play', 'Hide');
    $('.fixed-sidebar__btn_title-2').toggleText('Go to', 'Hide');
}

jQuery(function ($) {
    $(document).mouseup(function (e) { // событие клика по веб-документу
        var div = $("#fixed-sidebar"); // тут указываем ID элемента
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
            div.removeClass('active'); // скрываем его
            $('.fixed-sidebar__btn_title-1').toggleText('Aussie play', 'Aussie play');
            $('.fixed-sidebar__btn_title-2').toggleText('Go to', 'Go to');
        }
    });
});

//PREV PAGE
//------------------------------------------------------

function prevPage() {
    window.history.back();
}





