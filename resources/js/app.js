try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap/js/dist/util.js');
    const WOW = require('wowjs'); window.wow = new WOW.WOW({ live: false });
    window.wow.init();

} catch (e) {}