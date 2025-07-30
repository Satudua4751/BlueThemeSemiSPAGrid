<?php
//this command prevent show error on html page
error_reporting(E_ERROR | E_PARSE);
include("koneksi.php");
include("function/format_rupiah.php");

if (isset($_POST["action"])) {
	$bln = mysqli_real_escape_string($conn1, $_POST['bln']);
	$thn = mysqli_real_escape_string($conn1, $_POST['thn']);
} else {
	$bln = '01';
}
$sqlgl = "SELECT * FROM glmas$thn WHERE (saldo$bln) != 0 OR (debet$bln) != 0 OR (kredit$bln) != 0 OR (debt$bln) != 0 OR (kred$bln) != 0 ";
$sqlgl .= " ORDER BY norek ASC";
$resgl = mysqli_query($conn1, $sqlgl);
$blnnow = date('m');
$thn = date('Y');

?>

<table id="datapercobaan1" class="table-bordered table-hover" width="100%">
	<thead class="bg-cyan-300">
		<tr>
			<th rowspan="2" class="text-center">Kode</th>
			<th rowspan="2" class="text-center">Keterangan</th>
			<th rowspan="2" class="text-center">Grp</th>
			<th rowspan="2" class="text-center">D/K</th>
			<th colspan="2" class="text-center">Saldo Awal</th>
			<th colspan="2" class="text-center">Mutasi</th>
			<th colspan="2" class="text-center">Penutup</th>
			<th colspan="2" class="text-center">Saldo Akhir</th>
		</tr>
		<tr>
			<th class="text-center" width="8%">Debet</th>
			<th class="text-center" width="8%">Kredit</th>
			<th class="text-center" width="8%">Debet</th>
			<th class="text-center" width="8%">Kredit</th>
			<th class="text-center" width="8%">Debet</th>
			<th class="text-center" width="8%">Kredit</th>
			<th class="text-center" width="8%">Debet</th>
			<th class="text-center" width="8%">Kredit</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		while ($data = mysqli_fetch_array($resgl)) {
			echo '<tr>';
			echo '<td class="text-start">' . $data['norek'] . '</td>';
			$color1 = 'inherit';
			echo '<td class="text-start"><a href="javascript:void(0);" class="viewjurnal hover-2 inner-wrapper" data-id="' . urlencode($data['norek']) . $bln . $thn . '" style="text-decoration:none;color:' . $color1 . ';">' . $data['nmrek'] . '</a></td>';
			if ($data['grrek'] == '1') {
				echo '<td class="text-start">Aset</td>';
			} elseif ($data['grrek'] == '2') {
				echo '<td class="text-start">Hutang</td>';
			} elseif ($data['grrek'] == '3') {
				echo '<td class="text-start">Modal</td>';
			} elseif ($data['grrek'] == '4') {
				echo '<td class="text-start">Pendapatan</td>';
			} elseif ($data['grrek'] == '5') {
				echo '<td class="text-start">Biaya</td>';
			}

			echo '<td class="text-start">' . $data['tprek'] . '</td>';
			if ($data['tprek'] == 'D') {
				echo '<td class="text-end">' . number_format($data['saldo' . $bln], 2, '.', ',') . '</td>';
				echo '<td class="text-end">' . number_format(0, 2, '.', ',') . '</td>';
				$tdebetawal += $data['saldo' . $bln];
			} else {
				echo '<td class="text-end">' . number_format(0, 2, '.', ',') . '</td>';
				echo '<td class="text-end">' . number_format($data['saldo' . $bln], 2, '.', ',') . '</td>';
				$tkreditawal += $data['saldo' . $bln];
			}
			echo '<td class="text-end">' . number_format($data['debet' . $bln], 2, '.', ',') . '</td>';
			echo '<td class="text-end">' . number_format($data['kredit' . $bln], 2, '.', ',') . '</td>';
			echo '<td class="text-end">' . number_format($data['debt' . $bln], 2, '.', ',') . '</td>';
			echo '<td class="text-end">' . number_format($data['kred' . $bln], 2, '.', ',') . '</td>';
			if ($data['tprek'] == 'D') {
				$sdebetakhir = ($data['saldo' . $bln] + $data['debet' . $bln] + $data['debt' . $bln] - $data['kredit' . $bln] - $data['kred' . $bln]);
				echo '<td class="text-end">' . number_format($sdebetakhir, 2, '.', ',') . '</td>';
				echo '<td class="text-end">' . number_format(0, 2, '.', ',') . '</td>';
				$debetakhir1 += ($data['saldo' . $bln] + $data['debet' . $bln] + $data['debt' . $bln] - $data['kredit' . $bln] - $data['kred' . $bln]);
			} else {
				$skreditakhir = ($data['saldo' . $bln] - $data['debet' . $bln] - $data['debt' . $bln] + $data['kredit' . $bln] + $data['kred' . $bln]);
				echo '<td class="text-end">' . number_format(0, 2, '.', ',') . '</td>';
				echo '<td class="text-end">' . number_format($skreditakhir, 2, '.', ',') . '</td>';
				$kreditakhir1 += ($data['saldo' . $bln] - $data['debet' . $bln] - $data['debt' . $bln] + $data['kredit' . $bln] + $data['kred' . $bln]);
			}
			echo '</tr>';
			$i++;
			$debet += $data['debet' . $bln];
			$kredit += $data['kredit' . $bln];
			$debt += $data['debt' . $bln];
			$kred += $data['kred' . $bln];
		}
		?>
	</tbody>
	<tfoot class="bg-orange-300">
		<tr>
			<td class="text-center font-weight-bolder" colspan="4">Page</td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
		</tr>
		<tr>
			<td class="text-center font-weight-bolder" colspan="4">Total</td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
			<td class="text-end font-weight-bolder"></td>
		</tr>
	</tfoot>
</table>

<?php include("layout_modal.php"); ?>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $("#datapercobaan1").DataTable({
			bDestroy: true,
			ordering: false,
			responsive: true,
			processing: true,
			dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12't>>" +
				"<'row'<'col-sm-12 col-md-5 mt-2'i><'col-md-7'p>>",
			buttons: [{
					extend: 'excel',
					text: '<i class="fa fa-file-excel"></i> ',
					titleAttr: 'Export To Excel',
					className: 'btn btn-success waves-effect',
					exportOptions: {
						modifier: {
							page: 'current'
						}
					}
				},
				{
					extend: 'pageLength',
					text: '<i class="fa fa-book-open"></i> ',
					className: 'btn btn-secondary waves-effect'
				}
			],
			lengthMenu: [
				[12, 30, 60, -1],
				[12, 30, 60, "All"]
			],
			pagingType: "full_numbers",
			footerCallback: function(row, data, start, end, display) {
				var api = this.api(),
					data;

				// Remove the formatting to get integer data for summation
				var intVal = function(i) {
					return typeof i === 'string' ?
						i.replace(/[\$,]/g, '') * 1 :
						typeof i === 'number' ?
						i : 0;
				};

				// Total over all pages

				allPages1 = api
					.column(4).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					});
				allPages2 = api
					.column(5).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					});
				allPages3 = api
					.column(6).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					});
				allPages4 = api
					.column(7).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					});
				allPages5 = api
					.column(8).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					});
				allPages6 = api
					.column(9).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					});
				allPages7 = api
					.column(10).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					});
				allPages8 = api
					.column(11).data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					});


				// Total1 over this page

				pageTotal1 = api
					.column(4, {
						page: 'current'
					})
					.data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);
				pageTotal2 = api
					.column(5, {
						page: 'current'
					})
					.data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);
				pageTotal3 = api
					.column(6, {
						page: 'current'
					})
					.data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);
				pageTotal4 = api
					.column(7, {
						page: 'current'
					})
					.data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);
				pageTotal5 = api
					.column(8, {
						page: 'current'
					})
					.data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);
				pageTotal6 = api
					.column(9, {
						page: 'current'
					})
					.data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);
				pageTotal7 = api
					.column(10, {
						page: 'current'
					})
					.data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);
				pageTotal8 = api
					.column(11, {
						page: 'current'
					})
					.data().reduce(function(a, b) {
						return intVal(a) + intVal(b);
					}, 0);



				// Update footer
				var numFormat = $.fn.dataTable.render.number('\,', '.', 2, '').display;
				$('tr:eq(0) td:eq(1)', api.table().footer()).html(numFormat(pageTotal1));
				$('tr:eq(0) td:eq(2)', api.table().footer()).html(numFormat(pageTotal2));
				$('tr:eq(0) td:eq(3)', api.table().footer()).html(numFormat(pageTotal3));
				$('tr:eq(0) td:eq(4)', api.table().footer()).html(numFormat(pageTotal4));
				$('tr:eq(0) td:eq(5)', api.table().footer()).html(numFormat(pageTotal5));
				$('tr:eq(0) td:eq(6)', api.table().footer()).html(numFormat(pageTotal6));
				$('tr:eq(0) td:eq(7)', api.table().footer()).html(numFormat(pageTotal7));
				$('tr:eq(0) td:eq(8)', api.table().footer()).html(numFormat(pageTotal8));


				$('tr:eq(1) td:eq(1)', api.table().footer()).html(numFormat(allPages1));
				$('tr:eq(1) td:eq(2)', api.table().footer()).html(numFormat(allPages2));
				$('tr:eq(1) td:eq(3)', api.table().footer()).html(numFormat(allPages3));
				$('tr:eq(1) td:eq(4)', api.table().footer()).html(numFormat(allPages4));
				$('tr:eq(1) td:eq(5)', api.table().footer()).html(numFormat(allPages5));
				$('tr:eq(1) td:eq(6)', api.table().footer()).html(numFormat(allPages6));
				$('tr:eq(1) td:eq(7)', api.table().footer()).html(numFormat(allPages7));
				$('tr:eq(1) td:eq(8)', api.table().footer()).html(numFormat(allPages8));
			}
		});

		$("#datapercobaan1 tbody").on("click", ".viewjurnal", function() {
			var action = 'getfilter';
			var norek = $(this).attr('data-id');
			//alert(norek);
			$.ajax({
				method: "POST",
				url: "glprint_det.php",
				data: {
					action: action,
					norek: norek
				},
				success: function(data) {
					$('#cetakjurnal1').html(data);
					// Display Modal
					$('#jurnalModal1').modal('show');
				}
			});
		});

		$('#datapercobaan1').parent().addClass("table-responsive");
	});
</script>