var time=60;
var min=60;
var sec=60;


$(document).ready(function () {

    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });
//    timer code
//     //////////////////////////////////////
    var myclock= setInterval(function () {

        min=parseInt(time/60);
        sec=time%60;
        $(timer).text(min+ ":"+sec);
        time--;

        if (time==-1){
            clearInterval(myclock);

            window.location.href= "kkkkkkkkkkkk";
        }
        if (time==14){
            $(timer).css('color','red');

        }
    },1000)
    // end of timer code



});
