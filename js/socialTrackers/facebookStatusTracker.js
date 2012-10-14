/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var FacebookStatusTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('facebook_status_data', '../services/output.json', elem);
        
        var self = this;
        
        $(window).on('facebook_status_data', function(evt, data) {
            console.dir(data)
            self.outputThree(data.output.facebook_statuses);
        });
        
//        window.addEventListener('facebook_status_data', function(evt) {
//            
//            // data: evt.detail.data.output.facebook_statuses
////            console.log(evt.detail.data.output.facebook_statuses);
//            console.dir(evt.detail.data.output.facebook_statuses);
//            
//            self.outputThree(evt.detail.data.output.facebook_statuses);
//        }, false);
        
    },
    
    outputThree: function(data) {
//        $('#news').html(data);
        
        $('#news li').each(function(idx) {
            var entry = data.entries[idx];
            
            /*
	            
	            $(entry).each(function(idx) {
	            	// content: entry[idx].content
	            });
	            
	            
	            CSS SELECTORS
	            .post:first-child .img
	            
	            .post:nth-of-type[2] .img
	            
	            .post:last-child .img
	            
            */
            
            console.log('entry coming next');
            
            var str = '<div class="post">' + entry.content + '</div>';
            
            var img = $(str).find('img');
            
            console.dir(img);
            
//            var str = '<div class="post">'  + entry.content +'</div>';
            
//            var img = $(str).find(".img").remove();
//            var copy = $(str).text();
//            
//            
//            $(this).html(img);
//            $(this).append('<p class="feed_copy">' + copy + '</p>');

            
        });
    }
    
});

    