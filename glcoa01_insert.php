<?php
include("sess_check.php");
header("Content-Type: application/json");
$cek = $valid = 0;
$response = array();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$id = $_SESSION['ddd'];
	$norek = mysqli_real_escape_string($conn1, $_POST['norek']);
	$nmrek = mysqli_real_escape_string($conn1, $_POST['nmrek']);
	$tprek = mysqli_real_escape_string($conn1, $_POST['tprek']);
	$grrek = mysqli_real_escape_string($conn1, $_POST['grrek']);
	$saldo = mysqli_real_escape_string($conn1, $_POST['saldo']);
	$debet = mysqli_real_escape_string($conn1, $_POST['debet']);
	$kredit = mysqli_real_escape_string($conn1, $_POST['kredit']);

	$debt = mysqli_real_escape_string($conn1, $_POST['debt']);
	$kred = mysqli_real_escape_string($conn1, $_POST['kred']);

	$sqlgl = "INSERT INTO glmas$thn (norek, nmrek, tprek, grrek, saldo00, saldo01, saldo02, saldo03, saldo04, saldo05, saldo06, saldo07, saldo08, saldo09, saldo10, saldo11, saldo12,
	 	debet00, debet01, debet02, debet03, debet04, debet05, debet06, debet07, debet08, debet09, debet10, debet11, debet12, 
	 	kredit00, kredit01, kredit02, kredit03, kredit04, kredit05, kredit06, kredit07, kredit08, kredit09, kredit10, kredit11, kredit12, 
	 	debt00, debt01, debt02, debt03, debt04, debt05, debt06, debt07, debt08, debt09, debt10, debt11, debt12,
	  	kred00, kred01, kred02, kred03, kred04, kred05, kred06, kred07, kred08, kred09, kred10, kred11, kred12, 
	  	amount00, amount01, amount02, amount03, amount04, amount05, amount06, amount07, amount08, amount09, amount10, amount11, amount12, bl, co, gr, ic) 
	  	VALUES ('$norek', '$nmrek', '$tprek', '$grrek',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 
	 	'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 
	 	'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 
	 	'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0','0','0','0')";
	$ressgl = mysqli_query($conn1, $sqlgl);

	if (json_encode($ressgl) == 'true') {
		mysqli_commit($conn1);
		$response["success"] = true;
		$response["message"] = "Data Berhasil disimpan.";
	} else {
		mysqli_rollback($conn1);
		$response["success"] = false;
		$response["message"] = "Data Gagal disimpan.";
	}
	mysqli_close($conn1);
	echo json_encode($response);
}
