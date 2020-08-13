define(['uiComponent'], function(Component) {
    return Component.extend({
        defaults: {
            template: 'Magenest_DemoKnockout/kotemplate'
        },
        initialize: function () {
            this._super();
        },
        getText: function () {
            return "Call the function here...";
        }
    });
});
