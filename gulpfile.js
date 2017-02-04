const elixir = require('laravel-elixir');

// require('laravel-elixir-vue-2');
var themePath = './theme/'

elixir(mix => {
    mix.disableNotifications();

    mix.combine([
        themePath + 'global/plugins/font-awesome/css/font-awesome.css',
        themePath + 'global/plugins/simple-line-icons/simple-line-icons.css',
        themePath + 'global/plugins/bootstrap/css/bootstrap.css',
        themePath + 'global/plugins/bootstrap-switch/css/bootstrap-switch.css',
        themePath + 'global/css/components.css',
        themePath + 'global/css/plugins.css',
        themePath + 'layouts/layout/css/layout.css',
        themePath + 'layouts/layout/css/themes/darkblue.css',
        themePath + 'layouts/layout/css/custom.css'
    ], 'public/layout/css/layout.css');

    mix.combine([
        themePath + 'global/plugins/respond.min.js',
        themePath + 'global/plugins/excanvas.min.js',
        themePath + 'global/plugins/ie8.fix.min.js'
    ], 'public/layout/js/ie.js');

    mix.combine([
        themePath + 'global/plugins/jquery.min.js',
        themePath + 'global/plugins/bootstrap/js/bootstrap.js',
        themePath + 'global/plugins/js.cookie.min.js',
        themePath + 'global/plugins/jquery-slimscroll/jquery.slimscroll.js',
        themePath + 'global/plugins/jquery.blockui.min.js',
        themePath + 'global/plugins/bootstrap-switch/js/bootstrap-switch.js',
        themePath + 'global/scripts/app.js',
        themePath + 'layouts/layout/scripts/layout.js',
        // themePath + 'layouts/layout/scripts/demo.js',
        themePath + 'layouts/global/scripts/quick-sidebar.js',
        themePath + 'layouts/global/scripts/quick-nav.js'
    ], 'public/layout/js/layout.js');

    mix.copy(themePath + 'global/plugins/font-awesome/fonts', 'public/layout/fonts');
    mix.copy(themePath + 'global/plugins/simple-line-icons/fonts', 'public/layout/css/fonts');
    mix.copy(themePath + 'layouts/layout/img', 'public/layout/img');
});
