!function(s){s.fn.menumaker=function(e){var i=s(this),n=s.extend({format:"dropdown",sticky:!1},e);return this.each(function(){return s(this).find(".button").on("click",function(){s(this).toggleClass("menu-opened");var e=s(this).next("ul");e.hasClass("open")?e.slideToggle().removeClass("open"):(e.slideToggle().addClass("open"),"dropdown"===n.format&&e.find("ul").show())}),i.find("li ul").parent().addClass("has-sub"),multiTg=function(){i.find(".has-sub").prepend('<span class="submenu-button"></span>'),i.find(".submenu-button").on("click",function(){s(this).toggleClass("submenu-opened"),s(this).siblings("ul").hasClass("open")?s(this).siblings("ul").removeClass("open").slideToggle():s(this).siblings("ul").addClass("open").slideToggle()})},"multitoggle"===n.format?multiTg():i.addClass("dropdown"),!0===n.sticky&&i.css("position","fixed"),resizeFix=function(){s(window).width()>1e3&&i.find("ul").show(),s(window).width()<=1e3&&i.find("ul").hide().removeClass("open")},resizeFix(),s(window).on("resize",resizeFix)})}}(jQuery),function(s){s(document).ready(function(){s("#cssmenu").menumaker({format:"multitoggle"})})}(jQuery),$(document).ready(function(){function s(){$bar.css({width:e+"%"}),(e+=.1)>=100&&(e=0,$crsl.carousel("next"))}var e=0;$bar=$(".transition-timer-carousel-progress-bar"),$crsl=$("#myCarousel"),$(".carousel-indicators li, .carousel-control").click(function(){$bar.css({width:"0.1%"})}),$crsl.carousel({interval:!1,pause:!0}).on("slide.bs.carousel",function(){e=0});var i=setInterval(s,10);/Mobi/.test(navigator.userAgent)||$crsl.hover(function(){clearInterval(i)},function(){i=setInterval(s,10)}),$(".slick-slider").slick({dots:!1,speed:300,arrows:!1,slidesToShow:2.5,slidesToScroll:1,focusOnSelect:!0,initialSlide:1,infinite:!0,responsive:[{breakpoint:992,settings:{slidesToShow:1.5,slidesToScroll:1}}]}),$("#myCarousel").swipe({swipe:function(s,e,i,n,o,t){"left"==e&&$(this).carousel("next"),"right"==e&&$(this).carousel("prev")},allowPageScroll:"vertical"})}),function(s){s(function(){s("#menu li a").first().each(function(){wid=s(this).width(),s(this).css("width",wid+"px")})})}(jQuery);

$(document).ready(function () {
    $(".desc-div img").mouseenter(function(){
        $(this).parent().addClass("hover-1");
    })
    $(".desc-div img").mouseleave(function(){
        $(this).parent().removeClass("hover-1");
    })
     $(".desc-div h5").mouseenter(function(){
        $(this).parent().addClass("hover-txt");
    })
    $(".desc-div h5").mouseleave(function(){
        $(this).parent().removeClass("hover-txt");
    })
        $(".blue-row").mouseenter(function(){
        $(this).addClass("hover-2");
    })
    $(".blue-row").mouseleave(function(){
        $(this).removeClass("hover-2");
    })
});
    