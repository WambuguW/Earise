<?php
include_once './classes.php';
$newuser = new User();
$users = new Users();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Standing Orders</title>
        <!--<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">-->
        <meta name="HandheldFriendly" content="True"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <meta name="HandheldFriendly" content="true" />
        <meta name="MobileOptimized" content="true" />

        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="stylesheet" href="style.css" media="screen">
        <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
        <link rel="stylesheet" href="style.responsive.css" media="all">

        <style type="text/css">
            .container { border:2px solid #ccc; width:300px; height: 10%; overflow-y: scroll; }
        </style>

        <script src="jquery.js"></script>
        <script src="script.js"></script>
        <script src="script.responsive.js"></script>
        <meta name="description" content="Ryanada limited Esacco">
        <meta name="keywords" content="esacco">
        <script type="text/javascript">
            function showUser(str)
            {

                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "./search/contributionsearch.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>

        <script type="text/javascript">
            function printpage()
            {
                window.print()
            }
        </script>
        <!--
        <script>
        function printDiv()
        {
           var divToPrint=document.getEelementById('juma');
          newWin= window.open("");
          newWin.document.write(divToPrint.outerHTML);
          newWin.print();
          newWin.close();
        }
        </script>
                
        -->

        <style type="text/css">
            <!--

            @media print
            {
                .noprint {display:none;}
            }

            @media screen
            {

            }

            -->
        </style> 

        <script type="text/javascript">
            checked = false;
            function checkedAll(frm1) {
                var aa = document.getElementById('frm1');
                if (checked == false)
                {
                    checked = true
                }
                else
                {
                    checked = false
                }
                for (var i = 0; i < aa.elements.length; i++)
                {
                    aa.elements[i].checked = checked;
                }
            }
        </script>  
        <!-- SimpleTabs -->
        <script type="text/javascript" src="js/simpletabs_1.3.js"></script>
        <style type="text/css" media="screen">
            @import "css/simpletabs.css";
        </style>

    </head>
    <body>
        <div id="art-main">
            <header class="art-header clearfix">
                <?php headerinfo(); ?>
            </header>
            <div class="noprint">
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

                                        
                                            ?></div>
                                    </div>
                                </div>
                                <div class="simpleTabs">
                                    <ul class="simpleTabsNavigation">
                                        <li><a href="#">Standing Order - Benevolent Fee</a></li>
                                       <li><a href="standingorder.php">Standing Order - Loans</a></li>
                                        <li><a href="standcontrib.php">Standing Order - Member Deposits</a></li>
                                        <li><a href="psvorder.php">Standing Order - Member Savings</a></li>

                                    </ul>


                                    <div class="simpleTabsContent">

                                        <div class="art-layout-cell art-content clearfix">
                                            <article class="art-post art-article">
                                                <h2 class="art-postheader"><span class="art-postheadericon">Standing Orders  Benevolent Fee</span></h2>

                                                <!------form start----->

                                                <?php
                                                //standingorders();

                                                if (isset($_REQUEST['finish'])) {

                                                    foreach ($_REQUEST['check'] as $perm) {
                                                        $newuser->orderstands($_SESSION['users'], $_REQUEST['acc'], $_REQUEST['unt'], $_REQUEST['amount'], $_REQUEST['tid'], $perm);
                                                    }
                                                } else {
                                                    ?>

                                                    <form action="" method="get" autocomplete="off" id="frm1">
                                                        <div class = "art-content-layout">
                                                            <div class = "art-content-layout-row">
                                                                <div class = "art-layout-cell" style = "width: 100%" >
                                                                    <div class = "two">
                                                                        <label>From Account</label>
                                                                        <select name="acc" title= "Select user group" required>

                                                                            <?php
                                                                            $qry = mysql_query('select * from accounts where acname="' . base64_encode('member deposits') . '"') or die(mysql_error());
                                                                            while ($row = mysql_fetch_array($qry)) {
                                                                                echo '<option>' . base64_decode($row['acname']) . '</option>';
                                                                            }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                    <div class = "two">
                                                                        <label>To Account</label>
                                                                        <select name="unt" title= "Select user group" required>

                                                                            <?php
                                                                            $qry = mysql_query('select * from accounts where acname="' . base64_encode('benevolent fee') . '"') or die(mysql_error());
                                                                            while ($row = mysql_fetch_array($qry)) {
                                                                                echo '<option>' . base64_decode($row['acname']) . '</option>';
                                                                            }
                                                                            ?>

                                                                        </select>
                                                                    </div>

                                                                    <div class = "two">
                                                                        <label>Amount (Kshs.)</label>
                                                                        <input type="number" name="amount" required title="Select amount of choice" value="1000">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        Check All<input type = "checkbox" name = "che" value = "check all" title = "Select Member" onclick="checkedAll(frm1);"/>

                                                        <div class = "art-content-layout">
                                                            <div class = "art-content-layout-row">
                                                                <div class = "art-layout-cella" style = "width: 100%">

                                                                    <?php
                                                                    $qyy = mysql_query('select * from newmember where status="' . base64_encode("active") . '"') or die(mysql_error());
                                                                    while ($roiw = mysql_fetch_array($qyy)) {
                                                                        echo '<div class="four"><ul><label>' . base64_decode($roiw['firstname']) . ' ' . base64_decode($roiw['middlename']) . ' ' . base64_decode($roiw['lastname']) . '</label>
            <input type = "checkbox" class="checkall" name = "check[]" value = "' . base64_decode($roiw['membernumber']) . '" title = "Select Member"/>
            </ul></div>';
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class = "two">
                                                            <?php
                                                            echo '<input type = "text" name = "tid" value = "' . gmdate("dmyhisG") . '" hidden required/>';
                                                            ?>

                                                        </div>
                                                        <div class = "art-content-layout">
                                                            <div class = "art-content-layout-row">
                                                                <div class = "art-layout-cell" style = "width: 100%" >
                                                                    <div class = "four">
                                                                        <button name="finish">Finish</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>


                                </div>

                           
                            <!---from end--->
                            </article></div>
                    </div>
                </div>
            </div>
            <div class="noprint"><?php footer(); ?></div>

        </div>
    </div>
</body></html>