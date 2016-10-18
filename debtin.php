<?php
include_once './classes.php';
$newuser = new User();
$users = new Users();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Debtors Accounts</title>
        <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

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
            <header class="art-header clearfix">


                <?php headerinfo(); ?>



            </header>
            <nav class="art-nav clearfix">
                <?php headermenu($page); ?>  
            </nav>
            <div class="art-sheet clearfix">
                <div class="art-layout-wrapper clearfix">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">
                            <div class="art-layout-cell art-sidebar1 clearfix"><div class="art-vmenublock clearfix">
                                    <!------sidemenu------->
                                    <?php
                                    username();
                                    sidemenu();
                                    ?>
                                </div></div>
                            <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                                    <h2 class="art-postheader"><span class="art-postheadericon">Debtors Accounts</span></h2>
                                    <?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>
                                    <!---start form---->
                                    <?php
                                    if (!$_SESSION['session']) {
                                        $_SESSION['session'] = session_id();
                                    }
                                    if (isset($_REQUEST['submit'])) {
                                        $newuser->debtorsadd($_SESSION['users'], $_REQUEST['tid'], $_REQUEST['tname'], $_REQUEST['amount'], $_REQUEST['ptype'], 'NULL', 'NULL', $_REQUEST['payee'], $_REQUEST['chequeno'], $_REQUEST['comments'], $_REQUEST['date'], $_REQUEST['submit'], $_SESSION['session']);
                                    }
                                    if (isset($_REQUEST['edit']) || isset($_REQUEST['iid']) || isset($_REQUEST['ice']) || isset($_REQUEST['idel'])) {

                                        if (isset($_REQUEST['iid'])) {

                                            $id = $_REQUEST['iid'];

                                            $sql = mysql_query('SELECT * FROM paymentin WHERE primarykey="' . $id . '"') or die(mysql_error());

                                            $rows = mysql_fetch_array($sql);

                                            editdebtors($_SESSION['users'], $rows['primarykey'], base64_decode($rows['paidby']), base64_decode($rows['payeeid']), base64_decode($rows['approvedby']), base64_decode($rows['comments']), base64_decode($rows['amount']), base64_decode($rows['date']), base64_decode($rows['session']));
                                        }
                                        if (isset($_REQUEST['ice'])) {
                                            incomeupdate($_SESSION['users'], $_REQUEST['id'], $_REQUEST['payee'], $_REQUEST['chequeno'], 'NULL', $_REQUEST['comments'], $_REQUEST['tname'], $_REQUEST['ptype'], 'NULL', $_REQUEST['amount'], $_REQUEST['date'], $_REQUEST['tid'], $_REQUEST['session']);
                                        }

                                        if (isset($_REQUEST['idel'])) {
                                            include ('del.php');
                                        }

                                        debtoredit();
                                    } else {

                                        debtin();
                                    }
                                    ?>
                                    <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
                                    <!---end form---->
                                </article></div>
                        </div>
                    </div>
                </div><?php footer(); ?>
            </div>
        </div>


    </body></html>