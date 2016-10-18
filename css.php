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
				<!-- END THEME STYLES -->





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



		</body>

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
		<script>
				jQuery(document).ready(function() {
						// initiate layout and plugins
						App.init();
				});
		</script>


		<script>
				jQuery(document).ready(function() {
						App.init();
						TableAdvanced.init();
				});
		</script>
</html>