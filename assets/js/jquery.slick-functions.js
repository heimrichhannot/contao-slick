(function($) {
  $.fn.randomize = function(selector) {
    (selector ? this.find(selector) : this).parent().each(function() {
      $(this).children(selector).sort(function() {
        return Math.random() - 0.5;
      }).detach().appendTo(this);
    });

    return this;
  };
})(jQuery);