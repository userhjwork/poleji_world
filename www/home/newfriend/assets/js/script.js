// ul script
function toggle_ul(e) {
    $(e).next('.select_sub').toggleClass('hide');
}

$(document).on('click', '.category_menu button', function(){
    $(this).closest('.category_menu').children('li').children('button').removeClass('selected');
    $(this).addClass('selected');

    let this_seq = $(this).parent('li').index();
    console.log(this_seq);
});

$(document).on('click', '.btn_subscript', function(){
    let target = $(this).next();

    if (target.hasClass('popup_wrap')) {
        target.addClass('show');
    }
});

$(document).on('click', '.popup_wrap .btn_close', function(){
    let target = $(this).closest('.popup_wrap');

    target.removeClass('show');
});

function go_top() {
    $(".store_content").animate({scrollTop:0},500)
};

$(document).ready(function(){
    $(".store_content").animate({scrollTop:9000},500)
});



