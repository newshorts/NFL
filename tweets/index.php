
<?php include('../header.php'); ?>


<div id="dynamic">
<div id="twitter_overlay_top"></div>
<div id="twitter_overlay_bottom"></div> 

  <div class="twitter bgTextureLight">
  
  	<?php include('tweet_code.php'); ?>
    
    <div id="ticker" class="query"></div>
    
  </div>
  <ul id="twitter_footer" class="bgTextureLight">
	<li>
		<div class="headlineMediumGray">
			<img src="../images/buzz_sign.png"><span>SFSUPERBOWL TWEETS</span>
		</div>
	</li>
	<li id="social">
            <p>Add to the Super Bowl buzz and show your support via Twitter.</p>
            <ul class="links">
                <li id="tweet"><a href="twitter.com/tweet" target="_blank"><img src="../images/tweet_button.png"><span>Tweet</span></a></li>
                <li id="follow"><a href="twitter.com/follow" target="_blank"><img src="../images/follow_button.png"><span>Follow</span></a></li>
            </ul>
	</li>
        <li id="twitter_count" class="mediumNumbersOrange">
            
        </li>
  </ul>
  
</div>
  
<?php include('../footer.php'); ?>

