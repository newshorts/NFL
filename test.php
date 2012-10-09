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
	<link rel="stylesheet" href="stylesheets/foundation.css">
	<link rel="stylesheet" href="stylesheets/app.css">
	


	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->
	
	<script src="javascripts/modernizr.foundation.js"></script>


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	
	<!-- TWITTER SCRIPTS -->
<!-- 	<script src="javascripts/twitter.js"></script> -->
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

	<script type="text/javascript">
  $(function() {
    //Set Url of JSON data from the facebook graph api. make sure callback is set   with a '?' to overcome the cross domain problems with JSON
    var url = "https://graph.facebook.com/sonicdrivein?callback=?";

    //Use jQuery getJSON method to fetch the data from the url and then create our unordered list with the relevant data.
    $.getJSON(url,function(json){
        var html = "<ul><li>" + json.likes + "</li></ul>";
        //A little animation once fetched
        $('.facebookfeed').animate({opacity:0}, 500, function(){
            $('.facebookfeed').html(html);
        });
        $('.facebookfeed').animate({opacity:1}, 500);
    });
  });
</script>



	
	<script type="text/javascript" src="javascripts/twitter.js"></script>
	
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
	
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
	
	
	
	
</head>


<body>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=369308779814605";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




	<!-- container -->
	<div class="container">

		<div class="row">
			<div class="twelve columns">
				<h2>#SFSuperbowl</h2>
				<p>Prototype Page</p>
				<hr />
			</div>
		</div>

		<div class="row">
			<div class="eight columns">
				<h3>The Grid</h3>

				<!-- Grid Example -->
				<div class="row">
					<div class="six columns">
						<div class="panel">
							<p>Login</p>							
						</div>
					</div>
					
					
					<div class="six columns">
						<div class="panel">
							<p>SLIDE SHOW</p>
						</div>
					</div>
					
					
				</div>
				<div class="row">
					<div class="twelve columns">
						<div class="panel">
							<p>Facebook Conversations & Comments</p>
							
							<div class="fb-comments" data-href="http://www.work.goodbysilverstein.com/sfsuperbowl/prototype/" data-num-posts="8" data-width="600"></div>
							
							<div class="fb-like" data-href="http://www.work.goodbysilverstein.com/sfsuperbowl/prototype/" data-send="true" data-layout="button_count" data-width="468" data-show-faces="true"></div>
							
						</div>
					</div>
				</div>
				
				
				
				<div class="row">
					<div class="twelve columns">
						<div class="panel">
							<div id="googlemaps">
								<h4>EXPLORE THE BENEFITS OF THE BAY</h4>
								
								<iframe width="600" height="588" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;t=m&amp;ll=37.497742,-122.058105&amp;spn=0.42274,0.641327&amp;z=10&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/?ie=UTF8&amp;t=m&amp;ll=37.497742,-122.058105&amp;spn=0.42274,0.641327&amp;z=10&amp;source=embed" style="color:#0000FF;text-align:left"></a></small>
								
							</div>
						</div>
					</div>
				</div>
				
				
				
				<div class="row">
					<div class="twelve columns">
						<div class="panel">
							<div id="twitter">
								<h4>Twitter Feed</h4>	
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="row">
					<div class="six columns">
						<div class="panel">
							<p>Six columns</p>
						</div>
					</div>
					
					<div class="six columns">
						<div class="panel">
							<p>Six columns</p>
						</div>
					</div>
				</div>
				


				
			</div>

			<div class="four columns">			
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
			</div>
			
			
			
			<div class="four columns">			
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
 
 echo $parsed_results[0]['result']['metadata']['globalCounts']['count'];
 
?>
						</div>

						
								
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
