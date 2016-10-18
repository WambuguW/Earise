<?php
include_once './classes.php';
$newuser = new User();
$users = new Users();
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
            xmlhttp.open("GET", "./search/kinsearch.php?q=" + str, true);
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

        <link rel="stylesheet" type="text/css" href="assets/css/tabcontent.css" />

        <script type="text/javascript" src="assets/js2/tabcontent.js">

                                /***********************************************
                                 * Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
                                 * This notice MUST stay intact for legal use
                                 * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
                                 ***********************************************/

        </script>

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-full-width" style="color:#272822; font-family:verdana; font-size:13px;">
        <!-- BEGIN HEADER -->
        <div class="col-md-12" style="background-color: #FFFFFF;"> <div class=" col-md-9"><?php headerinfo(); ?>  </div><div class=" col-md-3"><?php username(); ?></div></div>
        <div class="header navbar navbar-nav mega-menu col-md-8">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner" >
                <!-- BEGIN LOGO -->

                <!-- END LOGO -->
                <!-- BEGIN HORIZANTAL MENU -->

                <?php
                sidemenunew();
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
            <!-- END TOP NAVIGATION BAR -->
        </div>


        <!-- BEGIN TOP NAVIGATION BAR -->

        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN EMPTY PAGE SIDEBAR -->
            <?php mobilemenu(); ?>
            <!-- END EMPTY PAGE SIDEBAR -->
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    Widget settings form goes here
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn blue">Save changes</button>
                                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN STYLE CUSTOMIZER -->
                    <div class="theme-panel hidden-xs hidden-sm">


                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span>
                                    THEME COLOR
                                </span>
                                <ul>
                                    <li class="color-black current color-default" data-style="default">
                                    </li>
                                    <li class="color-blue" data-style="blue">
                                    </li>
                                    <li class="color-brown" data-style="brown">
                                    </li>
                                    <li class="color-purple" data-style="purple">
                                    </li>
                                    <li class="color-grey" data-style="grey">
                                    </li>
                                    <li class="color-white color-light" data-style="light">
                                    </li>
                                </ul>
                            </div>
                            <div class="theme-option">
                                <span>
                                    Layout
                                </span>
                                <select class="layout-option form-control input-small">
                                    <option value="fluid" selected="selected">Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span>
                                    Header
                                </span>
                                <select class="header-option form-control input-small">
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span>
                                    Sidebar
                                </span>
                                <select class="sidebar-option form-control input-small">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span>
                                    Sidebar Position
                                </span>
                                <select class="sidebar-pos-option form-control input-small">
                                    <option value="left" selected="selected">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span>
                                    Footer
                                </span>
                                <select class="footer-option form-control input-small">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END STYLE CUSTOMIZER -->

                    <div class="clearfix">
                    </div>


                    <!-- BEGIN ALERTS PORTLET-->
                    <div class="row ">
                        <div class="col-md-offset-1 col-md-10 col-sm-10">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box green calendar">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-reorder"></i> Account Settings

                                    </div>
                                    <div class="tools">

                                        <a href="javascript:;" class="reload"></a>

                                    </div>
                                </div>
                                <div class="portlet-body dark_green" style="color:#000000">
                                    <div class="well dark_green">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="art-layout-cell art-content clearfix">

                                            <?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>

                                            <!------form start----->


                                            <ul id="countrytabs" class="nav nav-tabs ">
                                                <li class="active"><a href="#"  data-toggle="tab" rel="country1" >Accounts</a></li>
                                                <li><a href="#" data-toggle="tab"  rel="country2">GL Accounts</a></li>

                                                <li><a href="#" data-toggle="tab" rel="country4">Capital Or Liabilities</a></li>


                                            </ul>
                                            <div class="col-md-12" style=" margin-bottom: 1em; padding: 10px">



                                                <div id="country1" class="tabcontent">
                                                    <?php
                                                    if (isset($_REQUEST['acsubmit'])) {
                                                        $newuser->accounts($_SESSION['users'], $_REQUEST['acname'], $_REQUEST['actype'], $_REQUEST['status'], $_REQUEST['NULL']);
                                                    }
                                                    if (isset($_REQUEST['accedit']) || isset($_REQUEST['acid']) || isset($_REQUEST['ace']) || isset($_REQUEST['acdel'])) {

                                                        if (isset($_REQUEST['acid'])) {

                                                            $id = $_REQUEST['acid'];

                                                            $sql = mysql_query('SELECT * FROM accounts WHERE id="' . $id . '"') or die(mysql_error());

                                                            $rows = mysql_fetch_array($sql);

                                                            accedit($_SESSION['users'], $rows['id'], base64_decode($rows['acname']), base64_decode($rows['actype']), base64_decode($rows['status']), base64_decode($rows['comments']));
                                                        }
                                                        if (isset($_REQUEST['ace'])) {
                                                            accountsupdate($_SESSION['users'], $_REQUEST['id'], $_REQUEST['acname'], $_REQUEST['actype'], $_REQUEST['status'], $_REQUEST['NULL']);
                                                        }

                                                        if (isset($_REQUEST['acdel'])) {
                                                            include ('del.php');
                                                        }

                                                        editaccounts();
                                                    } else {
                                                        accountsform();
                                                    }
                                                    ?>
                                                </div>

                                                <div id="country2" class="tabcontent">
                                                    <?php
                                                    if (isset($_REQUEST['gacsubmit'])) {
                                                        $newuser->glaccounts($_SESSION['users'], $_REQUEST['gaccode'], $_REQUEST['gacname'], $_REQUEST['accgrp'], $_REQUEST['status']);
                                                    }
                                                    if (isset($_REQUEST['gaccedit']) || isset($_REQUEST['gacid']) || isset($_REQUEST['gace']) || isset($_REQUEST['gacdel'])) {

                                                        if (isset($_REQUEST['gacid'])) {

                                                            $id = $_REQUEST['gacid'];

                                                            $sql = mysql_query('SELECT * FROM glaccounts WHERE id="' . $id . '"') or die(mysql_error());

                                                            $rows = mysql_fetch_array($sql);

                                                            glaccedit($_SESSION['users'], $rows['id'], base64_decode($rows['accode']), base64_decode($rows['acname']), base64_decode($rows['accgroup']), base64_decode($rows['status']));
                                                        }
                                                        if (isset($_REQUEST['gace'])) {
                                                            glaccountsupdate($_SESSION['users'], $_REQUEST['id'], $_REQUEST['gaccode'], $_REQUEST['gacname'], $_REQUEST['accgrp'], $_REQUEST['status']);
                                                        }

                                                        if (isset($_REQUEST['gacdel'])) {
                                                            include ('del.php');
                                                        }
                                                        if (isset($_REQUEST['gaccedit'])) {
                                                            editglaccounts();
                                                        }
                                                    } else {
                                                        glaccountsform();
                                                    }
                                                    ?>
                                                </div>


                                                <div id="country4" class="tabcontent">
                                                    <?php
                                                    if (isset($_REQUEST['liab'])) {
                                                        $newuser->liabilitys($_SESSION['users'], $_REQUEST['lname'], $_REQUEST['lamount'], $_REQUEST['status'], $_REQUEST['comments'], $_REQUEST['account']);
                                                    }
                                                    if (isset($_REQUEST['liabedit']) || isset($_REQUEST['lid']) || isset($_REQUEST['lib']) || isset($_REQUEST['del'])) {

                                                        if (isset($_REQUEST['lid'])) {

                                                            $id = $_REQUEST['lid'];

                                                            $sql = mysql_query('SELECT * FROM liabilities WHERE id="' . $id . '"') or die(mysql_error());

                                                            $rows = mysql_fetch_array($sql);

                                                            liabedit($_SESSION['users'], $rows['id'], base64_decode($rows['lname']), base64_decode($rows['lamount']), base64_decode($rows['status']), base64_decode($rows['lcomments']), base64_decode($rows['accountid']));
                                                        }

                                                        if (isset($_REQUEST['lib'])) {

                                                            liabsupdate($_SESSION['users'], $_REQUEST['id'], $_REQUEST['lname'], $_REQUEST['lamount'], $_REQUEST['status'], $_REQUEST['comments'], $_REQUEST['account']);
                                                        }

                                                        if (isset($_REQUEST['del'])) {
                                                            include ('del.php');
                                                        }
                                                        editliabilities();
                                                    } else {
                                                        liabilitiesform();
                                                    }
                                                    ?>
                                                    <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
                                                </div>



                                            </div>

                                            <script type="text/javascript">

                                                        var countries = new ddtabcontent("countrytabs")
                                                        countries.setpersist(true)
                                                        countries.setselectedClassTarget("link") //"link" or "linkparent"
                                                        countries.init()

                                            </script>








                                        </div>
                                    </div>
                                    

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PORTLET-->
</div>

</div>
<!--END PORTLET-->

</div>
</div>
</div>
</div>
</div>
<!--END CONTENT-->

<!--END CONTAINER-->
<!--BEGIN FOOTER-->
<div class = "footer">
    <div class = "footer-inner">
        <?php footer();
        ?>
    </div>
    <div class="footer-tools">
        <span class="go-top">
            <i class="fa fa-angle-up"></i>
        </span>
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
<script src="assets/scripts/custom/table-editable.js"></script>

<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="assets/scripts/custom/components-pickers.js"></script>
<script src="assets/scripts/custom/components-dropdowns.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/app.js"></script>
<script src="assets/plugins/bootstrap-sessiontimeout/bootstrap-session-timeout.js" type="text/javascript"></script>
<script>
                                                jQuery(document).ready(function () {
                                        // initiate layout and plugins
                                        App.init();
                                                TableEditable.init();
                                                ComponentsPickers.init();
                                                ComponentsDropdowns.init();
                                        });
</script>

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

</body>
<!-- END BODY -->
</html>