<?php
include './classes.php';
$lect = new User();
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
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/> -->
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

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-full-width" style="color:#272822; font-family:verdana; font-size:13px;">
        <!-- BEGIN HEADER -->
        <div class="col-md-12" style="background-color: #FFFFFF;"> <div class=" col-md-9"><?php headerinfo(); ?>  </div> <div class="noprint">  <div class=" col-md-3"><?php username(); ?></div></div></div>
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
                                        <i class="icon-reorder"></i> Available Balances

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
                                            <?php
                                            echo '<div id="mt"><table id="sample_2" class="table table-striped table-bordered table-hover table-full-width">
                                                     <thead>
                                                     <tr><th colspan="3"><h3 align="center"><b> Available Balances  </b></h3></th></tr>
                                                     <tr>
                                                     <th>Member Number</th>
                                                     <th>Member Name</th>
                                                     <th>Available Balance</th>
                                                     </thead>
                                                     </tr>';
                                            $sum = 0;


                                            $Rows = mysql_query('select * from newmember  where status="' . base64_encode("active") . '"') or die(mysql_error());
                                            while ($row = mysql_fetch_array($Rows)) {
                                                echo '    <tr>
                                                    <td>' . base64_decode($row['membernumber']) . '</td>
                                                    <td>' . getMembername($row['membernumber']) . '</td>';
                                                echo ' <td>' . getsymbol() . ' '.  number_format(sumbalforamember(base64_decode($row['membernumber'])), 2) . '</td>';
                                                echo '</tr>';
                                                $sum+=sumbalforamember(base64_decode($row['membernumber']));
                                                $psum+=sumtotalforamember(base64_decode($row['membernumber']));

                                                juma(base64_decode($row['membernumber']));
                                            }
                                            echo '<tr><td colspan="1"></td><td>TOTAL</td><td>' . getsymbol() . ' '. number_format($sum, 2) . '</td></tr></table></div>';
                                            echo '<div class="col-md-4"><button class="btn green" value="Print this page" onClick="return printResults()">Print</button></div>';

                                            save($sum, $psum);
                                            ?>

                                      <input type="button" class="btn green" onclick="tableToExcel('sample_2')" value="Export to Excel">
                                        <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
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
<script src="assets/scripts/custom/table-advanced.js"></script>

<script>
          jQuery(document).ready(function() {
  App.init(); // initlayout and core plugins
          Index.init();
          Index.initJQVMAP(); // init index page's custom scripts
          Index.initCalendar(); // init index page's custom scripts
          Index.initCharts(); // init index page's custom scripts
          Index.initChat();
          Index.initMiniCharts();
          Index.initDashboardDaterange();
          Tasks.initDashboardWidget();
  });														</script>
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

</body>
<!-- END BODY -->
</html>