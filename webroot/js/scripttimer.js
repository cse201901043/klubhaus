$(document).ready(function() {
    // Apply each element to the Date function
    var d = new Date(2019, 03, 23, 11, 00, 00);
    var actiondate = new Date(d);
    console.log(actiondate)
    $('#counter').countdown({
         timestamp: actiondate.getTime() + 3 * 24 * 60 * 60 * 1000
    });
    // $('#links a').hover(function() {
    //     $(this).animate({
    //         left: 3
    //     }, 'fast');
    // }, function() {
    //     $(this).animate({
    //         left: 0
    //     }, 'fast');
    // });
    // $('footer a').hover(function() {
    //     $(this).animate({
    //         top: 3
    //     }, 'fast');
    // }, function() {
    //     $(this).animate({
    //         top: 0
    //     }, 'fast');
    // });
    // if (!Modernizr.input.placeholder) {
    //     $('.email').val('Input your e-mail address here...');
    //     $('.email').focus(function() {
    //         if ($(this).val() == 'Input your e-mail address here...') {
    //             $(this).val('');
    //         }
    //     });
    // }
    // var browser = navigator.userAgent.toLowerCase();
    // if (!Modernizr.input.required || (browser.indexOf("safari") != -1 && browser.indexOf("chrome") == -1)) {
    //     $('form').submit(function() {
    //         $('.popup').remove();
    //         if (!$('.email').val() || $('.email').val() == 'Input your e-mail address here...') {
    //             $('form').append('<p class="popup">Please fill out this field.</p>');
    //             $('.email').focus();
    //             return false;
    //         }
    //     });
    //     $('.email').keydown(function() {
    //         $('.popup').remove();
    //     });
    //     $('.email').blur(function() {
    //         $('.popup').remove();
    //     });
    // }

    // $('.countHours .digit').html('0')
    // $('.countMinutes .digit').hide()
    // $('.countSeconds .position').hide()
    // $('.countSeconds').html("<span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span>" +
    // 	"<span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span>" +
    // 	'<span class="boxName"><span class="Seconds">SECS</span></span>')

    // $('.countMinutes .position').hide()
    // $('.countMinutes').html("<span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span>" +
    // 	"<span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span>" +
    // 	'<span class="boxName"><span class="Minutes">MNTS</span></span>')

    // $('.countHours .position').hide()
    // $('.countHours').html("<span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span>" +
    // 	"<span class='position'><span class='digit static' style='top: 0px; opacity: 1;'>0</span></span>" +
    // 	'<span class="boxName"><span class="Hours">HRS</span></span>')
    
    
    // $('.countSeconds .digit').html('0')
});