<?php include('../header.php'); ?>
<div id="dynamic">
	<div id="twitter_overlay_top"></div>
	<div id="twitter_overlay_bottom"></div> 
	
	<div class="twitter bgTextureLight">
	
		<?php include('tweet_code.php'); ?>
	
		<div id="ticker" class="query">
			<div id="filler_tweet"></div>
		</div>
	
	</div>
	<ul id="twitter_footer" class="bgTextureLight">
		<li id="twitter_headline">
			<div class="headlineMediumGray">
				<img class="headlineHashTag" src="../images/buzz_sign.png"><span>SFSUPERBOWL TWEETS</span>
			</div>
		</li>
		
		<li id="social">
			<p>Build the buzz.</p>
			<ul class="links">
				<li id="tweet">
					<a onclick="_gaq.push(['_trackSocial', 'twitter', 'share', 'share_tweet']);" href="https://twitter.com/intent/tweet?button_hashtag=SFSUPERBOWL&text=Let&rsquo;s&nbsp;bring&nbsp;the&nbsp;Bowl&nbsp;to&nbsp;the&nbsp;Bay!&nbsp;Show&nbsp;your&nbsp;support.#sfsuperbowl" class="twitter-share-button" data-dnt="true" data-count="none" data-size="large">Tweet</a>
					
				</li>
				
				<li id="follow">
					<a onclick="_gaq.push(['_trackSocial', 'twitter', 'share', 'share_follow']);" href="https://twitter.com/sfsuperbowl" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow</a>
					
				</li>
			</ul>
		</li>
                
                <style>
                    
                </style>
                
		<li id="twitter_number_count">
			<ul class="numbers_medium">
				<li class="nil">0</li>
				<li class="nil">0</li>
				<li class="nil">0</li>
				<li class="comma_gray">,</li>
				<li class="nil">0</li>
				<li class="nil">0</li>
				<li class="nil">0</li>
			</ul>
			<div id="twitter_count" class="tweets_count medium "></div>
                        
		</li>
                
	</ul>	
</div>
<?php include('../footer.php'); ?>

