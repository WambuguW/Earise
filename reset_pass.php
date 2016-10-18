<?php
include_once './classes.php';

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Esacco microfinance system</title>
        <!--<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">-->
        <meta name="HandheldFriendly" content="True"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <meta name="HandheldFriendly" content="true" />
        <meta name="MobileOptimized" content="true" />

        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="stylesheet" href="style.css" media="screen">
        <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
        <link rel="stylesheet" href="style.responsive.css" media="all">
 <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <!--<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css"/>-->
        <!--<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2-metronic.css"/>-->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/css/pages/login.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="script.responsive.js"></script>
        <meta name="description" content="Ryanada limited Esacco">
        <meta name="keywords" content="esacco">
       

    </head>
    <script type="text/javascript">
            function forceLower(strInput)
            {
                strInput.value = strInput.value.toLowerCase();
            }
        </script>
    <body class="page-header-fixed page-full-width" style="color:#272822; font-family:verdana; font-size:13px;">

        <div id="art-main">
            <header class="art-header clearfix" style="height: 70px;">

                <?php headerinfo(); ?>

            </header>
            <div class="art-sheet clearfix">
                <div class="art-layout-wrapper clearfix">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            <!--<div class="art-layout-cell art-sidebar1 clearfix">
                                <div class="art-vmenublock clearfix">
                                    <div class="art-vmenublockcontent">
                                        <ul class="art-vmenu">
                                            <li>
                                                <a href="" class="active">User Logged in as</a>
                                                <ul class="active">
                                                    <li>
                                                        <a href=""><img src="images/user.png" class="icons"/><?php echo 'Hello Admin'; ?></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>-->
                            <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                                    <!------form start----->
                                    <div id="backgroundimg">
                                        '
<div class = "art-postcontent art-postcontent-0 clearfix"><div class = "loginform">
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >

    <form action = "pass_reset.php" method = "post" autocomplete = "off">
     <div class="alert alert-success">
                        <strong>Enter your email to reset password</strong></div>   
<div class = "five">
<label><strong>Your Email</strong><img src = "images/App-login-manager-icon.png" class = "icons"/></label>
<input  type = "email" style="width:250px; height:40px;" title="Enter your Email Address" placeholder="Enter your Email Address" onkeyup="return forceLower(this);" id="fname" name="email" required/>

</div>
</div>
</div>
</div>
<div class = "art-content-layout">
<div class = "art-content-layout-row">
<div class = "art-layout-cell" style = "width: 100%" >
<div class = "two">
<br /><br /><button id="submit" name="submit" >Submit</button>
</form>

</div>

</div>
</div>
</div>
</div>
</div>
                                    </div>
                                    <!---from end--->
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="art-footer clearfix">
                    <p>Copyright © <?php echo date("Y"); ?> ,<?php echo compname() ?>. All Rights Reserved.<br>
                        <span id="art-footnote-links"><a href="http://www.ryanada.com" target="_blank">Ryanada limited</a> Product</span>
                        <br></p>
                </footer>

            </div>
        </div>


    </body></html>