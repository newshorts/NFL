/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var FacebookTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('facebook_data', '../services/output.json', elem);
        
        var self = this;
        
        $(window).on('facebook_data', function(evt, data) {
            self.update(parseInt(data.output.facebook_likes_sfsuperbowl));
        });
//        window.addEventListener('facebook_data', function(evt) {
//            self.update(parseInt(evt.detail.data.output.facebook));
//        }, false);
        
    }
    
});