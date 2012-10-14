        </div><!-- /wrap -->
        
        
<!-- Facebook -->          
        <script> 
      FB.init({appId: "369308779814605", status: true, cookie: true});

      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          link: 'http://www.sfsuperbowl.com/',
          picture: 'http://sfsuperbowl.com/images/fb/sfsb_128x128.jpg',
          name: 'SF SUPERBOWL',
          caption: 'Share this',
          description: 'Bring Superbowl to San Francisco'
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
      }
    
    </script>
    
 <!-- Twitter -->     
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    
    
    
<!-- G+ -->    
    <script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>



    <script src="<?php echo ROOT; ?>/tweets/tweet.js" charset="utf-8"></script>
    </body>
    
     
     
     

</html>