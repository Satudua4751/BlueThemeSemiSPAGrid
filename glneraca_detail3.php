<?php
error_reporting(E_ERROR | E_PARSE);
include("sess_check.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");
if (isset($_POST["action"])) {
    if (isset($_POST['tgl1'])) {

        $tgl1cari = $_POST['tgl1'];
        $tgl2cari = $_POST['tgl2'];

        //*Bulan Berjalan 
        $bln = substr($tgl1cari, 5, 2);
        $thn = substr($tgl1cari, 0, 4);
        $bln3 = $_POST['tgl1'];

        //*Bulan Sebelum 
        $bln1 = date('m', strtotime('-1 month', mktime(0, 0, 0, $bln, 1)));

        //$d_tgl3 = date('Y-M');
        //echo $bln . ' ' . $bln1;

        $sqldelnrc = "DELETE FROM neraca1";
        $qryidelnrc = mysqli_query($conn1, $sqldelnrc);

        // posisi 1
        $i = 1;
        $sqlmstgl = "SELECT * FROM mstgl WHERE kode = 'BAL3' AND cetak = 'Y' AND poss = '1' ORDER BY kode, nourut";
        $qrymstgl = mysqli_query($conn1, $sqlmstgl);
        while ($resmstgl = mysqli_fetch_array($qrymstgl)) {
            $idnrc = sprintf("%03s", $i);
            $kode1 = $resmstgl['kode'];
            $nourut1 = $resmstgl['nourut'];
            $cetak1 = $resmstgl['cetak'];
            if (($resmstgl['norek'] == '103.01') or ($resmstgl['norek'] == '103.02') or ($resmstgl['norek'] == '103.03')) {
                $norek1 = $resmstgl['norek'];
            } else {
                $norek1 = substr($resmstgl['norek'], 0, 3);
            }

            $cketr1 = $resmstgl['keterng'];
            $grp1 = $resmstgl['group1'];
            $neg1 = $resmstgl['cgroup'];
            $saldonow = $saldoold = 0;
            $sqlinsert = "INSERT INTO neraca1 (idnrc,kode1,nourut1,cetak1,norek1,keterng1,grp1,neg1) values ('$idnrc','$kode1','$nourut1','$cetak1','$norek1','$cketr1','$grp1','$neg1')";
            $qryinsert = mysqli_query($conn1, $sqlinsert);

            if ($norek1 != '') {
                $sqlglmas = "SELECT * FROM glmas WHERE  norek  LIKE '%" . $norek1 . "%'";
                $resglmas = mysqli_query($conn1, $sqlglmas);
                while ($dtsglmas = mysqli_fetch_array($resglmas)) {
                    $tprek =  $dtsglmas['tprek'];
                    if ($tprek == 'D') {
                        $saldonow += $dtsglmas['saldo' . $bln] + $dtsglmas['debet' . $bln] - $dtsglmas['kredit' . $bln] + $dtsglmas['debt' . $bln] - $dtsglmas['kred' . $bln] + $dtsglmas['amount' . $bln];
                        $saldoold += $dtsglmas['saldo' . $bln1] + $dtsglmas['debet' . $bln1] - $dtsglmas['kredit' . $bln1] + $dtsglmas['debt' . $bln1] - $dtsglmas['kred' . $bln1] + $dtsglmas['amount' . $bln1];
                    } else {
                        $saldonow += $dtsglmas['saldo' . $bln] - $dtsglmas['debet' . $bln] + $dtsglmas['kredit' . $bln] - $dtsglmas['debt' . $bln] + $dtsglmas['kred' . $bln] + $dtsglmas['amount' . $bln];
                        $saldoold += $dtsglmas['saldo' . $bln1] - $dtsglmas['debet' . $bln1] + $dtsglmas['kredit' . $bln1] - $dtsglmas['debt' . $bln1] + $dtsglmas['kred' . $bln1] + $dtsglmas['amount' . $bln1];
                    }
                }
            }
            $sqlupdate = "UPDATE neraca1 SET saldo01a = '" . $saldonow . "', saldo02a = '" . $saldoold . "' WHERE norek1 = '" . $norek1 . "'";
            $qryupdate = mysqli_query($conn1, $sqlupdate);
            $i++;
        }

        // posisi 2
        $i = 1;
        $sqlmstgl = "SELECT * FROM mstgl WHERE kode = 'BAL3' AND cetak = 'Y' AND poss = '2' ORDER BY kode, nourut";
        $qrymstgl = mysqli_query($conn1, $sqlmstgl);
        while ($resmstgl = mysqli_fetch_array($qrymstgl)) {
            $idnrc = sprintf("%03s", $i);
            $kode2 = $resmstgl['kode'];
            $nourut2 = $resmstgl['nourut'];
            $cetak2 = $resmstgl['cetak'];
            if (($resmstgl['norek'] == '103.01') or ($resmstgl['norek'] == '103.02') or ($resmstgl['norek'] == '103.03')) {
                $norek2 = $resmstgl['norek'];
            } else {
                $norek2 = substr($resmstgl['norek'], 0, 3);
            }

            $cketr2 = $resmstgl['keterng'];
            $grp2 = $resmstgl['group1'];
            $neg2 = $resmstgl['cgroup'];
            $saldonow = $saldoold = 0;
            //$sqlinsert = "INSERT INTO neraca1 (kode2,nourut2,cetak2,norek2,keterng2,grp2,neg2) values ('$kode2','$nourut2','$cetak2','$norek2','$cketr2','$grp2','$neg2')";
            //$qryinsert = mysqli_query($conn1, $sqlinsert);

            $sqlposs2 = "UPDATE neraca1 SET kode2 = '" . $kode2 . "',nourut2 = '" . $nourut2 . "',cetak2 = '" . $cetak2 . "',norek2 = '" . $norek2 . "',keterng2 = '" . $cketr2 . "',grp2 = '" . $grp2 . "',neg2 = '" . $neg2 . "' WHERE idnrc = '" . $idnrc . "'";
            $qryposs2 = mysqli_query($conn1, $sqlposs2);

            if ($norek2 != '') {
                $sqlglmas = "SELECT * FROM glmas WHERE  norek  LIKE '%" . $norek2 . "%'";
                $resglmas = mysqli_query($conn1, $sqlglmas);
                while ($dtsglmas = mysqli_fetch_array($resglmas)) {
                    $tprek =  $dtsglmas['tprek'];
                    if ($tprek == 'D') {
                        $saldonow += $dtsglmas['saldo' . $bln] + $dtsglmas['debet' . $bln] - $dtsglmas['kredit' . $bln] + $dtsglmas['debt' . $bln] - $dtsglmas['kred' . $bln] + $dtsglmas['amount' . $bln];
                        $saldoold += $dtsglmas['saldo' . $bln1] + $dtsglmas['debet' . $bln1] - $dtsglmas['kredit' . $bln1] + $dtsglmas['debt' . $bln1] - $dtsglmas['kred' . $bln1] + $dtsglmas['amount' . $bln1];
                    } else {
                        $saldonow += $dtsglmas['saldo' . $bln] - $dtsglmas['debet' . $bln] + $dtsglmas['kredit' . $bln] - $dtsglmas['debt' . $bln] + $dtsglmas['kred' . $bln] + $dtsglmas['amount' . $bln];
                        $saldoold += $dtsglmas['saldo' . $bln1] - $dtsglmas['debet' . $bln1] + $dtsglmas['kredit' . $bln1] - $dtsglmas['debt' . $bln1] + $dtsglmas['kred' . $bln1] + $dtsglmas['amount' . $bln1];
                    }
                }
            }
            $sqlupdate = "UPDATE neraca1 SET saldo01b = '" . $saldonow . "', saldo02b = '" . $saldoold . "' WHERE norek2 = '" . $norek2 . "'";
            $qryupdate = mysqli_query($conn1, $sqlupdate);
            $i++;
        }



        $sqlneg = "UPDATE neraca1 SET saldo01a = (saldo01a * -1), saldo02a = (saldo02a * -1) WHERE neg1 = 'N'";
        $qryneg = mysqli_query($conn1, $sqlneg);

        $sqlA1 = "SELECT sum(saldo01a) suma1a, sum(saldo02a) suma1b FROM neraca1 where nourut1 LIKE '%A1%'";
        $qryA1 = mysqli_query($conn1, $sqlA1);
        $dtlA1 = mysqli_fetch_array($qryA1);
        $saldoa1a = $dtlA1['suma1a'];
        $saldoa1b = $dtlA1['suma1b'];

        $sqlA5 = "SELECT sum(saldo01a) suma5a, sum(saldo02a) suma5b FROM neraca1 where nourut1 LIKE '%A5%'";
        $qryA5 = mysqli_query($conn1, $sqlA5);
        $dtlA5 = mysqli_fetch_array($qryA5);
        $saldoa5a = $dtlA5['suma5a'];
        $saldoa5b = $dtlA5['suma5b'];

        $sqlP1 = "SELECT sum(saldo01b) sump1a, sum(saldo02b) sump1b FROM neraca1 where nourut2 LIKE '%P1%'";
        $qryP1 = mysqli_query($conn1, $sqlP1);
        $dtlP1 = mysqli_fetch_array($qryP1);
        $saldop1a = $dtlP1['sump1a'];
        $saldop1b = $dtlP1['sump1b'];

        $sqlP2 = "SELECT sum(saldo01b) sump2a, sum(saldo02b) sump2b FROM neraca1 where nourut2 LIKE '%P2%'";
        $qryP2 = mysqli_query($conn1, $sqlP2);
        $dtlP2 = mysqli_fetch_array($qryP2);
        $saldop2a = $dtlP2['sump2a'];
        $saldop2b = $dtlP2['sump2b'];

        $sqlP3 = "SELECT sum(saldo01b) sump3a, sum(saldo02b) sump3b FROM neraca1 where nourut2 LIKE '%P3%'";
        $qryP3 = mysqli_query($conn1, $sqlP3);
        $dtlP3 = mysqli_fetch_array($qryP3);
        $saldop3a = $dtlP3['sump3a'];
        $saldop3b = $dtlP3['sump3b'];

        $sqlP4 = "SELECT sum(saldo01b) sump4a, sum(saldo02b) sump4b FROM neraca1 where nourut2 LIKE '%P4%'";
        $qryP4 = mysqli_query($conn1, $sqlP4);
        $dtlP4 = mysqli_fetch_array($qryP4);
        $saldop4a = $dtlP4['sump4a'];
        $saldop4b = $dtlP4['sump4b'];

        $sqlupA1 = "UPDATE neraca1 SET saldo01a = '" . $saldoa1a . "',saldo02a = '" . $saldoa1b . "' WHERE nourut1 = 'A125'";
        $qryupA1 = mysqli_query($conn1, $sqlupA1);

        $sqlupA5 = "UPDATE neraca1 SET saldo01a = '" . $saldoa5a . "',saldo02a = '" . $saldoa5b . "' WHERE nourut1 = 'A525'";
        $qryupA5 = mysqli_query($conn1, $sqlupA5);

        $sqlupA9 = "UPDATE neraca1 SET saldo01a = '" . ($saldoa1a + $saldoa5a) . "',saldo02a = '" . ($saldoa1b + $saldoa5b) . "' WHERE nourut1 = 'A901'";
        $qryupA9 = mysqli_query($conn1, $sqlupA9);

        $sqlupP1 = "UPDATE neraca1 SET saldo01b = '" . ($saldop1a + $saldop2a) . "',saldo02b = '" . ($saldop1b + $saldop2b) . "' WHERE nourut2 = 'P125'";
        $qryupP1 = mysqli_query($conn1, $sqlupP1);

        $sqlupP2 = "UPDATE neraca1 SET saldo01b = '" . ($saldop3a + $saldop4a) . "',saldo02b = '" . ($saldop3b + $saldop4b) . "' WHERE nourut2 = 'P801'";
        $qryupP2 = mysqli_query($conn1, $sqlupP2);

        $sqlupP9 = "UPDATE neraca1 SET saldo01b = '" . ($saldop1a + $saldop2a + +$saldop3a + $saldop4a) . "',saldo02b = '" . ($saldop1b + $saldop2b + +$saldop3b + $saldop4b) . "' WHERE nourut2 = 'P901' AND idnrc = '022' ";
        $qryupP9 = mysqli_query($conn1, $sqlupP9); ?>

        <div id="section-to-print">
            <section id="header-kop">
                <div class="container-fluid">
                </div>
            </section>

            <section id="body-of-report">
                <?php include("glneraca_print3.php"); ?>
            </section>
            <div class="modal-footer">
                <a href="glneraca_cetak3.php?tgl1=<?php echo trim($_REQUEST['tgl1']); ?>" target="_blank" class="btn btn-danger waves-effect btn-sm"><i class="fas fa-print"></i> Cetak</a>
                <button type="button" class="btn btn-warning waves-effect btn-sm" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
            </div>
        </div>

<?php
    } else {
        echo "Nomor Transaksi Tidak Terbaca";
        exit;
    }
}
?>