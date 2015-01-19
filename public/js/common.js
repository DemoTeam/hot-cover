$("#backToTopBtn").hide();
    // fade in #back-top
$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#backToTopBtn').fadeIn();
        } else {
            $('#backToTopBtn').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#backToTopBtn').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});