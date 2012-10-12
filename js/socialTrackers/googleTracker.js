/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var GoogleTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('google_data', '../services/output.json', elem);
        
        var self = this;
        
        window.addEventListener('google_data', function(evt) {
            self.update(parseInt(evt.detail.data.output.google));
        }, false);
        
    }
    
    
});