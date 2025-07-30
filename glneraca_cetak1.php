<?php
include("sess_check.php");
include("function/format_rupiah.php");
include("function/format_tanggal.php");
$thn = date('Y');
// current month
$bln = substr(trim($_GET['tgl1']), 5, 2);
$bln3 = $_GET['tgl1'];

// backward 1 month
$bln1 = date('m', strtotime('-1 month', mktime(0, 0, 0, $bln, 1)));

// deskripsi halaman
$pagedesc = "Neraca";
$pagetitle = str_replace(" ", "_", $pagedesc)
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">

	<title><?php echo $pagetitle . '- ' . $bln3 ?></title>
	<link href="foto/logo-03b.png" rel="icon" type="images/x-icon">
	<!--bootstrap css -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<!--main css -->
	<link rel="stylesheet" href="assets/css/bootstrap-extended.css">
	
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
		</div>
	</section>

	<section id="body-of-report">
		<?php include("glneraca_print1.php"); ?>
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