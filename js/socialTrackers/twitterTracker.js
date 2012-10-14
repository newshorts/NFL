/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var TwitterTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('twitter_data', '../services/output.json', elem);
        
        var self = this;
        
        $(window).on('twitter_data', function(evt, data) {
            self.update(parseInt(data.output.twitter));
        });
        
//        window.addEventListener('twitter_data', function(evt) {
//            self.update(parseInt(evt.detail.data.output.twitter));
//        }, false);
        
    }
    
});