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
        // jika bulan berjalan = 1 maka bulan sebelum = 0
        if ($bln == '01'){
            $bln1 = '00';
        }else{
            $bln1 = date('m', strtotime('-1 month', mktime(0, 0, 0, $bln, 1)));
        }
        

        //$d_tgl3 = date('Y-M');
        //echo $bln . ' ' . $bln1;

        $sqldelnrc = "DELETE FROM neraca";
        $qryidelnrc = mysqli_query($conn1, $sqldelnrc);

        $sqlmstgl = "SELECT * FROM mstgl WHERE kode = 'BAL2' AND cetak = 'Y' ORDER BY kode, nourut";
        $qrymstgl = mysqli_query($conn1, $sqlmstgl);
        while ($resmstgl = mysqli_fetch_array($qrymstgl)) {
            $kode1 = $resmstgl['kode'];
            $nourut1 = $resmstgl['nourut'];
            $cetak1 = $resmstgl['cetak'];
            if (($resmstgl['norek'] =='103.01') OR ($resmstgl['norek'] == '103.02') OR ($resmstgl['norek'] == '103.03') ){
                $norek1 = $resmstgl['norek'];    
            }else{
                $norek1 = substr($resmstgl['norek'],0,3);    
            }
            
            $cketr1 = $resmstgl['keterng'];
            $grp1 = $resmstgl['group1'];
            $neg1 = $resmstgl['cgroup'];
            $saldonow = $saldoold = 0;
            $sqlinsert = "INSERT INTO neraca (kode1,nourut1,cetak1,norek1,keterng1,grp1,neg1) values ('$kode1','$nourut1','$cetak1','$norek1','$cketr1','$grp1','$neg1')";
            $qryinsert = mysqli_query($conn1, $sqlinsert);

            if ($norek1 != '') {
                $sqlglmas = "SELECT * FROM glmas$thn WHERE  norek  LIKE '%" . $norek1 . "%'";
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
            $sqlupdate = "UPDATE neraca SET saldo01a = '" . $saldonow . "', saldo02a = '" . $saldoold . "' WHERE norek1 = '" . $norek1 . "'";
            $qryupdate = mysqli_query($conn1, $sqlupdate);

        }
        $sqlneg = "UPDATE neraca SET saldo01a = (saldo01a * -1), saldo02a = (saldo02a * -1) WHERE neg1 = 'N'";
        $qryneg = mysqli_query($conn1, $sqlneg);

        $sqlA1 = "SELECT sum(saldo01a) suma1a, sum(saldo02a) suma1b FROM neraca where nourut1 LIKE '%A1%'";
        $qryA1 = mysqli_query($conn1, $sqlA1);
        $dtlA1 = mysqli_fetch_array($qryA1);
        $saldoa1a = $dtlA1['suma1a'];
        $saldoa1b = $dtlA1['suma1b'];

        $sqlA5 = "SELECT sum(saldo01a) suma5a, sum(saldo02a) suma5b FROM neraca where nourut1 LIKE '%A5%'";
        $qryA5 = mysqli_query($conn1, $sqlA5);
        $dtlA5 = mysqli_fetch_array($qryA5);
        $saldoa5a = $dtlA5['suma5a'];
        $saldoa5b = $dtlA5['suma5b'];

        $sqlP1 = "SELECT sum(saldo01a) sump1a, sum(saldo02a) sump1b FROM neraca where nourut1 LIKE '%P1%'";
        $qryP1 = mysqli_query($conn1, $sqlP1);
        $dtlP1 = mysqli_fetch_array($qryP1);
        $saldop1a = $dtlP1['sump1a'];
        $saldop1b = $dtlP1['sump1b'];

        $sqlP2 = "SELECT sum(saldo01a) sump2a, sum(saldo02a) sump2b FROM neraca where nourut1 LIKE '%P2%'";
        $qryP2 = mysqli_query($conn1, $sqlP2);
        $dtlP2 = mysqli_fetch_array($qryP2);
        $saldop2a = $dtlP2['sump2a'];
        $saldop2b = $dtlP2['sump2b'];

        $sqlP3 = "SELECT sum(saldo01a) sump3a, sum(saldo02a) sump3b FROM neraca where nourut1 LIKE '%P3%'";
        $qryP3 = mysqli_query($conn1, $sqlP3);
        $dtlP3 = mysqli_fetch_array($qryP3);
        $saldop3a = $dtlP3['sump3a'];
        $saldop3b = $dtlP3['sump3b'];

        $sqlP4 = "SELECT sum(saldo01a) sump4a, sum(saldo02a) sump4b FROM neraca where nourut1 LIKE '%P4%'";
        $qryP4 = mysqli_query($conn1, $sqlP4);
        $dtlP4 = mysqli_fetch_array($qryP4);
        $saldop4a = $dtlP4['sump4a'];
        $saldop4b = $dtlP4['sump4b'];

        $sqlupA1 = "UPDATE neraca SET saldo01a = '" . $saldoa1a . "',saldo02a = '" . $saldoa1b . "' WHERE nourut1 = 'A125'";
        $qryupA1 = mysqli_query($conn1, $sqlupA1);

        $sqlupA5 = "UPDATE neraca SET saldo01a = '" . $saldoa5a . "',saldo02a = '" . $saldoa5b . "' WHERE nourut1 = 'A525'";
        $qryupA5 = mysqli_query($conn1, $sqlupA5);

        $sqlupA9 = "UPDATE neraca SET saldo01a = '" . ($saldoa1a + $saldoa5a) . "',saldo02a = '" . ($saldoa1b + $saldoa5b) . "' WHERE nourut1 = 'A901'";
        $qryupA9 = mysqli_query($conn1, $sqlupA9);

        $sqlupP1 = "UPDATE neraca SET saldo01a = '" . ($saldop1a + $saldop2a) . "',saldo02a = '" . ($saldop1b + $saldop2b) . "' WHERE nourut1 = 'P125'";
        $qryupP1 = mysqli_query($conn1, $sqlupP1);

        $sqlupP2 = "UPDATE neraca SET saldo01a = '" . ($saldop3a + $saldop4a) . "',saldo02a = '" . ($saldop3b + $saldop4b) . "' WHERE nourut1 = 'P801'";
        $qryupP2 = mysqli_query($conn1, $sqlupP2);

        $sqlupP9 = "UPDATE neraca SET saldo01a = '" . ($saldop1a + $saldop2a + +$saldop3a + $saldop4a) . "',saldo02a = '" . ($saldop1b + $saldop2b + +$saldop3b + $saldop4b) . "' WHERE nourut1 = 'P901'";
        $qryupP9 = mysqli_query($conn1, $sqlupP9); ?>

        <div id="section-to-print">
            <section id="header-kop">
                <div class="container-fluid">
                </div>
            </section>

            <section id="body-of-report">
                <?php include("glneraca_print1.php"); ?>
            </section>
            <div class="modal-footer">
                <a href="glneraca_cetak1.php?tgl1=<?php echo trim($_REQUEST['tgl1']); ?>" target="_blank" class="btn btn-danger waves-effect btn-sm"><i class="fas fa-print"></i> Cetak</a>
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