<?php
if (!defined('APP_SECURE')) {
	die('Direct access not allowed');
}

include("koneksi.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");
?>

<link href="https://cdn.datatables.net/v/bs5/dt-2.3.2/b-3.2.4/b-html5-3.2.4/cr-2.1.1/date-1.5.6/r-3.0.5/rr-1.5.0/sp-2.3.4/sl-3.0.1/sr-1.4.1/datatables.min.css" rel="stylesheet" integrity="sha384-4DWSO9AjW1QxrJuyO+Of6/hUOUppxivbkkTRhNAEsK2Fs5zLuBfAlnLixGHC7adt" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.3.2/b-3.2.4/b-html5-3.2.4/cr-2.1.1/date-1.5.6/r-3.0.5/rr-1.5.0/sp-2.3.4/sl-3.0.1/sr-1.4.1/datatables.min.js" integrity="sha384-VBCFY5iuTaoOOvRnyA7CzLy/tCe0ocjSZc7pySzX2ucJfF88ZiZJphpnAMOkc1zv" crossorigin="anonymous"></script>

<div class="row">
	<div class="col">
		<div class="card shadow-lg1 border-1 rounded-lg mt-5 border-left-secondary">
			<div class="card-header">
				<h3 class="text-left font-weight-bold text-info text-shadow1">Gl Report Jurnal Internal</h3>
			</div>
			<div class="card-body">
				<table id="datatglproses" class="table-striped table-bordered table-hover" width="100%">
					<thead class="bg-cyan-400 font-weight-bold" style="height: 40px;">
						<tr>
							<th class="text-center" width="1%">No</th>
							<th class="text-center" width="1%">Kode</th>
							<th class="text-center" width="3%">Periode Awal</th>
							<th class="text-center" width="3%">Periode Akhir</th>
							<th class="text-center" width="3%">Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$sql = "SELECT * FROM tgltable ORDER BY dtglproses1";
						$ress = mysqli_query($conn1, $sql);
						while ($data = mysqli_fetch_array($ress)) {
							echo '<tr>';
							echo '<td class="text-center">' . $i . '</td>';
							echo '<td class="text-start">' . $data['idproses'] . '</td>';
							echo '<td class="text-start">' . $data['dtglproses1'] . '</td>';
							echo '<td class="text-start">' . $data['dtglproses2'] . '</td>';
							echo '<td class="text-center"></td>';
							echo '</tr>';
							$i++;
						}
						?>
					</tbody>
				</table>
				<div class="form-group">

				</div>
			</div>
			<div class="card-footer">
				<p></p>
			</div>
		</div>
	</div>
</div>

<!-- Modal progress -->
<div class="modal fade" id="progressModal" tabindex="-1" aria-labelledby="progressModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content shadow-lg1">
			<div class="modal-header">
				<h5 class="modal-title text-xm font-weight-bold text-info text-uppercase text text-shadow1" id="progressModalLabel"><strong>Progress</strong></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="col">
					<div id="process">
						<div class="progress progress-sm mr-2">
							<div class="progress-bar bg-info progress-bar progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
								<div id="percentageDisplay" class="font-weight-bold text-danger"></div>
							</div>
						</div>
					</div>
				</div>
				</br>
				<span id="success_message"></span>
			</div>
		</div>
	</div>
</div>
<?php include("layout_modal.php"); ?>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $("#datatglproses").DataTable({
			bDestroy: true,
			responsive: true,
			processing: true,
			dom: "<'row'<'col-sm-12 col-md-6'><'col-sm-12 col-md-6'>>" +
				"<'row'<'col-sm-12't>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
			columnDefs: [{
					targets: -1,
					data: null,
					defaultContent: "<a id='trxnrc' class='btn btn-primary waves-effect btn-sm'><i class='fa-solid fa-print'></i> Neraca</a> - <a id='trxrl' class='btn btn-primary waves-effect btn-sm'><i class='fa-solid fa-print'></i> LabaRugi</a>"
				},
				{
					searchPanes: {
						show: true
					},
					targets: [2, 3]
				},
				{
					searchPanes: {
						show: false
					},
					targets: [0, 1, 4]
				}
			],
			lengthMenu: [
				[30, 60, -1],
				[30, 60, "All"]
			],
			pagingType: "full_numbers"
		});
		$('#datatglproses').parent().addClass("table-responsive");

		//print 
		$("#datatglproses tbody").on("click", "#trxnrc", function(event) {
			event.preventDefault();
			var action = 'getfilter';
			var data0 = table.row($(this).parents('tr')).data();
			var tgl1 = data0[2];
			var tgl2 = data0[3];

			$.ajax({
				method: "POST",
				url: "glneraca_detail1.php",
				data: {
					action: action,
					tgl1: tgl1,
					tgl2: tgl2
				},
				cache: true,
				success: function(data) {
					$('#cetakjurnal').html(data);
					// Display Modal
					$('#jurnalModal').modal('show');
				}
			});
		});

		//print 
		$("#datatglproses tbody").on("click", "#trxrl", function(event) {
			event.preventDefault();
			var action = 'getfilter';
			var data0 = table.row($(this).parents('tr')).data();
			var tgl1 = data0[2];
			var tgl2 = data0[3];

			$.ajax({
				method: "POST",
				url: "gllabarugi_detail1.php",
				data: {
					action: action,
					tgl1: tgl1,
					tgl2: tgl2
				},
				cache: true,
				success: function(data) {
					$('#cetakjurnal').html(data);
					// Display Modal
					$('#jurnalModal').modal('show');
				}
			});
		});
	});
</script>