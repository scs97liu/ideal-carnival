const elixir = require('laravel-elixir');

// require('laravel-elixir-vue-2');
var themePath = './theme/'

elixir(mix => {

    mix.combine([
        themePath + 'global/plugins/font-awesome/css/font-awesome.css',
        themePath + 'global/plugins/simple-line-icons/simple-line-icons.css',
        themePath + 'global/plugins/bootstrap/css/bootstrap.css',
        themePath + 'global/plugins/bootstrap-switch/css/bootstrap-switch.css',
        themePath + 'global/plugins/select2/css/select2.css',
        themePath + 'global/plugins/select2/css/select2-bootstrap.min.css',
        themePath + 'global/css/components.css',
        themePath + 'global/css/plugins.css',
        themePath + 'pages/css/login.css'
    ], 'public/auth/css/login.css')

    mix.combine([
        themePath + 'global/plugins/jquery.min.js',
        themePath + 'global/plugins/bootstrap/js/bootstrap.js',
        themePath + 'global/plugins/js.cookie.min.js',
        themePath + 'global/plugins/jquery-slimscroll/jquery.slimscroll.js',
        themePath + 'global/plugins/jquery.blockui.min.js',
        themePath + 'global/plugins/bootstrap-switch/js/bootstrap-switch.js',
        themePath + 'global/plugins/jquery-validation/js/jquery.validate.js',
        themePath + 'global/plugins/jquery-validation/js/additional-methods.js',
        themePath + 'global/plugins/select2/js/select2.full.js',
        themePath + 'global/scripts/app.js',
        themePath + 'pages/scripts/login.js'
    ], 'public/auth/js/login.js')

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
    mix.copy(themePath + 'global/img/loading.gif', 'public/layout/img/loading.gif');
    mix.copy(themePath + 'pages/img/avatars', 'public/layout/img');

    mix.combine([
        themePath + 'global/plugins/counterup/jquery.waypoints.min.js',
        themePath + 'global/plugins/counterup/jquery.counterup.js',
        themePath + 'global/plugins/flot/jquery.flot.js',
        themePath + 'global/plugins/flot/jquery.flot.resize.js',
        themePath + 'global/plugins/flot/jquery.flot.categories.js'
    ], 'public/js/dashboard.js');


    mix.combine([
        themePath + 'global/plugins/bootstrap-daterangepicker/daterangepicker.css',
        themePath + 'global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css',
        themePath + 'global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css',
        themePath + 'global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css',
        themePath + 'global/plugins/clockface/css/clockface.css'
    ], 'public/css/datetime.css');

    mix.combine([
        themePath + 'global/plugins/moment.min.js',
        themePath + 'global/plugins/bootstrap-daterangepicker/daterangepicker.js',
        themePath + 'global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
        themePath + 'global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js',
        themePath + 'global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
        themePath + 'global/plugins/clockface/js/clockface.js'
    ], 'public/js/datetime.js');

    mix.combine([
        themePath + 'global/plugins/amcharts/amcharts/amcharts.js',
        themePath + 'global/plugins/amcharts/amcharts/serial.js',
        themePath + 'global/plugins/amcharts/amcharts/pie.js',
        themePath + 'global/plugins/amcharts/amcharts/radar.js',
        themePath + 'global/plugins/amcharts/amcharts/themes/light.js',
        themePath + 'global/plugins/amcharts/amcharts/themes/patterns.js',
        themePath + 'global/plugins/amcharts/amcharts/themes/chalk.js',
        themePath + 'global/plugins/amcharts/ammap/ammap.js',
        themePath + 'global/plugins/amcharts/ammap/maps/js/worldLow.js',
        themePath + 'global/plugins/amcharts/amstockcharts/amstock.js'
    ], 'public/js/graphs.js');

    mix.combine([
        themePath + 'global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css',
        themePath + 'global/plugins/bootstrap-modal/css/bootstrap-modal.css'
    ], 'public/css/modals.css');

    mix.combine([
        themePath + 'global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js',
        themePath + 'global/plugins/bootstrap-modal/js/bootstrap-modal.js'
    ], 'public/js/modals.js');
});