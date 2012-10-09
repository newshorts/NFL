var SocialTracker = function() {
	var g, f, t;
	
	var getFormattedTotal = function() {
    	var unformattedTotal = parseInt(g) + parseInt(f);
    	t = numberWithCommas(unformattedTotal);
    	return total;
	}
	
	var getFormattedGoogle = function() {
		var unformattedGoogle = parseInt(g);
		return unformattedGoogle;
	};
	
	var getFormattedFacebook = function() {
		var unformattedFacebook = parseInt(f);
		return unformattedFacebook;
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
            
        });
       
    };
    
    var pollGoogle = function() {
        var url = "getGoogle.php";
        $.getJSON(url,function(data){
        	
        	$('#outputTotal').attr("g", data.google);
        
        });
    };
    
    var setTotal = function() {
	    getFacebook();
		
		getGoogle();
		
		getFormattedTotal();
		
		$('#outputTotal').text(t);
		
    };
    
    var setGoogle = function() {
	    getFormattedGoogle();
	    
    };
    
	var numberWithCommas = function(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	};
	
	this.trackTotal = function() {
		// instructions
    	setInterval(function() {
    		setFacebook();
        	setGoogle();
    	}, 5000);
    	
    	setFacebook();
    	setGoogle();							
	};
	
	this.trackGoogle = function() {
		// instructions
    	setInterval(function() {
        	setGoogle();
    	}, 5000);
    	
    	setGoogle();
	};
	
	this.trackFacebook = function() {
		
	};

};