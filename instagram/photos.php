<?php
    // do nothing?
?>
<iframe id="instagram" name="photos" frameborder="0" src="../prototypes/instagram/index.html" width="998" height="316" scrolling="no"></iframe>


  <ul id="instagram_footer" class="bgTextureLight">
	<li>
            <div class="headlineMediumGray">
                <img class="headlineHashTag" src="<?php echo ROOT; ?>images/buzz_sign.png"><span>SFSUPERBOWL PHOTOS</span>
            </div>
	</li>
	<li id="instagram_social">
            <p>Share why the Bay Area is the perfect site for Super Bowl 50. Tag your photos <a onclick="_gaq.push(['_trackEvent', 'instagram', 'click', 'hashtag']); " href="http://statigr.am/tag/sfsuperbowl/" target="_blank">#SFSuperBowl</a>.</p>
            <ul class="links">
                <li id="instagram_button"><a onclick="_gaq.push(['_trackEvent', 'instagram', 'click', 'icon']);" href="http://statigr.am/tag/sfsuperbowl/" target="_blank"><img src="../images/instagram_button.png"></a></li>
            </ul>
	</li>
	<li id="instagram_count">
            <!--<div id="instagram_photo_count_bg" class="mediumNumbersGrey">888,888</div>-->    
            <ul class="numbers_medium">
                <li class="nil">0</li>
                <li class="nil">0</li>
                <li class="nil">0</li>
                <li class="comma_gray">,</li>
                <li class="nil">0</li>
                <li class="nil">0</li>
                <li class="nil">0</li>
            </ul>
            <div id="instagram_photo_count" class="instagram_photo_count mediumNumbersOrange medium"></div>
	</li>
        
  </ul>   
