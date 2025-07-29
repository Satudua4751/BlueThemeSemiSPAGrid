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
				<th colspan="2" width="3%" class="text-sm-center">Saldo Bulan <?php echo $bln ?></th>
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
			</tr>
		</tfoot>
		<tbody>
			<?php

			$i = 1;
			$sql = "SELECT * FROM labarugi WHERE  (grp1 = 'G' OR grp1 = 'S' OR saldo01a != 0 OR saldo02a != 0) AND cetak1 = 'Y' ORDER BY nourut1";
			$ress = mysqli_query($conn1, $sql);
			if (json_encode($ress) != 'false') {
				while ($data = mysqli_fetch_array($ress)) {
					echo '<tr>';
					if ($data['grp1'] == 'G') {
						// echo '<td class="text-start bg-gray-300">' . $data['grp1'] . '</td>';
						// echo '<td class="text-start bg-gray-300">' . $data['nourut1'] . '</td>';
						// echo '<td class="text-start bg-gray-300">' . $data['sumber1'] . '</td>';
						// echo '<td class="text-start bg-gray-300">' . $data['norek1'] . '</td>';
						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng1'] . '</td>';
						echo '<td class="text-start font-weight-bolder bg-gray-300"></td>';
						echo '<td class="text-start font-weight-bolder bg-gray-300"></td>';
					} elseif ($data['grp1'] == 'S') {
						// echo '<td class="text-start bg-gray-500">' . $data['grp1'] . '</td>';
						// echo '<td class="text-start bg-gray-500">' . $data['nourut1'] . '</td>';
						// echo '<td class="text-start bg-gray-500">' . $data['sumber1'] . '</td>';
						// echo '<td class="text-start bg-gray-500">' . $data['norek1'] . '</td>';
						echo '<td class="text-start font-weight-bolder bg-gray-500">' . $data['keterng1'] . '</td>';
						echo '<td class="text-end font-weight-bolder bg-gray-500"></td>';
						echo '<td class="text-end font-weight-bolder bg-gray-500">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';
					} else {
						// echo '<td class="text-start">' . $data['grp1'] . '</td>';
						// echo '<td class="text-start">' . $data['nourut1'] . '</td>';
						// echo '<td class="text-start">' . $data['sumber1'] . '</td>';
						// echo '<td class="text-start">' . $data['norek1'] . '</td>';
						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng1'] . '</td>';
						if (($data['saldo01a'] < 0)) {
							echo '<td class="text-end text-danger">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';
						} else {
							echo '<td class="text-end">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';
						}
						echo '<td class="text-end font-weight-bolder text-success"></td>';
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

<script type="text/javascript">

</script>