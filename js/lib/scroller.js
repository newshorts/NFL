var Scroller = Class.extend({
    
    _train: {},
    train: {},
    cars: {},
    alternate: -1,
    dist: 0,
    
    
    init: function(ul, dist) {
        this._train = ul;
        this.train = $(this._train);
//        this.cars = this.train.find('ul');
        this.cars = $(ul + ' > ul');
        
        this.dist = dist;
        
        this.setPositions();
        
        this.ticker();
        
        this.getTweet();
    },
    
    setPositions: function() {
        
        var self = this;
        
        $('.trainCar').each(function(idx) {
            
            var _this = $(this);
            
            var left = (idx * self.dist);

            var newLeft = (idx * self.dist) - (self.dist);

            _this.css({
                position: 'absolute',
                margin: 0,
                left: left
            });
            
            _this.data('pos', left);
            
        });
        
    },
    
    ticker: function() {
        
        var self = this;
        
        setInterval(function() {
            self.moveLeft();
            this.alternate *= -1;
        }, 5000);
    },
    
    moveLeft: function() {
        
        var self = this;
        
        var dist = self.dist;
        
        var reset = (dist * (self.cars.length - 1));
        
        $('.trainCar').each(function() {
            var pos = $(this).data('pos');
            
            var newPos = pos - dist;
            
            if(pos == 0) {
                
                $(this).data('pos', newPos);
                $(this).animate({
                    left: newPos
                }, 700, function() {
                    // complete
                    $(this).data('pos', reset);
                    $(this).css({
                        left: reset
                    });
                });
            
            } else {
                
                $(this).data('pos', newPos);
                $(this).animate({
                    left: newPos
                }, 700, function() {
                    // complete
                    
                });
                
            }
            
        });
    },
    
    getTweet: function() {
        
        var self = this;
        
        $.getJSON('../services/output.json', function(data) {
            var tweet = data.output.latest_tweet[0];
            
            self.replaceTweetData(tweet);
        });
    },
    
    replaceTweetData: function(tweet) {
        
        console.dir(tweet);
        
        var userLink = 'http://twitter.com/' + tweet.username;
        
        $('.tweet_avatar').attr('href', userLink);
        $('.tweet_avatar img').attr('src', tweet.profile_img);
        $('.screenname p').text(tweet.name);
        $('.tweet_user').attr('href', userLink);
        $('.tweet_user').text(tweet.username);
        var tags = this.wrapTags(tweet.text);
        
        var parsedText = '';
        for(var i = 0; i < tags.length; i++) {
            parsedText = tweet.text.replace(tags[i].tag, tags[i].wrap);
        }
        
        $('.tweet_text').html(parsedText);
        
    },
    
    wrapTags: function(text) {
        var hashpattern = /(#[A-Za-z0-9-_]+)/g;
        var hash = text.match(hashpattern);
        var wrapped = new Array();
        for(var i = 0; i < hash.length; i++) {
            var tag = hash[i];
            var noTag = hash[i].replace('#', '');
            wrapped.push({
                wrap: '<a href="http://search.twitter.com/search?q=&amp;tag='+noTag+'&amp;lang=all" class="tweet_hashtag" target="_blank">' + tag + '</a>',
                tag: tag
            });
        }
        
        return wrapped;

    },
    
    getInstagrams: function() {
        
    }
});
