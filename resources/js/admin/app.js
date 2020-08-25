try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    require('webpack-jquery-ui');
    require('jquery-serializejson');
    require('./extra');
    require('components-jquery-htmlclean');
    require('jsrender');
    require('bootstrap');
    require('bootstrap-colorpicker');

    const WOW = require('wowjs'); window.wow = new WOW.WOW({ live: false });
    window.wow.init();

} catch (e) {}
