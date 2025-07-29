<?php
if (!defined('APP_SECURE')) {
	die('Direct access not allowed');
}

include("koneksi.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");

$currentMonth = date('m');
$currentYear = date('Y');

// Loop through the months (assuming you have an array of month options)
$months = [
	'00' => 'NOL',
	'01' => 'JAN',
	'02' => 'FEB',
	'03' => 'MAR',
	'04' => 'APR',
	'05' => 'MEI',
	'06' => 'JUN',
	'07' => 'JUL',
	'08' => 'AUG',
	'09' => 'SEP',
	'10' => 'OKT',
	'11' => 'NOV',
	'12' => 'DES'
	// Add more months as needed
];
$tahun = [
	'2023' => '2023',
	'2024' => '2024',
	'2025' => '2025'
	// Add more year as needed
];

/* sql tahun */
//$currentYear = date('Y');
//$sqlthn = "SELECT DISTINCT left(tgl_invo,4) as tahun FROM transwo GROUP BY transwo.tgl_invo";
//$ressthn = mysqli_query($conn1, $sqlthn);
?>

<link href="https://cdn.datatables.net/v/bs5/dt-2.3.2/b-3.2.4/b-html5-3.2.4/cr-2.1.1/date-1.5.6/r-3.0.5/rr-1.5.0/sp-2.3.4/sl-3.0.1/sr-1.4.1/datatables.min.css" rel="stylesheet" integrity="sha384-4DWSO9AjW1QxrJuyO+Of6/hUOUppxivbkkTRhNAEsK2Fs5zLuBfAlnLixGHC7adt" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.3.2/b-3.2.4/b-html5-3.2.4/cr-2.1.1/date-1.5.6/r-3.0.5/rr-1.5.0/sp-2.3.4/sl-3.0.1/sr-1.4.1/datatables.min.js" integrity="sha384-VBCFY5iuTaoOOvRnyA7CzLy/tCe0ocjSZc7pySzX2ucJfF88ZiZJphpnAMOkc1zv" crossorigin="anonymous"></script>

<div class="row">
	<div class="col">
		<div class="card shadow-lg1 border-1 rounded-lg mt-5 border-left-secondary">
			<div class="card-header">
				<div class="row g-3 align-items-center">
					<div class="input-group input-group-sm">
						<span class="input-group-text col-2"><strong>Pilih Tahun / Bulan Berjalan</strong></span>
						<div class="col-1">
							<select name="thn" id="thn" class="form-select">
								<option value="">Tahun</option>
								<?php
								foreach ($tahun as $value => $label) {
									// Check if the current month matches the value of the option
									if ($currentYear == $value) {
										// If yes, add the 'selected' attribute
										echo "<option value=\"$value\" selected>$label</option>";
									} else {
										// Otherwise, just output the option without the 'selected' attribute
										echo "<option value=\"$value\">$label</option>";
									}
								} ?>
							</select>
						</div>
						<div class="col-2">
							<select name="bln" id="bln" class="form-select" aria-label="Default select example">
								<option value="">Bulan</option>
								<?php
								foreach ($months as $value => $label) {
									// Check if the current month matches the value of the option
									if ($currentMonth == $value) {
										// If yes, add the 'selected' attribute
										echo "<option value=\"$value\" selected>$value $label</option>";
									} else {
										// Otherwise, just output the option without the 'selected' attribute
										echo "<option value=\"$value\">$value $label</option>";
									}
								} ?>
							</select>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="card shadow-lg1 border-1 rounded-lg mt-5 border-left-secondary">
			<div class="card-header">
				<h3 class="text-left font-weight-bold text-info text-shadow1">GL Percobaan</h3>
			</div>
			<div class="card-body">
				<div id="tbljurnal"></div>
			</div>
			<div class="card-footer">
				<p></p>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	filter_jurnal();

	function filter_jurnal() {
		var action = 'getfilter';
		var bln = $('#bln').val();
		var thn = $('#thn').val();

		// ajax script
		$.ajax({
			type: 'POST',
			url: 'glpercobaan01_get.php',
			data: {
				action: action,
				bln: bln,
				thn: thn
			},
			cache: true,
			success: function(html) {
				$('#tbljurnal').html(html);
			}
		});
	}

	$('#bln').change(function() {
		filter_jurnal();
	});

</script>