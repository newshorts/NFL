     <script type="text/javascript">
	     function randomString(length) {
		  var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz'.split('');
	      var str = '';
	      for (var i = 0; i < length; i++) {
		      str += chars[Math.floor(Math.random() * chars.length)];
		      }
		      return str;
		  }
		  var rnd = randomString(8);

		  jQuery(function($) {
			  $(".rnd").replaceWith(rnd);


			  $(".twitter .code").hide().each(function(i,e){
				  $(e).before($('').
                      click(function(ev) {
                      ev.preventDefault();
                      }));

                      }).each(function(i, e){ eval($(e).text()); });
                 });
  </script>    
    
    <div class="code">
        <script>
      jQuery(function($){
        $("#ticker").tweet({
          query: "#sfsuper OR #sfsuperbowl",
          page: 1,
          avatar_size: 48,
          count: 150,
          loading_text: "loading ..."
        }).bind("loaded", function() {
          var div = $(this).find(".tweet_list");
          var ticker = function() {
            setTimeout(function() {
              div.find('ul:first').animate( {marginTop: '-134px'}, 400, function() {
                $(this).detach().appendTo(div).removeAttr('style');
              });
              ticker();
            }, 5000);
          };
          ticker();
        });
      });
      </script>
    </div>