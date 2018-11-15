$(document).ready(function() {
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#back-top').addClass('show').removeClass('hidden-rocket');
            } else {
                $('#back-top').removeClass('show').addClass('hidden-rocket').removeClass('fly');
            }
        });
        $('#back-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            $(this).addClass('fly');
            return false;
        });
    });
    $(document).on('click', '.show-form1', function() {
        $('.form-1').fadeIn(400);
        $('.mask_forms').fadeIn(400);
        return false;
    });
    $(document).on('click', '.show-form2', function() {
        $('.form-2').fadeIn(400);
        return false;
    });
    $(document).on('click', '.show-form3', function() {
        $('.form-3').fadeIn(400);
        return false;
    });
    $(document).on('click', '.show-form', function() {
        var title_form = $(this).closest('.price-package').find('.title-package').text();
        $('.zagolovok_mes').attr('value', title_form);
    });
    $(document).on('click', '.close', function() {
        $('.hidden_form, .spasibo-popup, .mask_forms').fadeOut(400);
    });
    $(document).click(function(event) {
        if (!$(event.target).closest(".test-form").length) {
            $('.hidden_form, .mask_forms').fadeOut(400);
        }
        event.stopPropagation();
    });
    $(document).click(function(event) {
        if (!$(event.target).closest(".thanks").length) {
            $('.spasibo-popup').fadeOut(400);
        }
        event.stopPropagation();
    });
    $("input[name='phone_user']").mask("+380 (99) 999 99 99");
    $('.popup-with-form').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#name',
        removalDelay: 300,
        mainClass: 'mfp-fade',
        callbacks: {
            beforeOpen: function() {
                if ($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#name';
                }
            }
        }
    });

    $('.mobileButton').on('click', function(){

        $('.mainNavList').toggleClass('active');

    });

    $('.mobileButton').on('click', function(){

        $('.mobileButton').toggleClass('active');

    });

    $('.buyThis').on('click', function(){
    	$('.popupFormMask, .popupForm').fadeIn('300');
    	var title = $(this).closest('.priceBlockItem').find('h3').text();
    	$('.titlePop').text(title);
		$('input.hidden-title').attr("value", title);
    });

    $('.popupFormClose, .popupFormMask').on('click', function(){
    	$('.popupFormMask, .popupForm').fadeOut('300');
    });
	
    $('.thanksPopup .popupFormClose').on('click', function(){
    	$('.popupFormMask, .thanksPopup').fadeOut('300');
    });

    $('.firstCatHeader').on('click', function(){
        $('.firstCat').slideToggle('300');
        $('.firstCatHeader .catDecor').toggleClass('active');
    });


    $('.secondCatHeader').on('click', function(){
        $('.secondCat').slideToggle('300');
        $('.secondCatHeader .catDecor').toggleClass('active');
    });

    function bodyAnimateScroll(top) {
            $('html, body').stop().animate({
                scrollTop: top
            }, 400)
        }

        $('a[name="scrollAnimate"]').on('click', function(event) {
            event.preventDefault();
            var selector = $(this).attr('href');
            var top = $(selector).offset().top
            bodyAnimateScroll(top)
        });

});