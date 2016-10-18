<?php
include_once './classes.php';
$newuser = new User();
$users = new Users();
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
        <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
        <script src="autosaveform.js"></script>
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
        <script>
            window.onload = function() {
            document.getElementById('no').onchange = kk;
                    document.getElementById('yes').onchange = kk;
                    document.getElementById('sizla').onchange = disablefieldd;
                    document.getElementById('lex').onchange = disablefieldd;
                    }

            function kk()
                    {
                    if (document.getElementById('no').checked == true){
                    document.getElementById('jay').value = '';
                            document.getElementById('jay').disabled = true;
                            document.getElementById('col').disabled = false;
                            } else{
                    document.getElementById('jay').disabled = false;
                            document.getElementById('col').disabled = true;
                            }
                    }
            function disablefieldd()
                    {
                    if (document.getElementById('sizla').checked == true){
                    document.getElementById('select2_sample_modal_4').value = '';
                            document.getElementById('select2_sample_modal_4').disabled = true;
                            document.getElementById('inn').disabled = false;
                            document.getElementById('in').disabled = false;
                            } else{
                    document.getElementById('select2_sample_modal_4').disabled = false;
                            document.getElementById('inn').disabled = true;
                            document.getElementById('in').disabled = true;
                            }
                    }

        </script>

        <script>

            var formsave1 = new autosaveform({
            formid: 'loanapp',
                    pause: 1000 //<--no comma following last option!
            })

        </script>
        <script>

                    var formsave1 = new autosaveform({
                    formid: 'mccc4',
                            pause: 1000 //<--no comma following last option!
                    })

        </script>
        <script>

                    var formsave1 = new autosaveform({
                    formid: 'amo',
                            pause: 1000 //<--no comma following last option!
                    })

        </script>


        <script type="text/javascript">
                    function showUser(str)
                    {
                    if (str == "")
                    {
                    document.getElementById("txtHint").innerHTML = "";
                            return;
                    }
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
            function showColl(){
            var str = $("#select2_sample_modal_4").val();
                    if (str == "")
            {
            document.getElementById("select2_sample_modal_4").innerHTML = "";
                    return;
            }
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
            document.getElementById("col").innerHTML = xmlhttp.responseText;
            }
            }
            xmlhttp.open("GET", "coll.php?q=" + str, true);
                    xmlhttp.send();
            }

            function showG(){
            var str = $("#gua").val();
                    if (str == "")
            {
            document.getElementById("select2_sample_modal_4").innerHTML = "";
                    return;
            }
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
            document.getElementById("gg").innerHTML = xmlhttp.responseText;
            }
            }
            xmlhttp.open("GET", "guar.php?q=" + str, true);
                    xmlhttp.send();
            }
        </script>

        <script type="text/javascript">             var tableToExcelt = (function() {
var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body class="page-header-fixed page-full-width" style="color:#272822; font-family:verdana; font-size:13px;"><table>{table}</table></body></html>'
                    , base64 = function(s) {
                    return window.btoa(unescape(encodeURIComponent(s)))
                    }
            , format = function(s, c) {
            return s.replace(/{(\w+)}/g, function(m, p) {
            return c[p];          })
                            }
return function(table, name) {
    if (!table.nodeType)
                                                            table = document.getElementById(table)
                                            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
                                            window.location.href = uri + base64(format(template, ctx))
                            }
            })()
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
                                xmlhttp.open("GET", "./search/nsearch.php?q=" + str, true);
                                        xmlhttp.send();
                                }

                        //
                        function showMc(str)
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
                        document.getElementById("getLoanType").innerHTML = xmlhttp.responseText;
                        }
                        }
                        xmlhttp.open("GET", "./search/getLoanType.php?q=" + str, true);
                                xmlhttp.send();
                        }

                        //
                        function showser(str)
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
                        document.getElementById("txtHin").innerHTML = xmlhttp.responseText;
                        }
                        }
                        xmlhttp.open("GET", "./search/nsearch.php?q=" + str, true);
                                xmlhttp.send();
                        }
        </script>
        <script type="text/javascript">

            function showser(str)
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
            document.getElementById("txtHin").innerHTML = xmlhttp.responseText;
            }
            }
            xmlhttp.open("GET", "./search/loansearch.php?q=" + str, true);
                    xmlhttp.send();
            }
        </script> 

        <link rel="stylesheet" type="text/css" href="assets/css/tabcontent.css" />

        <script type="text/javascript" src="assets/js2/tabcontent.js">

                    /***********************************************
                     * Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
                     * This notice MUST stay intact for legal use
                     * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
                     ***********************************************/

        </script>



    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
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
                        <div class="col-md-12 ">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box green calendar">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-reorder"></i> Personal loan

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


                                            <ul id="countrytabs" class="nav nav-tabs ">
                                                <li class="active"><a href="#"  data-toggle="tab" rel="country1" >Apply loan</a></li>
                                                <li><a href="#" data-toggle="tab"  rel="country2">Guarantors</a></li>
                                                <!--   <li><a href="#" data-toggle="tab" rel="country3">Extra Fees</a></li>
                                               <li><a href="#" data-toggle="tab" rel="country4">Amortization</a></li>
                                                 <li><a href="#" data-toggle="tab" rel="country5">View Loan Repayment</a></li>-->

                                            </ul>
                                            <div class="col-md-12" style=" margin-bottom: 1em; padding: 10px">



                                                <div id="country1" class="tabcontent">
                                                    <?php
                                                    if (isset($_REQUEST['appl'])) {

                                                        /*
                                                         * $_SESSION['appdate'] = $_REQUEST['appdate'];
                                                          $_SESSION['gperiod'] = $_REQUEST['gperiod'];
                                                          $_SESSION['mode'] = $_REQUEST['mode'];
                                                          $_SESSION['ltype'] = $_REQUEST['loant'];
                                                          $_SESSION['norep'] = $_REQUEST['norep']; */
                                                        $_SESSION['users'];
                                                        $_SESSION['ltid'] = $_REQUEST['tid'];
                                                        $_SESSION['lmid'] = $_REQUEST['mno'];

                                                        $_SESSION['amtt'] = $_REQUEST['amount'];

                                                        $newuser->applyloan($_SESSION['users'], $_REQUEST['mno'], $_REQUEST['loant'], $_REQUEST['purpose'], $_REQUEST['norep'], $_REQUEST['tid'], $_REQUEST['amount'], strtotime($_REQUEST['appdate']), $_REQUEST['gperiod'], $_REQUEST['mode'], $_REQUEST['refNo']);
                                                    }

                                                    loanapplication();
                                                    ?>
                                                </div>

                                                <div id="country2" class="tabcontent">
                                                    <?php
                                                    if (isset($_REQUEST['gadd'])) {

                                                        $newuser->addguarantors($_SESSION['users'], $_REQUEST['gno'], $_REQUEST['gtype'], $_REQUEST['gamount'], $_REQUEST['collateral'], $_REQUEST['comments'], $_SESSION['ltid'], $_SESSION['lmid'], $_REQUEST['date'], $_REQUEST['name']);
                                                    }

                                                    guarantors();

                                                    if (isset($_REQUEST['appl'])) {
                                                        echo '<button class="btn green" onclick="showG()">Preview Guarantor</button>
                                                        
                                                        <div id="gg"></div>';
                                                    }
                                                    ?>

                                                </div>
                                                <!-- <div id="country3" class="tabcontent">

                                                <?php
                                                /*
                                                  if (isset($_REQUEST['appfee'])) {

                                                  $newuser->addappfee($_SESSION['users'], $_REQUEST['tid'], $_REQUEST['mno'], $_REQUEST['amount']);
                                                  }
                                                  if (isset($_REQUEST['legalfee'])) {

                                                  $newuser->addlegalfee($_SESSION['users'], $_REQUEST['tid'], $_REQUEST['mno'], $_REQUEST['amount']);
                                                  }

                                                  loansfees($_SESSION['lmid'], $_SESSION['ltid']);
                                                 * * 
                                                 */
                                                ?>
                                                <!--  </div>
                                                <!--
                                                <div id="country4" class="tabcontent">

                                                </div><!---
                                                <div id="country5" class="tabcontent">
                                                <?php // viewloanrep();  ?>
                                                </div>--->

                                                <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
                                            </div>

                                            <script type="text/javascript">

                                                        var countries = new ddtabcontent("countrytabs")
                                                        countries.setpersist(true)
                                                        countries.setselectedClassTarget("link") //"link" or "linkparent"
                                                        countries.init()

                                            </script>
                                            <!------form start----->

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
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="assets/plugins/respond.min.js"></script>
        <script src="assets/plugins/excanvas.min.js"></script>
        <![endif]-->

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
                    function FormatAsCurrenc(n) { document.getElementById("ormatted").innerHTML = CurrencyFormat(n) + " "; }
                    function FormatAsCurrencys(n) { document.getElementById("format").innerHTML = CurrencyFormat(n) + " "; }
                    function FormatAsCurrencies(n) { document.getElementById("formatt").innerHTML = CurrencyFormat(n) + " "; }
        </script>
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


        <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/scripts/custom/components-pickers.js"></script>

        <script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <script src="assets/plugins/bootstrap-sessiontimeout/bootstrap-session-timeout.js" type="text/javascript"></script>

        <script>
                                   $.sessionTimeout({
                                   keepAliveUrl: 'keep-alive.html',
                                           logoutUrl: 'logout.php',
                                           redirUrl: 'logout.php',
                                           warnAfter: 360000, //warn after 6 minutes
                                           redirAfter: 420000, // logout after 7 minutes
                                           countdownMessage: 'Logging you out in {timer}   seconds.'
                                   }); </script>
        <script>
                            jQuery(document).ready(function() {
                    // initiate layout and plugins
                    //
                    App.init();
                            ComponentsPickers.init();
                            TableAdvanced.init();
                            ComponentsDropdowns.init();
                    });</script>
        <script src="assets/scripts/custom/table-advanced.js"></script>


    </body>
</html>