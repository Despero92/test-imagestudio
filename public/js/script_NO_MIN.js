$(document).ready(function(){

    // hide #back-top first

    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-top').addClass('show').removeClass('hidden-rocket');
            } else {
                $('#back-top').removeClass('show').addClass('hidden-rocket').removeClass('fly');
            }
        });

        // scroll body to 0px on click
        $('#back-top').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            $(this).addClass('fly');
            return false;
        });

    });

    $(document).on('click','.show-form1',function () {
        $('.form-1').fadeIn(400);
        $('.mask_forms').fadeIn(400);
        return false;
    });
    $(document).on('click','.show-form2',function () {
        $('.form-2').fadeIn(400);
        return false;
    });
    $(document).on('click','.show-form3',function () {
        $('.form-3').fadeIn(400);
        return false;
    });

    $(document).on('click','.show-form',function () {
        var title_form = $(this).closest('.price-package').find('.title-package').text();
        //alert(title_form);
        $('.zagolovok_mes').attr('value', title_form);
    });


    $(document).on('click','.close',function () {
        $('.hidden_form, .spasibo-popup, .mask_forms').fadeOut(400);
    });

    $(document).click(function(event) {
        if (!$(event.target).closest(".test-form").length ){
            $('.hidden_form, .mask_forms').fadeOut(400);
        }
        event.stopPropagation();
    });

    $(document).click(function(event) {
        if (!$(event.target).closest(".thanks").length ){
            $('.spasibo-popup').fadeOut(400);
        }
        event.stopPropagation();
    });


    $("input[name='phone_user']").mask("+380 (99) 999 99 99");

    /*$("input[name='phone_user']").mask("+999 (99) 999 99 99");*/





     $('.popup-with-form').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#name',
        removalDelay: 300,
        mainClass: 'mfp-fade',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#name';
                }
            }
        }
    });






});