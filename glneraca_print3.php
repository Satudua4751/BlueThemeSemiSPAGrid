<h3 class="font-weight-bold text-info text-sm-center text-uppercase">Neraca <?php echo format_tanggal2($bln3); ?></h3>
</br>
<div class="container-fluid">
	<table id="datajurnal" class="table-bordered table-hover" width="100%">
		<thead class="bg-info" style="height:50px;">
			<tr>
				<th width="10%" class="text-sm-center">Nama Jurnal</th>
				<th width="3%" class="text-sm-center">Saldo Bulan <?php echo $bln ?></th>
				<th width="10%" class="text-sm-center">Nama Jurnal</th>
				<th width="3%" class="text-sm-center">Saldo Bulan <?php echo $bln ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tfoot>
		<tbody>

			<?php
			$i = 1;
			$sql = "SELECT * FROM neraca1 ORDER BY nourut1";
			$ress = mysqli_query($conn1, $sql);
			if (json_encode($ress) != 'false') {
				while ($data = mysqli_fetch_array($ress)) {
					echo '<tr>';

					if ($data['grp1'] == 'G' and $data['grp2'] == 'G') {
						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng1'] . '</td>';
						echo '<td class="text-end bg-gray-300"></td>';

						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng2'] . '</td>';
						echo '<td class="text-end bg-gray-300"></td>';
					}

					if ($data['grp1'] == 'G' and $data['grp2'] == 'T') {
						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng1'] . '</td>';
						echo '<td class="text-end bg-gray-300"></td>';

						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng2'] . '</td>';
						echo '<td class="text-end font-weight-bolder bg-gray-300">' . fNumber($data['saldo01b'], 2, '.', ',') . '</td>';
					}

					if ($data['grp1'] == 'H' and $data['grp2'] == 'G') {
						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng1'] . '</td>';
						echo '<td class="text-end">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';

						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng2'] . '</td>';
						echo '<td class="text-end bg-gray-300"></td>';
					}

					if ($data['grp1'] == 'H' and $data['grp2'] == 'T') {
						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng1'] . '</td>';
						echo '<td class="text-end">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';

						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng2'] . '</td>';
						echo '<td class="text-end font-weight-bolder bg-gray-300">' . fNumber($data['saldo01b'], 2, '.', ',') . '</td>';
					}

					if ($data['grp1'] == 'H' and $data['grp2'] == 'N') {
						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng1'] . '</td>';
						echo '<td class="text-end">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';

						echo '<td class="text-end"></td>';
						echo '<td class="text-end"></td>';
					}

					if ($data['grp1'] == 'H' and $data['grp2'] == 'H') {
						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng1'] . '</td>';
						echo '<td class="text-end">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';

						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng2'] . '</td>';
						echo '<td class="text-end">' . fNumber($data['saldo01b'], 2, '.', ',') . '</td>';
					}

					if ($data['grp1'] == 'T' and $data['grp2'] == 'H') {
						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng1'] . '</td>';
						echo '<td class="text-end font-weight-bolder bg-gray-300">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';

						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng2'] . '</td>';
						echo '<td class="text-end">' . fNumber($data['saldo01b'], 2, '.', ',') . '</td>';
					}

					if ($data['grp1'] == 'T' and $data['grp2'] == 'N') {
						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng1'] . '</td>';
						echo '<td class="text-end font-weight-bolder bg-gray-300">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';

						echo '<td class="text-end"></td>';
						echo '<td class="text-end"></td>';
					}

					if ($data['grp1'] == 'N' and $data['grp2'] == 'H') {
						echo '<td class="text-end"></td>';
						echo '<td class="text-end"></td>';

						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng2'] . '</td>';
						echo '<td class="text-end">' . fNumber($data['saldo01b'], 2, '.', ',') . '</td>';
					}

					if ($data['grp1'] == 'S' and $data['grp2'] == 'S') {
						echo '<td class="text-start font-weight-bolder bg-gray-500">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng1'] . '</td>';
						echo '<td class="text-end text-indigo font-weight-bolder bg-gray-500">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';

						echo '<td class="text-start font-weight-bolder bg-gray-500">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng2'] . '</td>';
						echo '<td class="text-end text-indigo font-weight-bolder bg-gray-500">' . fNumber($data['saldo01b'], 2, '.', ',') . '</td>';
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