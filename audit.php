<?php
include_once './classes.php';
$admin = new Admin();
$users = new Users();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Esacco | Microfinance System</title>
        <!--<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">-->
        <meta name="HandheldFriendly" content="True"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <meta name="HandheldFriendly" content="true" />
        <meta name="MobileOptimized" content="true" />
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


        <script>
            function checkAll(formname, checktoggle)
            {
            var checkboxes = new Array();
                    checkboxes = document[formname].getElementsByTagName('input');
                    for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type === 'checkbox') {
            checkboxes[i].checked = checktoggle;
            }
            }
            }
            function noninvoice(str)
            {
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
            document.getElementById("noninvoice").innerHTML = xmlhttp.responseText;
            }
            }
            xmlhttp.open("GET", "noninvoiced.php?q=" + str, true);
                    xmlhttp.send();
            }
        </script>
                    <script type="text/javascript">             var tableToExcel = (function() {
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
                <div class="col-md-offset-1 col-md-10 col-sm-10">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet box green calendar">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-reorder"></i> All Audit Reports

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
                                    
                                    audtitrail();
                                    ?>

                                    <div class="col-md-12"> 
                                        <?php auditexp(); ?>
                                        <input type="button" class="btn green" onClick="return printResults()" value="print">
                                        <input type="button" class="btn green" onclick="tableToExcel('sample_2')" value="Export to Excel">
                                    </div>

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
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <script src="assets/plugins/excanvas.min.js"></script> 
    <![endif]-->
    <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
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
                                                            TableAdvanced.init();
                                                    });
    </script>

</body></html>