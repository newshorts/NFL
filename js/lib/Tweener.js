/* 
 * static functions that instantiate specific transition animations
 */


Tweener = {
    
    animation: false,
    animationstring: 'animation',
    translatestring: 'transform',
    fillmodestring: 'animation-fill-mode',
    keyframeprefix: '',
    domPrefixes: 'Webkit Moz O ms Khtml'.split(' '),
    pfx: '',
    
    elems: new Array(),
    
    init: function() {
        this.config();
    },
    
    config: function() {
        
        var _target = document.getElementsByTagName('div');
        
        if( _target[0].style.animationName ) {this.animation = true;}
        
        if( this.animation === false ) {
            for( var i = 0; i < this.domPrefixes.length; i++ ) {
                if( _target[0].style[ this.domPrefixes[i] + 'AnimationName' ] !== undefined ) {
                    this.pfx = this.domPrefixes[ i ];
                    this.animationstring = this.pfx + 'Animation';
                    this.translatestring = this.pfx + 'Transform';
                    this.fillmodestring = this.pfx + 'AnimationFillMode';
                    this.keyframeprefix = '-' + this.pfx.toLowerCase() + '-';
                    this.animation = true;
                    break;
                }
            }
        }
    },
    
    addTween: function(elem, args) {
        
        var t = new Transition(elem, args, this.keyframeprefix);
        var appended = false;
        
        if(this.elems.length === 0) {
            this.createAnimationRule(t, elem);
        } else {
            for(var i = 0, l = this.elems.length; i < l; i++) {

                if(elem.attr('id') === this.elems[i][0]) {
                    this.appendAnimationRule(t, i);
                    appended = true;
                    break;
                } 
                
            } 
            
            if(!appended) {
                this.createAnimationRule(t, elem);
            }
            
//            this.createAnimationRule(t, elem);
        }
        
    },
    appendAnimationRule: function(t, index) {
        this.elems[index].push(t);
    },
    createAnimationRule: function(t, elem) {
        var entry = new Array();
            
        entry.push(elem.attr('id'));
        entry.push(t);

        this.elems.push(entry);
    },
    
    run: function() {
        var styleRule, keyframeRule;
        
        for(var i = 0, l = this.elems.length; i < l; i++) {
            var id = this.elems[i][0];
            var keyframeFlag = false;
            
            styleRule = '#' + id + ' { \n';
            keyframeRule = '';
            
            styleRule += this.keyframeprefix + 'transform: translate3d(0, 0, 0);\n';
            styleRule += this.keyframeprefix + 'backface-visibility: hidden;\n';
            styleRule += this.keyframeprefix + 'perspective: 1000;\n';
            
            styleRule += this.keyframeprefix + 'animation: ';
            
            for(var k = 1, ll = this.elems[i].length; k < ll; k++) {
                
                if(this.elems[i].length > 2) {
                    // TODO: add some sort of trigger that looks up where element should be after the previous animation and resets the animation from that point
                    if((k + 1) != ll) {
                        styleRule += ' ' + this.elems[i][k].getStyleRule() + ',';
                    } else {
                        styleRule += ' ' + this.elems[i][k].getStyleRule() + '';
                    };
                    
                    keyframeFlag = true;
                    
                } else {
                    styleRule += ' ' + this.elems[i][k].getStyleRule() + ' ';
                    
                    keyframeFlag = false;
                }
                
                var key = this.elems[i][k].getKeyframeRule();
                
                if(!keyframeFlag) {
                    // do nothing
                } else {
                    if((k-1) != 0) {
                        // trigger an update from previous elements position
                        var previousArgs = this.elems[i][k-1].getArgs();
                        key = this.elems[i][k].updateKeyframes(previousArgs);
                    }
                    
                }
                
                keyframeRule += key + '\n';
            }
            
            styleRule += ';\n'
            
            styleRule += ' } ';
            
            console.log(styleRule)
            console.log(keyframeRule)
            
            var a = document.createElement( 'style' );
            a.innerHTML = styleRule + '\n' + keyframeRule;
            document.getElementsByTagName( 'head' )[ 0 ].appendChild( a );
        }
    }
  
};


(function($) {
    $(window).load(function() {
        Tweener.init();
    });
})(jQuery);
