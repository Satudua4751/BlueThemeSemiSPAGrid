<div class="container-fluid">
	<div style="overflow-x: auto;  white-space: nowrap;">
		<table id="detcoa" class="table table-bordered table-hover stripe" cellspacing="0">
			<thead style="background-color:royalblue;color:white">
				<tr>
					<th width="1%" class="text-center">No</th>
					<th width="2%" class="text-center">Kode</th>
					<th width="8%" class="text-center">Nama Jurnal</th>
					<th width="4%" class="text-center">No.Jurnal</th>
					<th width="3%" class="text-center">Tanggal</th>
					<th width="4%" class="text-center">Saldo Awal</th>
					<th width="4%" class="text-center">Debet</th>
					<th width="4%" class="text-center">Kredit</th>
					<th width="4%" class="text-center">Saldo Akhir</th>
					<th width="20%" class="text-center">Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//echo 'Tahun Detail ' . $xnorek . ' - ' . $bln . ' - ' . $thn;
				$i = 1;
				$sql = "SELECT * FROM glmas where norek = '" . $xnorek . "' ORDER BY norek ASC";
				$ress = mysqli_query($conn1, $sql);
				$slda = $debet = $kredit = 0;
				while ($data = mysqli_fetch_array($ress)) {
					$slda = $data['saldo' . $bln];
					$tprek = $data['tprek'];
					echo '<tr>';
					echo '<td class="text-center">' . $i . '</td>';
					echo '<td class="text-start">' . $data['norek'] . '</td>';
					echo '<td class="text-start">' . $data['nmrek'] . '</td>';
					echo '<td class="text-start"></td>';
					echo '<td class="text-start"></td>';
					echo '<td class="text-end">' . number_format($slda, 2) . '</td>';
					echo '<td class="text-start"></td>';
					echo '<td class="text-start"></td>';
					echo '<td class="text-end">' . number_format($slda, 2) . '</td>';
					echo '<td class="text-start">Saldo Awal</td>';
					echo '</tr>';
					$sql =  "SELECT gltran1.keterng1, gltran2.* FROM gltran1, gltran2 WHERE gltran1.notran = gltran2.notran AND gltran2.norek = '" . $data['norek'] . "' AND gltran1.tanggal LIKE '%" . $thn . '-' . $bln . "%' ORDER BY gltran2.norek,gltran1.tanggal ASC";
					$query = mysqli_query($conn1, $sql);
					while ($result = mysqli_fetch_array($query)) {
						$i++;
						echo '<tr>';
						echo '<td class="text-center">' . $i . '</td>';
						echo '<td class="text-start">' . $result['norek'] . '</td>';
						echo '<td class="text-start">' . $result['nmrek'] . '</td>';
						echo '<td class="text-start">' . $result['notran'] . '</td>';
						echo '<td class="text-start">' . $result['tanggal'] . '</td>';
						echo '<td class="text-end">' . number_format($slda, 2) . '</td>';
						if ($tprek == 'D') {
							if ($result['tptran'] == 'D') {
								echo '<td class="text-end">' . number_format($result['jumlahgl'], 2) . '</td>';
								echo '<td class="text-end"></td>';
								$slda += $result['jumlahgl'];
								$debet += $result['jumlahgl'];
								echo '<td class="text-end">' . number_format($slda, 2) . '</td>';
							} else {
								echo '<td class="text-end"></td>';
								echo '<td class="text-end">' . number_format($result['jumlahgl'], 2) . '</td>';
								$slda -= $result['jumlahgl'];
								$kredit += $result['jumlahgl'];
								echo '<td class="text-end">' . number_format($slda, 2) . '</td>';
							}
							echo '<td class="text-start">' . $result['keterng'] . $result['keterng1'] . '</td>';
						} else {
							if ($result['tptran'] == 'D') {
								echo '<td class="text-end">' . number_format($result['jumlahgl'], 2) . '</td>';
								echo '<td class="text-end"></td>';
								$slda -= $result['jumlahgl'];
								$debet += $result['jumlahgl'];
								echo '<td class="text-end">' . number_format($slda, 2) . '</td>';
							} else {
								echo '<td class="text-end"></td>';
								echo '<td class="text-end">' . number_format($result['jumlahgl'], 2) . '</td>';
								$slda += $result['jumlahgl'];
								$kredit += $result['jumlahgl'];
								echo '<td class="text-end">' . number_format($slda, 2) . '</td>';
							}
							echo '<td class="text-start">' . $result['keterng'] . $result['keterng1'] . '</td>';
						}

						echo '</tr>';
					}
					$i++;
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<td class="text-start"></td>
					<td class="text-start"></td>
					<td class="text-start"></td>
					<td class="text-start"></td>
					<td class="text-start"></td>
					<td class="text-start"></td>
					<td class="text-end text-info font-weight-bold"> <?php echo number_format($debet, 2); ?></td>
					<td class="text-end text-info font-weight-bold"> <?php echo number_format($kredit, 2); ?></td>
					<td class="text-start"></td>
					<td class="text-start"></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

