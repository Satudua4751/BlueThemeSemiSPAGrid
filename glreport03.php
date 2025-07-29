<div class="row">
	<div class="col">
		<div class="card shadow-lg1 border-1 rounded-lg mt-5 border-left-secondary">
			<div class="card-header">
				<h3 class="text-left font-weight-bold text-info text-shadow1">Gl Report Jurnal Pajak</h3>
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
						include("sess_check.php");
						include("function/format_tanggal.php");
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

<!-- Large modal -->
<div class="modal fade" id="jurnalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="jurnalModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content shadow-lg1">
			<div class="modal-header bg-gray-200">
				<h5 class="modal-title text-xm font-weight-bold text-info text-uppercase text text-shadow1" id="jurnalModalLabel"></h5>
				<button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">x</button>
			</div>
			<div class="modal-body">
				<div id="cetakjurnal"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $("#datatglproses").DataTable({
			bDestroy: true,
			responsive: true,
			processing: true,
			dom: "<'row'P<'col-sm-12 col-md-6'><'col-sm-12 col-md-6'>>" +
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
				[30, 60,  -1],
				[30, 60,  "All"]
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
				url: "glneraca_detail3.php",
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
				url: "gllabarugi_detail3.php",
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