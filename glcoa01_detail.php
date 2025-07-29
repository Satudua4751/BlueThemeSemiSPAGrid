<?php
include("sess_check.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");
if (isset($_POST["action"])) {
	if (isset($_POST['norek'])) {
		//if ($_GET) {
		$norek = substr(trim($_REQUEST['norek']), 0, 6);
		$bln = substr(trim($_REQUEST['norek']), 6, 2);
		$thn = substr(trim($_REQUEST['norek']), 8, 4);
		//echo 'Tahun Detail ' . $norek . $thn . $bln;
	} else {
		echo "Nomor Transaksi Tidak Terbaca";
		exit;
	}
}
?>
<div id="section-to-print">
	<section id="header-kop">
		<div class="container-fluid">
		</div>
	</section>

	<section id="body-of-report">
		<?php include("glcoa01_print.php"); ?>
	</section>
	<div class="modal-footer">
		<a href="glcoa01_cetak.php?norek=<?php echo trim($_REQUEST['norek']); ?>" target="_blank" class="btn btn-danger waves-effect btn-sm"><i class="fas fa-print"></i> Cetak</a>
		<button type="button" class="btn btn-warning waves-effect btn-sm" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
	</div>
</div>