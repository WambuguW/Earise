<?php
include './classes.php';
$lect = new User();
$users = new Users();

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Inactive Members Reports</title>
        <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link rel="stylesheet" href="style.css" media="screen">
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
                                    <h2 class="art-postheader"><span class="art-postheadericon">Members Reports</span></h2>
                                    <div class="art-postcontent art-postcontent-0 clearfix">
                                        <?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>
                                        <div class="art-content-layout">
                                            <div class="art-content-layout-row">
                                                <div class="art-layout-cell" style="width: 100%" >
                         
                                          <div class="simpleTabs">
                                              
                                              <ul class="simpleTabsNavigation">
                                            <li><a href="#">Inactive Members</a></li>
                                            <li><a href="viewmembers.php">All Members</a></li>
                                            <li><a href="activemembers.php">Active Members</a></li>
                                        </ul>
                                  
                                         <div class="simpleTabsContent">
                                           <?php
                                                               viewinactivemembers();
                                               
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
                                </article></div>
                        </div>
                    </div>
                    </div><div class="noprint"><?php footer(); ?></div>

            </div>
                    </div>


    </body></html>