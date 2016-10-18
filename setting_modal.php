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
        <title>Add Currency conversion</title>
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
                            <i class="fa fa-reorder"></i>System Settings

                        </div>

                    </div>
                    <div class="portlet-body form">


                        <!--*William edited from here-->   




                        <!-- BEGIN FORM-->



                        <form action="" method="post" class="form-horizontal">
                            <div class="form-body">
                                <div class="form-group">

                                    <div class="col-md-4">
                                        <input type="hidden" id="nodays" name="nodays" class="form-control" placeholder="Number of Days Allowed for Edit">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label ">AED to KSH Exchange Rate</label>
                                    <div class="col-md-4">
                                        <input type="text" id="aed" name="aed" value="<?php echo getaed() ?>" class="form-control" placeholder="AED to KSH Exchange Rate">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">USD to KSH Exchange Rate</label>
                                    <div class="col-md-4">
                                        <input type="text" id="usd" name="usd" value="<?php echo getusd() ?>" class="form-control" placeholder="USD to KSH Exchange Rate">

                                    </div>
                                </div>




                                <div class="form-actions fluid">
                                    <div class="col-md-offset-2 col-md-4">
                                        <button type="submit" id="submit22" name="submit" class="btn green">Update</button>

                                    </div>
                                </div>
                        </form>
                        <!-- END FORM-->
                        <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
                        <script>
                            $(document).ready(function()
                            {
                                $("#submit22").click(function() {

                                    var aed = $("#aed").val();
                                    var usd = $("#usd").val();



                                    var dataStr = '&aed=' + aed + '&usd=' + usd;

                                    if (aed === '' || usd === '')
                                    {
                                        alert("fill in all the details");
                                    }
                                    else
                                    {
                                        $.ajax(
                                                {
                                                    type: "POST", url: "addsettingmodal.php", data: dataStr,
                                                    cache: false,
                                                    success: function(result) {
                                                        alert("sucess");
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