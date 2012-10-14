/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var FacebookStatusTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('facebook_status_data', '../services/output.json', elem);
        
        var self = this;
        
        var once = true;
        
        $(window).on('facebook_status_data', function(evt, data) {
            console.dir(data)
            
            if(once) {
                self.outputThree(data.output.facebook_statuses);
                
                once = false;
            }
            
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
            
            var div = document.createElement('div');
            
            $(div).addClass('post').html(entry.content);
            
//            var str = '<div class="post">' + entry.content + '</div>';
            
            var jImg = $(div).find('img');
            var jAnchors =  $(div).find('a');
            
            var img = document.createElement('img');
            img = jImg[0];
            
            $(jAnchors).each(function(idx) {
                if($(jAnchors[idx]).find('img')) {
//                    $(jAnchors[idx]).remove();
                }
            });
            
            $(div).find('img').remove();
            $(div).find('br').remove();
            
            var _img = $(img);
            var width = _img.width();
            var height = _img.height();
            
            console.dir(_img);
            
            $(this).html('<div class="imgContainer"></div>');
            $(this).find('.imgContainer').html(img);
            
            var _img = $('.imgContainer img');
            var width = _img.width();
            var height = _img.height();
            
            _img.css({
                top: '-5px',
                left: '-25px'
//                top: 0 - (width / 2),
//                left: 0 - (height / 2)
            });
            
            $(this).append(div);
            
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

    