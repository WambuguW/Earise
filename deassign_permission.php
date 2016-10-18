<?php
include_once './classes.php';
include 'get_url.php';
$admin = new Admin();
$users = new Users();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Esacco | Microfinance System</title>
        <!--<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">-->

        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/pages/message.css"/>
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME STYLES -->
        <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="assets/css/print.css" rel="stylesheet" type="text/css" media="print"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css"/>
        <link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2-metronic.css"/>
        <link rel="stylesheet" href="assets/plugins/data-tables/DT_bootstrap.css"/>




    </head>
    <body>
        <div id="art-main">
            <header class="art-header clearfix">

                <?php headerinfo(); ?>

            </header>
            <nav class="art-nav clearfix">

                <div class="header navbar navbar-nav mega-menu col-md-8">
                    <!-- BEGIN TOP NAVIGATION BAR -->
                    <div class="header-inner" >
                        <!-- BEGIN LOGO -->

                        <!-- END LOGO -->
                        <!-- BEGIN HORIZANTAL MENU -->

                        <?php
                        include "sidemenu2.php";
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
                    <p class="col-md-offset9"> <?php
                        admin();
                        ?>
                    <p>
                        <!-- END TOP NAVIGATION BAR -->
                </div>


            </nav>
            <div class="row ">
                <div class="col-md-offset-1 col-md-10 col-sm-10">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet box green calendar">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-reorder"></i>Deassign Permissions

                            </div>
                            <div class="tools">

                                <a href="javascript:;" class="reload"></a>

                            </div>
                        </div>

                        <div class="portlet-body dark_green" style="color:#000000">
                            <div class="well dark_green">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="art-layout-cell art-content clearfix">
                                    <!------form start----->


                                    <div class="portlet-body"><h5>Select a user</h5>
                                        <form role="form" action="" method="post">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <select style="margin-bottom: 5px" class="form-control input-medium" id="selection" name="seluser">
                                                        <option>---select user---</option>
                                                        <?php
                                                        foreach (get_users() as $user) {
                                                            $USER_IDS[] = $user['id'];
                                                            echo '<option value="' . $user['id'] . '">' . base64_decode($user['fname']) . ' ' . base64_decode($user['mname']) . ' ' . base64_decode($user['lname']) . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn green" name="btnpreview">Preview</button>	
                                                </div>


                                            </div>
                                        </form>
                                    </div>



                                    <table class="table table-striped table-hover table-bordered" id="sample_3">
                                        <thead>
                                            <tr>

                                                <th>
                                                    Link
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Menu
                                                </th>
                                                <th>
                                                    Read Permission

                                                </th>
                                                <th>
                                                    Write Permission

                                                </th>
                                                <th>
                                                    Read & Write
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['btnpreview'])) {
                                                $userId = base64_encode($_POST['seluser']);
                                                for ($i = 0; $i < count($USER_IDS); $i++) {

                                                    if ($USER_IDS[$i] == $_POST['seluser']) {
                                                        $setter = ($i + 1);
                                                    }
                                                }
                                                include 'config2.php';
                                                $check = $dbhs->prepare('select * from permission where user=:1 ');
                                                $check->bindParam(':1', $userId);
                                                $check->execute();
                                                foreach ($check->fetchAll() as $perm) {

                                                    $page = get_pageDetails(base64_decode($perm['page']));
                                                    echo '<tr><form action="" method="POST"><input type="hidden" name="permID"  value="' . ($perm['id']) . '"/>'
                                                    . '<td><a href="' . base64_decode($page['url']) . '">' . base64_decode($page['name']) . '</a></td>'
                                                    . '<td>' . base64_decode($page['name']) . '</td>'
                                                    . '<td>' . base64_decode($page['menu']) . '</td>';
                                                    if (base64_decode($perm['page_read']) == 1) {
                                                        echo '<td><button type="submit" class="btn btn-warning" name="btnRead">De-Assign</button></td>';
                                                    } else {
                                                        echo '<td><a href="#" class="btn red disabled">
									 No Permissions
								</a></td>';
                                                    }if (base64_decode($perm['page_write']) == 1) {
                                                        echo '<td><input type="submit" name="btnWrite" value="De-Assign" class="btn btn-warning"/></td>';
                                                    } else {
                                                        echo '<td><a href="#" class="btn red disabled">
									 No Permissions
								</a></td>';
                                                    }

                                                    if (base64_decode($perm['page_read']) == 1 && base64_decode($perm['page_write']) == 1) {
                                                        echo '<td><input type="submit" name="Both" value="De-Assign" class="btn btn-danger"/></td>';
                                                    } else {
                                                        echo '<td><a href="#" class="btn red disabled">
									 No Permissions
								</a></td>';
                                                    }
                                                    echo '</form></tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/JavaScript">
            document.getElementById('selection').selectedIndex = <?php if ($setter != 0) {
                                                echo $setter;
                                            } ?>;
        </script>

        <script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <!-- END CORE PLUGINS -->
        <script src="assets/scripts/custom/form-samples.js"></script>
        <script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
        <script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
        <script src="assets/scripts/custom/components-pickers.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="assets/scripts/core/app.js"></script>
        <script src="assets/scripts/custom/table-managed-perm.js"></script>
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
    App.init();
    TableManaged.init();
    ComponentsPickers.init();
    FormSamples.init();
});

        </script>
        <script>
            //Program a custom submit function for the form
            $("form#data").submit(function (event) {

                //disable the default form submission
                event.preventDefault();

                //grab all form data  
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: 'function.php',
                    type: 'POST',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (returndata) {
                        alert(returndata);
                        location.reload(true);
                    }
                });

                return false;
            });
        </script>

    </body></html>