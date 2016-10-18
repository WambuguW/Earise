<?php
include_once './classes.php';
$newuser = new User();
$users = new Users();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Checkoff System</title>
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
            <div class="noprint">
                <nav class="art-nav clearfix">

                    <?php headermenu(); ?>

                </nav>
            </div>


            <div class="art-sheet clearfix">
                <div class="art-layout-wrapper clearfix">
                    <div class="art-content-layout">
                        <div class="art-content-layout-row">

                            <!-- <div class="art-layout-cell art-sidebar1 clearfix"><div class="art-vmenublock clearfix">
                                    <div class="noprint">                                  
                            <?php
                            username();

                            sidemenu($page, $childpage);

                         
                                ?></div>
                                        </div>
                                    </div>
                                -->

                                <div class="simpleTabs">
                                    <ul class="simpleTabsNavigation">
                                        <li></li>
                                    </ul>

                                    <div class="simpleTabsContent">

                                        <div class="art-layout-cell art-content clearfix">
                                            <?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>
                                            <article class="art-post art-article">
                                                <h2 class="art-postheader"><span class="art-postheadericon">Check Off System Set-up</span></h2>

                                                <!------form start----->

                                                <?php
                                                //standingorders();
                                                if (isset($_POST['finito'])) {

                                                    //$data[] = array(check => $_REQUEST['check']);
                                                    //foreach ($data as $value) {
                                                    //$perm = ($value['check']);
                                                    //foreach ($_REQUEST['check'] as $perm) {
                                                    //}
                                                    for ($i = 0; $i < count($_POST['check']); $i++) {
                                                        $perm = ($_POST['check'][$i]);
                                                        $amount = ($_POST['amount'][$i]);
                                                        $amount1 = ($_POST['amount1'][$i]);
                                                        $amount2 = ($_POST['amount2'][$i]);
                                                        $amount3 = ($_POST['amount3'][$i]);
                                                        $amount4 = ($_POST['amount4'][$i]);
                                                        $amount5 = ($_POST['amount5'][$i]);
                                                        $amount6 = ($_POST['amount6'][$i]);
                                                        $amount7 = ($_POST['amount7'][$i]);
                                                        $amount8 = ($_POST['amount8'][$i]);
                                                        $amount9 = ($_POST['amount9'][$i]);
                                                        $amount10 = ($_POST['amount10'][$i]);
                                                        $amount11 = ($_POST['amount11'][$i]);

                                                        $newuser->checkoffull($_SESSION['users'], $_POST['date'], $amount, $amount1, $amount2, $amount3, $amount4, $amount5, $amount6, $amount7, $amount8, $amount9, $amount10, $amount11, $_POST['tid'], $perm);
                                                    }
                                                }


                                                //   if (isset($_REQUEST['loan'])) {
                                                //   $lloan = $_REQUEST['loant'];
                                                //   $_SESSION['loan'] = $_REQUEST['loant'];
                                                ?>

                                                <form action="" method="POST" autocomplete="off" id="frm1">
                                                    <div class = "art-content-layout">
                                                        <div class = "art-content-layout-row">
                                                            <div class = "art-layout-cell" style = "width: 100%" >

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class = "art-content-layout">
                                                        <div class = "art-content-layout-row">
                                                            <div class = "art-layout-cella" style = "width: 100%">
                                                                <div class="two">
                                                                    <select name="date">
                                                                        <option>January <?php echo date('Y'); ?></option>
                                                                        <option>February <?php echo date('Y'); ?></option>
                                                                        <option>March <?php echo date('Y'); ?></option>
                                                                        <option>April <?php echo date('Y'); ?></option>
                                                                        <option>May <?php echo date('Y'); ?></option>
                                                                        <option>June <?php echo date('Y'); ?></option>
                                                                        <option>July <?php echo date('Y'); ?></option>
                                                                        <option>August <?php echo date('Y'); ?></option>
                                                                        <option>September <?php echo date('Y'); ?></option>
                                                                        <option>October <?php echo date('Y'); ?></option>
                                                                        <option>November <?php echo date('Y'); ?></option>
                                                                        <option>December <?php echo date('Y'); ?></option>
                                                                    </select></div>
                                                                <br><br><br>
                                                                Check All<input type = "checkbox" name = "che" value = "check all" title = "Select Member" onclick="checkedAll(frm1);"/>

                                                                <table class="tables">
                                                                    <tr>
                                                                        <th>Member No</th>
                                                                        <th>Name</th>
                                                                        <th>Shares</th>
                                                                        <th>Deposits</th>
                                                                        <th>Xmas</th>
                                                                        <th>Entrance Fee</th>
                                                                        <th>Normal Loan</th>
                                                                        <th>Refinancing Loan</th>
                                                                        <th>Emergency Loan</th>
                                                                        <th>School Fees Loan</th>
                                                                        <th>School Fees Topup Loan</th>
                                                                        <th>Domestic Loan</th>
                                                                        <th>Rescue/Mega Rider Loan</th>
                                                                        <th>Funeral Rider Loan</th>
                                                                    </tr>
    <?php
    $qyy = mysql_query('select * from newmember where status="' . base64_encode("active") . '"') or die(mysql_error());
    while ($roiw = mysql_fetch_array($qyy)) {
        ?>
                                                                        <tr>
        <?php
        echo '<tr><td><input type = "checkbox" class="checkall" name = "check[]" value = "' . base64_decode($roiw['membernumber']) . '" title = "Select Member"/>
             ' . base64_decode($roiw['membernumber']) . '</td>';
        echo '<td>' . getMembername($roiw['membernumber']) . '</td>';
        echo '<td><div class="two"><input type="number" name="amount[]" value="4000" title="Select amount of choice"></div></td>';
        echo '<td><div class="two"><input type="number" name="amount1[]" min="1000" value="1000" title="Select amount of choice"></div></td>';
        echo '<td><div class="two"><input type="number" name="amount2[]" value="1000" title="Select amount of choice"></div></td>';
        echo '<td><div class="two"><input type="number" name="amount3[]" value="1000" title="Select amount of choice"></div></td>';
        echo '<td><div class="two"><input type="text" name="amount4[]" title="Select amount of choice" value="' . number_format(loan1a(base64_decode($roiw['membernumber'])), 2) . '"></div></td>';
        echo '<td><div class="two"><input type="text" name="amount5[]" title="Select amount of choice" value="' . number_format(loan2a(base64_decode($roiw['membernumber'])), 2) . '"></div></td>';
        echo '<td><div class="two"><input type="text" name="amount6[]" title="Select amount of choice" value="' . number_format(loan3a(base64_decode($roiw['membernumber'])), 2) . '"></div></td>';
        echo '<td><div class="two"><input type="text" name="amount7[]" title="Select amount of choice" value="' . number_format(loan4a(base64_decode($roiw['membernumber'])), 2) . '"></div></td>';
        echo '<td><div class="two"><input type="text" name="amount8[]" title="Select amount of choice" value="' . number_format(loan5a(base64_decode($roiw['membernumber'])), 2) . '"></div></td>';
        echo '<td><div class="two"><input type="text" name="amount9[]" title="Select amount of choice" value="' . number_format(loan6a(base64_decode($roiw['membernumber'])), 2) . '"></div></td>';
        echo '<td><div class="two"><input type="text" name="amount10[]" title="Select amount of choice" value="' . number_format(loan7a(base64_decode($roiw['membernumber'])), 2) . '"></div></td>';
        echo '<td><div class="two"><input type="text" name="amount11[]" title="Select amount of choice" value="' . number_format(loan7a(base64_decode($roiw['membernumber'])), 2) . '"></div></td>';
    }
    ?>
                                                                    </tr>                                                                        
                                                                </table>     


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "juma">
    <?php
    echo '<input type = "text" name ="tid" value = "' . gmdate("dmyhisG") . '" hidden required/>';
    ?>

                                                    </div>
                                                    <div class = "art-content-layout">
                                                        <div class = "art-content-layout-row">
                                                            <div class = "art-layout-cell" style = "width: 100%" >
                                                                <div class = "four">
                                                                    <button name="finito">Complete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
    <?php
    // }
    // if (!isset($_REQUEST['loan'])) {
    //     loancc();
    // }
    ?>

                                    </div>

                                </div>

    <?php
//expdaily();

?>
                            <!---from end--->
                            <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
                            </article></div>
                    </div>
                </div>
            </div>
            <div class="noprint"><?php footer(); ?></div>

        </div>
    </div>
    <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>

<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<!-- END PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/app.js"></script>

<!-- END JAVASCRIPTS -->
<script src="assets/plugins/bootstrap/js/bootstrap2-typeahead.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="assets/scripts/custom/components-dropdowns.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           App.init();
           ComponentsDropdowns.init();
        });   
    </script>

<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/scripts/custom/components-pickers.js"></script>

<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           App.init();
           ComponentsPickers.init();
        });   
    </script>
<script src="assets/scripts/custom/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {
App.init();
TableAdvanced.init();
});
</script>
</body></html>