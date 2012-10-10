/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var SocialTracker = Class.extend({
    _eventName: '',
    _url: '',
    
    init: function(eventName, url) {
        this._eventName = eventName;
        this._url = url;
        
        this.track();
    },
    
    randomString: function(string_length) {
        string_length || 8;
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var randomstring = '';
        for (var i=0; i<string_length; i++) {
            var rnum = Math.floor(Math.random() * chars.length);
            randomstring += chars.substring(rnum,rnum+1);
        }
        return randomstring;
    },
    
    poll: function() {
        var self = this;
        $.getJSON(this._url,function(data){
            var newData = new CustomEvent(self._eventName, {
                detail: {
                    data: data
                }
            });
            window.dispatchEvent(newData);
        });
    },
    
    track: function() {
        var self = this;
        setInterval(function() {
            self.poll();
        }, 5000);
        this.poll();
    }
});

// var google = new SocialTracker('#elem', 'http://stuff.com/');
// 