<?php
require_once("sess_check.php");
$idadm = $_REQUEST['idadm'];
mysqli_autocommit($conn1, false);
$ressadm = mysqli_query($conn1, "DELETE FROM users WHERE idadm = '$idadm'");
if (json_encode($ressadm) == 'true') {
    mysqli_commit($conn1);
    
    $response["success"] = true;
    $response["message"] = "Data Berhasil dihapus.";
} else {
    mysqli_rollback($conn1);
    $response["success"] = true;
    $response["message"] = "Data Gagal dihapus.";
}
mysqli_close($conn1);
echo json_encode($response);
