<?php
include("sess_check.php");
header("Content-Type: application/json");
$cek = $valid = 0;
$response = array();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_SESSION['ddd'];
    $nmspl = mysqli_real_escape_string($conn1, $_POST['nmspl']);
    $almtspl = mysqli_real_escape_string($conn1, $_POST['almtspl']);
    $telpspl = mysqli_real_escape_string($conn1, $_POST['telpspl']);
    $pkp = mysqli_real_escape_string($conn1, $_POST['pkp']);

    if ($pkp == "ya") {
        $npwp = mysqli_real_escape_string($conn1, $_POST['pkpspl']);
    } else {
        $npwp = '00.000.000.0-000.000';
    }

    $sql = "INSERT INTO supplier (nmspl, telpspl, almtspl, pkp, npwp, kdpt) 
            VALUES ('$nmspl', '$telpspl', '$almtspl', '$pkp', '$npwp','')";
    $ressspl = mysqli_query($conn1, $sql);

    if ($ressspl) {
        $last_insert_id = mysqli_insert_id($conn1);
        $kdpt = 'S' . str_pad($last_insert_id, 3, '0', STR_PAD_LEFT);

        $sql1 = "UPDATE supplier 
                 SET kdpt = '$kdpt' 
                 WHERE idspl = $last_insert_id";

        $ressspl1 = mysqli_query($conn1, $sql1);

        if ($ressspl1) {
            mysqli_commit($conn1);
            $response["success"] = true;
            $response["message"] = "Data Saved.";
        } else {
            mysqli_rollback($conn1);
            $response["success"] = false;
            $response["message"] = "Failed to save.";
        }
    } else {
        mysqli_rollback($conn1);
        $response["success"] = false;
        $response["message"] = "Failed to save.";
    }

    mysqli_close($conn1);
    echo json_encode($response);
}
