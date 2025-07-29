<?php
include("sess_check.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");

$norek = substr(trim($_GET['norek']), 0, 6);
$bln = substr(trim($_GET['norek']), 6, 2);
$thn = substr(trim($_REQUEST['norek']), 8, 4);

// deskripsi halaman
$pagedesc = "Detail Jurnal";
$pagetitle = str_replace(" ", "_", $pagedesc)
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">

	<title><?php echo $pagetitle ?></title>
	<link href="foto/logo-03b.png" rel="icon" type="images/x-icon">
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="libs/css/styles.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="libs/css/offline-font.css">
	<!--
	<link rel="stylesheet" type="text/css" href="libs/css/custom-report.css">-->
	<!-- Custom Fonts -->
	<link rel="stylesheet" href="libs/css/all.css">
	<!-- jQuery -->
	<script src="libs/js/jquery-3.6.0.min.js"></script>

</head>

<body>
	<section id="body-of-report">
		<?php include("glcoa01_print.php"); ?>
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="libs/js/styles.bundle.min.js"></script>

</body>

</html>