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

                self.output();
                
                once = false;
            }
            
        });
    },
    
    output: function() {
        
        var entry = this.entries[0];
        
        if(typeof entry.content != "undefined") {
            this.post.content = entry.content;
        }
        
        if(typeof entry.title != "undefined") {
            // has title
            this.post.title = entry.title;
        }
        
        if(typeof entry.published != "undefined") {
            // has title
            this.post.date = entry.published;
        }
        
        if(typeof entry.object.attachments === "undefined") {
            // break out
            console.log('going to blank format')
            this.formatBlank();
            return;
        }
        
        var attachment = entry.object.attachments[0];
        
        if(typeof attachment.content != "undefined") {
            // has content of attachment
            this.post.attachmentContent = attachment.content;
        }
        
        if(typeof attachment.displayName != "undefined") {
            // has title of the attachment
            this.post.attachmentTitle = attachment.displayName;
        }
        
        if(typeof attachment.embed != "undefined") {
            // has embeded content
            this.post.attachmentEmbed = attachment.embed.url;
        }
        
        if(typeof attachment.image != "undefined") {
            // has image
            this.post.attachmentImage = attachment.image.url;
            this.post.attachmentImageWidth = attachment.image.width;
            this.post.attachmentImageHeight = attachment.image.height;
        }
        
        if(typeof attachment.url != "undefined") {
            // has link out
            this.post.attachmentLink = attachment.url;
        }
        
        if(typeof attachment.objectType != "undefined") {
            // has link out
            this.post.attachmentType = attachment.objectType;
        }
        
        console.log('posting to media format')
        console.dir(this.post)
        
        this.formatMedia();
        
    },
    
    formatMedia: function() {
        
        console.dir(this.post.attachmentType);
        
        var media = ''
        if(this.post.attachmentType == 'photo' || this.post.attachmentType == 'video') {
            media = '<img src="'+this.post.attachmentImage+'" alt="Plus Image Here..." />';
        }
        
        var article = '';
        
        if(this.post.attachmentType == 'article') {
            article +=                      '<div>';
            article +=                          '<h4><a href="'+this.post.attachmentLink+'">' + this.post.attachmentTitle + '</a></h4>';
            article +=                          '<p>'+this.post.attachmentContent+'</p>';
            article +=                      '</div>';
        }
        
        var russellFormat =             '<div>';
            russellFormat +=                media;
            russellFormat +=                '<h3>' + this.post.title + '</h3>';
            russellFormat +=                '<span>' + this.post.date + '</span>';
            russellFormat +=                '<p>' + this.post.content + '</p>';
            russellFormat +=                article;
            russellFormat +=            '</div>';
        
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
        
        $('#plus_post').append(russellFormat);
        
        console.log('unable to post google status');
        return;
        
    },
    
    formatBlank: function() {
        $('#plus_post > div').append('<h3>' + this.post.title + '</h3>');
        $('#plus_post > div').append('<p>' + this.post.attachmentContent + '</p>');
        $('#plus_post > div').append('<span>' + this.post.date + '</span>');
        console.log('posting blank format');
    },
    
    cropImage: function() {
        
    }
    
});