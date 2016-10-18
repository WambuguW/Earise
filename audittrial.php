
<?php
include_once './classes.php';


?>
<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>Esacco | Microfinance System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2-metronic.css"/>
        <link rel="stylesheet" href="assets/plugins/data-tables/DT_bootstrap.css"/>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <script type="text/javascript">
            function showUser(str)
            {
            if (str == "")
            {
            document.getElementById("txtHint").innerHTML = "";
                    return;
            }
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function()
            {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
            }
            xmlhttp.open("GET", "./search/.php?q=" + str, true);
                    xmlhttp.send();
            }
        </script>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="jquery-latest.min.js"></script>

        <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
        <script src="autosaveform.js"></script>
        <script>

                    var formsave1 = new autosaveform({
                    formid: 'petyform',
                            pause: 1000 //<--no comma following last option!
                    });</script>
                            <script type="text/javascript">
        var tableToExcel = (function() {
var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body class="page-header-fixed page-full-width" style="color:#272822; font-family:verdana; font-size:13px;"><table>{table}</table></body></html>'
                                            , base64 = function(s) {
                                            return window.btoa(unescape(encodeURIComponent(s)))
                }
, format = function(s, c) {
return s.replace(/{(\w+)}/g, function(m, p) {
return c[p];
})
}
return function(table, name) {
if (!table.nodeType)
table = document.getElementById(table)
var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
window.location.href = uri + base64(format(template, ctx))
}
})()
        </script>

<script>
            function printResults() {
            var content = document.getElementById('mt').innerHTML;
                    var pwin = window.open('', 'print_content', 'width=200,height=200');
                    pwin.document.open();
                    pwin.document.write('<html><link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"><body style="font-family:Arial, Helvetica, sans-serif; font-size:8px; text-align:center; margin-right:5%; margin-left:5%; width:90%; background-color:#FFF;" onload="window.print()">' + content + '</body></html>');
                    pwin.document.close();
                    setTimeout(function() {
                    pwin.close();
                    }, 10000);
                    return true;
            }
        </script>


    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body>
        <div id="art-main">
            <header class="art-header clearfix">

                <?php headerinfo(); ?>

            </header>
            <nav class="art-nav clearfix">

                <div class="header navbar navbar-nav mega-menu col-md-8">
                    <!-- BEGIN TOP NAVIGATION BAR -->
                    <div class="header-inner" >
                        <!-- BEGIN LOGO -->

                        <!-- END LOGO -->
                        <!-- BEGIN HORIZANTAL MENU -->

                        <?php
                        include "sidemenu2.php";
                        ?>



                        <!-- END HORIZANTAL MENU -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <img src="assets/img/menu-toggler.png" alt=""/>
                        </a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN TOP NAVIGATION MENU -->

                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                    <p class="col-md-offset9"> <?php
                        admin();
                        ?>
                    <p>
                        <!-- END TOP NAVIGATION BAR -->
                </div>


            </nav>
            <div class="row ">
                <div class=" col-md-12 col-sm-10">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet box green calendar">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-reorder"></i> Audit Trail User Reports

                            </div>
                            <div class="tools">

                                <a href="javascript:;" class="reload"></a>

                            </div>
                        </div>

                        <div class="portlet-body dark_green" style="color:#000000">
                            <div class="well dark_green">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="art-layout-cell art-content clearfix">
                                    <!------form start----->
                                    <?php
                                    viewaudittrailuserreport();
                                    if (isset($_POST['audittrail'])) {
                                        audittrailuserreport(($_POST['datefrom']), ($_POST['dateto']), ($_POST['user']));
                                    }
                                    ?>   
                                    <div class="col-md-8">
                                        <input type="button" class="btn green" onclick="tableToExcel('sample_2')" value="Export to Excel">
                                        <div class="col-md-4"><?php //exportaudituserreport(); ?>  </div>
                                        <input type="button" class="btn green" onClick="return printResults()" value="print"></div>  

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <script src="assets/plugins/excanvas.min.js"></script>
    <![endif]-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>

<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<!-- END PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/app.js"></script>

<!-- END JAVASCRIPTS -->
<script src="assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>


<script src="assets/scripts/custom/components-dropdowns.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/scripts/custom/components-pickers.js"></script>

<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<script src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/custom/table-advanced.js"></script>
<script src="assets/plugins/bootstrap-sessiontimeout/bootstrap-session-timeout.js" type="text/javascript"></script>

 <script>
    $.sessionTimeout({
        keepAliveUrl: 'keep-alive.html',
        logoutUrl: 'logout.php',
        redirUrl: 'logout.php',
        warnAfter: 360000,//warn after 6 minutes
        redirAfter: 420000,// logout after 7 minutes
        countdownMessage: 'Logging you out in {timer}   seconds.'
    });
 </script>
<script>
jQuery(document).ready(function() {
App.init();
ComponentsDropdowns.init();
ComponentsPickers.init();
TableAdvanced.init();
});
</script>
</body>

<!-- END BODY -->
</html>