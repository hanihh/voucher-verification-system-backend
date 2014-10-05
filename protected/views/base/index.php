<?php
$baseUrl = Yii::app()->baseUrl;
//echo $baseUrl;
$cs = Yii::app()->getClientScript();
// BEGIN GLOBAL MANDATORY STYLES
$cs->registerCssFile("http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/font-awesome/css/font-awesome.min.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/simple-line-icons/simple-line-icons.min.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/bootstrap/css/bootstrap.min.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/uniform/css/uniform.default.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css");
// END GLOBAL MANDATORY STYLES 
// BEGIN PAGE LEVEL PLUGIN STYLES 
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/gritter/css/jquery.gritter.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/fullcalendar/fullcalendar/fullcalendar.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/jqvmap/jqvmap/jqvmap.css");
// END PAGE LEVEL PLUGIN STYLES
// BEGIN PAGE STYLES
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/admin/pages/css/tasks.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/jstree/dist/themes/default/style.min.css");
// END PAGE STYLES
// BEGIN THEME STYLES
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/css/components.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/css/plugins.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/admin/layout/css/layout.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/admin/layout/css/themes/default.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/admin/layout/css/custom.css");
//For Data Table
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/select2/select2-rtl.css");
$cs->registerCssFile($baseUrl . "/css/metronic/theme_files/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css");
//end
// END THEME STYLES
$cs->registerScriptFile('http://www.google.com/jsapi');
//print_r($cs);
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
    <body ng-app="app" class="page-header-fixed page-quick-sidebar-over-content">
        <header ng-include="'<?php echo Yii::app()->baseUrl ?>/ng-yii/templates/header.html'"></header>
        <div ui-view></div>
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <div ng-include="'<?php echo Yii::app()->baseUrl ?>/ng-yii/templates/sidebar.html'"></div>

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content" ng-controller="ContentController">
                    <div class="col-md-3">
                        <div class="portlet yellow-lemon box">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-cogs"></i>Default Tree
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="tree_1" class="tree-demo">
                                    <ul>
                                        <li>
                                            Distributions
                                            <ul>
                                                <li data-jstree='{ "selected" : true, "opened" : false  }'>
                                                    Subdistributions
                                                    <ul>
                                                        <li type="subdistribution" id="1">
                                                            <a href='#' ng-click="'LoadContent()'"> Subdistribution1</a> 
                                                            <ul>
                                                                <li data-jstree='{ "opened" : false  }'>
                                                                    Beneficiaries
                                                                    <ul>
                                                                        <li data-jstree='{"type" : "file"}' type="beneficiary">
                                                                            Beneficiary1
                                                                        </li>
                                                                        <li data-jstree='{ "type" : "file" }' type="beneficiary">
                                                                            Beneficiary2
                                                                        </li>
                                                                        <li data-jstree='{"type" : "file" }' type="beneficiary">
                                                                            Beneficiary3
                                                                        </li>
                                                                        <li data-jstree='{"icon" : "fa fa-plus-circle icon-state-danger"}' type="beneficiary">
                                                                            <a href="#">Add New</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li data-jstree='{ "opened" : false  }'>
                                                                    Voucher types
                                                                    <ul>
                                                                        <li data-jstree='{"type" : "file"}' type="voucher">
                                                                            Voucher type1
                                                                        </li>
                                                                        <li data-jstree='{ "type" : "file" }' type="voucher">
                                                                            Voucher type2
                                                                        </li>
                                                                        <li data-jstree='{"type" : "file" }' type="voucher">
                                                                            Voucher type3
                                                                        </li>
                                                                        <li data-jstree='{"icon" : "fa fa-plus-circle icon-state-danger"}' type="voucher">
                                                                            <a href="#">Add New</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li type="subdistribution">
                                                            Subdistribution2
                                                            <ul>
                                                                <li data-jstree='{ "opened" : false  }'>
                                                                    Beneficiaries
                                                                    <ul>
                                                                        <li data-jstree='{"type" : "file"}' type="beneficiary">
                                                                            Beneficiaries1
                                                                        </li>
                                                                        <li data-jstree='{ "type" : "file" }' type="beneficiary">
                                                                            Beneficiaries2
                                                                        </li>
                                                                        <li data-jstree='{"type" : "file" }' type="beneficiary">
                                                                            Beneficiaries3
                                                                        </li>
                                                                        <li data-jstree='{"icon" : "fa fa-plus-circle icon-state-danger"}' type="beneficiary">
                                                                            <a href="#">Add New</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li data-jstree='{ "opened" : false  }'>
                                                                    Voucher types
                                                                    <ul>
                                                                        <li data-jstree='{"type" : "file"}' type="voucher">
                                                                            Voucher type1
                                                                        </li>
                                                                        <li data-jstree='{ "type" : "file" }' type="voucher">
                                                                            Voucher type2
                                                                        </li>
                                                                        <li data-jstree='{"type" : "file" }' type="voucher">
                                                                            Voucher type3
                                                                        </li>
                                                                        <li data-jstree='{"icon" : "fa fa-plus-circle icon-state-danger"}' type="voucher">
                                                                            <a href="#">Add new</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li type="subdistribution">
                                                            Subdistribution3
                                                            <ul>
                                                                <li data-jstree='{ "opened" : false  }'>
                                                                    Beneficiaries
                                                                    <ul>
                                                                        <li data-jstree='{"type" : "file"}' type="beneficiary">
                                                                            Beneficiary1
                                                                        </li>
                                                                        <li data-jstree='{ "type" : "file" }' type="beneficiary">
                                                                            Beneficiary2
                                                                        </li>
                                                                        <li data-jstree='{"type" : "file" }' type="beneficiary">
                                                                            Beneficiary3
                                                                        </li>
                                                                        <li data-jstree='{"icon" : "fa fa-plus-circle icon-state-danger"}' type="beneficiary">
                                                                            <a href="#">Add New</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li data-jstree='{ "opened" : false  }'>
                                                                    Voucher types
                                                                    <ul>
                                                                        <li data-jstree='{"type" : "file"}' type="voucher">
                                                                            Voucher type1
                                                                        </li>
                                                                        <li data-jstree='{ "type" : "file" }' type="voucher">
                                                                            Voucher type2
                                                                        </li>
                                                                        <li data-jstree='{"type" : "file" }' type="voucher">
                                                                            Voucher type3
                                                                        </li>
                                                                        <li data-jstree='{"icon" : "fa fa-plus-circle icon-state-danger"}' type="voucher">
                                                                            <a href="#">Add new</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li data-jstree='{"icon" : "fa fa-plus-circle icon-state-danger"}'>
                                                            <a href="#">Add New</a>
                                                        </li>
                                                    </ul>
                                                </li>                                        
                                                <li data-jstree='{ "opened" : false }'>
                                                    Vendors
                                                    <ul>
                                                        <li data-jstree='{ "opened" : false  }'>
                                                            Phones
                                                            <ul>
                                                                <li data-jstree='{"type" : "file"}' type="phone">
                                                                    Phone1
                                                                </li>
                                                                <li data-jstree='{ "type" : "file" }' type="phone">
                                                                    Phone2
                                                                </li>                                                        
                                                                <li data-jstree='{"icon" : "fa fa-plus-circle icon-state-danger"}' type="phone">
                                                                    <a href="#">Add New</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li data-jstree='{ "opened" : false  }'>
                                                            Beneficiaries
                                                            <ul>
                                                                <li data-jstree='{"type" : "file"}' type="beneficiary">
                                                                    Beneficiaries1
                                                                </li>
                                                                <li data-jstree='{ "type" : "file" }' type="beneficiary">
                                                                    Beneficiaries2
                                                                </li>
                                                                <li data-jstree='{"type" : "file" }' type="beneficiary">
                                                                    Beneficiaries3
                                                                </li>
                                                                <li data-jstree='{"icon" : "fa fa-plus-circle icon-state-danger"}' type="beneficiary">
                                                                    <a href="#">Add New</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>                                            
                                            </ul>
                                        </li>                             
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet box yellow-lemon col-md-9">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Portlet1
                            </div>
                            <div class="actions">
                                <a href="#" class="btn btn-default btn-sm">
                                    <i class="fa fa-pencil"></i> Edit </a>
                                <a href="#" class="btn btn-default btn-sm">
                                    <i class="fa fa-plus"></i> Add </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                                <ng-include src="template"></ng-include>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <footer ng-include="'<?php echo Yii::app()->baseUrl ?>/ng-yii/templates/footer.html'"></footer> 
    </body>   

    <?php
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jquery-1.11.0.min.js");
    // Angular JS libraries
    $cs->registerScriptFile($baseUrl . "/ng-yii/core/angular.js");
    $cs->registerScriptFile($baseUrl . "/ng-yii/core/angular-ui-router.js");
    $cs->registerScriptFile($baseUrl . "/ng-yii/script/app.js");
    // Theme files
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jquery-migrate-1.2.1.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/bootstrap/js/bootstrap.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jquery.blockui.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jquery.cokie.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/uniform/jquery.uniform.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js");
    // END CORE PLUGINS
    // BEGIN PAGE LEVEL PLUGINS
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jqvmap/jqvmap/jquery.vmap.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/flot/jquery.flot.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/flot/jquery.flot.resize.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/flot/jquery.flot.categories.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jquery.pulsate.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/bootstrap-daterangepicker/moment.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/bootstrap-daterangepicker/daterangepicker.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jquery.sparkline.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/gritter/js/jquery.gritter.js");
    // END PAGE LEVEL PLUGINS
    // BEGIN PAGE LEVEL SCRIPTS
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/scripts/metronic.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/admin/layout/scripts/layout.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/admin/layout/scripts/quick-sidebar.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/admin/layout/scripts/demo.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/admin/pages/scripts/index.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/admin/pages/scripts/tasks.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/admin/pages/scripts/ui-tree.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/jstree/dist/jstree.min.js");

    //For Data Table
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/admin/pages/scripts/table-editable.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/select2/select2.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/datatables/media/js/jquery.dataTables.min.js");
    $cs->registerScriptFile($baseUrl . "/css/metronic/theme_files/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js");
    //end
    
    $script = ' jQuery(document).ready(function() {
                Metronic.init(); // init metronic/theme_files core componets
                Layout.init(); // init layout
                QuickSidebar.init() // init quick sidebar
                Index.init();
                Index.initDashboardDaterange();
                //Index.initJQVMAP(); // init index page\'s custom scripts
                Index.initCalendar(); // init index page\'s custom scripts
                Index.initCharts(); // init index page\'s custom scripts
                Index.initChat();
                Index.initMiniCharts();
                Index.initIntro();
                Tasks.initDashboardWidget();
                UITree.init();
                TableEditable.init();
                });';
    // END PAGE LEVEL PLUGINS
    // BEGIN PAGE LEVEL SCRIPTS
    // END PAGE LEVEL SCRIPTS
    $cs->registerScript('inline', $script);

// END JAVASCRIPTS
    ?>



