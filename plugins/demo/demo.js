if (typeof jQuery == "undefined") {
    throw new Error("Documentation needs the jQuery library to function.")
}
;
$('body').scrollspy({
    target: '#my-nav',
    offset: 20
});
var bs = $('.footer').outerHeight() + 10;
$("#my-nav").sticky({topSpacing: 20, bottomSpacing: bs});



$('.change-format-css').click(function () {
    $('.change-format-css').addClass('active');
    $('.change-format-less').removeClass('active');
    $('.format-less').hide();
    $('.format-css').show();
});
$('.change-format-less').click(function () {
    $('.change-format-less').addClass('active');
    $('.change-format-css').removeClass('active');
    $('.format-css').hide();
    $('.format-less').show();
});

$('.format-css').hide();

function rs() {
}
$(window).resize(function () {
    rs();
})
rs();