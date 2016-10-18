<?php
include_once './classes.php';
$newuser = new User();
$users = new Users();

/* echo "<script type=\"text/javascript\">
  window.open('http://sms.truehost.org/sms/check_login.php?user=willymwaid92@gmail.com&token=".md5('java')."', '_blank')
  </script>"; */
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
        <title>Esacco | Microfinance System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->

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
        <!-- END THEME STYLES -->
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
        <script src="autosaveform.js"></script>
        <script>

                    var formsave1 = new autosaveform({
                    formid: 'form1',
                            pause: 1000 //<--no comma following last option!
                    });</script>
        <script type ="text/javascript" language ="javascript">
                    function Print(elementId)
                    {
                    var printContent = document.getElementById(elementId);
                            var windowUrl = 'about:blank';
                            var uniqueName = new Date();
                            var windowName = 'Print' + uniqueName.getTime();
                            var printWindow = window.open(windowUrl, windowName, 'left=0,top=0,width=0,height=0');
                            printWindow.document.write(printContent.innerHTML);
                            printWindow.document.close();
                            printWindow.focus();
                            printWindow.print();
                            printWindow.close();
                    }
        </script>
        <script type ="text/javascript" language ="javascript">
            function Print(elementId)
            {
            var printContent = document.getElementById(elementId);
                    var windowUrl = 'about:blank';
                    var uniqueName = new Date();
                    var windowName = 'Print' + uniqueName.getTime();
                    var printWindow = window.open(windowUrl, windowName, 'left=0,top=0,width=0,height=0');
                    printWindow.document.write(printContent.innerHTML);
                    printWindow.document.close();
                    printWindow.focus();
                    printWindow.print();
                    printWindow.close();
            }
        </script>
        
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
            xmlhttp.open("GET", "./search/namesearch.php?q=" + str, true);
                    xmlhttp.send();
            }
            var counter = 1;
                    function addInput(divName) {
                    var newdiv = document.createElement('div');
                            newdiv.innerHTML = "<?php
$qry = mysql_query("select * from accounts where actype='" . base64_encode('Capital') . "' or  actype='" . base64_encode('Loan Repayment') . "' and status='" . base64_encode('Active') . "'") or die(mysql_error());
echo "<div class='two'><label>Account Name</label><select name='tname[]' required title='Payment type'><option></option>";
while ($row = mysql_fetch_array($qry)) {
    echo "<option>" . base64_decode($row["acname"]) . "</option>";
}echo "</select></div>";
?><div class='two'><label>Payment Type</label><select name='ptype[]' required title='Payment type'><option></option><option>Select</option><option>Cash</option><option>Mobile Money</option><option>Cheque</option></div><div class='two'><label>Payment Type</label><select name='ptype' required title='Payment type'><option></option><option>Select</option><option>Cash</option><option>Mobile Money</option><option>Bank Deposit</option><option>Cheque</option></select></div><div class='two'><label>Amount</label><input type='number' name='amount[]' required placeholder='Enter Amount' title='Enter Amount' pattern='[0-9]{1,}'/>";
                            document.getElementById(divName).appendChild(newdiv);
                            counter++;
                    }
        </script>
        <script language="javascript" type="text/javascript">
            function amultiply() {

            a = Number(document.abc.one.value);
                    b = Number(document.abc.two.value);
                    c = a * b;
                    document.abc.res.value = c;
                    if (a != 0) // some logic to determine if it is ok to go
            {
            document.getElementById("xx").disabled = false;
            }
            else // in case it was enabled and the user changed their mind
            {
            document.getElementById("xx").disabled = true;
            }




            }
        </script>




        <script type="text/javascript">             var tableToExcel = (function() {
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
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-full-width" style="color:#272822; font-family:verdana; font-size:13px;" onload="showMenu">
        <!-- BEGIN HEADER -->
        <div class="col-md-12" style="background-color: #FFFFFF;"> <div class=" col-md-9"><?php headerinfo(); ?>  </div><div class=" col-md-3"><?php username(); ?></div></div>
        <div class="header navbar navbar-nav mega-menu col-md-8">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner" >
                <!-- BEGIN LOGO -->

                <!-- END LOGO -->
                <!-- BEGIN HORIZANTAL MENU -->
                <div id="theMenu"></div>
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
                        <div class=" col-md-8 col-md-offset-2 ">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box green calendar">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-reorder"></i> Contribution

                                    </div>
                                    <div class="tools">

                                        <a href="javascript:;" class="reload"></a>

                                    </div>
                                </div>
                                <div class="portlet-body dark_green" style="color:#000000">
                                    <div class="well dark_green">
                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                        <div class="art-layout-cell art-content clearfix">
                                            <!--Chech user permission-->
                                            <?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>
                                            
                                            <!------form start----->

                                            <?php
                                            if (isset($_REQUEST['importcsv'])) {
                                                if ($_FILES[csv][size] > 0) {
                                                    
                                                    /* ------------------Get the csv file and its details---------------------- */

                                                    $file_format = array('csv');
                                                    $file = $_FILES[csv][tmp_name];
                                                    $filename = $_FILES['csv']['name'];
                                                    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

                                                    /* ---------------Check if the selected file is a csv file ---------------- */
                                                    if (!in_array($file_extension, $file_format)) {
                                                        echo '<script>alert("Unsupported file format selected!\nSave your Microsoft Excel file in csv format.\nIn Microsoft Excel Click on File menu, Save As, in the Save as type box choose CSV(Comma delimited)"); </script>';
                                                    } else {
                                                        /* ---If its a csv file open it and read its contents --- */
                                                        $handle = fopen($file, "r");

                                                        /* ---------------------Skip first row(header row) --------------------- */
                                                        fgets($handle);

                                                        /* ------Loop through the csv file and insert records into check_off table---- */
                                                        do {
                                                            if (!$_SESSION['sess']) {
                                                                $_SESSION['sess'] = session_id();
                                                            }
                                                            if ($data[0]) {
                                                                $result = mysql_query("SHOW TABLE STATUS LIKE 'membercontribution'");
                                                                $row = mysql_fetch_array($result);
                                                                $nextId = $row['Auto_increment'];

                                                                $newuser->membercontribution($_SESSION['users'], addslashes($data[0]), addslashes($data[9]), $nextId, addslashes($data[1]), addslashes($data[10]), addslashes($data[5]), addslashes($data[6]), addslashes($data[2]), addslashes($data[3]), addslashes($data[7]), $_SESSION['session'], 'NULL', 'NULL', addslashes($data[4]));
                                                            }
                                                        } while ($data = fgetcsv($handle, 1000, ",", "'"));
                                                        /* ------------- End of inserting data ---------------------------- */

                                                        /* --------------Print Success message ----------------------------- */
                                                    }
                                                }
                                            }



                                            if (!$_SESSION['session']) {
                                                $_SESSION['session'] = session_id();
                                            }
                                            if (isset($_REQUEST['submit'])) {
                                                if(memberactive($_REQUEST['mno'])){//member is active
                                                    $newuser->membercontribution($_SESSION['users'], $_REQUEST['mno'], $_REQUEST['vehicleid'], $_REQUEST['payeeid'], $_REQUEST['payee'], $_REQUEST['tname'], $_REQUEST['ptype'], $_REQUEST['amount'], $_REQUEST['datefrom'], $_REQUEST['dateto'], $_REQUEST['date'], $_SESSION['session'], $_REQUEST['tid'], $_REQUEST['submit'], $_REQUEST['bankname']);
                                                }
                                                else{//member is withdrawn
                                                        echo '<span class="red" >Sorry, ' . $_REQUEST['mno'] . ' is withdrawn</span></br>';
                                                    }
                                            }

                                            if (!isset($_REQUEST['submit']) && (!isset($_REQUEST['importcsv']))) {
                                                //tabbed panel to allow manual data entry or import from file.
                                                contributionform(); //this function calls the functions below
                                               // contibution();

                                                //uploadcontribution();
                                            }
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
            </div>
            <!-- END PORTLET-->
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
        <script type="text/javascript">
                    function CurrencyFormat(number)
                    {
                    var decimalplaces = 2;
                            var decimalcharacter = ".";
                            var thousandseparater = ",";
                            number = parseFloat(number);
                            var sign = number < 0 ? "-" : "";
                            var formatted = new String(number.toFixed(decimalplaces));
                            if (decimalcharacter.length && decimalcharacter != ".") { formatted = formatted.replace(/\./, decimalcharacter); }
                    var integer = "";
                            var fraction = "";
                            var strnumber = new String(formatted);
                            var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : - 1;
                            if (dotpos > - 1)
                    {
                    if (dotpos) { integer = strnumber.substr(0, dotpos); }
                    fraction = strnumber.substr(dotpos + 1);
                    }
                    else { integer = strnumber; }
                    if (integer) { integer = String(Math.abs(integer)); }
                    while (fraction.length < decimalplaces) { fraction += "0"; }
                    temparray = new Array();
                            while (integer.length > 3)
                    {
                    temparray.unshift(integer.substr( - 3));
                            integer = integer.substr(0, integer.length - 3);
                    }
                    temparray.unshift(integer);
                            integer = temparray.join(thousandseparater);
                            return sign + integer + decimalcharacter + fraction;
                    }
            function FormatAsCurrency(n) { document.getElementById("formatted").innerHTML = CurrencyFormat(n) + " "; }
            function FormatAsCurrenc(n) { document.getElementById("format").innerHTML = CurrencyFormat(n) + " "; }
        </script>
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
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/scripts/core/app.js"></script>
        <script src="assets/scripts/custom/components-dropdowns.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/scripts/core/app.js"></script>
        <script src="assets/scripts/custom/components-pickers.js"></script>
        <script src="assets/plugins/bootstrap-sessiontimeout/bootstrap-session-timeout.js" type="text/javascript"></script>

        <script>
                    $.sessionTimeout({
                    keepAliveUrl: 'keep-alive.html',
                            logoutUrl: 'logout.php',
                            redirUrl: 'logout.php',
                            warnAfter: 360000, //warn after 6 minutes
                            redirAfter: 420000, // logout after 7 minutes
                            countdownMessage: 'Logging you out in {timer}   seconds.'
                    });        </script>
        <script>
                    jQuery(document).ready(function() {
            // initiate layout and plugins
            App.init();
                    ComponentsPickers.init();
                    ComponentsDropdowns.init();
            });
                    $(function(){
                    $('.date1').datepicker({
                    format: 'mm-dd-yyyy',
                            endDate: '+0d',
                            autoclose: true
                    });
                    });</script>


        <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="assets/scripts/core/app.js"></script>

    </body>
    <!-- END BODY -->
</html>