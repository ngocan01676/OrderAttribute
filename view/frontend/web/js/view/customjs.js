define([
'jquery',
'ko',
'uiComponent'], function ($, ko, Component) {
'use strict';
return Component.extend({
    defaults: {
        template: 'AN_NewOrderAttribute/customtemp'
    },
    initialize: function () {
        this._super();

        return this;
    },
});});