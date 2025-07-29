<?php
require_once("sess_check.php");
$norek = $_REQUEST['norek'];
mysqli_autocommit($conn1, false);
$ressspart = mysqli_query($conn1, "DELETE FROM glmas$thn WHERE norek = '$norek'");
if (json_encode($ressspart) == 'true') {
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
