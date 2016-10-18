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
                    <div class="col-md-8">
                        <div class="portlet box yellow">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-thumb-tack"></i>Users currently using the system
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
                               
                                <div class="tab-content">
                                    
                            <div class="tab-pane  active" id="overview_2">
                            <div  class="table-responsive">
                             <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
<thead><tr><th colspan="5"><h4 align="center"><b> Online users  </b></h4></th></tr>
<tr><th class = "style">User</th><th class = "style">IP</th><th class = "style">Browser</th><th class = "style">Operating system</th></tr></thead><tbody>
            <?php

    $qry = mysql_query("SELECT * FROM session WHERE valid= 1 ") or die(mysql_error());
//$qry = mysql_query('select * from audit') or die(mysql_error());
    while ($row = mysql_fetch_array($qry)) {

        $username = mysql_query('select * from users where id = "' . base64_decode($row['user']) . '"') or die(mysql_error());
        $userrslt = mysql_fetch_array($username);
        {
$usern = base64_decode($userrslt['fname']) . ' ' . base64_decode($userrslt['mname']) . ' ' . base64_decode($userrslt['lname']);
       }

        echo '<tr><td class = "style">' . $usern . '</td><td class = "style">' . base64_decode($row['original_ip']) . '</td>
<td class = "style">' . base64_decode($row['browser']) . '</td><td class = "style">' . base64_decode($row['os']) . '</td></tr>';
    }
	?>
                                          
                           </tbody></table></div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End: life time stats -->
                    <div class="col-md-4">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-thumb-tack"></i>Frequently used pages
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
                               
                                <div class="tab-content">
                                    
                                    <div class="tab-pane  active" id="overview_22">
                                        <table class="table table-striped table-bordered table-hover table-full-width" id="">
<thead><tr><th colspan="3"><h4 align="center"><b>Frequently visited pages  </b></h4></th></tr>
<tr><th class = "style">Page</th><th class = "style">Link</th></tr></thead><tbody>
                                            <tr><td class = "style">Settings</td>
                                                <td class = "style"><a href="settings.php">view page</a></td>
                                            </tr>
                                            <tr><td class = "style">Users</td>
                                                <td class = "style"><a href="adminusers.php">view page</a></td>
                                            </tr>
                                            <tr><td class = "style">Audit trail</td>
                                                <td class = "style"><a href="audit.php">view page</a></td>
                                            </tr>
                                            <tr><td class = "style">Loan settings</td>
                                                <td class = "style"><a href="loansett.php">view page</a></td>
                                            </tr>
                                            <tr><td class = "style">Fixed Deposit setting</td>
                                                <td class = "style"><a href="fixed_deposit_setting.php">view page</a></td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- End: life time stats  sec tab -->




                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->

<!-- Jssor Slider End -->
</body>
<!-- END FOOTER -->
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
</body>
<!-- END BODY -->
</html>  