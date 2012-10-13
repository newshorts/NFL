/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var FacebookStatusTracker = SocialTracker.extend({
    
    init: function(elem) {
        
        this._super('facebook_status_data', '../services/output.json', elem);
        
        var self = this;
        
        window.addEventListener('facebook_status_data', function(evt) {
            
            // data: evt.detail.data.output.facebook_statuses
//            console.log(evt.detail.data.output.facebook_statuses);
            console.dir(evt.detail.data.output.facebook_statuses);
            
            self.outputThree(evt.detail.data.output.facebook_statuses);
        }, false);
        
    },
    
    outputThree: function(data) {
//        $('#news').html(data);
        
        $('#news li').each(function(idx) {
            var entry = data.entries[idx];
            
            $(this).html('<p>' + entry.content + '</p>');
        });
    }
    
});

    