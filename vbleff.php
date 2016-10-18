<?php
include './classes.php';
$lect = new User();
$users = new Users();

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.0.0.58475 -->
        <meta charset="utf-8">
        <title>Available Balances</title>
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
function printpage()
  {
  window.print()
  }
</script>

        
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
                                    <div class="noprint"><?php username(); 
                                    
                                                                              sidemenu($page, $childpage);
?></div>
                                    
                               </div></div></div>
                            <div class="art-layout-cell art-content clearfix"><article class="art-post art-article">
                                    <h2 class="art-postheader"><span class="art-postheadericon">Available Balances</span></h2>
                                    <div class="art-postcontent art-postcontent-0 clearfix">
                                        <?php
                                            if($users->permissions($_SESSION['users'], basename($_SERVER['PHP_SELF'])) === 1 ){
                                            ?>
                                        <div class="art-content-layout">
                                            <div class="art-content-layout-row">
                                                <div class="art-layout-cell" style="width: 100%" >
                                                                                              <?php
                                                                                              
                                                    echo '<table class="tables">
                                                     <thead>
                                                     <tr>
                                                     <th>Member Number</th>
                                                     <th>Member Name</th>
                                                     <th>Available Balance</th>
                                                     </thead>
                                                     </tr>';
                                                    $sum = 0;
                                               

                                                    $Rows = mysql_query('select * from newmember  where status="' . base64_encode("active") . '"') or die(mysql_error());
                                                    while ($row = mysql_fetch_array($Rows)) {
                                                        echo '    <tr>
                                                    <td>' . base64_decode($row['membernumber']) . '</td>
                                                    <td>' . getMembername($row['membernumber']) . '</td>';
                                                        echo ' <td>' . getsymbol() . '.' . number_format(sumbalforamember(base64_decode($row['membernumber'])), 2) . '</td>';
                                                        echo '</tr>';
                                                        $sum+=sumbalforamember(base64_decode($row['membernumber']));
                                                        $psum+=sumtotalforamember(base64_decode($row['membernumber']));
                                                        
                                                        juma(base64_decode($row['membernumber']));
                                                        }
                                                    echo '<tr><td colspan="1"></td><td>TOTAL</td><td>' . getsymbol() . '.' . number_format($sum, 2) . '</td></tr></table>';
                                                    echo '<div class="two"><div class="noprint"><button value="Print this page" onclick="print()">Print</button></div></div>';
    
                                                    save($sum, $psum);
                                                   
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                            }else{
                                                echo '<span class="red" >Access Denied! Contact Systems Administrator</span></br>';
                                            }
                                            ?>
                                        </div>
                                </article></div>
                        </div>
                    </div>
                </div><div class="noprint"><?php footer(); ?></div>

            </div>
        </div>


    </body></html>