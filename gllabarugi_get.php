<?php
error_reporting(E_ERROR | E_PARSE);
include("sess_check.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");

if (isset($_POST["tgl1"])) {

    $tgl1cari = $_POST['tgl1'];
    $tgl2cari = $_POST['tgl2'];

    //*Bulan Berjalan 
    $bln = substr($tgl1cari, 5, 2);
    $thn = substr($tgl1cari, 0, 4);

    //*Bulan Sebelum 
    $bln1 = date('m', strtotime('-1 month', mktime(0, 0, 0, $bln, 1)));

    //buat variable dari gltgl untuk norek = 106.00 persediaan
    $sqlgltbl = "SELECT * FROM gltbl";
    $querybrg = mysqli_query($conn1, $sqlgltbl);
    $ressgltbl = mysqli_fetch_array($querybrg);
    $stok   = $ressgltbl['fd13']; // persediaan 106


    $sqldelnrc = "DELETE FROM labarugi";
    $qryidelnrc = mysqli_query($conn1, $sqldelnrc);

    $sqlmstgl = "SELECT * FROM mstgl WHERE kode = 'IC01' AND cetak = 'Y' ORDER BY kode, nourut";
    $qrymstgl = mysqli_query($conn1, $sqlmstgl);
    while ($resmstgl = mysqli_fetch_array($qrymstgl)) {
        $nourut1 = $resmstgl['nourut'];
        $cetak1 = $resmstgl['cetak'];
        $norek1 = $resmstgl['norek'];
        $cketr1 = $resmstgl['keterng'];
        $grp1 = $resmstgl['group1'];
        $neg1 = $resmstgl['cgroup'];
        $saldonow = $saldoold = 0;
        $sqlinsert = "INSERT INTO labarugi (nourut1,cetak1,norek1,keterng1,grp1,neg1) values ('$nourut1','$cetak1','$norek1','$cketr1','$grp1','$neg1')";
        $qryinsert = mysqli_query($conn1, $sqlinsert);
        if ($norek1 != '') {
            $sqlglmas = "SELECT * FROM glmas WHERE  norek  LIKE '%" . substr($norek1, 0, 3) . "%'";
            $resglmas = mysqli_query($conn1, $sqlglmas);
            while ($dtsglmas = mysqli_fetch_array($resglmas)) {

                if ($dtsglmas['sumber'] = 'P') {
                    $sqlupP = "UPDATE labarugi SET saldo01a = '" . ($dtsglmas['debet' . $bln] - $dtsglmas['kredit' . $bln]) . "',saldo02a = '" . ($dtsglmas['debet' . $bln1] - $dtsglmas['kredit' . $bln1]) . "' WHERE nourut ='" . $nourut1 . "' ";
                    $resupP = mysqli_query($conn1, $sqlupP);
                }

                if ($dtsglmas['sumber'] = 'S') {
                    $sqlupS = "UPDATE labarugi SET saldo01a = '" . $dtsglmas['saldo' . $bln] . "',saldo02a = '" . $dtsglmas['saldo' . $bln1] . "' WHERE norek = '" . $norek1 . "' ";
                    $resupS = mysqli_query($conn1, $sqlupS);

                    if ($norek1 == $stok){
                        $t995a = ($dtsglmas['saldo' . $bln] + $dtsglmas['debt' . $bln] - $dtsglmas['kred' . $bln]) *-1;
                        $t995b = ($dtsglmas['saldo' . $bln1]) * -1;

                        $sqlup995 = "UPDATE labarugi SET saldo01a = '" . $t995a . "',saldo02a = '" . $t995b . "' WHERE nourut = 'B995' ";
                        $resupS = mysqli_query($conn1, $sqlup995);
                        echo "kesini 995";
                    }
                }


                $tprek =  $dtsglmas['tprek'];
                if ($tprek == 'D') {
                    $saldonow = $dtsglmas['saldo' . $bln] + $dtsglmas['debet' . $bln] - $dtsglmas['kredit' . $bln] + $dtsglmas['debt' . $bln] - $dtsglmas['kred' . $bln] + $dtsglmas['amount' . $bln];
                    $saldoold = $dtsglmas['saldo' . $bln1] + $dtsglmas['debet' . $bln1] - $dtsglmas['kredit' . $bln1] + $dtsglmas['debt' . $bln1] - $dtsglmas['kred' . $bln1] + $dtsglmas['amount' . $bln1];
                } else {
                    $saldonow = $dtsglmas['saldo' . $bln] - $dtsglmas['debet' . $bln] + $dtsglmas['kredit' . $bln] - $dtsglmas['debt' . $bln] + $dtsglmas['kred' . $bln] + $dtsglmas['amount' . $bln];
                    $saldoold = $dtsglmas['saldo' . $bln1] - $dtsglmas['debet' . $bln1] + $dtsglmas['kredit' . $bln1] - $dtsglmas['debt' . $bln1] + $dtsglmas['kred' . $bln1] + $dtsglmas['amount' . $bln1];
                }
            }
        }
        $sqlupdate = "UPDATE labarugi SET saldo01a = '" . $saldonow . "', saldo02a = '" . $saldoold . "' WHERE LEFT(norek1, 3) = '" . substr($norek1, 0, 3) . "'";
        $qryupdate = mysqli_query($conn1, $sqlupdate);
    }

    // sum nourut a
    $sqlA = "SELECT sum(saldo01a) suma1a, sum(saldo02a) suma1b FROM labarugi WHERE nourut1 LIKE '%A0%'";
    $qryA = mysqli_query($conn1, $sqlA);
    $dtlA = mysqli_fetch_array($qryA);
    $saldoa1a = $dtlA['suma1a'];
    $saldoa1b = $dtlA['suma1b'];

    $sqlupA = "UPDATE labarugi SET saldo01a = '" . $saldoa1a . "',saldo02a = '" . $saldoa1b . "' WHERE nourut1 = 'A999'";
    $qryupA = mysqli_query($conn1, $sqlupA);

    // sum nourut b
    $sqlB = "SELECT sum(saldo01a) sumb1a, sum(saldo02a) sumb1b FROM labarugi WHERE nourut1 LIKE '%B%'";
    $qryB = mysqli_query($conn1, $sqlB);
    $dtlB = mysqli_fetch_array($qryB);
    $saldob1a = $dtlB['sumb1a'];
    $saldob1b = $dtlB['sumb1b'];

    // saldo akhir persediaan
    $sqlupA = "UPDATE labarugi SET saldo01a = '" . $saldob1a . "',saldo02a = '" . $saldob1b . "' WHERE nourut1 = 'B995'";
    $qryupA = mysqli_query($conn1, $sqlupA);

    // hpp
    $sqlupA = "UPDATE labarugi SET saldo01a = '" . ($saldob1a - $saldob1a) . "',saldo02a = '" . ($saldob1b - $saldob1b) . "' WHERE nourut1 = 'B997'";
    $qryupA = mysqli_query($conn1, $sqlupA);

    // laba kotor
    $sqlupA = "UPDATE labarugi SET saldo01a = '" . ($saldoa1a) . "',saldo02a = '" . ($saldoa1b) . "' WHERE nourut1 = 'B999'";
    $qryupA = mysqli_query($conn1, $sqlupA);

    // sum nourut d
    $sqlD = "SELECT sum(saldo01a) sumd1a, sum(saldo02a) sumd1b FROM labarugi WHERE nourut1 LIKE '%D%'";
    $qryD = mysqli_query($conn1, $sqlD);
    $dtlD = mysqli_fetch_array($qryD);
    $saldod1a = $dtlD['sumd1a'];
    $saldod1b = $dtlD['sumd1b'];

    $sqlupA = "UPDATE labarugi SET saldo01a = '" . $saldod1a . "',saldo02a = '" . $saldod1b . "' WHERE nourut1 = 'D999'";
    $qryupA = mysqli_query($conn1, $sqlupA);
    
    // laba bersih operasional
    $sqlupA = "UPDATE labarugi SET saldo01a = '" . ($saldoa1a - $saldod1a) . "',saldo02a = '" . ($saldoa1b - $saldod1b) . "' WHERE nourut1 = 'E999'";
    $qryupA = mysqli_query($conn1, $sqlupA);
    
    // laba bersih
    $sqlupA = "UPDATE labarugi SET saldo01a = '" . ($saldoa1a - $saldod1a) . "',saldo02a = '" . ($saldoa1b - $saldod1b) . "' WHERE nourut1 = 'K999'";
    $qryupA = mysqli_query($conn1, $sqlupA);
?>

    <table id="datajurnal" class="table-bordered table-hover" width="100%">
        <thead class="bg-info">
            <tr>
                <th width="1%">Grup</th>
                <th width="1%">No.Urut</th>
                <th width="2%">Kode Jurnal</th>
                <th width="10%">Nama Jurnal</th>
                <th width="3%" class="text-sm-center">Saldo Bulan <?php echo $bln ?></th>
                <th width="3%" class="text-sm-center">Saldo Bulan <?php echo $bln1 ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
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
            $sql = "SELECT * FROM labarugi WHERE  grp1 = 'G' OR grp1 = 'S' OR grp1 = 'H'  ORDER BY nourut1";


            $ress = mysqli_query($conn1, $sql);
            //echo json_encode($ress);
            if (json_encode($ress) != 'false') {
                while ($data = mysqli_fetch_array($ress)) {
                    echo '<tr>';

                    if ($data['grp1'] == 'G') {
                        echo '<td class="text-start bg-gray-300">' . $data['grp1'] . '</td>';
                        echo '<td class="text-start bg-gray-300">' . $data['nourut1'] . '</td>';
                        echo '<td class="text-start bg-gray-300">' . $data['norek1'] . '</td>';
                        echo '<td class="text-start font-weight-bolder bg-gray-300">' . $data['keterng1'] . '</td>';
                        echo '<td class="text-end font-weight-bolder bg-gray-300"></td>';
                        echo '<td class="text-end font-weight-bolder bg-gray-300"></td>';
                    } elseif ($data['grp1'] == 'S') {
                        echo '<td class="text-start bg-gray-500">' . $data['grp1'] . '</td>';
                        echo '<td class="text-start bg-gray-500">' . $data['nourut1'] . '</td>';
                        echo '<td class="text-start bg-gray-500">' . $data['norek1'] . '</td>';
                        echo '<td class="text-start font-weight-bolder bg-gray-500">' . $data['keterng1'] . '</td>';
                        echo '<td class="text-end font-weight-bolder bg-gray-500">' . number_format($data['saldo01a'], 2, '.', ',') . '</td>';
                        echo '<td class="text-end font-weight-bolder bg-gray-500">' . number_format($data['saldo02a'], 2, '.', ',') . '</td>';
                    } else {
                        echo '<td class="text-start">' . $data['grp1'] . '</td>';
                        echo '<td class="text-start">' . $data['nourut1'] . '</td>';
                        echo '<td class="text-start">' . $data['norek1'] . '</td>';
                        echo '<td class="text-start">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $data['keterng1'] . '</td>';
                        echo '<td class="text-end">' . number_format($data['saldo01a'], 2, '.', ',') . '</td>';
                        echo '<td class="text-end">' . number_format($data['saldo02a'], 2, '.', ',') . '</td>';
                    }


                    echo '</tr>';
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
<?php } ?>