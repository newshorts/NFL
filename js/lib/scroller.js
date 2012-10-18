var Scroller = Class.extend({
    
    _train: {},
    train: {},
    cars: {},
    alternate: -1,
    dist: 0,
    on: true,
    deviceType: '',
    
    
    init: function(ul, dist, type) {
        this._train = ul;
        this.train = $(this._train);
//        this.cars = this.train.find('ul');
        this.cars = $(ul + ' > ul');
        
        this.dist = dist;
        
        this.deviceType = type;
        
        // events
        var self = this;
        
        $(window).on('stop_scroller', function() {
            self.stop();
        });
        
        $(window).on('start_scroller', function() {
            self.start();
        });
        
        $(window).on('orientationchange', function(evt) {
            self.checkOrientation();
        });
        
        // setup
        this.setPositions();
        
        this.ticker();
        
        this.getTweet();
    },
    
    checkOrientation: function() {
        
        if(this.deviceType == 'tablet') {
            var orientation = Math.abs(window.orientation) == 90 ? 'landscape' : 'portrait';

            if(orientation == 'portrait') {
                this.stop();
                this.changeClassNames('small','medium');
            } else {
                this.start();
                this.changeClassNames('medium','small');
            }
        }
        
        if(this.deviceType == 'computer') {
            this.start();
        }
        
    },
    
    changeClassNames: function(from, to) {
        $('.' + from).removeClass(from).addClass(to);
        $('.numbers_' + from).removeClass('numbers_'+from).addClass('numbers_'+to);
        $('.' + from + 'NumbersOrange').removeClass(from + 'NumbersOrange').addClass(to + 'NumbersOrange');
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
            
            self.checkOrientation();
            
            if(self.on) {
                self.moveLeft();
                this.alternate *= -1;
            }
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
        
        $.ajax({
            url:'http://sfsuperbowl.com/services/output.json.php?callback=?',
            dataType: 'jsonp', // Notice! JSONP <-- P (lowercase)
            success: function(data){
                
                if(typeof data.output.latest_tweet != "undefined") {
                    
                    if(data.output.latest_tweet.length > 0) {
                        var tweet = data.output.latest_tweet[0];
                        self.replaceTweetData(tweet);
                    } else {
                        console.log('no tweets')
                    }
                    
                } else {
                    console.log('tweets is undefined')
                }
                
            },
            error: function(){
                console.log("Error unable to retrieve json file from instagram page");
            }
        });
        
//        $.getJSON('../services/output.json', function(data) {
//            var tweet = data.output.latest_tweet[0];
//            
//            self.replaceTweetData(tweet);
//        });
    },
    
    replaceTweetData: function(tweet) {
        
        console.dir(tweet);
        
        var userLink = 'http://twitter.com/' + tweet.username;
        
        $('.tweet_profile_img a').attr('href', userLink);
        $('.tweet_profile_img img').attr('src', tweet.profile_img);
        $('.tweet_name p:first-child a').text(tweet.name);
        $('.tweet_name p:first-child a').attr('href', userLink);
        $('.tweet_name p:last-child a').attr('href', userLink);
        $('.tweet_name p:last-child a').text(tweet.username);
        var tags = this.wrapTags(tweet.text);
        
        var parsedText = '';
        for(var i = 0; i < tags.length; i++) {
            parsedText = tweet.text.replace(tags[i].tag, tags[i].wrap);
        }
        
        $('.banner_tweet_text').html('<span class="begin_quote"></span>' + parsedText + '<span class="end_quote"></span>');
        
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
        
    },
    
    stop: function() {
        this.on = false;
    },
    
    start: function() {
        this.on = true;
    }
});
