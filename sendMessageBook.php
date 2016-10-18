<?php
include './classes.php';
$lect = new User();
$users = new Users();

if(isset($_POST['submit'])){
$contacts = $_POST['contacts'];
$message = $_POST['details'];
header('location: http://sms.truehost.org/sms/send_sms.php?res='.$contacts.'&mess='.$message.'&user='.$token);
}
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
        <script>
            $(function () {
                $('.parent').on('click', function () {
                    var checked = this.checked;
                    $(this).parents('#parent').find('.child').each(function () {
                        this.checked = checked;
                    });
                });
            });

            //Show contacts   
            function showUser(str) {
                if (str == "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

                        }
                    }
                    xmlhttp.open("GET", "search/getcontact.php?q=" + str, true);
                    xmlhttp.send();
                }
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


                    <div class="row ">
                        <div class=" col-md-12 ">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box green calendar">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-reorder"></i> Send Message From Address Book

                                    </div>
                                    <div class="tools">

                                        <a href="javascript:;" class="reload"></a>

                                    </div>
                                </div>
                                
                                <!----begin---->
                                <div class="portlet-body dark_green" style="color:#000000">
                                    <div class="well dark_green">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="art-layout-cell art-content clearfix">

                                            <div class="col-md-7">
                                                <div class="portlet box yellow">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-thumb-tack"></i>Prepare Message
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
                                                                <div style="max-width: 800px; overflow-y: auto;" class="table-responsive">
                                                                    <form action="" method="post" class="form-horizontal form-bordered">
                                                                        <span id="receipterrrr5"></span>
                                                                        <div class="form-body">
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label">Recipients</label>
                                                                                <div class="col-md-4">
                                                                                    <span id="sent"></span>
                                                                                    <input style="width: 500px" type="text" id="contacts" name="contacts" value="<?php echo $_GET['id'] ?>" class="form-control">                                        
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-body">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">Message</label>
                                                                                    <div class="col-md-9">
                                                                                        <textarea id="message" style="width: 500px; resize: none" name="details" id="details" data-provide="markdown" rows="10"></textarea></br>(1 SMS = 160 characters.)
                                                                                    </div>
                                                                                    <input type="hidden" id="amm" value="<?php echo $_GET['amm'] ?>">

                                                                                </div>

                                                                            </div>
                                                                            <div class="form-body">

                                                                                <div class="form-group">


                                                                                    <div class="form-actions fluid">

                                                                                        <div class="col-md-offset-3 col-md-9">

                                                                                            <table class="schedule_text">
                                                                                                <tr>
                                                                                                    <td><b>Schedule Message </b></td>
                                                                                                    <td>
                                                                                                        <input id="setDate" type="text" class=" form-control input-group date form_datetime" name="settime" >

                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <button type="button" id="schedule_button" title="OK"><img src="icons/ok.png" width="30" /></button>
                                                                                                    </td>

                                                                                                </tr>

                                                                                            </table>

                                                                                            <button id="submit2" type="submit" name="submit" class="btn blue">Send</button>
                                                                                            <button id="schedule" type="button" class="btn blue">Send latter</button>                                           

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- END SAMPLE TABLE PORTLET-->
                                                    </div>
                                                </div>
                                                <!-- END PORTLET-->
                                            </div>

                                            <div class="col-md-5">
                                                <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-thumb-tack"></i>Overview
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
                                                                <div style="max-width: 800px; overflow-y: auto;" class="table-responsive">
                                                                   <table  aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover table-full-width dataTable" >
                                                                        <tr><td>
                                                                                <form action="" method="post">
                                                                                    <select name="users" onchange="showUser(this.value)" class="form-control">
                                                                                        <option>Select Address Book</option>

                                                                                        <?php
                                                                                        $addressbooks = mysql_query("SELECT* FROM addressbooks  GROUP BY name");
                                                                                        while ($row = mysql_fetch_array($addressbooks)) {
                                                                                            $addressBookName = base64_decode($row['name']);
                                                                                            echo" <option value='$addressBookName'>$addressBookName</option> ";
                                                                                        }
                                                                                        ?>



                                                                                    </select>
                                                                                </form>
                                                                            </td>
                                                                            <td>&nbsp</td>
                                                                            <td>
                                                                                <button id="OK" style="margin: 5px 5px 5px 5px" class="btn green">Add</button>
                                                                            </td>
                                                                        </tr>
                                                                   
</table>
                                                                    
                                                                   
                                                                         
                                                                        
                                                                            <div id="txtHint" style="height: 340px; overflow-y: scroll;" class="portlet-body form"></div>

                                                                        
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--END PORTLET-->

                                        </div>
                                    </div>
                                
                                
                                
                                
                                <!-------end-->
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
                        <script src="assets/scripts/custom/table-managed.js"></script>
                        <script>
                                                                                        jQuery(document).ready(function () {
                                                                                            App.init();
                                                                                            TableManaged.init();
                                                                                        });
                        </script>
                        <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
                        <script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
                        <script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
                        <script src="assets/scripts/core/app.js"></script>
                        <script src="assets/scripts/custom/components-pickers.js"></script>
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
                                                                                        jQuery(document).ready(function () {
                                                                                            // initiate layout and plugins
                                                                                            App.init();
                                                                                            ComponentsPickers.init();
                                                                                        });
                        </script>
                          <script>
$('#OK').click(function(){
    var text = "";
    $('.chkbx:checked').each(function(){
        text += $(this).val()+',';
    });
    text = text.substring(0,text.length-1);
    
    $('#contacts').val(text);
    
   
});
</script>
                        </body>
                        <!-- END BODY -->
                        </html>