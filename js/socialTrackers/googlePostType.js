var GooglePost = Class.extend({
    
    /**
     * Post reference to get all data for the entry
     * @access public
     * @var object
     */
    post: {},
    /**
     * Object reference inside the post object - contains meta about the attachments
     * @access public
     * @var object
     */
    object: {},
    
    /**
     * An array of attachments for the post
     * @access public
     * @var array
     */
    attachments: new Array(),
    
    /**
     * Formatted post for output to page
     * @access public
     * @var string
     */
    formattedPost: '',
    
    /**
     * Construct
     * @access public
     * 
     * The following information is global on every post
     * 
     * this.post.title;
     * this.post.published;
     * this.post.url;
     */
    init: function(entry) {
        
        var str = '';
        
        if(typeof entry === "undefined") {
            return;
        }

        if(typeof entry.object === "undefined") {
            return;
        }
        
        this.post = entry;
        this.object = entry.object;
        
        switch(this.post.verb) {
            case 'post':
                
                if(typeof entry.object.attachments !== "undefined") {
                    this.attachments = entry.object.attachments;
                    str = this.formatPostWithAttachments()
                } else {
                    str = this.formatPostWithoutAttachments()
                }

                break;
            case 'share':
                
                if(typeof entry.object.attachments !== "undefined") {
                    this.attachments = entry.object.attachments;
                    str = this.formatShareWithAttachments()
                } else {
                    str = this.formatShareWithoutAttachments()
                }
                
                break;
                
        }
        
        this.formattedPost = str;
        
    },
    
    /**
     * Format the attachments and return an object container media
     * @access public
     * @return object 
     */
    formatAttachments: function() {
        
        var results = {};
        
        for(var i = 0, l = this.attachments.length; i < l; i++) {
            
//            var firstClass = (i === 0) ? 'class="first_li"' : '';
            
            switch(this.attachments[i].objectType) {
                case 'video':
                    
                    var output =        '<li class="video">';
                    output +=               '<div>';
                    output +=                   '<span>';
                    output +=                       '<a href="'+this.attachments[i].embed.url+'">';
                    output +=                           '<img src="'+this.attachments[i].image.url+'" />';
                    output +=                       '</a>';
                    output +=                   '</span>';
                    output +=               '</div>';
                    output +=           '</li>';
                    
                    results.video = output;
                    break;
                case 'photo':
                    var output =        '<li class="image">';
                    output +=               '<div>';
                    output +=                   '<span>';
                    output +=                       '<a href="'+this.attachments[i].url+'">';
                    output +=                           '<img src="'+this.attachments[i].image.url+'" />';
                    output +=                       '</a>';
                    output +=                   '</span>';
                    output +=               '</div>';
                    output +=           '</li>';
                    
                    results.photo = output;
                    break;
                case 'article':
                    var output =        '<li class="article">';
                    output +=               '<div>';
                    output +=                   '<h4><a href="'+this.attachments[i].url+'">'+this.attachments[i].displayName+'</a></h4>';
                    output +=                   '<p>'+this.attachments[i].content+'</p>';
                    output +=               '</div>';
                    output +=           '</li>';
                    
                    results.article = output;
                    break;
            }
            
        }
        
        return results;
        
    },
    
    /**
     * Format a post with media and return an html output
     * @access public
     * @return string 
     */
    formatPostWithAttachments: function() {
        
        var entry = this.post;
        var object = this.object;
        var attachments = this.attachments;
        
        var media = this.formatAttachments();
        
//        var post =      '<a href="'+entry.url+'" target="_blank">';
        var post =      '';
            post +=         '<ul class="single_post">';    
            post +=             (typeof media.photo === "undefined") ? '' : media.photo;
            post +=             (typeof media.video === "undefined") ? '' : media.video;
            post +=             '<li class="title">';
            post +=                 '<h3><a href="'+entry.url+'">'+entry.title+'</a></h3>';
            post +=             '</li>';
            post +=             (typeof media.article === "undefined") ? '' : media.article;
            post +=             '<li class="meta">';
            post +=                 (entry.plusoners > 0) ? '<span class="plusones">'+entry.plusoners.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="replies">'+entry.replies.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="resharers">'+entry.resharers.totalItems+'</span>' : '';
            post +=                 '<span>' + prettyDate(entry.published) + '</span>';
            post +=             '</li>';
            post +=         '</ul>'
//            post +=     '</a>';
            post +=     '';
            
        return post;
    },
    
    /**
     * Format a post without media and return a string of html
     * @access public
     * @return string 
     */
    formatPostWithoutAttachments: function() {
        var entry = this.post;
        var object = this.object;
        var attachments = this.attachments;
        
//        var post =      '<a href="'+entry.url+'" target="_blank">';
        var post =      '';
            post +=         '<ul class="single_post">';    
            post +=             '<li class="title">';
            post +=                 '<h3><a href="'+entry.url+'">'+entry.title+'</a></h3>';
            post +=             '</li>';
            post +=             '<li class="meta">';
            post +=                 (entry.plusoners > 0) ? '<span class="plusones">'+entry.plusoners.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="replies">'+entry.replies.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="resharers">'+entry.resharers.totalItems+'</span>' : '';
            post +=                 '<span>' + prettyDate(entry.published) + '</span>';
            post +=             '</li>';
            post +=         '</ul>'
//            post +=     '</a>';
            post +=     '';
            
        return post;
    },
    
    /**
     * Format a post with media and return an html output
     * @access public
     * @return string 
     */
    formatShareWithAttachments: function() {
        
        var entry = this.post;
        var object = this.object;
        var attachments = this.attachments;
        
        var media = this.formatAttachments();
        
//        var post =      '<a href="'+entry.url+'" target="_blank">';
        var post =      '';
            post +=         '<ul class="single_post">';    
            post +=             (typeof media.photo === "undefined") ? '' : media.photo;
            post +=             (typeof media.video === "undefined") ? '' : media.video;
            post +=             '<li class="title">';
            post +=                 '<h3><a href="'+entry.url+'">'+entry.title+'</a></h3>';
            post +=             '</li>';
            post +=             (typeof media.article === "undefined") ? '' : media.article;
            post +=             '<li class="meta">';
            post +=                 (entry.plusoners > 0) ? '<span class="plusones">'+entry.plusoners.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="replies">'+entry.replies.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="resharers">'+entry.resharers.totalItems+'</span>' : '';
            post +=                 '<span>' + prettyDate(entry.published) + '</span>';
            post +=             '</li>';
            post +=         '</ul>'
//            post +=     '</a>';
            post +=     '';
            
        return post;
    },
    
    /**
     * Format a post without media and return a string of html
     * @access public
     * @return string 
     */
    formatShareWithoutAttachments: function() {
        var entry = this.post;
        var object = this.object;
        var attachments = this.attachments;
        
//        var post =      '<a href="'+entry.url+'" target="_blank">';
        var post =      '';
            post +=         '<ul class="single_post">';    
            post +=             '<li class="title">';
            post +=                 '<h3><a href="'+entry.url+'">'+entry.title+'</a></h3>';
            post +=             '</li>';
            post +=             '<li>';
            post +=                 '<p>'+entry.annotation+'</p>';
            post +=             '</li>';
            post +=             '<li class="meta">';
            post +=                 (entry.plusoners > 0) ? '<span class="plusones">'+entry.plusoners.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="replies">'+entry.replies.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="resharers">'+entry.resharers.totalItems+'</span>' : '';
            post +=                 '<span>' + prettyDate(entry.published) + '</span>';
            post +=             '</li>';
            post +=         '</ul>'
//            post +=     '</a>';
            post +=     '';
            
        return post;
    },
    
    getFormattedPost: function() {
        return this.formattedPost;
    }
    
});