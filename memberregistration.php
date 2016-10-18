<?php
include_once './classes.php';
//include 'modal.php';
$newuser = new Registermember();
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
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-select/bootstrap-select.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/jquery-multi-select/css/multi-select.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/clockface/css/clockface.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->


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
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "./search/kinsearch.php?q=" + str, true);
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
        <script type="text/javascript">
                    function showIntroduced(str)
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
                    document.getElementById("introduced").innerHTML = xmlhttp.responseText;
                    }
                    }
                    xmlhttp.open("GET", "./search/introduced.php?q=" + str, true);
                            xmlhttp.send();
                    }
        </script>
        <script type="text/javascript">
            function showUsers(str)
            {

                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("txtHintt").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "./search/kinsearch.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>

        <script type="text/javascript">
            function showUsersa(str)
            {

                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("txttHintt").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "./search/cinsearch.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>
 <script type="text/javascript">
            function showMemberNo(str)
            {

                if (window.XMLHttpRequest)
                {// code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                }
                else
                {// code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "./search/memberNumber.php?q=" + str, true);
                xmlhttp.send();
            }
        </script>

        <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
        <script src="autosaveform.js"></script>
        <script>

            var formsave1 = new autosaveform({
                formid: 'nax',
                pause: 1000 //<--no comma following last option!
            });</script>

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
                        <div class=" col-md-12 ">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet box green calendar">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-reorder"></i> Member Registration

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
                                                <li class="active"><a href="#"  data-toggle="tab" rel="country1" >Member Registration</a></li>
                                               <li><a href="#" data-toggle="tab" rel="country6">Bank Details</a></li>
                                                <li><a href="#" data-toggle="tab"  rel="country2">Member Next of Kin</a></li>
                                                <li><a href="#" data-toggle="tab" rel="country3">Member Group</a></li>
                                                <li><a href="#" data-toggle="tab" rel="country4">Member Accounts</a></li>
                                                <li><a href="#" data-toggle="tab" rel="country5">Uploads</a></li>

                                            </ul>
                                            <div class="col-md-12" style=" margin-bottom: 1em; padding: 10px">
                                                


                                                    <div id="country1" class="tabcontent" style=" width:1200px;">
                                                        <?php
                                                        if (isset($_REQUEST['add'])) {

                                                            $newuser->infomember($_SESSION['users'], $_REQUEST['mno'], $_REQUEST['dob'], $_REQUEST['dist'], $_REQUEST['divi'], $_REQUEST['loc'], $_REQUEST['sub'], $_REQUEST['code'], $_REQUEST['station'], $_REQUEST['staff'], $_REQUEST['terms'], $_REQUEST['recruit'], $_REQUEST['sacco'], $_REQUEST['fee'], $_REQUEST['nat'], $_REQUEST['date']);
                                                        }

                                                        if (isset($_REQUEST['submit'])) {
                                                            // get the original filename

                                                            $image = gmdate("hisG") . $_FILES['image']['name'];
                                                            // image storing folder, make sure you indicate the right path
                                                            $folder = "photos/";

                                                            // image checking if exist or the input field is not empty
                                                            if ($image) {
                                                                // creating a filename
                                                                $filename = $folder . $image;

                                                                // uploading image file to specified folder
                                                                $copied = copy($_FILES['image']['tmp_name'], $filename);

                                                                // checking if upload successful
                                                                if (!$copied) {

                                                                    // creating variable for the purpose of checking:
                                                                    // 0-unsuccessful, 1-successful
                                                                    //$ok = 0;
                                                                    /*
                                                                    member_cate,title,fname,mname,lname,dob,gender,bname,idno,residence,floor,cro,pcode,mno,region,
                                                                                                                                                                                                county,constituency,office_cell,office_landline,pin,nameb,intro,nitro,mop,occupation,personalemail,office_email,comments,date,ccmf,
                                                                    */
                                                                  
                                                                   $newuser->addmember($_SESSION['users'],$_REQUEST['member_cate'],$_REQUEST['title'], $_REQUEST['fname'], $_REQUEST['mname'], $_REQUEST['lname'], $_REQUEST['dob'], $_REQUEST['gender'], $_REQUEST['org_name'], $_REQUEST['idno'], $_REQUEST['residence'], $_REQUEST['floor'], $_REQUEST['cro'], $_REQUEST['post_address'], $_REQUEST['mno'],$_REQUEST['country'], $_REQUEST['region'],$_REQUEST['county'],$_REQUEST['constituency'], $_REQUEST['mobile'], $_REQUEST['office_cell'], $_REQUEST['office_landline'], $_REQUEST['krapin'], $_REQUEST['buildingname'], $_REQUEST['introduce_by'], $_REQUEST['nitro'], $_REQUEST['freq_payment'], $_REQUEST['occupation'],$_REQUEST['personalemail'], $_REQUEST['office_email'], $_REQUEST['comments'], $_REQUEST['regdate'], $_REQUEST['period_saving'], $image);
                                                                } else {
                                                                   
                                                                   $newuser->addmember($_SESSION['users'],$_REQUEST['member_cate'],$_REQUEST['title'], $_REQUEST['fname'], $_REQUEST['mname'], $_REQUEST['lname'], $_REQUEST['dob'], $_REQUEST['gender'], $_REQUEST['org_name'], $_REQUEST['idno'], $_REQUEST['residence'], $_REQUEST['floor'], $_REQUEST['cro'], $_REQUEST['post_address'], $_REQUEST['mno'],$_REQUEST['country'], $_REQUEST['region'],$_REQUEST['county'],$_REQUEST['constituency'], $_REQUEST['mobile'], $_REQUEST['office_cell'], $_REQUEST['office_landline'], $_REQUEST['krapin'], $_REQUEST['buildingname'], $_REQUEST['introduce_by'], $_REQUEST['nitro'], $_REQUEST['freq_payment'], $_REQUEST['occupation'],$_REQUEST['personalemail'], $_REQUEST['office_email'], $_REQUEST['comments'], $_REQUEST['regdate'], $_REQUEST['period_saving'], $image);
                                                                }
                                                            }
                                                        }
                                                        //add member category
                                                        if (isset($_REQUEST['btnmembercat'])) {
                                                        $newuser->AddMemberCategory($_SESSION['users'], $_REQUEST['prefix'],$_REQUEST['cat_name']);
                                                        }
                                                        //add member titles
                                                        if (isset($_REQUEST['btnaddtitles'])) {
                                                        $newuser->AddMemberTitles($_SESSION['users'],$_REQUEST['title_name']);
                                                        }
                                                        //registration name
                                                        if (!isset($_REQUEST['submit'])) {

                                                            memberregistration();
                                                        }
                                                        ?>
                                                    </div>
                                              <div id="country6" class="tabcontent" style=" width:1200px;">
                                                    <?php 
                                                   
                                                    if(isset($_REQUEST['btnsubmit'])){
                                                        $newuser->addbankdetails($_REQUEST['mno'],$_REQUEST['bankname'],$_REQUEST['branch'],$_REQUEST['account_type'],$_REQUEST['accountno']);
                                                    }
                                                    bankDetails();
                                                       
                                                    ?>
                                               </div>
                                                    <div id="country2" class="tabcontent" style=" width:1200px;">
                                                        <?php
                                                        if (isset($_REQUEST['nsubmit']) || isset($_REQUEST['edit']) || (isset($_REQUEST['sid'])) || (isset($_REQUEST['sid'])) || isset($_REQUEST['update'])) {
                                                            if (isset($_REQUEST['edit'])) {
                                                                nextofkinedit();
                                                            }




                                                            if (isset($_REQUEST['nsubmit'])) {
                                                                //check what was the date 18 yrs ago
                                                                if($_REQUEST['rela']!=''){
                                                                    $relationship = $_REQUEST['rela'];
                                                                }
                                                                if($_REQUEST['relationship']!=''){
                                                                    $relationship = $_REQUEST['relationship'];
                                                                }
                                                                $time = new DateTime('now');
                                                                $newtime = $time->modify('-18 years')->format('d-m-Y');
                                                                //check next of kin percentage
                                                                $check = mysql_query('SELECT * FROM nextofkin WHERE memberno = "'.  base64_encode($_REQUEST['mno']).'" AND status = "'.  base64_encode('active').'"');  
                                                                $total = '';
                                                                while($percentage = mysql_fetch_array($check)){
                                                                    $total = (int)$total+(int)base64_decode($percentage['percentage']);
                                                                }
                                                                $new_total = (int)$total+(int)$_REQUEST['percentage'];
                                                                if($new_total>100){
                                                                    echo '<div style="color: red">That member\'s percentage for next of kin will be '.$new_total.'% after this entry, please correct that percentage</div>';
                                                                }
                                                                
                                                                elseif (strtotime($newtime) > strtotime($_REQUEST['dob']) && $_REQUEST['idno']=='') {
                                                                    echo '<div style="color: red">that member is over 18yrs and therefore ID No. is compulsory!</div>';
                                                                }
                                                                elseif($_REQUEST['rela']!='' && $_REQUEST['relationship']!=''){
                                                                   echo '<div style="color: red">Please either select relationship or type the relationship, not both!</div>'; 
                                                                }
                                                                elseif($_REQUEST['rela']=='' && $_REQUEST['relationship']==''){
                                                                   echo '<div style="color: red">Please either select relationship or type the relationship!</div>'; 
                                                                }
                                                                else{
                                                                    // get the original filename
                                                                    $image = gmdate("hisG") . $_FILES['image']['name'];
                                                                    // image storing folder, make sure you indicate the right path
                                                                    $folder = "photos/";

                                                                    // image checking if exist or the input field is not empty
                                                                    if ($image) {
                                                                        // creating a filename
                                                                        $filename = $folder . $image;

                                                                        // uploading image file to specified folder
                                                                        $copied = copy($_FILES['image']['tmp_name'], $filename);

                                                                        // checking if upload succesfull
                                                                        if (!$copied) {

                                                                            // creating variable for the purpose of checking:
                                                                            // 0-unsuccessfull, 1-successfull
                                                                            //$ok = 0;
                                                                            $newuser->addkin($_SESSION['users'], $_REQUEST['mno'], $_REQUEST['fname'], $_REQUEST['mname'], $_REQUEST['lname'], $relationship, $_REQUEST['percentage'], $_REQUEST['idno'], $_REQUEST['mobile'], $image, $_REQUEST['comments'], $_REQUEST['dob']);
                                                                        } else {
                                                                            $newuser->addkin($_SESSION['users'], $_REQUEST['mno'], $_REQUEST['fname'], $_REQUEST['mname'], $_REQUEST['lname'], $relationship, $_REQUEST['percentage'], $_REQUEST['idno'], $_REQUEST['mobile'], $image, $_REQUEST['comments'], $_REQUEST['dob']);
                                                                        }
                                                                    }
                                                                }                                                                   
                                                            }
                                                        } else {
                                                            nextofkin();
                                                        }
                                                        ?>
                                                    </div>

                                                    <div id="country3" class="tabcontent" style=" width:1200px;">
                                                        <?php
                                                        if (isset($_REQUEST['mesubmit'])) {
                                                            $newuser->membergroup($_SESSION['users'], $_REQUEST['mno'], $_REQUEST['gname']);
                                                        }
                                                        memgroup();
                                                        ?>
                                                    </div>

                                                    <div id="country4" class="tabcontent" style=" width:1200px;">
                                                        <?php
                                                        if (isset($_REQUEST['mebmit'])) {
                                                           $newuser->memberaccounts($_SESSION['users'], $_REQUEST['mno'], $_REQUEST['gname']);
                                                        }
                                                        memberacct();
                                                        ?>
                                                    </div>
                                                    <div id="country5" class="tabcontent" style=" width:1200px;">

                                                        <?php
                                                        if (isset($_POST['submit78'])) {
                                                            $mno = $_POST['mno'];

                                                            // get the original filename

                                                            $image = gmdate("hisG") . $_FILES['image']['name'];
                                                            $image2 = gmdate("hisG") . $_FILES['image2']['name'];
                                                            $image3 = gmdate("hisG") . $_FILES['image3']['name'];
                                                            $image4 = gmdate("hisG") . $_FILES['image4']['name'];
                                                            // image storing folder, make sure you indicate the right path
                                                            $folder = "signature/";
                                                            $folder2 = "passport/";
                                                            $folder3 = "img1/";
                                                            $folder4 = "img2/";

                                                            // image checking if exist or the input field is not empty
                                                            if ($image && $image2 && $image3 && $image4) {
                                                                // creating a filename
                                                                $filename = $folder . $image;
                                                                $filename2 = $folder2 . $image2;
                                                                $filename3 = $folder3 . $image3;
                                                                $filename4 = $folder4 . $image4;

                                                                // uploading image file to specified folder
                                                                $copied = copy($_FILES['image']['tmp_name'], $filename);
                                                                $copied2 = copy($_FILES['image2']['tmp_name'], $filename2);
                                                                $copied2 = copy($_FILES['image3']['tmp_name'], $filename3);
                                                                $copied2 = copy($_FILES['image4']['tmp_name'], $filename4);

                                                                // checking if upload successful
                                                                if (!$copied && !copied2 && !copied3 && !copied4) {

                                                                    // creating variable for the purpose of checking:
                                                                    // 0-unsuccessful, 1-successful
                                                                    //$ok = 0;
                                                                    $newuser->upload($_SESSION['users'], $mno, $image, $image2, $image3, $image4);
                                                                } else {
                                                                    $newuser->upload($_SESSION['users'], $mno, $image, $image2, $image3, $image4);
                                                                }
                                                            }
                                                        }

                                                        uploads();
                                                        ?>
                                                    </div>
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

                                        </div>
                                    </div>
                                </div>
                                <div class="art-content-layout">
                                    <div class="art-content-layout-row">
                                        <div class="art-layout-cell" style="width: 100%" >
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
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
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
<script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/app.js"></script>
<script src="assets/scripts/custom/components-dropdowns.js"></script>
<script src="assets/scripts/custom/components-pickers.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
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
<script>
    jQuery(document).ready(function () {
        // initiate layout and plugins
        App.init();
        ComponentsDropdowns.init();
          ComponentsPickers.init();
          TableAdvanced.init();
    });
</script>

<script src="assets/scripts/custom/table-advanced.js"></script>

</body>
<!-- END BODY -->
</html>