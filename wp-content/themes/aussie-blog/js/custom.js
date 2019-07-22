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
var $background = $('.background-overlay');
var $menu = $('#blog-menu');
var $menuItems = $(document).find('.menu-item-object-category');
var $searchWrapper = $('.aussie-casino__blog-menu_search');
var $searchFormWrapper = $('.aussie-casino__blog-menu_search-wrap');
var $menuBlogMenuContainer = $('.menu-blog-menu-container');

function displaySearch() {
    if(! $body.hasClass('search-on')) {
        $body.addClass('search-on');
        // Fade out the menu items
        $menu.velocity({
            opacity: 0,
            duration:195,
            easing: [20]
        });
        $menuItems.velocity({
            opacity: 0,
            scale: 0.70,
            duration: 210,
            easing: [20]
        });
        // Display background overlay
        $background.velocity({
            opacity: 1,
            duration: 50,
            easing: "easeInQuad",
            display: "block"
        });
        // Display the search
        $searchWrapper.addClass('search-displayed');
        $searchWrapper.velocity({
            opacity: 1,
            duration: 200,
            display: "block"
        });
        $searchFormWrapper.velocity({
            right: '300px',
            opacity: 1,
            position: "absolute",
            display: "flex",
            duration: 600,
            easing: 'easeOutSine',
            delay: 175
        });
        // Change search icon to x
        $('#blog-search').html('<input class="search-field" placeholder="Search..." type="text"/><img src="./wp-content/themes/aussie-blog/img/close.svg" alt="aussie-casino">');
    } else {
        $body.removeClass('search-on');
        $searchWrapper.removeClass('search-displayed');
        $menu.velocity('reverse');
        $menuItems.velocity({opacity: 1, scale: 1,
            duration: 200,
            easing: [20],
            stagger: 100
        });
        $background.velocity('reverse');
        $searchFormWrapper.velocity('reverse');
        $('#blog-search').html('<img src="./wp-content/themes/aussie-blog/img/search.svg" alt="aussie-casino">');
    }

}

$("#blog-search").on('click', function(){
    console.log("clicked search");
    displaySearch();
});
