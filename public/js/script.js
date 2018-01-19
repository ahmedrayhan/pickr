
$( document).ready(function() {
    var $btnSets = $('#responsive'),
        $btnLinks = $btnSets.find('a');

    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });
});

$( document ).ready(function() {
    $('.bxslider').bxSlider({
        slideWidth: 200,
        minSlides: 1,
        maxSlides: 8,
        slideMargin: 20,
        adaptiveHeight: true,
        infiniteLoop: false,
        hideControlOnEnd: true
    });
});
$( document).ready(function(){
    $("[rel='tooltip']").tooltip();
    $( '.input-group-addon').hide();

    $('.view').hover(
        function(){
            $(this).find('.caption2').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption2').slideUp(250); //.fadeOut(205)
        }
    );
    $( '.review textarea').one('focus',function () {
        $('.review textarea').animate({'height':"+=100px"},400);
        $( '.input-group-addon').fadeIn(100);
    });
    // $( '.review textarea').blur(function () {
    //     $('.review textarea').animate({'height':"-=100px"},400);
    //     $( '.input-group-addon').fadeOut(100);
    //     }
    // );
    $('.arrow-right').click(function () {
        $( '.sort_block_min').toggleClass("sort_block_show");
    });

});

$( document).ready(function () {
    $(".prof_rate").rating({
        step:0.2,
        size:11,
        showClear:false,
        readonly:true,
        showCaption:true
    });
});
