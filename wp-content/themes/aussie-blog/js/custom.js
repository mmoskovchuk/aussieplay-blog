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
    if(! $body.hasClass('search-on')) {
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

$searchBtn.on('click', function(){
    console.log("clicked search");
    displaySearch();
});

//SWIPER LATEST ARTICLE
//-------------------------------------------------

$(document).ready(function () {
    //initialize swiper when document ready
    var mySwiper = new Swiper ('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
});