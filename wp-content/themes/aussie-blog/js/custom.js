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
        $searchBtn.html('<img src="./wp-content/themes/aussie-blog/img/close.svg" alt="aussie-casino">');
        $searchFormWrapper.html('<div class="aussie-casino__blog-menu_search-wrap"><form class="aussie-casino__blog-menu_search-form"><input class="aussie-casino__blog-menu_search-field" placeholder="Search..." type="text" /></form></div>');
        $('.search-displayed .aussie-casino__blog-menu_search-field').velocity({
            width: '940px',
            opacity: 1,
            duration: 600,
            easing: 'easeOutSine',
        });

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
        $searchBtn.html('<img src="./wp-content/themes/aussie-blog/img/search.svg" alt="aussie-casino">');
    }

}

$searchBtn.on('click', function () {
    displaySearch();
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
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
});

//FILTER WINNING GUIDES
//-------------------------------------------------

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
    $(".aussie-casino__winning-guides select[name=categoryfilter]").val("16").change();
});

//FILTER GAMES REVIEWS
//-------------------------------------------------

$(function ($) {
    $('#filtergames').change(function () {
        var filter = $(this);
        $.ajax({
            url: my_ajax_object_2.ajax_url_2, // обработчик
            data: filter.serialize(),
            type: filter.attr('method'),
            beforeSend: function (xhr) {
                /*filter.find('button').text('Загружаю...');*/ // изменяем текст кнопки
            },
            success: function (data) {
                filter.find('button').text('Применить фильтр'); // возвращаеи текст кнопки
                $('#responsegames').html(data);
                console.log('go1');
            }
        });
        return false;
    });
});

$(document).ready(function () {
    $(".aussie-casino__games-reviews select[name=categoryfiltergames]").val("23").change();
});





