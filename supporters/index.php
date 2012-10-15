<?php include('../header.php'); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=423821150969335";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div id="dynamic">
  <div class="supporters">
	  <div id="supporters_main">
		<div id="latest_news" class="bgTextureLight">
<!--			<ul id="latest_header" class="headlineMediumGray">
				<li class="supporters_header"><span>LATEST NEWS</span></li>
				<li id="supporters_follow"><span>Follow</span><a href="http://www.facebook.com/SFSuperbowl" id="facebook_follow"><img src="../images/facebook_follow.png"></a><a href="https://plus.google.com/u/0/116535953378851378506/posts"><img id="google_follow" src="../images/google_follow.png"></a></li>
			</ul>
			<ul id="news">
				<li>
                                    <div class="imgContainer"></div>
                                </li>
				<li>
                                    <div class="imgContainer"></div>
                                </li>
				<li>
                                    <div class="imgContainer"></div>
                                </li>
			</ul>-->
		</div>
		<div id="supporter_numbers">
			<ul id="google_pluses" class="bgTextureLight">
				<li id="google_header" class="headlineMediumGray">
					<span>GOOGLE+</span>
				</li>
				<li>
					<div id="google_cta">
					<div class="g-plusone" data-annotation="none" data-href="http://sfsuperbowl.com"></div>
					<script type="text/javascript">
					  (function() {
					    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					    po.src = 'https://apis.google.com/js/plusone.js';
					    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					</div>
					<div id="google_plus_count">
				        <div id="google_count_bg" class="supportersNumbersGrey">888,888</div>    
				        <div id="google_count" class="supportersNumbersOrange"></div>

					</div>
				</li>
			</ul>
		
			<ul id="facebook_likes" class="bgTextureLight">
				<li id="facebook_header" class="headlineMediumGray">
					<span>FACEBOOK</span>
				</li>
				<li>
					<div id="facebook_cta">
						<div class="fb-like" data-href="http://sfsuperbowl.com" data-send="false" data-width="450" data-show-faces="false" data-font="arial"></div>
					</div>
					<div id="facebook_likes_count">
				        <div id="facebook_count_bg" class="supportersNumbersGrey">888,888</div>    
				        <div id="facebook_count" class="supportersNumbersOrange"></div>
					</div>
				</li>
			</ul>
		</div>
	  </div>
  	
	  <ul id="supporters_footer" class="bgTextureLight">
		  <li>
			  <div class="headlineMediumGray">
				  <img src="../images/buzz_sign.png"><span>SFSUPERBOWL SUPPORTERS</span>
			  </div>
		  </li>
		  <li id="supporters_internal">
			  <p>Share you excitement for a Bay Area Super Bowl with a <em>Like</em> or a <em>+1</em>.</p>
	      </li>
  
	      <li id="supporters_count">
	        <div id="gfb_count_bg" class="mediumNumbersGrey">888,888</div>    
	      	<div id="gfb_count" class="gfb_count mediumNumbersOrange"></div>
	      </li>
	  </ul>
	</div>
</div>
  
<?php include('../footer.php'); ?>