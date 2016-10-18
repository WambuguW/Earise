<?php
include_once './classes.php';
$newuser = new User();
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
window.onload = function() {
document.getElementById('no').onchange = disablefield;
document.getElementById('yes').onchange = disablefield;
}

function disablefield()
{
if ( document.getElementById('no').checked == true ){
document.getElementById('jay').value = '';
document.getElementById('jay').disabled = true}
else if (document.getElementById('yes').checked == true ){
document.getElementById('jay').disabled = false;}
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
                                <i class="icon-reorder"></i> Loan Settings

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
                                    if (isset($_REQUEST['losub'])) {

                                        $users->loansett("superadmin", $_REQUEST['lname'], $_REQUEST['ltype'], $_REQUEST['status'], $_REQUEST['ratetype'], $_REQUEST['rate'], $_REQUEST['proc'], $_REQUEST['fee'], $_REQUEST['ins'], $_REQUEST['ins2'], $_REQUEST['min'], $_REQUEST['max'], $_REQUEST['comments'], $_REQUEST['maxg'], $_REQUEST['fyn'], $_REQUEST['maxloansave'], $_REQUEST['duration'],$_REQUEST['interest'],$_REQUEST['lfees']);
                                    }


                                    if (isset($_REQUEST['ace'])) {
                                        loansupdate("superadmin", $_REQUEST['lid'], $_REQUEST['lname'], $_REQUEST['ltype'], $_REQUEST['status'], $_REQUEST['ratetype'], $_REQUEST['rate'], $_REQUEST['proc'], $_REQUEST['ins'], $_REQUEST['min'], $_REQUEST['max'], $_REQUEST['comments'],$_REQUEST['maxg'],$_REQUEST['fyn'],$_REQUEST['maxloansave'],$_REQUEST['duration'],$_REQUEST['interest'],$_REQUEST['lfees']);
                                        
                                    }

                                    if (isset($_REQUEST['btnedit']) || isset($_REQUEST['loedit']) || isset($_REQUEST['ace']) || isset($_REQUEST['ldel'])) {

                                        if (isset($_REQUEST['btnedit'])) {

                                            $id = $_REQUEST['lid'];

                                            $sql = mysql_query('SELECT * FROM loansettings WHERE id="' . $id . '"') or die(mysql_error());

                                            $rows = mysql_fetch_array($sql);

                                            loanedit($rows['id'], base64_decode($rows['lname']), base64_decode($rows['ltype']), base64_decode($rows['status']), base64_decode($rows['ratetype']), base64_decode($rows['rate']), base64_decode($rows['loanappfee']), base64_decode($rows['loaninsurance']), base64_decode($rows['min']), base64_decode($rows['max']), base64_decode($rows['comments']), base64_decode($rows['maxgurantor']), base64_decode($rows['fines']), base64_decode($rows['maxloansave']), base64_decode($rows['duration']),base64_decode($rows['legalfees']) );
                                        }


                                        if (isset($_REQUEST['ldel'])) {
                                            include ('del.php');
                                        }

                                        if (isset($_REQUEST['loedit'])) {
                                            editloans();
                                        }
                                    } else {

                                        loansettings();
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
   // initiate layout and plugins
  
     TableAdvanced.init();
});
</script>

</body></html>