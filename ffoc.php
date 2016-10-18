<?php
include_once './classes.php';
$newuser = new User();
$users = new Users();
$permission = "contstats";
$page = 'reports';
$childpage = 'chekoff';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8"/>
        <title>Esacco | Microfinance System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
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


                                    <!-- BEGIN ALERTS PORTLET-->
                                    <div class="row ">
                                        <div class="col-md-offset-1 col-md-10 col-sm-10">
                                            <!-- BEGIN PORTLET-->
                                            <div class="portlet box green calendar">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="icon-reorder"></i> Check Off System Set-up

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

                                                <?php
                                                //standingorders();
                                                if (isset($_POST['finito'])) {

                                                    //$data[] = array(check => $_REQUEST['check']);
                                                    //foreach ($data as $value) {
                                                    //$perm = ($value['check']);
                                                    //foreach ($_REQUEST['check'] as $perm) {
                                                    //}
                                                    for ($i = 0; $i < count($_POST['mno']); $i++) {
                                                        $perm = ($_POST['mno'][$i]);
                                                        $amount = ($_POST['amount'][$i]);
                                                        $amount1 = ($_POST['amount1'][$i]);
                                                        $amount2 = ($_POST['amount2'][$i]);
                                                        $amount3 = ($_POST['amount3'][$i]);
                                                        $amount4 = ($_POST['amount4'][$i]);
                                                        $amount5 = ($_POST['amount5'][$i]);

                                                        $newuser->checkoff($_SESSION['users'], $perm, $_POST['date'], $amount, $amount1, $amount2, $amount3, $amount4, $amount5);
                                                    }
                                                }


                                                //   if (isset($_REQUEST['loan'])) {
                                                //   $lloan = $_REQUEST['loant'];
                                                //   $_SESSION['loan'] = $_REQUEST['loant'];

                                                ?>
                                                            <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
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
                                                                <table class="table table-striped table-bordered table-hover table-full-width">
                                                                    <thead>
                                                                    <th>Member Number</th>
                                                                    <th>Member Name</th>
                                                                    <th>Compulsory Savings</th>
                                                                    <th>Compulsory Shares</th>
                                                                    <th>Member Shares</th>
                                                                    <th>Entrance Fees</th>
                                                                    <th>Principle</th>
                                                                    <th>Interest</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                                                                        $date = $_REQUEST['year'];

                                                                        $qyy = mysql_query('select * from checkoff where date="' . base64_encode($date) . '"') or die(mysql_error());
                                                                        while ($roiw = mysql_fetch_array($qyy)) {
                                                  echo '<tr><td><div class="two"><label><center>' . (base64_decode($roiw['mno'])) . '</center></label></div></td>
                                                            <td><div class="four"><label>' . (getMembername($roiw['mno'])) . '</label></div></td>
                                                            <input hidden type="hidden" value="' . ($roiw['mno']) . '" name="mno">
                                                            <input hidden type="hidden" value="' . ($date) . '" name="date">
                                                            <td><div class="ouma"><input type="number" name="amount[]" min="1000" value="1000" title="Select amount of choice"></div></td>
                                                            <td><div class="ouma"><input type="number" name="amount1[]" value="1000" title="Select amount of choice"></div></td>
                                                            <td><div class="ouma"><input type="number" name="amount2[]" value="500" title="Select amount of choice"></div></td>
                                                            <td><div class="ouma"><input type="number" name="amount3[]" value="500" title="Select amount of choice"></div></td>
                                                            <td><div class="ouma"><input readonly type="text" value="' . round(loanprireduced($roiw['mno'])) . '.00" name="amount4[]" title="Select amount of choice"></div></td>
                                                            <td><div class="ouma"><input readonly type="text" value="' . round(loanreduced($roiw['mno'])) . '.00" name="amount5[]"  title="Select amount of choice"></div></div></td>';
                                                                        }
                                                                        ?>
                                                                    </tbody></table>     


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "juma">
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

    </div>
                                                                

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                            </div>

                            </div>
                            <!--END PORTLET-->

                            </div>
                            </div>
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
                            <script src="assets/scripts/custom/table-advanced.js"></script>
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
                          
                            </body>
                            <!-- END BODY -->
                            </html>