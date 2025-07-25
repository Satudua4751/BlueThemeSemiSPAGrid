<?php

include("../sess_check.php");
// Initialize the session
// Tambahkan header agar halaman tidak di-cache oleh browser
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proksi
define('APP_SECURE', true);

$sqljual = "SELECT * FROM trxjual, konsumen WHERE trxjual.idkon = konsumen.idkon and sttrx != 'draft' ORDER BY sttrx, konsumen.nmkon, idtrx  DESC";
$ressjual = $conn1->query($sqljual);

$datajual = [];
while ($rowjual = $ressjual->fetch_assoc()) {
  $datajual[] = $rowjual;
  
}
//echo $rowjual;
echo json_encode($datajual);
