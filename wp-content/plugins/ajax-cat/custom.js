jQuery(document).ready(function ($) {
    // Контейнер с контентом
    var $mainBox = $('#main');
    /*var $leftBox = $('#block-left');*/

    // Отправка ajax запроса при клике по ссылке на рубрику в виджете "Рубрики"
    $('.aussie-casino__latest-articles_wrap a').click(function (e) {
        e.preventDefault();

        var linkCat = $(this).attr('href');
        var titleCat = $(this).text();

        document.title = titleCat;
        history.pushState({page_title: titleCat}, titleCat, linkCat);

        ajaxCat(linkCat);
        console.log(history.state.page_title);
    });


    // Отслеживание события нажатия кнопок браузера "Вперед/Назад"
    window.addEventListener("popstate", function (event) {
        //document.title = event.state.page_title;
        //document.location;
        if (window.location.pathname == '/') {
            location.href = '/';
            location.href;
        } else {
            ajaxCat(location.href);
        }

    }, false);


    /**
     * Ajax запрос постов из рубрики по переданной ссылке на неё
     *
     * @param linkCat ссылка на рубрику
     */
    function ajaxCat(linkCat) {
        $mainBox.animate({opacity: 0.5}, 300);
        /*$leftBox.animate({left: '200px'}, 600);*/
        jQuery.post(
            myPlugin.ajaxurl,
            {
                action: 'get_cat',
                link: linkCat
            },
            function (response) {
                $mainBox
                    .html(response)
                    .animate({opacity: 1}, 300);
                /*$leftBox
                    .animate({left: '200px'}, 600);*/
            });
    }

});