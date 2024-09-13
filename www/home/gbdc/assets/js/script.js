// ul script
function toggle_ul(e) {
    $(e).next('.select_sub').toggleClass('hide');
}

// $(document).on('click', '.category_wrap .category_menu .btn_ctgry_menu', function(){
//     $(this).closest('.menu_list').find('.btn_ctgry_menu').removeClass('select');
//     $(this).addClass('select');
// });

$(document).on('mouseover', '.btn_ctgry_menu', function(){
    $(this).closest('.menu_list').find('.btn_ctgry_menu').removeClass('select');
    $(this).addClass('select');

    if ($(this).hasClass('main_sub')) {
        $(this).closest('.category_wrap').children('.category_con')
    }
    
})


$(document).on('mouseover', '.double .btn_ctgry_menu', function(){
    var this_target = $(this).closest('.category_wrap').children('.category_con').find('.check_main');
    var minus_area = $(this).closest('.category_wrap').children('.category_con').find('.main').height();

    console.log(minus_area);
    
    this_target.attr('class', 'title_list check_main');

    this_target.css({'max-height': 'calc(100% - '+minus_area+'px)'});

    if ($(this).hasClass('main_sub')) {
        this_target.addClass('sub');
    }
    
})

$(document).on('mouseover', '.sch_ctgry', function(){
    $(this).closest('.ctgry_list').find('.sch_ctgry').removeClass('active');
    $(this).addClass('active');
    
})



$(document).on('click', '.btn_subscript', function(){
    let target = $(this).next();

    if (target.hasClass('popup_wrap')) {
        target.addClass('show');
    }
});

// 팝업창 닫기
$(document).on('click', '.popup_wrap .btn_close', function(){
    let target = $(this).closest('.popup_wrap');

    target.removeClass('show');
});


$(document).ready(function(){
    function calendar_cls(e){
        // console.log(e);
        if ($(e).has('.txt_red') == true || $(e).hasClass('txt_red') == true) {
            $(e).parent(".fc-daygrid-day-frame").addClass('txt_red');
        }

        if ($(e).has('.txt_bold') == true || $(e).hasClass('txt_bold') == true) {
            $(e).parent(".fc-daygrid-day-frame").addClass('txt_bold');
        }
    }

    function change_title() {
        var title_done = '';
        
        var cal_title = $(".fc-toolbar-title").text();

        // 달력 title text
        if (cal_title.includes(' ') == true) {
            var title_split = $(".fc-toolbar-title").text().split(' ');
            cal_title = title_split[1];
        }

        if (cal_title.includes('/') == true) {
            var title_arr = cal_title.split('/');
    
            title_done = title_arr[1] + '.' + title_arr[0] + ' ';
            $(".fc-toolbar-title").text(title_done);
        }
    }

    function change_title() {
        var title_done = '';
        
        var cal_title = $(".fc-toolbar-title").text();

        // 달력 title text
        if (cal_title.includes(' ') == true) {
            var title_split = $(".fc-toolbar-title").text().split(' ');
            cal_title = title_split[1];
        }

        if (cal_title.includes('/') == true) {
            var title_arr = cal_title.split('/');
    
            title_done = title_arr[1] + '.' + title_arr[0] + ' ';
            $(".fc-toolbar-title").text(title_done);
        }
    }

    setTimeout(function () {
        change_title();

        $(".fc-daygrid-day-events").each(function(){
            let event_some = $(this).children('.fc-daygrid-event-harness').find('.event_child');
            
            if (event_some.length >= 1) {
                console.log('event_some');
                console.log($(this).children('.fc-daygrid-event-harness'));
                

                if ($(this).find('.txt_red').length >= 1) {

                    $(this).parent(".fc-daygrid-day-frame").addClass('txt_red');
                }

                if ($(this).find('.txt_bold').length >= 1) {

                    $(this).parent(".fc-daygrid-day-frame").addClass('txt_bold');
                }
            }
            
        })

    }, 0);

    

    

    $("#calendar td").click(function(){
        $("#calendar td").removeClass('selected');
        if ($(this).hasClass('not_this') == false) {
            $(this).addClass('selected');
        }
    })

    $(document).on('click', '.fc-daygrid-day-number', function(){
        $('.fc-daygrid-day-number').removeClass('selected');
        $(this).addClass('selected');
    })

    $(document).on('click', '.fc-button-group button', function(){
        change_title();
    })
})



