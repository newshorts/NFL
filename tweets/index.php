<?php include('../header.php'); ?>


<div id="dynamic">
<div id="twitter_overlay_top"></div>
<div id="twitter_overlay_bottom"></div> 

  <div class="twitter bgTextureLight">
  
  	<?php include('tweet_code.php'); ?>
    
    <div id="ticker" class="query"></div>
    
  </div>
  <ul id="twitter_footer" class="bgTextureLight">
	<li id="twitter_headline">
		<div class="headlineMediumGray">
			<img src="../images/buzz_sign.png"><span>SFSUPERBOWL TWEETS</span>
		</div>
	</li>
	<li id="social">
            <p>Add to the Super Bowl buzz and show your support via Twitter.</p>
            <ul class="links">
                <li id="tweet">
                	<a href="https://twitter.com/intent/tweet?button" class="twitter-hashtag-button" data-size="large">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</li>
                <li id="follow">
                	<a href="https://twitter.com/sfsuperbowl" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</li>
            </ul>
    </li>
    <li id="twitter_number_count">
        <div id="twitter_count_bg" class="mediumNumbersGrey">888,888</div>    
        <div id="twitter_count" class="tweets_count mediumNumbersOrange"></div>
    </li>
  </ul>
  
</div>
  
<?php include('../footer.php'); ?>

