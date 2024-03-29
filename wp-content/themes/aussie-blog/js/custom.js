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
        $searchFormWrapper.html('<div class="aussie-casino__blog-menu_search-wrap"><form role="search" method="get" id="searchform" class="aussie-casino__blog-menu_search-form"><input class="aussie-casino__blog-menu_search-field" maxlength="80" placeholder="Search..." type="text" value="' + val_search + '" name="s" id="s"/></form></div>');

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
        $menu.velocity({
            opacity: 1,
        });
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

//FILTER Aussie Explores (home page)
//-------------------------------------------------

$(function ($) {
    $('#filter').change(function () {
        var filter = $(this);
        $.ajax({
            url: my_ajax_object.ajax_url, // обработчик
            data: filter.serialize(),
            type: filter.attr('method'),
            beforeSend: function (xhr) {
                $('#response').text('Loading...'); // изменяем текст кнопки

            },
            success: function (data) {
                $('#response').html(data);
            }
        });
        return false;
    });
});

$(document).ready(function () {
    $(".aussie-casino__winning-guides select[name=categoryfilter]").val("3").change();

});

//CATEGORY PAGE
//-------------------------------------------------
$(function ($) {
    $('#filter-category').change(function () {
        var filter = $(this);
        $.ajax({
            url: my_ajax_object.ajax_url, // обработчик
            data: filter.serialize(),
            type: filter.attr('method'),
            beforeSend: function (xhr) {
                $('#response').text('Loading...'); // изменяем текст

            },
            success: function (data) {
                $('#response').html(data);

                $('input[name=incategorysort]').attr('checked',false).removeClass('active');
                $('.incategorysort-label').removeClass('active');
                $('.aussie-casino__category_sortby .aussie-casino__category_form-item').removeClass('active');

                $('#date').change(function () {
                    //sort by date
                    $(".aussie-casino__winning-guides_post--item").sort(function (a, b) {
                        return new Date($(a).attr("data-filter-date")) - new Date($(b).attr("data-filter-date"));
                    }).each(function () {
                        $('#response').prepend(this);
                    }).each(function (i) {
                        if (i % 3 === 0) {
                            $(".aussie-casino__winning-guides_post--item").slice(i, i + 3).wrapAll('<div class="aussie-casino__category_result--wrap"/>');
                        }
                    });
                    $(".aussie-casino__category_result--wrap").each(function () {
                        if ($.trim($(this).text()) == "") {
                            $(this).remove();
                        }
                    });
                    loadMore();
                });

                $('#popularity').change(function () {
                    //sort by popularity
                    $(".aussie-casino__winning-guides_post--item").sort(function (a, b) {
                        return ($(a).attr("data-popularity")) > ($(b).attr("data-popularity")) ? 1 : -1;
                    }).each(function () {
                        $('#response').prepend(this);
                    }).each(function (i) {
                        if (i % 3 === 0) {
                            $(".aussie-casino__winning-guides_post--item").slice(i, i + 3).wrapAll('<div class="aussie-casino__category_result--wrap"/>');
                        }
                    });

                    $(".aussie-casino__category_result--wrap").each(function () {
                        if ($.trim($(this).text()) == "") {
                            $(this).remove();
                        }
                    });

                    loadMore();

                });

                $('#most-rated').change(function () {
                    //sort by most rated
                    $(".aussie-casino__winning-guides_post--item").sort(function (a, b) {
                        return ($(a).attr("data-rating")) > ($(b).attr("data-rating")) ? 1 : -1;
                    }).each(function () {
                        $('#response').prepend(this);
                    }).each(function (i) {
                        if (i % 3 === 0) {
                            $(".aussie-casino__winning-guides_post--item").slice(i, i + 3).wrapAll('<div class="aussie-casino__category_result--wrap"/>');
                        }
                    });

                    $(".aussie-casino__category_result--wrap").each(function () {
                        if ($.trim($(this).text()) == "") {
                            $(this).remove();
                        }
                    });

                    loadMore();

                });

                function loadMore() {
                    var wrap_result = $('.aussie-casino__category_result--wrap').length;
                    if (wrap_result >= 2) {
                        $("#response>:not(:eq(0))").hide();
                    }

                    size_li = $("#response .aussie-casino__category_result--wrap").size();
                    var x = 3;
                    $('#response .aussie-casino__category_result--wrap:lt(' + x + ')').show();
                    if ($('#response .aussie-casino__category_result--wrap').html() !== undefined) {
                        $('#more_posts').click(function () {

                            x = (x + 1 <= size_li) ? x + 1 : size_li;
                            $('#response .aussie-casino__category_result--wrap:lt(' + x + ')').show();

                            if ($('.aussie-casino__category_result--wrap:last-child').is(':visible')) {
                                $('#more_posts').hide();
                            } else {
                                $('#more_posts').show();
                            }

                        });
                    } else {
                        $('#more_posts').hide();
                        $('.aussie-casino__category_sort-post--wrap').html('Articles not found');
                    }
                    if ($('#response .aussie-casino__category_result--wrap').html() !== undefined) {
                        if ($('.aussie-casino__category_result--wrap:last-child').is(':visible')) {
                            $('#more_posts').hide();
                        } else {
                            $('#more_posts').show();
                        }
                    }
                }

                loadMore();


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

    $('.incategorysort-label').on('click', function () {
        $('.incategorysort-label, .aussie-casino__category_sortby .aussie-casino__category_form-item').removeClass("active");
        $(this,'.aussie-casino__category_sortby .aussie-casino__category_form-item').addClass("active");
    });

    $('.aussie-casino__category_sortby .aussie-casino__category_form-item').on('click', function () {
        $('.aussie-casino__category_sortby .aussie-casino__category_form-item').removeClass("active");
        $(this).addClass("active");
    });

    $('.aussie-casino__category_form-item--wrap .aussie-casino__category_form-item').on('click', function () {
        $('.aussie-casino__category_form-item--wrap .aussie-casino__category_form-item').removeClass("active");
        $(this).addClass("active");
    });

});


//FILTER Games and Promotions (home page)
//-------------------------------------------------

$(function ($) {
    $('#filtergames').change(function () {
        var filter = $(this);
        $.ajax({
            url: my_ajax_object.ajax_url, // обработчик
            data: filter.serialize(),
            type: filter.attr('method'),
            beforeSend: function (xhr) {
                $('#responsegames').text('Loading...'); // изменяем текст
            },
            success: function (data) {
                $('#responsegames').html(data);
            }
        });
        return false;
    });

});

$(document).ready(function () {
    $(".aussie-casino__games-reviews select[name=categoryfiltergames]").val("4").change();
});

//FILTER ALL REVIEWS
//-------------------------------------------------

$(document).ready(function () {
    $(".all-reviews").click();
});

//MOBILE MENU
//-------------------------------------------------

$('#toggle').click(function () {
    $(this).toggleClass('active');
    $('#overlay').toggleClass('open');
    $('.aussie-casino__blog-menu-mobile_wrap-right').toggleClass('active');
});

$(function () {
    $('.overlay-menu ul').append($('.aussie-casino__blog-menu-mobile_search'));
});

//ANIMATED HEADER
//-------------------------------------------------
(function ($) {
    var fixedItem = $('#blog-menu-wrap'),
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


    if ($(document).width() >= 1250) {

        var fixedItemMob = $('#blog-menu-mobile'),
            animeClassMob = 'animated',
            minMarginTopMob;

        if (fixedItemMob.size()) {

            var scrollTopValueMob = function () {
                return $(window).scrollTop();
            };

            var addCustomClassMob = function (cls) {
                fixedItemMob.addClass(cls);
            };

            var removeCustomClassMob = function (cls) {
                fixedItemMob.removeClass(cls);
            };

            var toggleAnimeFuncMob = function () {
                minMarginTopMob = fixedItemMob.height();

                if (scrollTopValueMob() > 475) {
                    addCustomClassMob(animeClassMob);
                } else if (scrollTopValueMob() < 485) {
                    removeCustomClassMob(animeClassMob);
                }

            };

            $(window).on('scroll', toggleAnimeFuncMob);
            $(window).on('load', toggleAnimeFuncMob);
        }
    } else if ($(document).width() >= 1024) {

        var fixedItemMob = $('#blog-menu-mobile'),
            animeClassMob = 'animated',
            minMarginTopMob;

        if (fixedItemMob.size()) {

            var scrollTopValueMob = function () {
                return $(window).scrollTop();
            };

            var addCustomClassMob = function (cls) {
                fixedItemMob.addClass(cls);
            };

            var removeCustomClassMob = function (cls) {
                fixedItemMob.removeClass(cls);
            };

            var toggleAnimeFuncMob = function () {
                minMarginTopMob = fixedItemMob.height();

                if (scrollTopValueMob() > 485) {
                    addCustomClassMob(animeClassMob);
                } else if (scrollTopValueMob() < 495) {
                    removeCustomClassMob(animeClassMob);
                }

            };

            $(window).on('scroll', toggleAnimeFuncMob);
            $(window).on('load', toggleAnimeFuncMob);
        }

    } else if ($(document).width() >= 768) {

        var fixedItemMob = $('#blog-menu-mobile'),
            animeClassMob = 'animated',
            minMarginTopMob;

        if (fixedItemMob.size()) {

            var scrollTopValueMob = function () {
                return $(window).scrollTop();
            };

            var addCustomClassMob = function (cls) {
                fixedItemMob.addClass(cls);
            };

            var removeCustomClassMob = function (cls) {
                fixedItemMob.removeClass(cls);
            };

            var toggleAnimeFuncMob = function () {
                minMarginTopMob = fixedItemMob.height();

                if (scrollTopValueMob() > 390) {
                    addCustomClassMob(animeClassMob);
                } else if (scrollTopValueMob() < 400) {
                    removeCustomClassMob(animeClassMob);
                }

            };

            $(window).on('scroll', toggleAnimeFuncMob);
            $(window).on('load', toggleAnimeFuncMob);
        }

    } else if ($(document).width() <= 650) {

        var fixedItemMob = $('#blog-menu-mobile'),
            animeClassMob = 'animated',
            minMarginTopMob;

        if (fixedItemMob.size()) {

            var scrollTopValueMob = function () {
                return $(window).scrollTop();
            };

            var addCustomClassMob = function (cls) {
                fixedItemMob.addClass(cls);
            };

            var removeCustomClassMob = function (cls) {
                fixedItemMob.removeClass(cls);
            };

            var toggleAnimeFuncMob = function () {
                minMarginTopMob = fixedItemMob.height();

                if (scrollTopValueMob() > 240) {
                    addCustomClassMob(animeClassMob);
                } else if (scrollTopValueMob() < 250) {
                    removeCustomClassMob(animeClassMob);
                }

            };

            $(window).on('scroll', toggleAnimeFuncMob);
            $(window).on('load', toggleAnimeFuncMob);
        }

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



