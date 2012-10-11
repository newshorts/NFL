/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var SocialTracker = Class.extend({
    _elem: {},
    _eventName: '',
    _url: '',
    _name: '',
    _intervalObj: {},
    count: 0,
    delta: 0,
    
    init: function(eventName, url, elem) {
        
        console.dir(elem)
        
        this._eventName = eventName;
        this._url = url;
        this._elem = $(elem);
        this._name = eventName;
        
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
    },
    
    formatNumber: function(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
    
    // TIMING FUNCTIONS
    
    update: function(newNum) {
        
        var oldNum = parseInt(this._elem.attr(this._name));
        
        this.setAttribute(newNum);
        
        this.delta = Math.abs(oldNum - newNum);
        
        this.monitorChange(oldNum);
        
    },
    
    setAttribute: function(newNum) {
        this._elem.attr(this._name, newNum);
    },
    
    monitorChange: function(oldNum) {
        if(this.delta > 0) {
            var interval = Math.floor(10000/this.delta);

            this.count = 0;
            this.setTimer(interval, oldNum);
        }
    },
    
    setTimer: function(interval, oldNum) {
        var self = this;

        this._intervalObj = window.setInterval(function() {
            // set the text and increment the count
//            var num = parseInt(self._elem.attr(self.name));
            self.count++;
            var formattedNum = self.formatNumber(oldNum + self.count);
            self.setText(formattedNum);
            
            console.log('count: ' + self.count)
            console.log('delta: ' + self.delta)
            // if the (count === delta) destroy the interval and stop
            if(self.count > self.delta) {
                self.destroyTimer();
            }
        }, interval);

    },
    
    setText: function(str) {
        this._elem.text(str);
    },

    destroyTimer: function() {
        var self = this;
        self.count = 0;
        window.clearInterval(self._intervalObj);
    }
    
    
    
});

// var google = new SocialTracker('#elem', 'http://stuff.com/');
// 