// Блокировка кнопки отправки при нажатии (от двойного нажатия)
$('#result').on('submit', function () {
    $('.standart-blue').attr('disabled', 'disabled');
});

$("#open-quize").on("click", function () {
    $(".quize-main-container").addClass("quize-main-container-open");
    $("body").addClass("overlow-hidden");
});

let progressCount = function () {
    let progressBarLine = $(".progress-bar-line");
    let countSlider = $(".quize-slider").find(".quize-slider-item");
    let progress = Math.round(100) / Math.round(countSlider.length - 1);
    let progressWidth = 0;
    let i = 0;

    progressBarLine.each(function () {

        if (i === progressBarLine.length - 1) {
            progressWidth -= 5;
            $(this).css("width", progressWidth + "%");
        } else {
            $(this).css("width", progressWidth + "%");
            $(this).parent().parent().find(".progress-in-procent").html(Math.round(progressWidth));
            progressWidth += progress;
        }
        i++;
    });
}

$(".were-send-label input").on("click", function(){
    $(".where-send-list").each(function () {
        if($(this).find(".input-viber").is(":checked")){
            $(".enter-your-number").addClass("viber-icon");
            $(".enter-your-number").removeClass("whatsapp-icon");
            $(".enter-your-number").removeClass("telegram-icon");
            $(".enter-your-number").removeClass("input-only-phone-icon");
            $(".enter-your-number").addClass("enter-your-number-show");
            $(".massager-name").html("Viber");
            $(".before-enter-your-number").addClass("before-enter-your-number-close");
            $(".confidency-label").hide();
        }else if($(this).find(".input-telegram").is(":checked")){
            $(".enter-your-number").addClass("telegram-icon");
            $(".enter-your-number").removeClass("whatsapp-icon");
            $(".enter-your-number").removeClass("viber-icon");
            $(".enter-your-number").removeClass("input-only-phone-icon");
            $(".enter-your-number").addClass("enter-your-number-show");
            $(".massager-name").html("Telegram");
            $(".before-enter-your-number").addClass("before-enter-your-number-close");
            $(".confidency-label").hide();
        }else if($(this).find(".input-whatsapp").is(":checked")){
            $(".enter-your-number").addClass("whatsapp-icon");
            $(".enter-your-number").removeClass("viber-icon");
            $(".enter-your-number").removeClass("input-only-phone-icon");
            $(".enter-your-number").removeClass("telegram-icon");
            $(".enter-your-number").addClass("enter-your-number-show");
            $(".massager-name").html("WhatsApp");
            $(".before-enter-your-number").addClass("before-enter-your-number-close");
            $(".confidency-label").hide();
        }else if($(this).find(".input-only-phone").is(":checked")){
            $(".enter-your-number").addClass("input-only-phone-icon");
            $(".enter-your-number").removeClass("viber-icon");
            $(".enter-your-number").removeClass("telegram-icon");
            $(".enter-your-number").removeClass("whatsapp-icon");
            $(".enter-your-number").addClass("enter-your-number-show");
            $(".massager-name").html("телефона");
            $(".before-enter-your-number").addClass("before-enter-your-number-close");
            $(".confidency-label").hide();
        }
    });
});

$("#another-massager").on("click", function (evt){
    evt.preventDefault();
    $(".before-enter-your-number").removeClass("before-enter-your-number-close");
    $(".enter-your-number").removeClass("enter-your-number-show");
    $(".massage-input").prop('checked', false);
    $(".confidency-label").show();
});

$(".next").on("click", function (){
    if($(".quize-slider-item").last().hasClass("quize-slider-active")){
        $(".quize-slider-active").closest(".quize-main-item").find(".quize-right-column").addClass("delate-bonus");
        $(".quize-slider-active").find(".lock").addClass("unlock");
        $(".quize-slider-item").addClass("normalize-padding");
    }
});

if($(window).width() <= 1200){
    $(".has-drop-link").on("click", function (evt) {
        evt.preventDefault();
        $(this).next().toggleClass("quize-drop-list-open");
    });
}

if($(window).width() > 767){
    $(".quize-phone-item a").on("click", function (evt) {
        evt.preventDefault();
        $(".modal").addClass("show");
        $(".overlay").addClass("show");
    });
}

$(".modal-close").on("click", function (evt) {
    evt.preventDefault();
    $(".modal").removeClass("show");
    $(".overlay").removeClass("show");
 });

$(".overlay").on("click", function () {
    $(".modal").removeClass("show");
    $(".overlay").removeClass("show");
 });

$(".mobile-icon-content").on("click", function (){
    $(".mobile-main-contacts-navigation").addClass("open-menu");
});

$(".btn-close-menu").on("click", function(){
    $(".mobile-main-contacts-navigation").removeClass("open-menu");
});

var slideNow = 1;
var slideCount = $(".quize-slider").children().length;


$(".vd-arrow-prev").on("click", function(){
    prevSlideVd();
});

$(".vd-arrow-next").on("click", function(){
    nextSlideVd();
});

$(".vd-arrow-next").attr("disabled", "disabled");

$(".radio-label").on("change", function () {

    if($(this).closest(".quize-slider-active .promo-form-list").find("input[type='radio']").is(":checked")) {
        
        $(".vd-arrow-next").removeAttr("disabled");

       
        setTimeout(function() {
            $(".vd-arrow-next").attr("disabled", "disabled");
            $(".vd-arrow-next").addClass("custom-animation");
         }, 10);

        setTimeout(function() {
            nextSlideVd();
        }, 900);

    }else if($(this).closest(".promo-form-list").find("input[type='checkbox']").is(":checked")) {
        $(".vd-arrow-next").removeAttr("disabled");
    }else {
        $(".vd-arrow-next").attr("disabled", "disabled");
    }
});

$(".vd_slider__navigation").on("click", function () {
    if($(".quize-slider-active").find("input[type='radio']").is(":checked")){
        $(".vd-arrow-next").removeAttr("disabled");
    }else if($(".quize-slider-active").find("input[type='checkbox']").is(":checked")){
        $(".vd-arrow-next").removeAttr("disabled");
    }
});

$(function(){
    $("#massage_content").phonecode({
        preferCo: 'ua',
        default_prefix: '380'
    });
});

$(".politic-confidency-input").on("click", function (){
    if($(".politic-confidency-input").is(":checked")){
        $(".were-send-label input").removeAttr("disabled");
    }else{
        $(".were-send-label input").attr("disabled", "disabled");
       if($(".massage-input").is(":checked")){
           $(".massage-input").prop('checked', false);
       }
    }
});

var nextSlideVd = function () {
    
    if(slideNow !== slideCount) {

        ++slideNow;

        $(".vd-arrow-next").removeClass("custom-animation");
        $(".vd-arrow-next").attr("disabled", "disabled");
        $(".quize-slider").find(".quize-slider-active").removeClass("quize-slider-active").next().addClass("quize-slider-active");
    }

    if(slideNow == slideCount) {
        $(".vd_slider__navigation").hide();
        $(".quize-right-column .bonus-in-quize").hide();
    }
}

var prevSlideVd = function () {

    

    if(slideNow > 1) {
        
        --slideNow;
       
        $(".vd-arrow-next").removeAttr("disabled");
        $(".quize-slider").find(".quize-slider-active").removeClass("quize-slider-active").prev().addClass("quize-slider-active");
    }

}

progressCount();
