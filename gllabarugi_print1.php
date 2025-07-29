<h3 class="font-weight-bold text-info text-sm-center text-uppercase">LabaRugi <?php echo format_tanggal2($bln3); ?></h3>
</br>
<div class="container-fluid">
	<table id="datajurnal" class="table-bordered table-hover" width="100%">
		<thead class="bg-info">
			<tr>
				<!--<th width="1%">Grup</th>
				<th width="1%">No.Urut</th>
				<th width="1%">S</th>
				<th width="2%">Kode Jurnal</th>-->
				<th width="10%">Nama Jurnal</th>
				<th colspan="2" width="2%" class="text-sm-center">Up/Down</th>
				<th width="3%" class="text-sm-center">Saldo Bulan <?php echo $bln ?></th>
				<th width="3%" class="text-sm-center">Saldo Bulan <?php echo $bln1 ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<!--<td></td>
				<td></td>
				<td></td>
				<td></td>-->
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tfoot>
		<tbody>
			<?php

			$i = 1;
			$sql = "SELECT * FROM labarugi WHERE  grp1 = 'G' OR grp1 = 'S' OR saldo01a != 0 OR saldo02a != 0 ORDER BY nourut1";
			$ress = mysqli_query($conn1, $sql);
			if (json_encode($ress) != 'false') {
				while ($data = mysqli_fetch_array($ress)) {
					$selisih = $data['saldo02a'] - $data['saldo01a'];
					$xnorek1 = $data['norek1'];
					$naik = 0;
					echo '<tr>';
					if ($data['grp1'] == 'G') {
						// echo '<td class="text-start bg-gray-300">' . $data['grp1'] . '</td>';
						// echo '<td class="text-start bg-gray-300">' . $data['nourut1'] . '</td>';
						// echo '<td class="text-start bg-gray-300">' . $data['sumber1'] . '</td>';
						// echo '<td class="text-start bg-gray-300">' . $data['norek1'] . '</td>';
						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng1'] . '</td>';
						echo '<td class="text-start font-weight-bolder bg-gray-300"></td>';
						echo '<td class="text-start font-weight-bolder bg-gray-300"></td>';
						echo '<td class="text-end font-weight-bolder bg-gray-300"></td>';
						echo '<td class="text-end font-weight-bolder bg-gray-300"></td>';
					} elseif ($data['grp1'] == 'S') {
						// echo '<td class="text-start bg-gray-500">' . $data['grp1'] . '</td>';
						// echo '<td class="text-start bg-gray-500">' . $data['nourut1'] . '</td>';
						// echo '<td class="text-start bg-gray-500">' . $data['sumber1'] . '</td>';
						// echo '<td class="text-start bg-gray-500">' . $data['norek1'] . '</td>';
						echo '<td class="text-start font-weight-bolder bg-gray-500">' . $data['keterng1'] . '</td>';
						if ($data['saldo01a'] == 0 or $data['saldo02a'] == 0) {
							$nktrn = 0;
							echo '<td class="text-end font-weight-bolder bg-gray-500"></td>';
							echo '<td class="text-end font-weight-bolder bg-gray-500"></td>';
						} else {
							if ($selisih < 0) {
								// naik
								$naik = 1;
								$nktrn = abs(($selisih / $data['saldo01a'])) * 100;
								echo '<td class="text-end font-weight-bolder bg-gray-500 text-success"><i class="fa-solid fa-arrow-up"></i></td>';
								echo '<td class="text-end font-weight-bolder bg-gray-500 text-success">' . fNumber($nktrn, 2, '.', ',') . '</td>';
							} else {
								//turun
								$naik = 0;
								$nktrn = abs(($selisih / $data['saldo01a'])) * 100;
								echo '<td class="text-end font-weight-bolder bg-gray-500 text-danger"><i class="fa-solid fa-arrow-down"></td>';
								echo '<td class="text-end font-weight-bolder bg-gray-500 text-danger">' . fNumber($nktrn, 2, '.', ',') . '</td>';
							}
						}
						echo '<td class="text-end font-weight-bolder bg-gray-500">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';
						echo '<td class="text-end font-weight-bolder bg-gray-500">' . fNumber($data['saldo02a'], 2, '.', ',') . '</td>';
					} else {
						// echo '<td class="text-start">' . $data['grp1'] . '</td>';
						// echo '<td class="text-start">' . $data['nourut1'] . '</td>';
						// echo '<td class="text-start">' . $data['sumber1'] . '</td>';
						// echo '<td class="text-start">' . $data['norek1'] . '</td>';
						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng1'] . '</td>';
						if ($data['saldo01a'] == 0 or $data['saldo02a'] == 0) {
							$nktrn = 0;
							echo '<td class="text-end font-weight-bolder text-success"></td>';
							echo '<td class="text-end font-weight-bolder text-success"></td>';
						} else {
							if ($selisih < 0) {
								// naik
								$naik = 1;
								$nktrn = abs(($selisih / $data['saldo01a'])) * 100;
								echo '<td class="text-end font-weight-bolder text-success"><i class="fa-solid fa-arrow-up"></i></td>';
								echo '<td class="text-end font-weight-bolder text-success">' . fNumber($nktrn, 2, '.', ',') . '</td>';
							} else {
								//turun
								$naik = 0;
								$nktrn = abs(($selisih / $data['saldo01a'])) * 100;
								echo '<td class="text-end font-weight-bolder text-danger"><i class="fa-solid fa-arrow-down"></i></td>';
								echo '<td class="text-end font-weight-bolder text-danger">' . fNumber($nktrn, 2, '.', ',') . '</td>';
							}
						}

						// SALDO 01A
						$saldo1 = $data['saldo01a'];
						$formatted1 = fNumber($saldo1, 2, '.', ',');
						$class1 = 'text-end' . ($saldo1 < 0 ? ' text-danger' : '');
						$color1 = ($saldo1 < 0) ? '#f00' : '#000';
						echo '<td class="' . $class1 . '"><a href="javascript:void(0);" class="viewjurnal" data-id="' . urlencode($xnorek1) . $bln . $thn . '" style="text-decoration:none;color:' . $color1 . ';">' . $formatted1 . '</a></td>';

						// SALDO 02A
						$saldo2 = $data['saldo02a'];
						$formatted2 = fNumber($saldo2, 2, '.', ',');
						$class2 = 'text-end' . ($saldo2 < 0 ? ' text-danger' : '');
						$color2 = ($saldo2 < 0) ? '#f00' : '#000';
						echo '<td class="' . $class2 . '"><a href="javascript:void(0);" class="viewjurnal" data-id="' . urlencode($xnorek1) . $bln1 . $thn . '" style="text-decoration:none;color:' . $color2 . ';">' . $formatted2 . '</a></td>';
					}
					echo '</tr>';
					$i++;
				}
			}
			?>
		</tbody>
	</table>
	<br />
</div>

<?php include("layout_delete.php"); ?>

<script type="text/javascript">
	$("#datajurnal tbody").on("click", ".viewjurnal", function() {
		var action = 'getfilter';
		var norek = $(this).attr('data-id');
		//alert(norek);
		$.ajax({
			method: "POST",
			url: "gllabarugi_print1_det.php",
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
</script>