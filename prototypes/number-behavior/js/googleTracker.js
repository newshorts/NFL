/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var GoogleTracker = SocialTracker.extend({
    
//    _elem: {},
//    name: 'google_data',
//    _intervalObj: {},
//    count: 0,
//    delta: 0,
    
    init: function(elem) {
        
        this._super('google_data', 'get/output.json', elem);
        
        var self = this;
        
        window.addEventListener('google_data', function(evt) {
//            console.dir(evt.detail.data.output)
            self.update(parseInt(evt.detail.data.output.google));
        }, false);
        
//        this._elem = $(elem);
    }
    
//    update: function(newNum) {
//        
//        var oldNum = parseInt(this._elem.attr(this.name));
//        
//        this.setAttribute(newNum);
//        
//        this.delta = Math.abs(oldNum - newNum);
//        
//        this.monitorChange(oldNum);
//        
//    },
    
//    setAttribute: function(newNum) {
//        this._elem.attr(this.name, newNum);
//    },
    
//    monitorChange: function(oldNum) {
//        if(this.delta > 0) {
//            var interval = Math.floor(10000/this.delta);
//
//            this.count = 0;
//            this.setTimer(interval, oldNum);
//        }
//    },
//    
//    setTimer: function(interval, oldNum) {
//        var self = this;
//
//        this._intervalObj = window.setInterval(function() {
//            // set the text and increment the count
////            var num = parseInt(self._elem.attr(self.name));
//            self.count++;
//            var formattedNum = self.formatNumber(oldNum + self.count);
//            self.setText(formattedNum);
//            
//            console.log('count: ' + self.count)
//            console.log('delta: ' + self.delta)
//            // if the (count === delta) destroy the interval and stop
//            if(self.count > self.delta) {
//                self.destroyTimer();
//            }
//        }, interval);
//
//    },
//    
//    setText: function(str) {
//        this._elem.text(str);
//    },
//
//    destroyTimer: function() {
//        var self = this;
//        self.count = 0;
//        window.clearInterval(self._intervalObj);
//    }
    
});