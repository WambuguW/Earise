<?php
include './classes.php';
$lect = new User();
$users = new Users();

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Members Reports</title>
        <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="stylesheet" href="style.css" media="screen">
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
        <!--<link rel="stylesheet" href="style.responsive.css" media="all">-->

        <script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="script.responsive.js"></script>
        <meta name="description" content="Ryanada limited Esacco">
        <meta name="keywords" content="esacco">
        <!-- SimpleTabs -->
        <script type="text/javascript" src="js/simpletabs_1.3.js"></script>
        <style type="text/css" media="screen">
            @import "css/simpletabs.css";
        </style>

        <script>
                    function printResults() {
                    var content = document.getElementById('mt').innerHTML;
                            var pwin = window.open('', 'print_content', 'width=200,height=200');
                            pwin.document.open();
                            pwin.document.write('<html><link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"><body style="font-family:Arial, Helvetica, sans-serif; font-size:8px; text-align:center; margin-right:5%; margin-left:5%; width:90%; background-color:#FFF;" onload="window.print()">' + content + '</body></html>');
                            pwin.document.close();
                            setTimeout(function() {
                    pwin.close();
                            }, 10000);
                    return true;
                    }
        </script>
        <script type="text/javascript">
                            var tableToExcel = (function() {
            var uri = 'data:application/vnd.ms-excel;base64,'
                    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body class="page-header-fixed page-full-width" style="color:#272822; font-family:verdana; font-size:13px;"><table>{table}</table></body></html>'
                                        , base64 = function(s) {
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
            <div class="noprint">
                <header class="art-header clearfix">
                    <?php headerinfo(); ?>
                </header>
                <nav class="art-nav clearfix">
                    <?php headermenu(); ?> 
                </nav>
            </div>
            <div class="art-sheet clearfix">
                <div class="art-layout-wrapper clearfix">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            <div class="art-layout-cell art-sidebar1 clearfix"><div class="art-vmenublock clearfix">
                                    <div class="noprint">
                                        <?php
                                        username();

                                        sidemenu($page, $childpage);
                                        ?>
                                    </div>

                                </div></div>
                            <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                                    <h2 class="art-postheader"><span class="art-postheadericon">Members Reports</span></h2
                                    <?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>
                                    <div class="art-postcontent art-postcontent-0 clearfix">
                                        <div class="art-content-layout">
                                            <div class="art-content-layout-row">
                                                <div class="art-layout-cell" style="width: 100%" >
                                                    
                                                        <div class="simpleTabs">
                                                            <ul class="simpleTabsNavigation">
                                                                <li><a href="#">Active Members</a></li>
                                                                <li><a href="viewmembers.php">All Members</a></li>
                                                                <li><a href="inactivemembers.php">Inactive Members</a></li>
                                                            </ul>
                                                            <div class="simpleTabsContent">
                                                                <?php
                                                                viewactivemembers();
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                   
                                                    ?>
                                                    <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
                                                </div>
                                            </div>
                                        </div>
                                </article></div>
                        </div>
                    </div>
                </div> <div class="noprint"><?php footer(); ?></div>

            </div>
        </div>
            
   <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->         
<script src="assets/scripts/core/app.js"></script>
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
    </body></html>