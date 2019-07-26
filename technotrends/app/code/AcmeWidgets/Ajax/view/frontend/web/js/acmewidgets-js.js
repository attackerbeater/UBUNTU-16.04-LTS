define(
  [
    "jquery"
  ],
  function(
    $
  ){

    "use strict";
    $.widget('acmewidgets.ajax', {
        options: {
            url: 'acmewidgets_ajax/query/custom',
            method: 'post',
            triggerEvent: 'click'
        },

        _create: function() {
            this._bind();
        },

        _bind: function() {
            var self = this;
            self.element.on(self.options.triggerEvent, function() {
                self._ajaxSubmit();
            });
        },

        _ajaxSubmit: function() {
            var self = this;
            $.ajax({
                url: self.options.url,
                type: self.options.method,
                dataType: 'json',
                beforeSend: function() {
                    console.log('beforeSend');
                    $('body').trigger('processStart');
                },
                success: function(res) {
                    console.log('success');
                    console.log(res);
                    alert(3);
                    $('body').trigger('processStop');
                }
            });
        },

    });

    return $.acmewidgets.ajax;
});
