<?php
require_once("sess_check.php");
$kdbrg = $_REQUEST['kdbrg'];
mysqli_autocommit($conn1, false);
$ressspart = mysqli_query($conn1, "DELETE FROM barangjasa WHERE kdbrg = '$kdbrg'");
if (json_encode($ressspart) == 'true') {
    mysqli_commit($conn1);

    $resmst = mysqli_query($conn1, "DELETE FROM mstbrg WHERE kdbrg = '$kdbrg'");
    mysqli_commit($conn1);

    $response["success"] = true;
    $response["message"] = "deleted success.";
} else {
    mysqli_rollback($conn1);
    $response["success"] = true;
    $response["message"] = "failed to deleted.";
}
mysqli_close($conn1);
echo json_encode($response);
