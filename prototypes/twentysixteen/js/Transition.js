/* 
 * Specific transition
 */


var Transition = function(elem,obj,keyframeprefix) {
    
/*  --------------------------------------------------
    Global
    -------------------------------------------------- */
    var target = elem,
        _target = elem[0],
        args = {}, 
        animID;

/*  --------------------------------------------------
    Init
    -------------------------------------------------- */
    
    var init = function() {
        
        setArgs();
        
        animID = makeID();
        
        setAnimationStyles();
        
    };
    
    var setArgs = function() {
        for(var fld in obj) {
            args[fld] = obj[fld];
        }
    };
    
    this.getArgs = function() {
        return args;
    };
    
    var makeID = function () {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        for( var i=0; i < 5; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }
    
/*  --------------------------------------------------
    Generate Animation
    -------------------------------------------------- */
    
    var keyframes, styleRule;
    
    var setAnimationStyles = function() {
        setDefaults();
        keyframes = setKeyframes();
        styleRule = setStyleRule();
    };
    
    var setKeyframes = function() {
        var kf = '@' + keyframeprefix + 'keyframes ' + animID + ' { '+
                                'from { top: '+ _target.offsetTop +'px; left: '+ _target.offsetLeft +'px; opacity: '+ _target.style.opacity +'; } '+
                                'to { top: '+ args.y +'px; left: '+ args.x +'px; opacity: '+ args.alpha +'; } '+
                            '}';
                        
        return kf;
    };
    
    this.updateKeyframes = function(pArgs) {
        var x = pArgs.x || _target.offsetLeft,
            y = pArgs.y || _target.offsetTop,
            opacity = pArgs.alpha || _target.style.opacity;
            
        var kf = '@' + keyframeprefix + 'keyframes ' + animID + ' { '+
                                'from { top: '+ y +'px; left: '+ x +'px; opacity: '+ opacity +'; } '+
                                'to { top: '+ args.y +'px; left: '+ args.x +'px; opacity: '+ args.alpha +'; } '+
                            '}';
                        
        return kf;
    };
    
    var setStyleRule = function() {
        return animID + ' '+args.time+'s '+args.transition+' ' + args.delay + 's '+args.repeat + ' ' + args.fillMode;
    }
    
    
    this.getKeyframeRule = function() {
        return keyframes;
    };
    
    this.getStyleRule = function() {
        return styleRule;
    };
    
    // TODO: set defaults for width, height or an element
    var setDefaults = function() {
        if(typeof args.transition === "undefined") {
            args.transition = 'linear';
        }
        
        if(typeof args.repeat === "undefined") {
            args.repeat = 1;
        }
        
        if(typeof args.x === "undefined") {
            args.x = _target.offsetLeft;
        }
        
        if(typeof args.y === "undefined") {
            args.y = _target.offsetTop;
        }
        
        if(typeof args.alpha === "undefined") {
            
            if(typeof _target.style.opacity === "undefined") {
                var o = target.css('opacity');
                _target.style.opacity = o;
            }
            
            if(_target.style.opacity === undefined) {
                var o = target.css('opacity');
                _target.style.opacity = o;
            }
            
            if(_target.style.opacity === '') {
                _target.style.opacity = 1;
            }
            
            args.alpha = _target.style.opacity;
        }
        
        if(typeof args.fillMode === "undefined") {
            args.fillMode = 'forwards';
        }
        
        if(typeof args.delay === "undefined") {
            args.delay = 0;
        }
        
    };
    
    
    
    init();
};