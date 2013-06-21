var SocialTracker = function(elem) {
    var _elem;
    var g, f, t, fg, ff, ft;
    var oldG, oldF, oldT;
    var totalTracking = false,
        googleTracking = false,
        facebookTracking = false;
    
    var init = function() {
        // do some stuff
        _elem = $(elem);
    };

    var getFormattedTotal = function() {
        t = (g) + (f);
        ft = numberWithCommas(t);
    }

    var getFormattedGoogle = function() {
        fg = numberWithCommas(g);
    };

    var getFormattedFacebook = function() {
        ff = numberWithCommas(f);
    };

    var getFacebook = function() {
        oldF = f;
        f = parseInt(_elem.attr('fb'));
    };

    var getGoogle = function() {
        oldG = g;
        g = parseInt(_elem.attr('g'));
    };

    var pollFacebook = function() {
        var url = "https://graph.facebook.com/sonicdrivein?callback=?";
        $.getJSON(url,function(json){
            _elem.attr("fb", json.likes);
            getFacebook();
            getFormattedFacebook();
            if(facebookTracking) {
                setFacebook();
            }
        });
    };
    
    var pollGoogle = function() {
        var url = "getGoogle.php";
        $.getJSON(url,function(data){	
            _elem.attr("g", data.google);
            getGoogle();
            getFormattedGoogle();
            if(googleTracking) {
                setGoogle();
            }
        });
    };
    
    var pollTotal = function() {
        pollGoogle();
        pollFacebook();
        setTotal();
    };
    
    var setTotal = function() {
        getFormattedTotal();
        _elem.text(ft);	
    };
    
    var setGoogle = function() {
         _elem.text(fg);
    };
    
    var setFacebook = function() {
        _elem.text(ff);
    };
    
    var numberWithCommas = function(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    this.trackTotal = function() {
        totalTracking = true;
        // instructions
        setInterval(function() {
                pollTotal();
        }, 5000);

        pollTotal();
    };

    this.trackGoogle = function() {
        googleTracking = true;
        // instructions
        setInterval(function() {
                pollGoogle();
        }, 5000);

        pollGoogle();
    };

    this.trackFacebook = function() {
        facebookTracking = true;
        // instructions
        setInterval(function() {
                pollFacebook();
        }, 5000);

        pollFacebook();
    };
    
    init();

};

// track -> poll -> set -> getFormat -> output