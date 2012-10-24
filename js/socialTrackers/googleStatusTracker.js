var GoogleStatusTracker = SocialTracker.extend({
    
    entries: {},
    post: {},
    
    init: function(elem) {
        this._super('google_status_data', '../services/output.json', elem);
        
        var self = this;
        
        var once = true;
        
        $(window).on('google_status_data', function(evt, data) {
            
            if(once) {
                
                self.entries = data.output.google_statuses.items;

                self.outputPost();
                
                once = false;
            }
            
        });
    },
    
    outputPost: function() {
        
        var entries = this.entries;
        
        var output = '';
        
        for(var i = 0, len = entries.length; i < len; i++) {
            output += this.formatMedia(entries[i]);
        }
        
        $('#plus_post').append(output);
        
        
    },
    
    formatMedia: function() {
        
        var entry = this.entries[0];
        
        if(typeof entry.object.attachments === "undefined") {
            // break out
            console.log('going to blank format')
            return;
        }
        
//        if(typeof entry.object.attachments[0].displayName === "undefined") {
//            // break out
//            console.log('going to blank format')
//            return;
//        }
        
//        console.dir(this.post.attachmentType);
        var media = '';
        if(entry.object.attachments[0].image.url) {
            media = '<a href="'+entry.url+'"><img src="'+entry.object.attachments[0].image.url+'" alt="Plus Image Here..." /></a>';
        }
        
        var displayName = (typeof entry.object.attachments[0].displayName === "undefined") ? '' : entry.object.attachments[0].displayName;
        var content = (entry.object.attachments[0].content.search(/.jpg/i) > 0) ? '' : entry.object.attachments[0].content;
//        var content = entry.object.attachments[0].content;
        
        var post =      '<a href="'+entry.url+'" target="_blank"><ul class="single_post">';
            post +=             '<li id="first_li">';
            post +=                 '<div class="image_mask"><span>'+media+'</span></div>';
            post +=             '</li>';
            post +=             '<li>';
            post +=                 '<h3>'+entry.title+'</h3>';
            post +=				'</li>';
            post +=				'<li>';
            post +=                 '<h4>' + displayName + '</h4>';
            post +=                 '<p>'+content+'</p>';
            post +=             '</li>';
//            post +=             '<li>';
//            post +=                 (entry.plusoners > 0) ? '<span class="plusones">'+entry.plusoners.totalItems+'</span>' : '';
//            post +=                 (entry.plusoners > 0) ? '<span class="replies">'+entry.replies.totalItems+'</span>' : '';
//            post +=                 (entry.plusoners > 0) ? '<span class="resharers">'+entry.resharers.totalItems+'</span>' : '';
//            post +=                 '<span>' + prettyDate(entry.published) + '</span>';
 //           post +=             '</li>';
            post +=     '</ul></a>';
            
//        if(this.post.attachmentType == 'photo') {
//            $('#plus_post > div').append('<img src="'+this.post.attachmentImage+'" alt="Plus Image Here..." />');
//            $('#plus_post > div').append('<h3>' + this.post.title + '</h3>');
//            $('#plus_post > div').append('<p>' + this.post.attachmentContent + '</p>');
//            $('#plus_post > div').append('<span>' + this.post.date + '</span>');
//            console.log('posting google status with photo');
//            return;
//        }
        
//        if(this.post.attachmentType == 'video') {
//            $('#plus_post > div').append('<img src="'+this.post.attachmentImage+'" alt="Plus Image Here..." />');
//            $('#plus_post > div').append('<h3>' + this.post.title + '</h3>');
//            $('#plus_post > div').append('<p>' + this.post.attachmentContent + '</p>');
//            $('#plus_post > div').append('<span>' + this.post.date + '</span>');
//            console.log('posting google status with video');
//            return;
//        }
        
//        if(this.post.attachmentType == 'article') {
//            $('#plus_post > div').append('<h3>' + this.post.title + '</h3>');
//            $('#plus_post > div').append('<div><a href="'+this.post.attachmentLink+'"><h4>' + this.post.attachmentTitle + '</h4></a><p>'+this.post.attachmentContent+'</p><span>' + this.post.date + '</span></div>');
//            console.log('posting google status with article');
//            return;
//        }
        
//        $('#plus_post').append(post);
//        
//        console.log('unable to post google status');
        return post;
        
    },
    
    formatBlank: function() {
        $('#plus_post > div').append('<h3>' + this.post.title + '</h3>');
        $('#plus_post > div').append('<p>' + this.post.attachmentContent + '</p>');
        $('#plus_post > div').append('<span>' + this.post.date + '</span>');
        console.log('posting blank format');
    }
    
});