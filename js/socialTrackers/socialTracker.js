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
    firstLoad: true,
    
    init: function(eventName, url, elem) {
        
        console.dir(elem)
        
        this._eventName = eventName;
        this._url = url;
        this._elem = $(elem);
        this._name = eventName;
        
        if(elem.length > 0) {
            this.track();
        } else {
            console.log(eventName + ' is not available on this page - shutting down');
        }
        
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
            
            $(window).trigger(self._eventName, data);
            
//            var newData = new CustomEvent(self._eventName, {
//                detail: {
//                    data: data
//                }
//            });
//            window.dispatchEvent(newData);
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
        
        // if it's our first load we want to see the number right away
        if(this.firstLoad) {
            var str = this.formatNumber(newNum);
            this.setText(str);
            this.firstLoad = false;
        }
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
            self.count++;
            var formattedNum = self.formatNumber(oldNum + self.count);
            self.setText(formattedNum);
            
            console.log('count: ' + self.count)
            console.log('delta: ' + self.delta)

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
