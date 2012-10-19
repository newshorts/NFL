/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var GoogleTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('google_data', '../services/output.json', elem);
        
        var self = this;
        
        $(window).on('google_data', function(evt, data) {
            
            console.dir(data)
            
            self.update(parseInt(data.output.google));
        });
        
//        window.addEventListener('google_data', function(evt) {
//            self.update(parseInt(evt.detail.data.output.google));
//        }, false);
        
    }
    
    
});