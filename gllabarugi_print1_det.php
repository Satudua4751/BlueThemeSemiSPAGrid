<?php
include("sess_check.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");
$bln = $thn = "";
if (isset($_POST["action"])) {
	if (isset($_POST['norek'])) {
		$xnorek = substr($_POST['norek'], 0, 6);
		$bln = substr($_POST['norek'], 6, 2);
		$thn = substr($_POST['norek'], 8, 4);
		// echo $xnorek . ' - '. $bln .' - ' .$thn;

		$bln1 = date('m', strtotime('-1 month', mktime(0, 0, 0, $bln, 1)));
		// deskripsi halaman
	}
}
$pagedesc = "Detail Jurnal";
$pagetitle = str_replace(" ", "_", $pagedesc);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">

	<title><?php echo $pagetitle . $bln ?></title>
	<link href="foto/logo-03b.png" rel="icon" type="images/x-icon">
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" type="text/css" href="libs/css/styles.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="libs/css/offline-font.css">
	<!-- Custom Fonts -->
	<link rel="stylesheet" href="libs/css/all.css">
	<!-- jQuery -->
	<script src="libs/js/jquery-3.6.0.min.js"></script>
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
		</div>
	</section>

	<section id="body-of-report">
		<?php include("gllabarugi_print1_det_cetak.php"); ?>
	</section>

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="libs/js/styles.bundle.min.js"></script>

</body>

</html>