<?php
require_once("sess_check.php");
$idspl = $_REQUEST['idspl'];
mysqli_autocommit($conn1, false);
$ressspl = mysqli_query($conn1, "DELETE FROM supplier WHERE idspl = '$idspl'");
if (json_encode($ressspl) == 'true') {
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
