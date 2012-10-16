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
						<div class="fb-like" data-href="http://sfsuperbowl.com" data-send="false" data-width="49" data-show-faces="false" data-font="arial"></div>
					</div>
                    <div id="facebook_likes_count">
				        <!--<div id="facebook_count_bg" class="supportersNumbersGrey">888,888</div>-->    
                        <ul class="numbers_small">                                       
                            <li class="nil">0</li>                                        
                            <li class="nil">0</li>
                            <li class="nil">0</li>
                            <li class="comma">,</li>
                            <li class="nil">0</li>
                            <li class="nil">0</li>
                            <li class="nil">0</li>
                        </ul>
				        <div id="facebook_count" class="small" facebook_data="1"><ul class="numbers_small"><li class="one">1</li></ul></div>
                    </div>
				</li>
				<li>
					<div class="fb-like-box" data-href="http://facebook.com/SFSuperbowl"  data-border-color="#cccccc" data-width="425" data-height="185" data-show-faces="true" data-stream="false" data-header="false"></div>
				</li>
			</ul>
			
			<ul id="google_pluses" class="bgTextureLight">
				<li id="google_header" class="headlineMediumGray">
					<span>GOOGLE+</span>
				</li>
				<li>
					<div id="google_cta">
						<!-- Place this tag where you want the +1 button to render. -->
						<div class="g-plusone" data-annotation="none" data-href="http://sfsuperbowl.com"></div>
						<!-- Place this tag after the last +1 button tag. -->
						<script type="text/javascript">
						  (function() {
						    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
						    po.src = 'https://apis.google.com/js/plusone.js';
						    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
						  })();
						</script>
					<script type="text/javascript">
					  (function() {
					    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					    po.src = 'https://apis.google.com/js/plusone.js';
					    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					</div>
					<div id="google_plus_count">
				        <!--<div id="google_count_bg" class="supportersNumbersGrey">888,888</div>-->    
                        <ul class="numbers_small">
                            <li class="nil">0</li>                                        
                            <li class="nil">0</li>
                            <li class="nil">0</li>
                            <li class="comma">,</li>
                            <li class="nil">0</li>
                            <li class="nil">0</li>
                            <li class="nil">0</li>
                        </ul>
				        <div id="google_count" class="small" google_data="0"><ul class="numbers_small"><li class="zero">0</li></ul></div>
					</div>
				</li>
			</ul>
		
<!-- 		</div> -->
	  </div>  	
	  <ul id="supporters_footer" class="bgTextureLight">
		  <li>
			  <div class="headlineMediumGray">
				  <img src="../images/buzz_sign.png"><span>SFSUPERBOWL SUPPORTERS</span>
			  </div>
		  </li>
		  <li id="supporters_internal">
			  <p>Share you excitement for a Bay Area Super Bowl.</p>
	      </li>
  
	      <li id="supporters_count">
<!--	        <div id="gfb_count_bg" class="mediumNumbersGrey">888,888</div>    -->
                <ul class="numbers_medium">
                    <li class="nil">0</li>
                    <li class="nil">0</li>
                    <li class="nil">0</li>
                    <li class="comma">,</li>
                    <li class="nil">0</li>
                    <li class="nil">0</li>
                    <li class="nil">0</li>
                </ul>
	      	<div id="gfb_count" class="gfb_count medium"></div>
	      </li>
	  </ul>
	</div>
</div>
  
<?php include('../footer.php'); ?>