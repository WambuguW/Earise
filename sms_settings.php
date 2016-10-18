<?php
include_once './classes.php';
$admin = new Admin();
$sacco = new User();

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
                                <i class="icon-reorder"></i> SMS Settings

                            </div>
                            <div class="tools">

                                <a href="javascript:;" class="reload"></a>

                            </div>
                        </div>
                        <?php
                        
                     $one = mysql_query('select * from sms_settings where id="1"') or die(mysql_error());
                        $two = mysql_fetch_array($one);
                        $state = base64_decode($two['status']);
                        $mailed =  base64_decode($two['username']);
                        
                        ?>
                        <div class="portlet-body dark_green" style="color:#000000">
                            <div class="well dark_green">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="art-layout-cell art-content clearfix">
                                    <!------form start----->
                                    <div class="alert" id="info" style="height: 50px"></div>
                                    <form class="form" id="myform" action="process_sms_settings.php" method="post">
                                        <div class="form-body">
                                              <div class="col-md-offset-3">
                                               
                                               <input type="button"   value="<?php print'Current send sms status is '. base64_decode(checksend_sms()) ?>" class="btn yellow">
                                                
                                            </div>
                                            <br/>
                                            <br/>
                                           <div class="col-md-2">
                                                Email
                                            </div>
                                            <div class="col-md-10">
                                                <input type="email" name="username" value="<?php echo $mailed ?>" id="username" class="form-control input-medium" placeholder="email">
                                            </div>
                                            <br /><br >
                                            <div class="col-md-2">
                                                Password
                                            </div>
                                            <div class="col-md-10">
                                                         <input type="password"  name="passwd" id="passwd" class="form-control input-medium" placeholder="password">
                                            </div>
                                            <br /><br >
                                         
                                           <br /><br />
                                            <div class="col-md-2">Send SMS Status</div>
                                            <div class="col-md-4">
                                                <select class="form-control input-medium" id="status" name="status">
                                                    <option value="<?php $state; ?>"><?php print $state; ?></option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-2">
                                               
                                                <input type="button" name="confirm" id="confirm" value="Update" class="btn green">
                                                
                                            </div>
                                        </div>
                                    </form>
                              
                                </div>
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
                                    App.init(); // initlayout and core plugins
                                    Index.init();
                                    Index.initJQVMAP(); // init index page's custom scripts
                                   
                                });
    </script>
    <script>
     
  
  $("#confirm").click(function(){
      var username = $("#username").val();
      var pswd = $("#passwd").val();
      var status = $("#status").val();
      
      var dataStr = '&username=' + username + '&pswd=' + pswd + '&status=' + status;
      
      
      $.ajax({
        type: "POST", url: "process_sms_settings.php", data: dataStr,
                            cache: false,
                            success: function (result) {
                            $("#info").addClass("alert-info");
                            $("#info").html(result);
                            
                            if(result === "Please enter your username!")
                                {
                                    $("#username").focus();
                                }else if(result === "Please enter your password!")
                                {
                                    $("#passwd").focus();
                                }else if(result === "Username must be atleast 6 characters long!")
                                    {
                                        $("#username").focus();
                                    }else if(result === "Your password must be atleast 6 characters long!")
                                {
                                    $("#passwd").focus();
                                }else if(result === "Your passwords do not match!")
                                {
                                    $("#passwdconf").focus();
                                }else if(result === "Account created successfully!")
                                {
                                    $("#info").addClass("alert-info");
                                    
                                }
       
   }
    });
  });
        
   </script>

</body></html>