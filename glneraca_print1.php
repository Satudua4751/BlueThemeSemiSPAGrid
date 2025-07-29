<h3 class="font-weight-bold text-info text-sm-center text-uppercase">Neraca <?php echo format_tanggal2($bln3); ?></h3>
</br>
<div class="container-fluid">
	<table id="datajurnal" class="table-bordered table-hover" width="100%" >
		<thead class="bg-info" style="height:50px;">
			<tr>
			    <!--<th width="1%">Kode</th>
			    <th width="1%">No.Urut</th>
			    <th width="1%">Akun</th>-->
				<th width="10%">Nama Jurnal</th>
				<th width="3%" class="text-sm-center">Saldo Bulan <?php echo $bln ?></th>
				<th width="3%" class="text-sm-center">Saldo Bulan <?php echo $bln1 ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<!--<td></td>
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
			$sql = "SELECT * FROM neraca ORDER BY nourut1";
			$ress = mysqli_query($conn1, $sql);
			//echo json_encode($ress);
			if (json_encode($ress) != 'false') {
				while ($data = mysqli_fetch_array($ress)) {
					echo '<tr>';
					if ($data['grp1'] == 'G') {
					    //echo '<td class="text-start bg-gray-300">' . $data['kode1'] . '</td>';
					    //echo '<td class="text-start bg-gray-300">' . $data['nourut1'] . '</td>';
						//echo '<td class="text-start bg-gray-300">' . $data['norek1'] . '</td>';
						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng1'] . '</td>';
						echo '<td class="text-end bg-gray-300"></td>';
						echo '<td class="text-end bg-gray-300"></td>';
					} elseif ($data['grp1'] == 'T') {
					    //echo '<td class="text-start bg-gray-300">' . $data['kode1'] . '</td>';
					    //echo '<td class="text-start bg-gray-300">' . $data['nourut1'] . '</td>';
						//echo '<td class="text-start bg-gray-300">' . $data['norek1'] . '</td>';
						echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng1'] . '</td>';
						echo '<td class="text-end font-weight-bolder bg-gray-300">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';
						echo '<td class="text-end font-weight-bolder bg-gray-300">' . fNumber($data['saldo02a'], 2, '.', ',') . '</td>';
					} elseif ($data['grp1'] == 'S') {
					    //echo '<td class="text-start bg-gray-500">' . $data['kode1'] . '</td>';
					    //echo '<td class="text-start bg-gray-500">' . $data['nourut1'] . '</td>';
						//echo '<td class="text-start bg-gray-500">' . $data['norek1'] . '</td>';
						echo '<td class="text-start font-weight-bolder bg-gray-500">' . $data['keterng1'] . '</td>';
						echo '<td class="text-end text-indigo font-weight-bolder bg-gray-500">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';
						echo '<td class="text-end text-indigo font-weight-bolder bg-gray-500">' . fNumber($data['saldo02a'], 2, '.', ',') . '</td>';
					}elseif ($data['grp1'] == 'N') {
					    //echo '<td class="text-end">-</td>';
					    //echo '<td class="text-end"></td>';
						//echo '<td class="text-end"></td>';
						echo '<td class="text-end">-</td>';
						echo '<td class="text-end"></td>';
						echo '<td class="text-end"></td>';
					} else {
					    //echo '<td class="text-start">' . $data['kode1'] . '</td>';
					    //echo '<td class="text-start">' . $data['nourut1'] . '</td>';
						//echo '<td class="text-start">' . $data['norek1'] . '</td>';
						echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng1'] . '</td>';
						echo '<td class="text-end">' . fNumber($data['saldo01a'], 2, '.', ',') . '</td>';
						echo '<td class="text-end">' . fNumber($data['saldo02a'], 2, '.', ',') . '</td>';
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