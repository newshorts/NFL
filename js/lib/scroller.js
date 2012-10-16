var Scroller = Class.extend({
    
    _train: {},
    train: {},
    cars: {},
    alternate: -1,
    dist: 0,
    
    
    init: function(ul, dist) {
        this._train = ul;
        this.train = $(this._train);
//        this.cars = this.train.find('ul');
        this.cars = $(ul + ' > ul');
        
        this.dist = dist;
        
        this.setPositions();
        
        this.ticker();
    },
    
    setPositions: function() {
        
        var self = this;
        
        $('.trainCar').each(function(idx) {
            
            var _this = $(this);
            
            var left = (idx * self.dist);

            var newLeft = (idx * self.dist) - (self.dist);

            _this.css({
                position: 'absolute',
                margin: 0,
                left: left
            });
            
            _this.data('pos', left);
            
        });
        
    },
    
    ticker: function() {
        
        var self = this;
        
        setInterval(function() {
            self.moveLeft();
            this.alternate *= -1;
        }, 1000);
    },
    
    moveLeft: function() {
        
        var self = this;
        
        var dist = self.dist;
        
        var reset = (dist * (self.cars.length - 1));
        
        $('.trainCar').each(function() {
            var pos = $(this).data('pos');
            
            var newPos = pos - dist;
            
            if(pos == 0) {
                
                $(this).data('pos', newPos);
                $(this).animate({
                    left: newPos
                }, 700, function() {
                    // complete
                    $(this).data('pos', reset);
                    $(this).css({
                        left: reset
                    });
                });
            
            } else {
                
                $(this).data('pos', newPos);
                $(this).animate({
                    left: newPos
                }, 700, function() {
                    // complete
                    
                });
                
            }
            
        });
    }

});
