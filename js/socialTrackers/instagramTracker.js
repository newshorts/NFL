/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var InstagramTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('instagram_data', '../services/output.json', elem);
        
        var self = this;
        
        window.addEventListener('instagram_data', function(evt) {
            self.update(parseInt(evt.detail.data.output.instagram));
        }, false);
        
    }
    
});