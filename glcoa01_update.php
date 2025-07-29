<?php
include("sess_check.php");
header("Content-Type: application/json");
$response = array();
$cek = $valid = 0;
$thn = date('Y');

$id = $_SESSION['ddd'];

$norek = mysqli_real_escape_string($conn1, $_POST['norek']);
$bln = mysqli_real_escape_string($conn1, $_POST['bln']);
$nmrek = mysqli_real_escape_string($conn1, $_POST['nmrek']);
$tprek = mysqli_real_escape_string($conn1, $_POST['tprek']);
$grrek = mysqli_real_escape_string($conn1, $_POST['grrek']);
$saldo = mysqli_real_escape_string($conn1, $_POST['saldo']);
$debet = mysqli_real_escape_string($conn1, $_POST['debet']);
$kredit = mysqli_real_escape_string($conn1, $_POST['kredit']);
$debt = mysqli_real_escape_string($conn1, $_POST['debt']);
$kred = mysqli_real_escape_string($conn1, $_POST['kred']);

mysqli_autocommit($conn1, false);
$sql = "UPDATE glmas$thn SET nmrek='" . $nmrek . "',tprek='" . $tprek . "',saldo" . $bln . "='" . $saldo . "',debet" . $bln . "='" . $debet . "',kredit" . $bln . "='" . $kredit . "',debt" . $bln . "='" . $debt . "',kred" . $bln . "='" . $kred . "' WHERE norek='" . $norek . "'";
$ressgl = mysqli_query($conn1, $sql);

if (json_encode($ressgl) == 'true') {
    mysqli_commit($conn1);
    $response["success"] = true;
    $response["message"] = "Data Berhasil diupdate.";
} else {
    mysqli_rollback($conn1);
    $response["success"] = false;
    $response["message"] = "Data Gagal diupdate.";
}
mysqli_close($conn1);

echo json_encode($response);
