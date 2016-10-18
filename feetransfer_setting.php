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
        
      <script language="javascript">
fields = 0;
function addInput() {
if (fields !==20) {
document.getElementById('withd').innerHTML += "<div class='form-group'>\n\
<div class='col-md-12'> \n\
<div class='col-md-4'>\n\
<label class='control-label'>Account From </label>\n\
<select name='acctfrom[]' required class='form-control input-medium select2me' title='Enter Account from'  placeholder='Enter Account from'/>\n\
<option><option>\n\
<?=
$actfrm = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row = mysql_fetch_array($actfrm)){
        echo '<option value=' . $row['id'] .'>' .base64_decode($row['acname']) . '</option>';
    }
?></select>\
 </div>\n\
<div class='col-md-4'> \n\
<label class='control-label'> Account To</label>\n\
  <select name='acctto[]' class='form-control input-medium select2me'  required title='Enter Account To'  placeholder='Enter Account to'  />\n\
<option></option>\n\
<option><option>\n\
<?=
$actto = mysql_query('select * from glaccounts where status="' . base64_encode('Active') . '"') or die(mysql_error());
    while ($row1 = mysql_fetch_array($actto)){
        echo '<option value=' . $row1['id'] .'>' .base64_decode($row1['acname']) . '</option>';
    }
?></select>\ \n\
 </div>\n\
<label class='control-label'>Amount </label>\n\
<input type='text' name='amount[]' required class='form-control input-medium' pattern='([0-9]*[.]*)+' title='Enter Amount '  placeholder='Enter Amount '  />\n\
\
</div>\n\
</div>";
fields += 1;
} else {
document.getElementById('withd').innerHTML += "<br />You have exceeded the maximum allowable inputs.";
document.form.add.disabled=true;
}
}

function removeLastField() {
    var fieldsArea = document.getElementById('withd'),
        lastChild = fieldsArea.lastChild;
    if(lastChild) {
        fieldsArea.removeChild(lastChild);
        fields -= 1;
    }
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
                <div class=" col-md-10 col-sm-10 col-md-offset-1">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet box green calendar">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-reorder"></i>Transfer Processing Fees

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
                                    if(isset($_REQUEST['process'])){
                                        $chargeGl=$_POST['charge_acc'];
                                        for($i=0; $i< count($_REQUEST['amount']);$i++){
                                            
                                            $actfrom=$_REQUEST['acctfrom'][$i];
                                            $glacctto=$_REQUEST['acctto'][$i];
                                            $amount=$_REQUEST['amount'][$i];
                                            
                                      $users -> insert_transferFee($actfrom,$glacctto,$amount,$chargeGl);
                                        }
                                    }
                                    transfeeProcssingFees();
                                    
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
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/custom/components-dropdowns.js"></script>
<script src="assets/scripts/custom/components-pickers.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
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
        });   
    </script>

</body></html>