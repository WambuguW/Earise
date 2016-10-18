<?php
include_once './classes.php';
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
        <title>Add Bank Officer</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!-- -->
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2-metronic.css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
        <link href="assets/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
        <link href="assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed">

        <div class="tab-content">
            <div class="tab-pane active" id="tab_0">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-reorder"></i>Add Bank Officer

                        </div>

                    </div>
                    <div class="portlet-body form">


                        <!--*mc edited from here-->   




                        <!-- BEGIN FORM-->

                        <?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>

                        <form action="" method="post" class="form-horizontal">
                            <div class="form-body">
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Banking Officer</label>
                                    <div class="col-md-4">
                                        <input type="text" id="officer" name="officer" class="form-control" required placeholder="Transfer Officer">

                                    </div>
                                </div>




                                <div class="form-actions fluid">
                                    <div class="col-md-offset-2 col-md-4">
                                        <button type="submit" id="submit56" name="submit" class="btn green">Submit</button>

                                    </div>
                                </div>
                        </form>
                        <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
                        <!-- END FORM-->
                        <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
                        <script>
                            $(document).ready(function()
                            {
                                $("#submit56").click(function() {

                                    var officer = $("#officer").val();
                                   

                                    var dataStr = '&officer=' + officer ;

                                    if (officer === '' )
                                    {
                                        alert("fill in all the details");
                                    }
                                    else
                                    {
                                        $.ajax(
                                                {
                                                    type: "POST", url: "addbankofficer.php", data: dataStr,
                                                    cache: false,
                                                    success: function(result) {
                                                        alert("Bank Officer Sucessfully Added");
                                                        location.reload();
                                                    }
                                                });
                                    }
                                    return false;
                                });
                            });
                        </script>

                        </body>
                        <!-- END BODY -->
                        </html>