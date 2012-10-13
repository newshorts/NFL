<?php include('../header.php'); ?>


<div id="dynamic">
  <div class="supporters">
	  <div id="supporters_main">
		<div id="latest_news" class="bgTextureLight">
			<ul id="latest_header" class="headlineLargeGray">
				<li class="supporters_header"><span>LATEST NEWS</span></li>
				<li id="supporters_follow"><span>Follow</span><a href="" id="facebook_follow"><img src="../images/facebook_follow.png"></a><a href=""><img id="google_follow" src="../images/google_follow.png"></a></li>
			</ul>
			<ul id="news">
				<li></li>
				<li></li>
				<li></li>

<!--                                <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=250470255075519";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-activity" data-href="http://sfsuperbowl.com/" data-app-id="250470255075519" data-width="300" data-height="300" data-header="true" data-recommendations="false"></div>-->
			</ul>
		</div>
		<div id="supporter_numbers"  class="bgTextureLight">
			<ul id="google_pluses">
				<li id="google_header" class="headlineLargeGray">
					<span>GOOGLE+</span>
					</li>
				<li>
					<div id="google_cta"><a href=""><img src="../images/google_pluses.png"></a><span>+1'S</span></div>
					<div></div>
				</li>
			</ul>
		
			<ul id="facebook_likes">
				<li id="facebook_header" class="headlineLargeGray">
					<span>FACEBOOK</span>
				</li>
				<li>
					<div id="facebook_cta"><a href=""><img src="../images/facebook_likes.png"></a><span>LIKES</span></div>
					<div></div>
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
	      </li>
	  </ul>
	</div>
</div>
  
<?php include('../footer.php'); ?>