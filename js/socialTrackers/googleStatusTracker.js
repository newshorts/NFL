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
        
        console.dir(this.entries[0])
        
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
        
        if(typeof entry.object.attachements === "undefined") {
            // break out
            this.formatBlank();
            return;
        }
        
        var attachment = entry.object.attachements[0];
        
        if(typeof entry.object.attachements[0].content != "undefined") {
            // has content of attachement
            this.post.attachementContent = entry.object.attachements[0].content;
        }
        
        if(typeof entry.object.attachements[0].displayName != "undefined") {
            // has title of the attachement
            this.post.attachementTitle = entry.object.attachements[0].displayName;
        }
        
        if(typeof entry.object.attachements[0].embed != "undefined") {
            // has embeded content
            this.post.attachementEmbed = entry.object.attachements[0].embed.url;
        }
        
        if(typeof entry.object.attachements[0].image != "undefined") {
            // has image
            this.post.attachementImage = entry.object.attachements[0].image.url;
        }
        
        if(typeof entry.object.attachements[0].url != "undefined") {
            // has link out
            this.post.attachementLink = entry.object.attachements[0].url;
        }
        
        if(typeof entry.object.attachements[0].objectType != "undefined") {
            // has link out
            this.post.attachementType = entry.object.attachements[0].objectType;
        }
        
        this.formatMedia();
        
    },
    
    formatMedia: function() {
        $('#plus_post > div').append('<img src="'+this.post.attachementImage+'" alt="Plus Image Here..." />');
        $('#plus_post > div').append('<h3>' + this.post.attachementTitle + '</h3>');
        $('#plus_post > div').append('<p>' + this.post.attachementContent + '</p>');
        $('#plus_post > div').append('<span>' + this.post.date + '</span>');
    },
    
    formatBlank: function() {
//        $('#plus_post > div').append('<img src="'+this.post.attachementImage+'" alt="Plus Image Here..." />');
        $('#plus_post > div').append('<h3>' + this.post.attachementTitle + '</h3>');
        $('#plus_post > div').append('<p>' + this.post.attachementContent + '</p>');
        $('#plus_post > div').append('<span>' + this.post.date + '</span>');
    }
});