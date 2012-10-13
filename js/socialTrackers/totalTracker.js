/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// get total tracker hooked up, then get plus and likes tracker hooked up

var TotalTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('total_data', '../services/output.json', elem);
        
        var self = this;
        
        window.addEventListener('total_data', function(evt) {
            self.update(parseInt(evt.detail.data.output.total));
        }, false);
        
    }
    
});