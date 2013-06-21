		 
		var HASHTAG = 'sanfrancisco'; // don't include the #
		var UPDATE_INTERVAL = 2000; // how often to update the hash tag in milliseconds
		var MAX_TWEETS = 10; // max number of tweets at a time. make this larger if the topic is popular
		var ANIM_SPEED = 500; // speed of animation
		 
		var tweets = new Array();
		var count = 0;
		var tweets_per_call = 0;
		var firstID = -1;
		 
		(function() {
		 
		// call the twitter api on a set interval
		setInterval( function()
			{
				$.getJSON( "http://search.twitter.com/search.json?q=%23" + HASHTAG + "&result_type=recent&rpp=5&callback=?", {}, function (data)
					{
						tweets_per_call = data.results.length;
						firstID = -1;
		
		// for each response, create a visual tweet
						$.each(data.results, handleTweets);
					});
			}, UPDATE_INTERVAL );
		})();
		 
		// handle the data from twitter
		function handleTweets( key, data )
		{
			tweetFound = false;
		 
		// see if tweet already exists, if so don't handle it and exit
			for( var i = 0; i < tweets.length; i++ )
		{
			if( tweets[ i ].tweet == data.text )
		{
			tweets_per_call--;
			return;
		}
		}
		 
		// increase tweet counter
		count++;
		 
		// if its the first tweet in a request, set it to the current counter
		if( firstID == -1 )
			{
				firstID = count;
			}
		 
		// add tweet to array
			tweets.push( { id : count, tweet : data.text } );
		 
		// add tweet to page
			addTweet( count, data );
		 
		// remove the oldest tweet if there are more than
			if( tweets.length > MAX_TWEETS )
		{
			$( '#' + tweets[0].id ).hide( ANIM_SPEED, removeTweet( tweets[0].id ) );
			tweets.shift();
			}
		}
		 
		// add tweet to html
		function addTweet( id, data )
		{
			var delayTime = ANIM_SPEED;
		 
		// set delay time for each tweet
			delayTime = ( id - firstID ) * ANIM_SPEED;
		 
		// use jquery to add html to the page
		$( '#tweets' ).prepend( "<article id='" + id + "'><table><tr><td><img src=" + data.profile_image_url + "><span class='user'>@" + data.from_user + "</span> " + data.text + "</td></tr></table></article>" );
		 
		// hide the tweet so it can be animated in
		$( '#' + id ).hide( 0 );
		 
		// delay the display of the tweet until the ones in front of it have finished
		setTimeout(function()
		{
			$( '#' + id ).slideDown( ANIM_SPEED );
		}, delayTime);
		 
		}