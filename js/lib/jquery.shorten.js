// -- just a little plugin to add less / more expanding / contracting to any element
// -- usability : $(selector).shorten({maxWords: 20, variance: 2, shortenedSuffix : '... '});
// -- where maxWords is the number of words to show and variance is the forgiveness to the max words
// -- ie: why hide only 3 words?
(function($) {
    $.fn.shorten= function(options) {
        var defaults = { maxWords : 12, variance: 3, shortenedSuffix : '... '};
        options = $.extend(defaults, options);
        return this.each(function(){
            var $short = $(this);

            $short.methods = {
                init : function(){
                    var $this = this;
                    // -- the original text
                    var $origText = $short.text();
                    // -- an array of words
                    var words = $origText.split(' ');
                    //-- variance = forgiving length... why hide just 2 words?
                    if(words.length > (options.maxWords + options.variance)){
                        // -- slice the word array down and join it back together
                        var $shortText = words.slice(0, options.maxWords).join(' ');
                        // -- append 2 divs, one to contain the short text and one to contain the original
                        $short.empty().append(
                          $('<div class="short hidden"></div>')
                            .html('<span>' + $shortText + options.shortenedSuffix + '</span>'))
                          .append($('<div class="long hidden"></div>').html('<span>' + $origText + '</span>'));
                        // -- append the more / less clickers, show the short version
                        $short.find('.short').append(
                          $('<div class="action more"> more</div>').click(function(){ $this.swap(); })).show();
                        $short.find('.long')
                          .append($('<div class="action less"> less</div>').click(function(){ $this.swap(); }));
                    }
                },
                swap : function(){
                    $short.find('.short,.long').toggle();
                }
            };
            $short.methods.init();
        });
    };
})(jQuery);