<?php
//this command prevent show error on html page
error_reporting(E_ERROR | E_PARSE);
include("koneksi.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");

if (isset($_POST["action"])) {
	$bln = mysqli_real_escape_string($conn1, $_POST['bln']);
	$thn = mysqli_real_escape_string($conn1, $_POST['thn']);
} else {
	$bln = '01';
	$thn = mysqli_real_escape_string($conn1, $_POST['thn']);
}

$blnnow = date('m');
//echo "Now " . $blnnow . ' vs Pilihan ' . $bln;
$sqlgl = "SELECT glmas$thn.norek,glmas$thn.nmrek,glmas$thn.tprek,glmas$thn.grrek,glmas$thn.saldo$bln,glmas$thn.debet$bln,glmas$thn.kredit$bln,glmas$thn.debt$bln,glmas$thn.kred$bln,glmas$thn.amount$bln FROM glmas$thn ORDER BY glmas$thn.norek ASC";
?>
<input type="hidden" name="thn" id="thn" value="<?php echo $thn; ?>">
<table id="datajurnal" class="table-striped table-bordered table-hover" width="100%">
	<thead class="bg-cyan-400 font-weight-bold" style="height: 40px;">
		<tr>
			<th width="1%">No</th>
			<th width="3%">Kode Jurnal</th>
			<th width="10%">Nama Jurnal</th>
			<th width="1%">D/K</th>
			<th width="1%">Grp</th>
			<th width="4%">Saldo Awal</th>
			<th width="4%">Debet</th>
			<th width="4%">Kredit</th>
			<th width="4%">Debet-1</th>
			<th width="4%">Kredit-1</th>
			<th width="4%">Saldo Akhir</th>
			<th width="4%">Laba</th>
			<th width="2%">Nol/Tidak</th>
			<th width="4%">Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		$akhirD = $akhirKD = 0;
		$nilaiZ = '';
		$ressgl = mysqli_query($conn1, $sqlgl);
		while ($data = mysqli_fetch_array($ressgl)) {
			echo '<tr>';
			echo '<td class="text-center">' . $i . '</td>';
			echo '<td class="text-start">' . $data['norek'] . '</td>';
			echo '<td class="text-start">' . $data['nmrek'] . '</td>';
			echo '<td class="text-start">' . $data['tprek'] . '</td>';
			echo '<td class="text-start">' . $data['grrek'] . '</td>';
			$sldx = $data['saldo' . $bln] + $data['debet' . $bln] + $data['debt' . $bln] + $data['kredit' . $bln] + $data['kred' . $bln] + $data['amount' . $bln];
			if ($blnnow != $bln) {
				echo '<td class="text-end">' . number_format($data['saldo' . $bln], 2) . '</td>';
				if (($data['tprek'] == 'D')) {
					echo '<td class="text-end">' . number_format($data['debet' . $bln], 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['kredit' . $bln], 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['debt' . $bln], 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['kred' . $bln], 2) . '</td>';
					$akhirD = $data['saldo' . $bln] + $data['debet' . $bln] + $data['debt' . $bln] - $data['kredit' . $bln] - $data['kred' . $bln];
					echo '<td class="text-end">' . number_format($akhirD, 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['amount' . $bln], 2) . '</td>';
					if (($sldx == '0')) {
						$nilaiZ = 'Nol';
						echo '<td class="text-end">' . $nilaiZ . '</td>';
					} else {
						$nilaiZ = 'Tidak';
						echo '<td class="text-end">' . $nilaiZ . '</td>';
					}
				} else {
					echo '<td class="text-end">' . number_format($data['debet' . $bln], 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['kredit' . $bln], 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['debt' . $bln], 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['kred' . $bln], 2) . '</td>';
					$akhirK = $data['saldo' . $bln] - $data['debet' . $bln] - $data['debt' . $bln] + $data['kredit' . $bln] + $data['kred' . $bln];
					echo '<td class="text-end">' . number_format($akhirK, 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['amount' . $bln], 2) . '</td>';
					if (($sldx == '0')) {
						$nilaiZ = 'Nol';
						echo '<td class="text-end">' . $nilaiZ . '</td>';
					} else {
						$nilaiZ = 'Tidak';
						echo '<td class="text-end">' . $nilaiZ . '</td>';
					}
				}
			} else {
				echo '<td class="text-end">' . number_format($data['saldo' . $blnnow], 2) . '</td>';
				$sqlgltrx = " SELECT SUM(CASE WHEN tptran = 'D' THEN jumlahgl ELSE 0 END) AS debet,
				SUM(CASE WHEN gltran2.tptran = 'K' THEN gltran2.jumlahgl ELSE 0 END) AS kredit 
				FROM  gltran2  WHERE tanggal LIKE '%" . $thn . '-' . $blnnow . "%'  AND norek = '" . $data['norek'] . "' GROUP BY norek LIMIT 1";
				$ressgltrx = mysqli_query($conn1, $sqlgltrx);
				$datagltrx = mysqli_fetch_array($ressgltrx);
				$sldx1 = $data['saldo' . $bln] + $datagltrx['debet'] + $datagltrx['kredit'] + $data['debt' . $bln] +  $data['kred' . $bln] + $data['amount' . $bln];
				if (($data['tprek'] == 'D')) {
					echo '<td class="text-end">' . number_format($datagltrx['debet'], 2) . '</td>';
					echo '<td class="text-end">' . number_format($datagltrx['kredit'], 2) . '</td>';
					echo '<td class="text-end">' . number_format(0, 2) . '</td>';
					echo '<td class="text-end">' . number_format(0, 2) . '</td>';
					$akhirD = $data['saldo' . $bln] + $datagltrx['debet'] - $datagltrx['kredit'];
					echo '<td class="text-end">' . number_format($akhirD, 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['amount' . $bln], 2) . '</td>';
					if (($sldx1 == '0')) {
						$nilaiZ = 'Nol';
						echo '<td class="text-end">' . $nilaiZ . '</td>';
					} else {
						$nilaiZ = 'Tidak';
						echo '<td class="text-end">' . $nilaiZ . '</td>';
					}
				} else {
					echo '<td class="text-end">' . number_format($datagltrx['debet'], 2) . '</td>';
					echo '<td class="text-end">' . number_format($datagltrx['kredit'], 2) . '</td>';
					echo '<td class="text-end">' . number_format(0, 2) . '</td>';
					echo '<td class="text-end">' . number_format(0, 2) . '</td>';
					$akhirK = $data['saldo' . $bln] - $datagltrx['debet'] + $datagltrx['kredit'];
					echo '<td class="text-end">' . number_format($akhirK, 2) . '</td>';
					echo '<td class="text-end">' . number_format($data['amount' . $bln], 2) . '</td>';
					if (($sldx1 == '0')) {
						$nilaiZ = 'Nol';
						echo '<td class="text-end">' . $nilaiZ . '</td>';
					} else {
						$nilaiZ = 'Tidak';
						echo '<td class="text-end">' . $nilaiZ . '</td>';
					}
				}
			}
		?>
			<td>
				<button id="viewjurnal" data-id="<?php echo $data['norek'] . $bln . $thn; ?>" class="btn btn-primary waves-effect btn-sm"><i class="leading-icon fa-solid fa-print"></i></button>
				<button id="editjurnal" data-id="<?php echo $data['norek'] . $bln . $thn; ?>" class="btn btn-success waves-effect btn-sm"><i class="leading-icon fa fa-pen"></i></button>
				<button id="deletejurnal" data-id="<?php echo $data['norek'] . $bln . $thn; ?>" class="btn btn-danger waves-effect btn-sm"><i class="leading-icon fa fa-trash"></i></button>
			</td>
		<?php echo '</td>';
			echo '</tr>';
			$i++;
		}
		?>
	</tbody>
</table>

<?php include("layout_modal.php"); ?>

<script>
	$(document).ready(function() {
		var table = $("#datajurnal").DataTable({
			searching: true,
			bDestroy: true,
			responsive: true,
			processing: true,
			columnDefs: [{
					searchPanes: {
						show: true
					},
					targets: [1, 2, 3, 4, 12]
				},
				{
					searchPanes: {
						show: false
					},
					targets: [0, 5, 6, 7, 8, 9, 10, 11]
				}
			],
			dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
				"<'row'<'col-sm-12't>>" +
				"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
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
				[30, 60, -1],
				[30, 60, "All"]
			],
			pagingType: "full_numbers"
		});

		//print 
		$("#datajurnal tbody").on("click", "#viewjurnal", function() {
			var action = 'getfilter';
			var data0 = table.row($(this).parents('tr')).data();
			var norek = $(this).attr('data-id');

			$.ajax({
				method: "POST",
				url: "glcoa01_detail.php",
				data: {
					action: action,
					norek: norek
				},
				success: function(data) {
					$('#cetakjurnal').html(data);
					// Display Modal
					$('#jurnalModal').modal('show');
				}
			});
		});

		$('#datajurnal').parent().addClass("table-responsive");
	});
</script>