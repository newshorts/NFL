var SocialTracker = function() {
    var g, f, t, fg, ff, ft;
    var totalTracking = false,
        googleTracking = false,
        facebookTracking = false;
    
    var init = function() {
        // do some stuff
    };

    var getFormattedTotal = function() {
        t = parseInt(g) + parseInt(f);
        ft = numberWithCommas(t);
    }

    var getFormattedGoogle = function() {
        fg = numberWithCommas(g);
    };

    var getFormattedFacebook = function() {
        ff = numberWithCommas(f);
    };

    var getFacebook = function() {
        f = $('#outputTotal').attr('fb');
    };

    var getGoogle = function() {
        g = $('#outputTotal').attr('g');
    };

    var pollFacebook = function() {
        var url = "https://graph.facebook.com/sonicdrivein?callback=?";
        $.getJSON(url,function(json){
            $('#outputTotal').attr("fb", json.likes);
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
            $('#outputTotal').attr("g", data.google);
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
        $('#outputTotal').text(ft);	
    };
    
    var setGoogle = function() {
         $('#outputTotal').text(fg);
    };
    
    var setFacebook = function() {
        $('#outputTotal').text(ff);
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