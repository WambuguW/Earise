<?php
include_once './classes.php';
$users = new Users();
$users->checkuserlogin($_SESSION['users']);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Account Balance</title>
        <!--<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">-->
        <meta name="HandheldFriendly" content="True"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <meta name="HandheldFriendly" content="true" />
        <meta name="MobileOptimized" content="true" />

        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="stylesheet" href="style.css" media="screen">
        <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
        <link rel="stylesheet" href="style.responsive.css" media="all">


        <script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="script.responsive.js"></script>
        <meta name="description" content="Ryanada limited Esacco">
        <meta name="keywords" content="esacco">


        <script type="text/javascript">
                            var tableToExcel = (function() {
                            var uri = 'data:application/vnd.ms-excel;base64,'
                                    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body class="page-header-fixed page-full-width" style="color:#272822; font-family:verdana; font-size:13px;"><table>{table}</table></body></html>'
                                                                , base64 =function(s) {
                                                                                 return window.btoa(unescape(encodeURIComponent(s)))
                                                                 }
                                                                 , format = function(s, c) {
                                                                                 return s.replace(/{(\w+)}/g, function(m, p) {
                                                                                                 return c[p];
                                                                                 })
                                                                 }
                                                                 return function(table, name) {
                                                                                 if (!table.nodeType)
                                                                                                 table = document.getElementById(table)
                                                                                 var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                                                                                 window.location.href = uri + base64(format(template, ctx))
                                                                 }
                                                 })()
        </script>

    </head>
    <body class="page-header-fixed page-full-width" style="color:#272822; font-family:verdana; font-size:13px;">
        <div id="art-main">
            <header class="art-header clearfix">

                <?php headerinfo(); ?>

            </header>
            <nav class="art-nav clearfix">
                <?php headermenu(); ?>  
            </nav>
            <div class="art-sheet clearfix">
                <div class="art-layout-wrapper clearfix">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            <div class="art-layout-cell art-sidebar1 clearfix"><div class="art-vmenublock clearfix">
                                    <?php
                                    username();
                                    sidemenu();
                                    ?>
                                </div></div>
                            <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                                    <h2 class="art-postheader"><span class="art-postheadericon">Account Balance</span></h2>
                                    <?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>
                                    <form action="test2.php" method="get">
                                        <div class="two">
                                            <label>Member No.</label>
                                            <input type="text" name="mno" required placeholder="Enter Member Number" title="Enter Member Number"/>
                                        </div>

                                        <div class="two">
                                            <label>Member Name</label>
                                            <input type="text" name="mname" readonly required placeholder="Enter Member Name" value="" title="Enter Member Name"/>
                                        </div>                                                       



                                        <button name="balla">Check Balance</button> 
                                    </form>

                                    <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
                                </article></div>
                        </div>
                    </div>
                </div><?php footer(); ?>

            </div>
        </div>


    </body></html>