

//var hoursleft = 0;
// give seconds you wish
 
var finishedtext = "<span style='color:red;'>Countdown finished!</span>";
var end1;
if(localStorage.getItem("end1")) {
end1 = new Date(localStorage.getItem("end1"));
} else {
end1 = new Date();
end1.setMinutes(end1.getMinutes()+minutesleft);
end1.setSeconds(end1.getSeconds()+secondsleft);
}
var counter = function () {
var now = new Date();
var diff = end1 - now;

diff = new Date(diff);

var milliseconds = parseInt((diff%1000)/100)
    var sec = parseInt((diff/1000)%60)
    var mins = parseInt((diff/(1000*60))%60)
    //var hours = parseInt((diff/(1000*60*60))%24);

if (mins < 10) {
    mins = "0" + mins;
}
if (sec < 10) { 
    sec = "0" + sec;
}     
if(now >= end1) {     
    clearTimeout(interval);
   // localStorage.setItem("end", null);
     localStorage.removeItem("end1");
     localStorage.clear();
    document.getElementById('divCounter').innerHTML = finishedtext;
     if(confirm("TIME UP!"))
     window.location.href= "account.php?q=1";
} else {
    var value = mins + ":" + sec;
    localStorage.setItem("end1", end1);
    document.getElementById('divCounter').innerHTML = value;
}
}
var interval = setInterval(counter, 1000);












// //////////////////////////////////////////////////////////
(function() {
    'use strict';

    var $cercleContainer = $('#cercleContainer');
    var $aboutUsButton = $('#aboutUsButton');

    $aboutUsButton.click(function(){
        $cercleContainer
            .toggleClass('aboutUsButtonClicked')
            .addClass('animateCercle');
        
        setTimeout(function() {
            $cercleContainer.removeClass('animateCercle');
        }, 300);

        $aboutUsButton.toggleClass('aboutUsButtonClicked');
    });
}());

(function() {
    'use strict';

    var $email=$('#email');
    var value=$email.attr('value');

    $email.focusin(function() {
        $('#note').toggleClass("emailFocus");
        $email.removeAttr('value');
    });

    $email.focusout(function() {
        $('#note').toggleClass("emailFocus");
        if (jQuery.trim($email.val())=="") {
            $email.attr("value",value);
        }
    });
}());

(function () {
    'use strict';

    setTimeout(function(){
        // Hide the address bar!
        window.scrollTo(0, 1);
    }, 0);
}());

(function() {
    'use strict';
//length = $sliderButtons.find('li').length++,
    var $sliderButtons = $('#sliderButtons'),
        $slider = $('#slider'),
        $sliderList = $slider.find('li'),
        length = $sliderList.length,
        i=0,
        index,
        timeout,
        jeton=0;

    var lis = "";
    for(var c = 0; c < length; c++) {
        lis += "<li/>";
    }

    var $buttons = $(lis);

    $sliderButtons.append($buttons);

    /* click listener */
    $buttons.click(function() {
        index = $buttons.index(this) + 1;

        if (jeton != index) {
            $sliderList
                .css("z-index", "-2")
                .fadeOut();
            
            $slider
                .find('li:nth-child('+index+')')
                .css("z-index","-1")
                .fadeIn();

            $buttons.css('opacity','0.8');
            $buttons.css('filter','progid:DXImageTransform.Microsoft.Alpha(Opacity=80)');

            var SelectedButton = $sliderButtons.find('li:nth-child('+index+')');
            SelectedButton
                .css('opacity','1')
                .css('filter','progid:DXImageTransform.Microsoft.Alpha(Opacity=100)');

            jeton = index;

            if (i != index) {
                i = index;

                clearTimeout(timeout);
            }

            timeout = setTimeout(function(){ slider(); }, 10000);
        }
    });

    /* auto click the next slide */
    function slider() {
        i = (i%length)+1;
        $('#sliderButtons li:nth-child('+i+')').click();
    }

    $('#sliderButtons li:nth-child(1)').click();
}());

(function () {
    'use strict';

    var startDate = new Date(Date.now() - 2 *24 * 60 * 60 * 1000),
        futureDate = new Date(Date.now() + 2 *24 * 60 * 60 * 1000);

    $('#sandyCountdown').SCountdown({
        canvasID  : 'sandyCanvas',
        counterID : 'sandyCounter',
        startDate: {
            day: startDate.getUTCDate(),
            month: startDate.getUTCMonth() + 1,
            year: startDate.getUTCFullYear()
        },
        startTime: {
            hour: startDate.getUTCHours(),
            minute: startDate.getUTCMinutes(),
            second: startDate.getUTCSeconds()
        },
        finishDate: {
            day: futureDate.getUTCDate(),
            month: futureDate.getUTCMonth() + 1,
            year: futureDate.getUTCFullYear()
        },
        finishTime: {
            hour: futureDate.getUTCHours(),
            minute: futureDate.getUTCMinutes(),
            second: futureDate.getUTCSeconds()
        },
        colors: {
            sand: 'white'
        },
        dateCompnentsFormaterFunction: function(component, value) {
            if($.inArray(component, ['seconds', 'minutes', 'hours']) !== -1) {
                if(value.toString().length === 1) {
                    return '0' + value;
                }
            }

            return value;
        }
    });
}());