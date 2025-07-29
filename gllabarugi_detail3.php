<?php
error_reporting(E_ERROR | E_PARSE);
include("sess_check.php");
include("function/format_tanggal.php");
include("function/format_rupiah.php");
if (isset($_POST["action"])) {
    if (isset($_POST['tgl1'])) {

        $tgl1cari = $_POST['tgl1'];
        $tgl2cari = $_POST['tgl2'];
        $bln3 = $_POST['tgl1'];
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

        $sqlmstgl = "SELECT * FROM mstgl WHERE kode = 'IC02' AND cetak = 'Y' ORDER BY kode, nourut";
        $qrymstgl = mysqli_query($conn1, $sqlmstgl);
        while ($resmstgl = mysqli_fetch_array($qrymstgl)) {
            $nourut1 = $resmstgl['nourut'];
            $cetak1 = $resmstgl['cetak'];
            $norek1 = $resmstgl['norek'];
            $cketr1 = $resmstgl['keterng'];
            $grp1 = $resmstgl['group1'];
            $neg1 = $resmstgl['cgroup'];
            $sumber = $resmstgl['sumber'];

            $sqlinsert = "INSERT INTO labarugi (nourut1,cetak1,norek1,keterng1,grp1,neg1,sumber1) values ('$nourut1','$cetak1','$norek1','$cketr1','$grp1','$neg1','$sumber')";
            $qryinsert = mysqli_query($conn1, $sqlinsert);
        }

        $sqlcetakRL = "SELECT *FROM labarugi";
        $qrycetakRL = mysqli_query($conn1, $sqlcetakRL);
        while ($rescetakRL = mysqli_fetch_array($qrycetakRL)) {
            //if ($norek1 != '') {

            $nourut1 = $rescetakRL['nourut1'];
            $cetak1 = $rescetakRL['cetak1'];
            $norek1 = $rescetakRL['norek1'];
            $cketr1 = $rescetakRL['keterng1'];
            $grp1 = $rescetakRL['grp1'];
            $neg1 = $rescetakRL['neg1'];
            $sumber = $rescetakRL['sumber1'];

            $sqlglmas = "SELECT * FROM glmas WHERE  norek  = '" . $norek1 . "' ORDER BY norek";
            $resglmas = mysqli_query($conn1, $sqlglmas);
            $saldonow = $saldoold = 0;
            while ($dtsglmas = mysqli_fetch_array($resglmas)) {
                $znorek = $dtsglmas['norek'];
                $tprek =  $dtsglmas['tprek'];
                // update nourut A Penjualan dan retur sumber P
                if ($sumber == 'P') {
                    if ($tprek == 'K') {
                        $saldop1 = $dtsglmas['debet' . $bln] + $dtsglmas['kredit' . $bln];
                        $saldop2 = $dtsglmas['debet' . $bln1] + $dtsglmas['kredit' . $bln1];
                    } else {
                        $saldop1 = ($dtsglmas['debet' . $bln] + $dtsglmas['kredit' . $bln]) * -1;
                        $saldop2 = ($dtsglmas['debet' . $bln1] + $dtsglmas['kredit' . $bln1]) * -1;
                    }
                    $sqlupP = "UPDATE labarugi SET saldo01a = '" . $saldop1 . "',saldo02a = '" . $saldop2 . "' WHERE nourut1 ='" . $nourut1 . "' AND sumber1 ='" . $sumber . "' ";
                    $resupP = mysqli_query($conn1, $sqlupP);
                }

                // update nourut B persediaan dan sumber S
                if ($sumber == 'S') {
                    $sqlupS = "UPDATE labarugi SET saldo01a = '" . $dtsglmas['saldo' . $bln] . "',saldo02a = '" . $dtsglmas['saldo' . $bln1] . "' WHERE norek1 = '" . $norek1 . "' AND sumber1 ='" . $sumber . "' ";
                    $resupS = mysqli_query($conn1, $sqlupS);

                    if ($znorek == $stok) {
                        $t995a = $dtsglmas['debt' . $bln] * -1;
                        $t995b = $dtsglmas['debt' . $bln1] * -1;
                        $sqlup995 = "UPDATE labarugi SET saldo01a = '" . $t995a . "',saldo02a = '" . $t995b . "' WHERE nourut1 = 'B995'";
                        $resup995 = mysqli_query($conn1, $sqlup995);
                    }
                }

                if ($sumber == 'B') {
                    if ($tprek == 'D') {
                        $sbeli1 = $dtsglmas['debet' . $bln] - $dtsglmas['kredit' . $bln];
                        $sbeli2 = $dtsglmas['debet' . $bln1] - $dtsglmas['kredit' . $bln1];
                    }
                    $sqlupB = "UPDATE labarugi SET saldo01a = '" . $sbeli1 . "',saldo02a = '" . $sbeli2 . "' WHERE norek1 = '" . $norek1 . "' AND sumber1 ='" . $sumber . "' ";
                    $resupB = mysqli_query($conn1, $sqlupB);
                }
                if ($sumber == 'R') {
                    if ($tprek == 'K') {
                        $rbeli1 = $dtsglmas['kredit' . $bln] - $dtsglmas['debet' . $bln];
                        $rbeli2 = $dtsglmas['kredit' . $bln1] - $dtsglmas['debet' . $bln1];
                    }
                    $sqlupR = "UPDATE labarugi SET saldo01a = '" . $rbeli1 . "',saldo02a = '" . $rbeli2 . "' WHERE norek1 = '" . $norek1 . "' AND sumber1 ='" . $sumber . "' ";
                    $resupR = mysqli_query($conn1, $sqlupR);
                }

                if ($sumber == 'E') {
                    if ($tprek == 'K') {
                        $saldonowE = $dtsglmas['kredit' . $bln] - $dtsglmas['debet' . $bln];
                        $saldooldE = $dtsglmas['kredit' . $bln1] - $dtsglmas['debet' . $bln1];
                    } else {
                        $saldonowE = $dtsglmas['debet' . $bln] - $dtsglmas['kredit' . $bln];
                        $saldooldE = $dtsglmas['debet' . $bln1] - $dtsglmas['kredit' . $bln1];
                    }
                    $sqlupD = "UPDATE labarugi SET saldo01a = '" . $saldonowE . "',saldo02a = '" . $saldooldE . "' WHERE norek1 = '" . $norek1 . "' AND sumber1 ='" . $sumber . "' ";
                    $resupD = mysqli_query($conn1, $sqlupD);
                }
            }
        }

        // sum nourut a
        $sqlA = "SELECT sum(saldo01a) suma1a, sum(saldo02a) suma1b FROM labarugi WHERE nourut1 LIKE '%A0%'";
        $qryA = mysqli_query($conn1, $sqlA);
        $dtlA = mysqli_fetch_array($qryA);
        $saldoa1a = $dtlA['suma1a'];
        $saldoa1b = $dtlA['suma1b'];

        $sqlupA = "UPDATE labarugi SET saldo01a = '" . $saldoa1a . "',saldo02a = '" . $saldoa1b . "' WHERE nourut1 = 'A999'";
        $qryupA = mysqli_query($conn1, $sqlupA);

        // replace cetak Y -> T untuk B001 - B008
        //$sqlA999 = "UPDATE labarugi SET cetak1 = 'T' WHERE nourut1 = 'A999' ";
        //$qryA999 = mysqli_query($conn1, $sqlA999);

        // sum nourut b
        $sqlB = "SELECT sum(saldo01a) sumb1a, sum(saldo02a) sumb1b FROM labarugi WHERE nourut1 BETWEEN 'B002' AND 'B006'";
        $qryB = mysqli_query($conn1, $sqlB);
        $dtlB = mysqli_fetch_array($qryB);
        $saldob1a = $dtlB['sumb1a'];
        $saldob1b = $dtlB['sumb1b'];

        // saldo akhir persediaan
        $sqlupA = "UPDATE labarugi SET saldo01a = '" . $saldob1a . "',saldo02a = '" . $saldob1b . "' WHERE nourut1 = 'B007'";
        $qryupA = mysqli_query($conn1, $sqlupA);

        // replace cetak Y -> T untuk B001 - B008
        $sqlB000 = "UPDATE labarugi SET cetak1 = 'T' WHERE nourut1 >= 'B002' and  nourut1 <= 'B995' ";
        $qryB000 = mysqli_query($conn1, $sqlB000);

        // hpp
        $tb997a = $saldob1a + $t995a;
        $tb997b = $saldob1b + $t995b;
        $sqlupA = "UPDATE labarugi SET saldo01a = '" . ($tb997a)*-1 . "',saldo02a = '" . $tb997b . "' WHERE nourut1 = 'B997'";
        $qryupA = mysqli_query($conn1, $sqlupA);

        // laba kotor
        $sqlupA = "UPDATE labarugi SET saldo01a = '" . ($saldoa1a - $tb997a) . "',saldo02a = '" . ($saldoa1b - $tb997b) . "' WHERE nourut1 = 'B998'";
        $qryupA = mysqli_query($conn1, $sqlupA);

        $labakotorA = ($saldoa1a - $tb997a);
        $labakotorB = ($saldoa1b - $tb997b);

        if ($saldoa1a != 0) {
            $sqlgrossA = "UPDATE labarugi SET saldo01a = '" . (($saldoa1a - $tb997a) / ($saldoa1a)) * 100 . "' WHERE nourut1 = 'B999'";
            $qtygrossA = mysqli_query($conn1, $sqlgrossA);
        } else {
            $sqlgrossA = "UPDATE labarugi SET saldo01a = 0 WHERE nourut1 = 'C000'";
            $qtygrossA = mysqli_query($conn1, $sqlgrossA);
        }
        if ($saldoa1b != 0) {
            $sqlgrossB = "UPDATE labarugi SET saldo02a = '" . (($saldoa1b - $tb997b) / ($saldoa1b)) * 100 . "' WHERE nourut1 = 'B999'";
            $qtygrossB = mysqli_query($conn1, $sqlgrossB);
        } else {
            $sqlgrossB = "UPDATE labarugi SET saldo02a = 0 WHERE nourut1 = 'C000'";
            $qtygrossB = mysqli_query($conn1, $sqlgrossB);
        }

        // sum nourut c
        $sqlC = "SELECT sum(saldo01a) sumc1a, sum(saldo02a) sumc1b FROM labarugi WHERE nourut1 LIKE '%C%'";
        $qryC = mysqli_query($conn1, $sqlC);
        $dtlC = mysqli_fetch_array($qryC);
        $saldoc1a = $dtlC['sumc1a'];
        $saldoc1b = $dtlC['sumc1b'];

        $sqlupA = "UPDATE labarugi SET saldo01a = '" . $saldoc1a . "',saldo02a = '" . $saldoc1b . "' WHERE nourut1 = 'C999'";
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
        $sqlupA = "UPDATE labarugi SET saldo01a = '" . ($labakotorA - $saldoc1a - $saldod1a) . "',saldo02a = '" . ($labakotorB - $saldoc1b - $saldod1b) . "' WHERE nourut1 = 'E999'";
        $qryupA = mysqli_query($conn1, $sqlupA);

        //sub nourut f
        $sqlF = "SELECT sum(saldo01a) sumf1a, sum(saldo02a) sumf1b FROM labarugi WHERE nourut1 LIKE '%F%'";
        $qryF = mysqli_query($conn1, $sqlF);
        $dtlF = mysqli_fetch_array($qryF);
        $saldof1a = $dtlF['sumf1a'];
        $saldof1b = $dtlF['sumf1b'];

        //sub biaya non opr
        $sqlupA = "UPDATE labarugi SET saldo01a = '" . $saldof1a . "',saldo02a = '" . $saldof1b . "' WHERE nourut1 = 'F999'";
        $qryupA = mysqli_query($conn1, $sqlupA);

        //sub nourut g
        $sqlG = "SELECT sum(saldo01a) sumg1a, sum(saldo02a) sumg1b FROM labarugi WHERE nourut1 LIKE '%G%'";
        $qryG = mysqli_query($conn1, $sqlG);
        $dtlG = mysqli_fetch_array($qryG);
        $saldog1a = $dtlG['sumg1a'];
        $saldog1b = $dtlG['sumg1b'];

        //sub biaya non opr
        $sqlupA = "UPDATE labarugi SET saldo01a = '" . $saldog1a . "',saldo02a = '" . $saldog1b . "' WHERE nourut1 = 'G999'";
        $qryupA = mysqli_query($conn1, $sqlupA);

        //sub nourut i
        $sqlI = "SELECT sum(saldo01a) sumi1a, sum(saldo02a) sumi1b FROM labarugi WHERE nourut1 LIKE '%I%'";
        $qryI = mysqli_query($conn1, $sqlI);
        $dtlI = mysqli_fetch_array($qryI);
        $saldoi1a = $dtlI['sumi1a'];
        $saldoi1b = $dtlI['sumi1b'];

        //sub biaya pajak
        $sqlupI = "UPDATE labarugi SET saldo01a = '" . $saldoi1a . "',saldo02a = '" . $saldoi1b . "' WHERE nourut1 = 'I999'";
        $qryupI = mysqli_query($conn1, $sqlupI);

        // laba bersih
        $lb1a = $lb1b = 0;
        $lb1a = ($labakotorA - $saldoc1a - $saldod1a + $saldof1a - $saldog1a - $saldoi1a);
        $lb1b = ($labakotorB - $saldoc1b - $saldod1b + $saldof1b - $saldog1b - $saldoi1b);

        $sqlupA = "UPDATE labarugi SET saldo01a = '" . $lb1a . "',saldo02a = '" . $lb1b . "' WHERE nourut1 = 'J999'";
        $qryupA = mysqli_query($conn1, $sqlupA);
        
        $s1a = $s1b = 0;
        if ($saldoa1a == 0){
            $s1a = 1;
        }else{
            $s1a = $saldoa1a;
         }
         if ($saldoa1b == 0){
            $s1b = 1;
        }else{
            $s1b = $saldoa1b;
         }

        $sqlupK = "UPDATE labarugi SET saldo01a = '" . (($lb1a / $s1a) * 100) . "',saldo02a = '" .  $s1b . "' WHERE nourut1 = 'K999'";
        $qryupK = mysqli_query($conn1, $sqlupK);
        
        // margin bersin
?>

        <div id="section-to-print">
            <section id="header-kop">
                <div class="container-fluid">
                </div>
            </section>

            <section id="body-of-report">
                <?php include("gllabarugi_print3.php"); ?>
            </section>
            <div class="modal-footer">
                <a href="gllabarugi_cetak3.php?tgl1=<?php echo trim($_REQUEST['tgl1']); ?>" target="_blank" class="btn btn-danger waves-effect btn-sm"><i class="fas fa-print"></i> Cetak</a>
                <button type="button" class="btn btn-warning waves-effect btn-sm" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
            </div>
        </div>

<?php
    }
}
