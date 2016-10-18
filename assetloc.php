<?php
include_once './includes/class.php';
include("includes/fff.php");

login_required();
$newuser = new User();
$users = new Users();


if (isset($_GET['id']) && isset($_GET['catcode'])) {
    $id = $_GET['id'];
    $sqll = mysql_query("DELETE FROM fixedassetslocation WHERE id='$id' ") or die(mysql_error());

    $_SESSION['success'] = 'Fixed Asset Category Successfully deleted';
}

if (isset($_REQUEST['acsubmit'])) {

    $newuser->assetslocation($_SESSION['user'], $_REQUEST['lcode'], $_REQUEST['lname'], $_REQUEST['contact'], $_REQUEST['paddress'], $_REQUEST['town'], $_REQUEST['pcode'], $_REQUEST['phone'], $_REQUEST['email'], $_REQUEST['status']);
}

/*
  $cyr= mysql_query("select * from purchorders order by orderno desc limit 1");
  while ($rab= mysql_fetch_array($cyr)) {
  $dee=$rab['orderno'];
  $loc=$rab['destination'];

  }


  mysql_query("delete from purchorderdetails where orderno='" . $dee . "'");

  $max=count($_SESSION['cart']);
  for($i=0;$i<$max;$i++){
  $pid=$_SESSION['cart'][$i]['productid'];
  $q=$_SESSION['cart'][$i]['qty'];
  $price=get_price($pid);
  $tot=$price * $q;
  $user=$_SESSION['user'];
  $grand= get_order_total();

  $ccc= mysql_query("select * from purchorderdetails where orderno='" . $dee . "' and itemcode='" . $pid . "' and quantity='" . $q . "' and unitprice='" . $price . "' and total='" . $tot . "' and grandtotal='" . $grand . "'");
  if(mysql_num_rows($ccc) >= 1) {

  } else {

  mysql_query("insert into purchorderdetails values ('', $dee, $pid, $q, $price, $tot, '$grand', '0','$user', '" . date('d-M-Y') . "')");

  }

  //unset($_SESSION['cart']);
  }
 */
$page = 'settings';
$childpage = 'cuacc';
?>
<script type="text/javascript">
    function printpage()
    {
        window.print()
    }
</script>
<script>

    function delacc(no, title)
    {
        if (confirm("Do you want to delete '" + title + "'"))
        {
            window.location.href = 'assetloc.php?id=' + no;
        }
    }
</script>
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
        <title>NadaERP|Smart Business Solutions</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!---<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/> --->
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGIN STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/brown.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
        <script language="JavaScript" type="text/javascript" src="suggest.js"></script>
        <script language="JavaScript" type="text/javascript" src="productsearch.js"></script>
        <script language="JavaScript" type="text/javascript" src="productnamesearch.js"></script>  


        <script>

                                    function delproduct(no, title)
                                    {
                                        if (confirm("Do you want to delete '" + title + "'"))
                                        {
                                            window.location.href = 'products.php?id=' + no;
                                        }
                                    }
        </script>

        <script type="text/javascript">
            function printpage()
            {
                window.print()
            }
        </script>

        <style type="text/css">
            <!--

            @media print
            {
                .noprint {display:none;}
            }

            @media screen
            {

            }

            -->
        </style>



    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-full-width">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-fixed-top mega-menu">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <!-- BEGIN LOGO -->
                <a class="navbar-brand"  href="index.php">
                    <img src="assets/img/logo1.png" alt="logo" class="img-responsive"/>
                </a>
                <!-- END LOGO -->
                <!-- BEGIN HORIZANTAL MENU -->
<?php sidemenu($page, $childpage); ?>
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
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN EMPTY PAGE SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                        <li>
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li>
                            <a href="index.php">
                                Dashboard
                                <span class="selected">
                                </span>
                            </a>
                        </li>
                        <li>
                            <a data-hover="dropdown" data-close-others="true" href="javascript:;" class="dropdown-toggle">
                                Sales <i class="fa fa-angle-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content ">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <ul class="col-md-4 mega-menu-submenu">
                                                    <li>
                                                        <h3>Transaction</h3>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Point of Sale
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="salesreturn.php">
                                                            <i class="fa fa-angle-right"></i> Sales Return
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="invoice.php">
                                                            <i class="fa fa-angle-right"></i> Create Invoice
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="saleshisto.php">
                                                            <i class="fa fa-angle-right"></i> View Sales History
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <h3>Reports</h3>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Sales by mode of Payment
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Customer Sales
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> All Sales
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Sales by Tellers
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Sales by Products
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <h3>Settings</h3>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a data-hover="dropdown" data-close-others="true" href="javascript:;" class="dropdown-toggle">
                                Billing <i class="fa fa-angle-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content ">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <ul>
                                                    <li>
                                                        <h3></h3>
                                                    </li>
                                                    <li>

                                                        <a href="clientchoice.php">
                                                            <i class="fa fa-angle-right"></i> Clients
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="editstudent.php">
                                                            <i class="fa fa-angle-right"></i> Edit Clients
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Service Subscription
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Reverse Subscription
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Deparments
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Edit Departments
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Services
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Edit Services
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Miscellaneous
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Edit Miscellaneous
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Invoice
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Reverse Invoices
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Payments
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Reverse Payments
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Receipt Duplicate
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Balance B/F
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Bank Reconciliation
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a data-hover="dropdown" data-close-others="true" href="javascript:;" class="dropdown-toggle">
                                Inventory <i class="fa fa-angle-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content ">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <ul>
                                                    <li>
                                                        <h3></h3>
                                                    </li>
                                                    <li>

                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Products
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Stock Adjustment
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Stock Transfer
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Low Level Stock
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Unit of Measurement
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Edit Unit of Measurement
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Assign unit of Measurement
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a data-hover="dropdown" data-close-others="true" href="javascript:;" class="dropdown-toggle">
                                Purchases <i class="fa fa-angle-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content ">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <ul>
                                                    <li>
                                                        <h3></h3>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> View Purchase Order/LPO
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Create LPO
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Create LSO
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Generate Purchase Order
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a data-hover="dropdown" data-close-others="true" href="javascript:;" class="dropdown-toggle">
                                Payables <i class="fa fa-angle-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content ">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <ul>
                                                    <li>
                                                        <h3>Suppliers</h3>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Add Suppliers
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> View Suppliers
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Suppliers Price ListS
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a data-hover="dropdown" data-close-others="true" href="javascript:;" class="dropdown-toggle">
                                Receivables <i class="fa fa-angle-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content ">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <ul>
                                                    <li>
                                                        <h3>Customers</h3>
                                                    </li>
                                                    <li>
                                                        <a href="addcustomers.php">
                                                            <i class="fa fa-angle-right"></i> Add Customers
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="viewcust.php">
                                                            <i class="fa fa-angle-right"></i> View Customers
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cuselect">
                                                            <i class="fa fa-angle-right"></i> Customer Accounts
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>				<li>
                            <a data-hover="dropdown" data-close-others="true" href="javascript:;" class="dropdown-toggle">
                                General Ledger <i class="fa fa-angle-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content ">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <ul>
                                                    <li>
                                                        <h3></h3>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Banks
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-angle-right"></i> Accounts
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>

                            <ul>
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content ">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <ul>
                                                    <li>
                                                        <h3></h3>
                                                    </li>
                                                    <li>
                                                        <a href="sales.php">
                                                            <i class="fa fa-angle-right"></i> Branch Setup
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="taxrates.php">
                                                            <i class="fa fa-angle-right"></i> Tax Rates
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="sales.php">
                                                            <i class="fa fa-angle-right"></i> Currency
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="sales.php">
                                                            <i class="fa fa-angle-right"></i> Data Back-up
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="taxcategories.php">
                                                            <i class="fa fa-angle-right"></i> Tax Categories
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
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

                    <div class="clearfix">
                    </div>
<?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>


                        <div class="row ">
                            <div class="col-md-offset-2 col-md-8 col-sm-8">
                                <!-- BEGIN PORTLET-->
                                <div class="portlet box green calendar">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-calendar"></i>Asset Locations
                                        </div>
                                    </div>
                                    <div class="portlet-body dark_green">
                                        <div class="well dark_green">
    <?php
    if (isset($_REQUEST['acid']) || isset($_REQUEST['accedit']) || isset($_REQUEST['ace'])) {

        if (isset($_REQUEST['acid'])) {

            $id = $_REQUEST['acid'];

            $sql = mysql_query('SELECT * FROM fixedassetslocation WHERE id="' . $id . '"') or die(mysql_error());

            $rows = mysql_fetch_array($sql);

            assetlocationedit($_SESSION['user'], $rows['id'], base64_decode($rows['lcode']), base64_decode($rows['lname']), base64_decode($rows['contact']), base64_decode($rows['paddress']), base64_decode($rows['town']), base64_decode($rows['pcode']), base64_decode($rows['phone']), base64_decode($rows['email']), base64_decode($rows['status']));
        }
        if (isset($_REQUEST['ace'])) {
            assetlocupdate($_SESSION['user'], $_REQUEST['id'], $_REQUEST['lcode'], $_REQUEST['lname'], $_REQUEST['contact'], $_REQUEST['paddress'], $_REQUEST['town'], $_REQUEST['pcode'], $_REQUEST['phone'], $_REQUEST['email'], $_REQUEST['status']);
        }

        if (isset($_REQUEST['accedit'])) {

            editassetlocation();
        }
    } else {

        assetlocationform();
    }


echo messages();
?>
                                            <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>

                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            <div class="footer-inner">
                2014  &copy;  NadaERP|Smart Business Solutions
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
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="assets/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
        <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
        <script src="assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/scripts/core/app.js" type="text/javascript"></script>
        <script src="assets/scripts/custom/index.js" type="text/javascript"></script>
        <script src="assets/scripts/custom/tasks.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
                    jQuery(document).ready(function () {
                        App.init(); // initlayout and core plugins
                        Index.init();
                        Index.initJQVMAP(); // init index page's custom scripts
                        Index.initCalendar(); // init index page's custom scripts
                        Index.initCharts(); // init index page's custom scripts
                        Index.initChat();
                        Index.initMiniCharts();
                        Index.initDashboardDaterange();
                        Index.initIntro();
                        Tasks.initDashboardWidget();
                    });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>