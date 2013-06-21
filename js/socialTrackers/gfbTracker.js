/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// get total tracker hooked up, then get plus and likes tracker hooked up

var GfbTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('gfb_data', '../services/output.json', elem);
        
        var self = this;
        
        $(window).on('gfb_data', function(evt, data) {
            self.update(parseInt(data.output.gfb));
        });
        
//        window.addEventListener('gfb_data', function(evt) {
//            self.update(parseInt(evt.detail.data.output.gfb));
//        }, false);
        
    }
    
});