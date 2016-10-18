
<?php
include_once 'classes.php';
$loandi = new User();
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
            function loanDis(val) {
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "./search/memberName.php",
                    data: 'mno=' + val,
                    success: function (data) {
                        $("#Name").val(data);
                       //alert(data);
                    }
                });
                
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "./search/disSearch.php",
                    data: 'mno=' + val,
                    success: function (data) {
                        $("#loan").html(data);
                         //alert(data);
                    }
                });
                
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "./search/indBank.php",
                    data: 'mno=' + val,
                    success: function (data) {
                        $("#indBank").html(data);
                      //alert(data);
                    }
                });
                
              
            }
            
          function GetAmount(val){
                $.ajax({
                    cache: false,
                    type: "POST",
                    url: "./search/loanAmount.php",
                    data: 'tid=' + val,
                    success: function (data) {
                        $("#amounta").val(data);
                      //alert(data);
                    }
                });
          }

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
                                        <i class="icon-reorder"></i> Loan Disbursement

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
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab1" data-toggle="tab">
                                                        Loan Disbursement
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab">
                                                        Loan Amortization
                                                    </a>
                                                </li>



                                            </ul>
                                             
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                   
                                                    <?php
                                                    if (isset($_REQUEST['dis'])) {
                                                        if (!$_SESSION['session']) {
                                                            $_SESSION['session'] = session_id();
                                                        }

                                                        $_SESSION['ltid'] = ($_REQUEST['tname']);
                                                        $_SESSION['lmid'] = $_REQUEST['mno'];
                                                        $_SESSION['disburseDate'] = $_REQUEST['date'];

                                                        $sth = mysql_query("SELECT * FROM loanapplication WHERE  transactionid='" . base64_encode($_SESSION['ltid']) . "'");
                                                        while ($row1 = mysql_fetch_array($sth)) {
                                                            //$_SESSION['loantype'] = base64_decode($row1['loantype']);
                                                            $_SESSION['amount'] = base64_decode($row1['amount']);

                                                            $_SESSION['norep'] = base64_decode($row1['installments']);
                                                            $_SESSION['amount'] = base64_decode($row1['amount']);
                                                            $_SESSION['gperiod'] = base64_decode($row1['gperiod']);
                                                            $_SESSION['mode'] = base64_decode($row1['paymode']);
                                                            $_SESSION['ltype'] = (base64_decode($row1['loantype']));
                                                        }


                                                        $loandi->addloandis($_SESSION['users'], base64_encode($_REQUEST['mno']), base64_encode($_REQUEST['tname']), base64_encode($_REQUEST['date']), base64_encode($_REQUEST['amount']), base64_encode($_REQUEST['comment']), base64_encode($_REQUEST['tname']), base64_encode($_REQUEST['bnkid']), base64_encode($_REQUEST['ptype']), base64_encode($_REQUEST['ref']), base64_encode($_REQUEST['bnkAccfrom']), base64_encode($_REQUEST['indbank']));
                                                    }
                                                    
                                                        loandisbursment();
                                                    
                                                    ?>
                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <?php
                                                    if (!$amount = $_POST['amount']) { //first time set all to zero
                                                        $amount = 0;
                                                    }
                                                    if (!$rate = $_POST['rate']) {
                                                        $rate = 0;
                                                    }
                                                    if (!$years = $_POST['years']) {
                                                        $years = 0;
                                                    }
                                                    $am = new amort($amount, $rate, $years); //make an instance of amort and set the numbers
                                                    $am->showForm();  //show the form to get the numbers
                                                    if ($amount * $rate * $years <> 0) { //if any one is zero, don't show the table
                                                        $am->showTable();  //if true, show table, else don't
                                                    } elseif (($rate == 0 )AND ( $amount !== 0)AND ( $years !== 0)) {
                                                        $am->showTable();
                                                    } else {
                                                        //false;
                                                    }
                                                    if (!isset($_POST['process']) && !isset($_POST['ssdate'])) {
                                                        echo "<input type='submit'  class='mybutton' name='ssdate' value='Check Schedule.' align='middle'/>";
                                                    }
                                                    if (isset($_POST['ssdate'])) {
                                                        echo "<button class='mybutton' name='process' value='process'>Process Loan</button>";
                                                    }
                                                    echo "  </form>";
                                                    ?>
                                            
                                                </div>
                                               

                                            </div>
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

<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="assets/scripts/custom/components-pickers.js"></script>
<script src="assets/scripts/custom/components-dropdowns.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script src="assets/plugins/bootstrap-sessiontimeout/bootstrap-session-timeout.js" type="text/javascript"></script>

<script>
            $.sessionTimeout({
                keepAliveUrl: 'keep-alive.html',
                logoutUrl: 'logout.php',
                redirUrl: 'logout.php',
                warnAfter: 360000, //warn after 6 minutes
                redirAfter: 420000, // logout after 7 minutes
                countdownMessage: 'Logging you out in {timer}   seconds.'
            });
</script>
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        App.init();
        TableAdvanced.init();
        ComponentsPickers.init();
        ComponentsDropdowns.init();
    });
</script>
</body>
<!-- END BODY -->
</html>