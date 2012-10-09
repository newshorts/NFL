<?php 
$page = 'home'; 
?>

<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>#SFSuperbowl</title>
  
	<!-- Included CSS Files -->
	<link rel="stylesheet" href="../css/style.css">
	


	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->
	


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	
	<!-- TWITTER SCRIPTS -->
<!-- 	<script src="javascripts/twitter.js"></script> -->
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	
	
	<!-- NUMBER SCRIPT -->
	<script>
	function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    

	
            (function($) {
                $(window).load(function() {
                    var googlePluses = $('#googlePluses').data('google');
                    var output = numberWithCommas(googlePluses);
                    
                    $('#output').text(output);
                });
            })(jQuery);
        </script>
	<!-- END NUMBER SCRIPT -->        
        
        
        
        
	<!-- FACEBOOK SCRIPT -->
	<script type="text/javascript">
	  $(function() {
	    //Set Url of JSON data from the facebook graph api. make sure callback is set   with a '?' to overcome the cross domain problems with JSON
	    var url = "https://graph.facebook.com/sonicdrivein?callback=?";
	
	    //Use jQuery getJSON method to fetch the data from the url and then create our unordered list with the relevant data.
	    $.getJSON(url,function(json){
        	var output = numberWithCommas(json.likes);
	        var html = "<ul><li>" + output + "</li></ul>";
	        //A little animation once fetched
	        $('.facebookfeed').animate({opacity:0}, 500, function(){
	            $('.facebookfeed').html(html);
	            
	            var gPluses = $('#googlePluses').data('google');
	            
	            var total = json.likes + gPluses;
	            
	            var totalFormatted = numberWithCommas(total);
	            
	            $('#outputTotal').text(totalFormatted);
	        });
	        $('.facebookfeed').animate({opacity:1}, 500);
	    });
	  });
	</script>
	<!-- END FACEBOOK SCRIPT -->
	
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	
	
	<!-- GOOGLE+ SCRIPT -->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-24776145-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	<!-- END GOOGLE+ SCRIPT -->
	
	
	
</head>


<body>

<!-- FACEBOOK SCRIPT -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=369308779814605";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- END FACEBOOK SCRIPT -->



	<!-- container -->
	<div class="container">

			<div class="panel">
				<div id="fblikes">
					<h6>Facebook Likes (Sonic Drive-In)</h6>
					<div class="scoreboard">
					<div class="facebookfeed">
				        <h6>Loading...</h6>
				    </div>
					</div>
				</div>
			</div>
			
			
			
			<div class="panel">
				<div id="gplus">
					<h6>Google +1's (TechCrunch.com)</h6>
					
					<div class="scoreboard">
					<?php

					 $url = "http://techcrunch.com/";
					 
					 $ch = curl_init();  
					 curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
					 curl_setopt($ch, CURLOPT_POST, 1);
					 curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
					 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
					 
					 $curl_results = curl_exec ($ch);
					 
					 curl_close ($ch);
					 
					 $parsed_results = json_decode($curl_results, true);

					 /*
echo "stuff";
					 print_r($curl_results);
*/
					 
					?>

					<span id="googlePluses" data-google="<?php echo $parsed_results[0]['result']['metadata']['globalCounts']['count']; ?>">
					</span>
					<span id="output"></span>
					</div>
							
				</div>
			</div>
			



			<div class="panel">
				<div id="total">
					<h6>Totals</h6>
					<div class="scoreboard">
					<span id="outputTotal"></span>
					</div>	
				</div>
			</div>
			
			
			
			
			
		</div>

	</div>
	<!-- container -->




	<!-- Included JS Files -->
	<script src="javascripts/jquery.min.js"></script>
	<script src="javascripts/foundation.js"></script>
	<script src="javascripts/app.js"></script>

</body>
</html>
