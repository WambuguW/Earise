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
        <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
        <script src="autosaveform.js"></script>
        
        <script>

            var formsave1 = new autosaveform({
                formid: 'form4',
                pause: 1000 //<--no comma following last option!
            })

        </script>
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
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "./search/personalloansearch.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="jquery-latest.min.js"></script>


        <script language="javascript" type="text/javascript">
            function amultiply() {

                a = Number(document.abc.one.value);

                b = Number(document.abc.two.value);

                c = a * b;

                document.abc.res.value = c;

                if (a != 0) // some logic to determine if it is ok to go
                {
                document.getElementById("xx").disabled = false;
                }
                else // in case it was enabled and the user changed their mind
                {
                    document.getElementById("xx").disabled = true;
                }




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
                        
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN STYLE CUSTOMIZER -->
                    <div class="theme-panel hidden-xs hidden-sm">


                        
                    </div>
                    <!-- END STYLE CUSTOMIZER -->

                    <div class="clearfix">
                    </div>


                    <!-- BEGIN ALERTS PORTLET-->
                    <div class="row ">
                        <div class="col-md-offset-2 col-md-8">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box green calendar">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-reorder"></i> Income

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
                                            if (isset($_REQUEST['importcsv'])) {
                                                if ($_FILES[csv][size] > 0) {

                                                    /* ------------------Get the csv file and its details---------------------- */

                                                    $file_format = array('csv');
                                                    $file = $_FILES[csv][tmp_name];
                                                    $filename = $_FILES['csv']['name'];
                                                    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

                                                    /* ---------------Check if the selected file is a csv file ---------------- */
                                                    if (!in_array($file_extension, $file_format)) {
                                                        echo '<script>alert("Unsupported file format selected!\nSave your Microsoft Excel file in csv format.\nIn Microsoft Excel Click on File menu, Save As, in the Save as type box choose CSV(Comma delimited)"); </script>';
                                                    } else {
                                                        /* ---If its a csv file open it and read its contents --- */
                                                        $handle = fopen($file, "r");

                                                        /* ---------------------Skip first row(header row) --------------------- */
                                                        fgets($handle);

                                                        /* ------Loop through the csv file and insert records into check_off table---- */
                                                        do {
                                                            if ($data[0]) {
                                                                $result = mysql_query("SHOW TABLE STATUS LIKE 'paymentin'");
                                                                $row = mysql_fetch_array($result);
                                                                $nextId = getreceipt().$row['Auto_increment'];
                                                                if (!$_SESSION['sess']) {
                                                                    $_SESSION['sess'] = session_id();
                                                                }
                                                                $newuser->saccoincome($_SESSION['users'], $nextId, addslashes($data[5]), addslashes($data[7]), addslashes($data[6]), addslashes($data[2]), 'NULL', addslashes($data[0]), addslashes($data[1]), addslashes($data[3]), addslashes($data[8]), '1', $_SESSION['session'], addslashes($data[4]));
                                                            }
                                                        } while ($data = fgetcsv($handle, 1000, ",", "'"));
                                                        /* ------------- End of inserting data ---------------------------- */

                                                        /* --------------Print Success message ----------------------------- */
                                                    }
                                                }
                                            }

                                           
                                                if (!$_SESSION['session']) {
                                                    $_SESSION['session'] = session_id();
                                                }
                                                if (isset($_REQUEST['submit'])) {
                                                    $newuser->saccoincome($_SESSION['users'], $_REQUEST['tid'], $_REQUEST['tname'], $_REQUEST['res'], $_REQUEST['ptype'], $_REQUEST['apby'], 'NULL', $_REQUEST['payee'], $_REQUEST['pid'], $_REQUEST['comments'], $_REQUEST['date'], $_REQUEST['submit'], $_SESSION['session'], $_REQUEST['bankname']);
                                                }else{
                                                    incomeform();
                                                //income();
                                                //uploadincome();
                                                }
                                           
                                            ?>
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
<script type="text/javascript">
function CurrencyFormat(number)
{
   var decimalplaces = 2;
   var decimalcharacter = ".";
   var thousandseparater = ",";
   number = parseFloat(number);
   var sign = number < 0 ? "-" : "";
   var formatted = new String(number.toFixed(decimalplaces));
   if( decimalcharacter.length && decimalcharacter != "." ) { formatted = formatted.replace(/\./,decimalcharacter); }
   var integer = "";
   var fraction = "";
   var strnumber = new String(formatted);
   var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
   if( dotpos > -1 )
   {
      if( dotpos ) { integer = strnumber.substr(0,dotpos); }
      fraction = strnumber.substr(dotpos+1);
   }
   else { integer = strnumber; }
   if( integer ) { integer = String(Math.abs(integer)); }
   while( fraction.length < decimalplaces ) { fraction += "0"; }
   temparray = new Array();
   while( integer.length > 3 )
   {
      temparray.unshift(integer.substr(-3));
      integer = integer.substr(0,integer.length-3);
   }
   temparray.unshift(integer);
   integer = temparray.join(thousandseparater);
   return sign + integer + decimalcharacter + fraction;
}
function FormatAsCurrency(n) { document.getElementById("formatted").innerHTML = CurrencyFormat(n) + " "; }
</script>
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
<!-- END JAVASCRIPTS -->
<script src="assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="assets/scripts/custom/components-dropdowns.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/scripts/custom/components-pickers.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/plugins/jquery-idle-timeout/jquery.idletimeout.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-idle-timeout/jquery.idletimer.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/custom/ui-idletimeout.js"></script>
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
                    // initiate layout and plugins
                             App.init();
                             ComponentsPickers.init();
                             ComponentsDropdowns.init();
                             TableAdvanced.init();
                             // initialize session timeout settings
                             UIIdleTimeout.init();
                    });</script>


</body>
<!-- END BODY -->
</html>