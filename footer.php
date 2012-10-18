
<?php if(DEVICE_TYPE != 'computer') : ?>
<div id="border"></div>
<?php endif; ?>

            </div><!-- /container --> 

        </div><!-- /wrap -->
    
 <!-- Twitter -->     
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    
    <script src="<?php echo ROOT; ?>/tweets/tweet.js" charset="utf-8"></script>
    
    
    
<!-- G+ -->    
    <script type="text/javascript">
	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/plusone.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>
	
	
	
<!-- FACEBOOK --> 
	<script> 
      FB.init({appId: "369308779814605", status: true, cookie: true});

      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          link: 'http://www.sfsuperbowl.com/',
          picture: 'http://www.sfsuperbowl.com/images/fb/sfsb_128x128.jpg',
          name: 'SFSUPERBOWL',
          caption: '',
          description: 'Help bring the Bowl to the bay. Share why you think the Bay Area is a perfect host for Super Bowl 50. Use #SFSuperbowl or Like this page for updates, news and events.'
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
      }
    
    </script>	
	




    </body>
    
</html>