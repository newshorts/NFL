/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//var SocialTracker = Class.extend({
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
        
//        this._super(eventName, url);

        sub.addSubscription(eventName);
        
//        console.dir(elem)
        
        this._eventName = eventName;
        this._url = url;
        this._elem = $(elem);
        this._name = eventName;
        
//        if(elem.length > 0) {
//            this.track();
//        } else {
//            console.log(eventName + ' is not available on this page - shutting down');
//        }
        
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
    
//    poll: function() {
//        var self = this;
//        $.getJSON(this._url,function(data){
//            
//            $(window).trigger(self._eventName, data);
//            
////            var newData = new CustomEvent(self._eventName, {
////                detail: {
////                    data: data
////                }
////            });
////            window.dispatchEvent(newData);
//        });
//    },
    
//    track: function() {
//        var self = this;
//        setInterval(function() {
//            self.poll();
//        }, 5000);
//        this.poll();
//    },
    
    formatNumber: function(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    },
    
    // TIMING FUNCTIONS
    
    update: function(newNum) {
        
        console.log('update: ' + this._name)
//        console.dir(this)
        
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
            
//            console.log('count: ' + self.count)
//            console.log('delta: ' + self.delta)

            if(self.count > self.delta) {
                self.destroyTimer();
            }
        }, interval);

    },
    
    setText: function(str) {
//        this._elem.text(str);
        
        var length = str.length;
        
        // reformat numbers here
//        console.log(str.charAt(length - 1));
        
        var classSize = this.getSize();
        
        var output = '<ul class="'+classSize+'">';
        
        for(var i = 0; i < length; i++) {
            var num = str.charAt(i);
            var word = this.getWord(String(num));
            output += '<li class="'+word+'">'+num+'</li>';
        }
        
        output += '</ul>';
        
        this._elem.html(output);
        
    },
    
    getSize: function() {
//        var parent = this._elem.parent();
        
//        console.dir(parent);
        
        if(this._elem.hasClass('large')) {
            return 'numbers_large';
        }
        
        if(this._elem.hasClass('medium')) {
            return 'numbers_medium';
        }
        
        if(this._elem.hasClass('small')) {
            return 'numbers_small';
        }
    },
    
    getWord: function(num) {
        var output = '';
        switch(num) {
            case '0':
                output = 'zero';
                break;
            case '1':
                output = 'one';
                break;
            case '2':
                output = 'two';
                break;
            case '3':
                output = 'three';
                break;
            case '4':
                output = 'four';
                break;
            case '5':
                output = 'five';
                break;
            case '6':
                output = 'six';
                break;
            case '7':
                output = 'seven';
                break;
            case '8':
                output = 'eight';
                break;
            case '9':
                output = 'nine';
                break;
            case ',':
                output = 'comma';
                break;
            default:
                output = 'nil';
                break
        }
        
        return output;
    },

    destroyTimer: function() {
        var self = this;
        self.count = 0;
        window.clearInterval(self._intervalObj);
    }
    
});
