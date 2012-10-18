/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var Subscription = Class.extend({
    
    _url: '',
    _data: {},
    subs: new Array(),
    
    
    init: function() {
        
        this._url = 'http://sfsuperbowl.com/services/output.json.php';
        
        this.getData();
        this.ticker();
        
    },
    
    getData: function() {
        var self = this;
//        $.getJSON(this._url,function(data){
//            
//            self._data = data;
//            var len = self.subs.length;
//            
////            console.log('only polling once')
//            
//            for(var i = 0; i < len; i++) {
//                $(window).trigger(self.subs[i], data);
////                console.log('but emitting many events')
//            }
//            
////            $(window).trigger(self._eventName, data);
//            
//        });
        
        $.ajax({
            url:this._url,
            dataType: 'jsonp', // Notice! JSONP <-- P (lowercase)
            success:function(data){
                self._data = data;
                var len = self.subs.length;
                for(var i = 0; i < len; i++) {
                    $(window).trigger(self.subs[i], data);
                }
            },
            error:function(){
                console.log("Error: unable to retrieve json file");
            }
        });
        
    },
    
    ticker: function() {
        var self = this;
        setInterval(function() {
            self.getData();
//            self.ticker();
        }, 5000);
    },
    
    addSubscription: function(eventName) {
        this.subs.push(eventName);
    }
    
    
});