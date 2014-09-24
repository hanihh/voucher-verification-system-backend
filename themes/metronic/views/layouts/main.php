<?php
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
// BEGIN GLOBAL MANDATORY STYLES
$cs->registerCssFile("http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all");
$cs->registerCssFile($baseUrl . "/theme_files/global/plugins/font-awesome/css/font-awesome.min.css");
$cs->registerCssFile($baseUrl . "/theme_files/global/plugins/simple-line-icons/simple-line-icons.min.css");
$cs->registerCssFile($baseUrl . "/theme_files/global/plugins/bootstrap/css/bootstrap.min.css");
$cs->registerCssFile($baseUrl . "/theme_files/global/plugins/uniform/css/uniform.default.css");
$cs->registerCssFile($baseUrl . "/theme_files/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css");
// END GLOBAL MANDATORY STYLES 
// BEGIN PAGE LEVEL PLUGIN STYLES 
$cs->registerCssFile($baseUrl . "/theme_files/global/plugins/gritter/css/jquery.gritter.css");
$cs->registerCssFile($baseUrl . "/theme_files/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css");
$cs->registerCssFile($baseUrl . "/theme_files/global/plugins/fullcalendar/fullcalendar/fullcalendar.css");
$cs->registerCssFile($baseUrl . "/theme_files/global/plugins/jqvmap/jqvmap/jqvmap.css");
// END PAGE LEVEL PLUGIN STYLES
// BEGIN PAGE STYLES
$cs->registerCssFile($baseUrl . "/theme_files/admin/pages/css/tasks.css");
// END PAGE STYLES
// BEGIN THEME STYLES
$cs->registerCssFile($baseUrl . "/theme_files/global/css/components.css");
$cs->registerCssFile($baseUrl . "/theme_files/global/css/plugins.css");
$cs->registerCssFile($baseUrl . "/theme_files/admin/layout/css/layout.css");
$cs->registerCssFile($baseUrl . "/theme_files/admin/layout/css/themes/default.css");
$cs->registerCssFile($baseUrl . "/theme_files/admin/layout/css/custom.css");
// END THEME STYLES
$cs->registerScriptFile('http://www.google.com/jsapi');
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> 
<html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Voucher Verification System</title>

        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->
    <body class="page-header-fixed page-quick-sidebar-over-content">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner">

            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu " data-auto-scroll="true" data-slide-speed="200">
                        <li class="sidebar-toggler-wrapper">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li><br />
                        <li class="start active open">
                            <a href="javascript:;">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                            <i class="icon-settings"></i>
                            <span class="title">Distribution</span>
                            <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#distribution_wizard.html">
                                    Distribution Wizard</a>
                                </li>
                                <li>
                                    <a href="#Distribution_management.html">
                                    Distribution Management</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">

                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner">
                2014 &copy; International Rescue Committee.
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>    <?php
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jquery-1.11.0.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jquery-migrate-1.2.1.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/bootstrap/js/bootstrap.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jquery.blockui.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jquery.cokie.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/uniform/jquery.uniform.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js");
        // END CORE PLUGINS
        // BEGIN PAGE LEVEL PLUGINS
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jqvmap/jqvmap/jquery.vmap.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/flot/jquery.flot.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/flot/jquery.flot.resize.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/flot/jquery.flot.categories.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jquery.pulsate.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/plugins/bootstrap-daterangepicker/moment.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/bootstrap-daterangepicker/daterangepicker.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/jquery.sparkline.min.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/global/plugins/gritter/js/jquery.gritter.js");
        // END PAGE LEVEL PLUGINS
        // BEGIN PAGE LEVEL SCRIPTS
        $cs->registerScriptFile($baseUrl . "/theme_files/global/scripts/metronic.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/admin/layout/scripts/layout.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/admin/layout/scripts/quick-sidebar.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/admin/layout/scripts/demo.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/admin/pages/scripts/index.js");
        $cs->registerScriptFile($baseUrl . "/theme_files/admin/pages/scripts/tasks.js");
        $script = ' jQuery(document).ready(function() {
                Metronic.init(); // init metronic core componets
                Layout.init(); // init layout
                QuickSidebar.init() // init quick sidebar
                Index.init();
                Index.initDashboardDaterange();
                Index.initJQVMAP(); // init index page\'s custom scripts
                Index.initCalendar(); // init index page\'s custom scripts
                Index.initCharts(); // init index page\'s custom scripts
                Index.initChat();
                Index.initMiniCharts();
                Index.initIntro();
                Tasks.initDashboardWidget();
                });';
        // END PAGE LEVEL PLUGINS
        // BEGIN PAGE LEVEL SCRIPTS
        // END PAGE LEVEL SCRIPTS
        $cs->registerScript('inline', $script);

// END JAVASCRIPTS
        ?>



