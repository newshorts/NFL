/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var Intro = function() {
    
    var fadeInIntroLogoBig = function() {
        $('#introLogoBig').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)",
            'filter': 'alpha(opacity=100)',
            '-moz-opacity': '1.0',
            '-khtml-opacity': '1.0',
            'opacity': '1.0'

        }, 500, function() {
            // complete
        });
    };

    var fadeOutIntroLogoBig = function() {
        $('#introLogoBig').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=00)",
            'filter': 'alpha(opacity=00)',
            '-moz-opacity': '0.0',
            '-khtml-opacity': '0.0',
            'opacity': '0.0'
        }, 500, function() {
            // complete
            $(this).css({
                display: 'none'
            });
        });
    };

    var fadeInIntroLogo = function() {
        $('#introLogo').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)",
            'filter': 'alpha(opacity=100)',
            '-moz-opacity': '1.0',
            '-khtml-opacity': '1.0',
            'opacity': '1.0'

        }, 1500, function() {
            // complete
        });
    };

    var fadeOutIntroLogo = function() {
        $('#introLogo').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=00)",
            'filter': 'alpha(opacity=00)',
            '-moz-opacity': '0.0',
            '-khtml-opacity': '0.0',
            'opacity': '0.0'
        }, 1500, function() {
            // complete
            $(this).css({
                display: 'none'
            });
        });
    };

    var fadeInHeadline = function() {
        $('#introHeadline').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)",
            'filter': 'alpha(opacity=100)',
            '-moz-opacity': '1.0',
            '-khtml-opacity': '1.0',
            'opacity': '1.0'

        }, 1500, function() {
            // complete
        });
    };

    var fadeOutHeadline = function() {
        $('#introHeadline').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=00)",
            'filter': 'alpha(opacity=00)',
            '-moz-opacity': '0.0',
            '-khtml-opacity': '0.0',
            'opacity': '0.0'
        }, 1500, function() {
            // complete
            $(this).css({
                display: 'none'
            });
        });
    };

    var fadeInCopy = function() {
        $('#introCopy').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)",
            'filter': 'alpha(opacity=100)',
            '-moz-opacity': '1.0',
            '-khtml-opacity': '1.0',
            'opacity': '1.0'

        }, 1500, function() {
            // complete
        });
    };

    var fadeOutCopy = function() {
        $('#introCopy').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=00)",
            'filter': 'alpha(opacity=00)',
            '-moz-opacity': '0.0',
            '-khtml-opacity': '0.0',
            'opacity': '0.0'
        }, 1500, function() {
            // complete
            $(this).css({
                display: 'none'
            });
        });
    };
    
    
    var fadeInCopy2 = function() {
        $('#introCopy2').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)",
            'filter': 'alpha(opacity=100)',
            '-moz-opacity': '1.0',
            '-khtml-opacity': '1.0',
            'opacity': '1.0'

        }, 1500, function() {
            // complete
        });
    };

    var fadeOutCopy2 = function() {
        $('#introCopy2').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=00)",
            'filter': 'alpha(opacity=00)',
            '-moz-opacity': '0.0',
            '-khtml-opacity': '0.0',
            'opacity': '0.0'
        }, 1500, function() {
            // complete
            $(this).css({
                display: 'none'
            });
        });
    };
    
    
    
    var fadeOutIntro = function() {
        $('#intro').animate({
            '-ms-filter': "progid:DXImageTransform.Microsoft.Alpha(Opacity=00)",
            'filter': 'alpha(opacity=00)',
            '-moz-opacity': '0.0',
            '-khtml-opacity': '0.0',
            'opacity': '0.0'
        }, 500, function() {
            // complete
            $(this).css({
                display: 'none'
            });
        });
        
        $(window).trigger('trigger_scroller');
    };

    var sequence = function() {

        delay(fadeInIntroLogoBig, 800);
        delay(fadeOutIntroLogoBig, 2700);

        delay(fadeInIntroLogo, 3400);
        delay(fadeInHeadline, 5200);
        delay(fadeInCopy, 6600);
        delay(fadeInCopy2, 7000);

        delay(fadeOutIntroLogo, 15000);
        delay(fadeOutHeadline, 15000);
        delay(fadeOutCopy, 15000);
        delay(fadeOutCopy2, 15000);

        delay(fadeOutIntro, 16500);

    };

    var delay = function(func, time) {
        time = time || 80;
        setTimeout(func, time);
    }

    
    
    this.init = function() {
        setTimeout(sequence, 200);
    };
};

