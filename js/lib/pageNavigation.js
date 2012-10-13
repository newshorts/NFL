/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var PageNavigation = Class.extend({
    
    container: '',
    containerID: '',
    
    
    init: function(c) {
        this.container = $(c);
        this.containerID = c;
        
        var self = this;
        
        $('.ajaxify').on('click', function(evt) {
            evt.preventDefault();
            
            self.doLoad(evt);
        });
        
        $(window).on('hashchange', function(evt) {
            var url = $.bbq.getState("url");

            $('.ajaxify').each(function() {
                var href = $(this).attr('href');

                if(href === url) {
                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active');
                }
            });
            
            $.bbq.pushState({ url: href });

            // do something like load in the new html
        });
    },
    
    doLoad: function(evt) {
        
        var self = this;
        
        this.container.animate({
            opacity: 0
        }, 300, function() {
            
            var href = $(evt.currentTarget).attr('href');
            
            $.bbq.pushState({ url: href });
            
            // complete
            self.container.load(href + ' ' + self.containerID + ' > *', function() {
                
                // finished load
                self.container.animate({
                    opacity: 1
                }, 300, function() {
                    // complete
                    new PageNavigation('#dynamic');
                    
                    var gt = new GoogleTracker('#google_count');
                    var ft = new FacebookTracker('#facebook_count');
                    var tt = new TwitterTracker('#twitter_count');
                    var It = new InstagramTracker('#instagram_photo_count');
                    var gfb = new GfbTracker('#gfb_count');
                    var total = new TotalTracker('#total');
                })
            });
        });
        
        $(window).trigger( "hashchange" );
    }
    
    
});
