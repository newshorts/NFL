<?php include('../header.php'); ?>
<div id="dynamic">
  <div class="supporters">
	  <div id="supporters_main">
		  <ul id="facebook_likes" class="bgTextureLight">
			  <li id="facebook_header" class="headlineMediumGray">
				<span>FACEBOOK</span>
			  </li>
			  <li id="facebook_like_button">
				<div id="facebook_cta">
					<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsfsuperbowl.com&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=35&amp;appId=423821150969335" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true"></iframe>
				</div>
                <div id="facebook_likes_count">
                    <ul class="numbers_small">                                       
                        <li class="nil">0</li>                                        
                        <li class="nil">0</li>
                        <li class="nil">0</li>
                        <li class="comma_gray">,</li>
                        <li class="nil">0</li>
                        <li class="nil">0</li>
                        <li class="nil">0</li>
                    </ul>
                    <div id="facebook_count" class="small"><ul class="numbers_small"><li class="one">1</li></ul></div>
                </div>
			</li>
			<li id="facebook_box">
				<div id="facebook_box_inner">
					<div class="fb-like-box" data-href="http://facebook.com/SFSuperbowl"  data-border-color="#cccccc" data-width="425" data-height="447" data-show-faces="true" data-stream="false" data-header="false"></div>
				</div>
			</li>
		</ul>
		<ul id="google_pluses" class="bgTextureLight">
			<li id="google_header" class="headlineMediumGray">
				<span>GOOGLE+</span>
			</li>
			<li>
				<div id="google_cta" onclick="_gaq.push(['_trackSocial', 'google', 'share', 'support_plus']);">
                                    <div class="g-plusone" data-annotation="none" data-href="http://sfsuperbowl.com" data-callback="googlePlusOne"></div>
                                    <script type="text/javascript">
                                        (function() {
                                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                                po.src = 'https://apis.google.com/js/plusone.js';
                                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);

                                                googlePlusOne = function(params) {
                                                    console.dir(params)
                                                    if(params.state == 'on') {
                                                        console.log('inside the if statement')
                                                        _gaq.push(['_trackSocial', 'google', 'share', 'support_plus1']);
                                                    }
                                                };
                                        })();
                                    </script>
				</div>
				<div id="google_plus_count">
                                <ul class="numbers_small">
                                    <li class="nil">0</li>                                        
                                    <li class="nil">0</li>
                                    <li class="nil">0</li>
                                    <li class="comma_gray">,</li>
                                    <li class="nil">0</li>
                                    <li class="nil">0</li>
                                    <li class="nil">0</li>
                                </ul>
			        <div id="google_count" class="small"><ul class="numbers_small"><li class="zero">0</li></ul></div>
				</div>
			</li>
	        <li id="plus_post"></li>
		</ul>
	</div> <!---- CLOSE SUPPORTERS_MAIN ---->
	
	<ul id="supporters_footer" class="bgTextureLight">
		<li>
			<div class="headlineMediumGray">
				<img class="headlineHashTag" src="<?php echo ROOT; ?>images/buzz_sign.png"><span>SFSUPERBOWL SUPPORTERS</span>
			</div>
		</li>
		<li id="supporters_internal">
			<p>Share your excitement for a Bay Area Super Bowl.</p>
	    </li>
	    <li id="supporters_count">
	        <ul class="numbers_medium">
	            <li class="nil">0</li>
	            <li class="nil">0</li>
	            <li class="nil">0</li>
	            <li class="comma_gray">,</li>
	            <li class="nil">0</li>
	            <li class="nil">0</li>
	            <li class="nil">0</li>
	        </ul>
	      	<div id="gfb_count" class="gfb_count medium"></div>
	     </li>
	  </ul>
	</div> <!---- CLOSE SUPPORTERS ---->
</div> <!---- CLOSE DYNAMIC ---->
  
<?php include('../footer.php'); ?>