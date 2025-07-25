<?php
include("sess_check.php");
header("Content-Type: application/json");
$response = array();
$kdspl = mysqli_real_escape_string($conn1, $_POST['kdspl']);
$nmspl = mysqli_real_escape_string($conn1, $_POST['nmspl']);
$almtspl = mysqli_real_escape_string($conn1, $_POST['almtspl']);
$telpspl = mysqli_real_escape_string($conn1, $_POST['telpspl']);
$pkp = mysqli_real_escape_string($conn1, $_POST['pkp']);
$npwp = mysqli_real_escape_string($conn1, $_POST['npwp']);

mysqli_autocommit($conn1, false);

$sql = "UPDATE supplier SET nmspl='" . $nmspl . "',	almtspl='" . $almtspl . "', telpspl='" . $telpspl . "', pkp='" . $pkp . "', npwp='" . $npwp . "' WHERE kdspl='" . $kdspl . "'";
$ressspart = mysqli_query($conn1, $sql);
if (json_encode($ressspart) == 'true') {
    mysqli_commit($conn1);
    $response["success"] = true;
    $response["message"] = "Data updated.";
} else {
    mysqli_rollback($conn1);
    $response["success"] = false;
    $response["message"] = "Failed to update.";
}
mysqli_close($conn1);
echo json_encode($response);
