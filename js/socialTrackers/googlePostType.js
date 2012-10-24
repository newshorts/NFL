var Post = Class.extend({
    
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
        this.post = entry;
        this.object = entry.object;
        this.attachments = entry.object.attachments;
       
        switch(this.post.verb) {
            case 'post':
                // do some stuff here???
                break;
            case 'share':
                // so some stuff
                break;
        }
            
    },
    
    /**
     * Format the attachments and return an object container media
     * @access public
     * @return object 
     */
    formatAttachments: function() {
        
        var results = {};
        
        for(var i = 0; l = this.attachments.length; i++) {
            
            var id = (i === 0) ? 'id="first_li"' : '';
            
            switch(this.attachments[i].objectType) {
                case 'video':
                    
                    var output =        '<li '+id+'>';
                    output +=               '<div id="video">';
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
                    var output =        '<li '+id+'>';
                    output +=               '<div id="image">';
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
                    var output =        '<li '+id+'>';
                    output +=               '<div id="article">';
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
        
        var entry = this.entry;
        var object = this.object;
        var attachments = this.attachments;
        
        var media = this.formatAttachments();
        
        var post =      '<a href="'+entry.url+'" target="_blank">';
            post +=         '<ul class="single_post">';    
            post +=             (typeof media.photo === "undefined") ? '' : media.photo;
            post +=             (typeof media.video === "undefined") ? '' : media.video;
            post +=             '<li>';
            post +=                 '<h3>'+entry.title+'</h3>';
            post +=             '</li>';
            post +=             (typeof media.article === "undefined") ? '' : media.article;
            post +=             '<li>';
            post +=                 (entry.plusoners > 0) ? '<span class="plusones">'+entry.plusoners.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="replies">'+entry.replies.totalItems+'</span>' : '';
            post +=                 (entry.plusoners > 0) ? '<span class="resharers">'+entry.resharers.totalItems+'</span>' : '';
            post +=                 '<span>' + prettyDate(entry.published) + '</span>';
            post +=             '</li>';
            post +=         '</ul>'
            post +=     '</a>';
            
        return post;
    }
    
    
    
    /**
     * Format a post without media and return a string of html
     * @access public
     * @return string 
     */
//    formatPostPlain: function() {
//        var entry = this.entry;
//        var object = this.object;
//        var attachments = this.attachments;
//        
//        var post =      '<a href="'+entry.url+'" target="_blank">';
//            post +=         '<ul class="single_post">';    
//            post +=             '<li>';
//            post +=                 '<h3>'+entry.title+'</h3>';
//            post +=             '</li>';
//            post +=             '<li>';
//            post +=                 (entry.plusoners > 0) ? '<span class="plusones">'+entry.plusoners.totalItems+'</span>' : '';
//            post +=                 (entry.plusoners > 0) ? '<span class="replies">'+entry.replies.totalItems+'</span>' : '';
//            post +=                 (entry.plusoners > 0) ? '<span class="resharers">'+entry.resharers.totalItems+'</span>' : '';
//            post +=                 '<span>' + prettyDate(entry.published) + '</span>';
//            post +=             '</li>';
//            post +=         '</ul>'
//            post +=     '</a>';
//    }
    
});

//
//var ImagePost = Post.extend({
//    init: function(e) {
//       this._super();
//    }
//});
//
//var LinkPost = Post.extend({
//    init: function(e) {
//       this._super();
//    }
//});
//
//var RegularPost = Post.extend({
//    init: function(e) {
//       this._super();
//    }
//});