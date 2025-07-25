<?php

include("../sess_check.php");
// Initialize the session
// Tambahkan header agar halaman tidak di-cache oleh browser
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proksi
define('APP_SECURE', true);

$sqlbrg = "SELECT * FROM barangjasa";
$ressbrg = $conn1->query($sqlbrg);

$databrg = [];
while ($rowbrg = $ressbrg->fetch_assoc()) {
  $databrg[] = $rowbrg;
  
}
//echo $rowjual;
echo json_encode($databrg);
