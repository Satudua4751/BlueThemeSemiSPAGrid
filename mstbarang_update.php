<?php
include("sess_check.php");
header("Content-Type: application/json");
$response = array();
$id = $_SESSION['ddd'];
$kdbrg = mysqli_real_escape_string($conn1, $_POST['kdbrg']);
$nmbrg = mysqli_real_escape_string($conn1, $_POST['nmbrg']);
$stok = $_POST['stok'];
$satuan = mysqli_real_escape_string($conn1, $_POST['satuan']);
$hargabrg = $_POST['hargabrg'];
$hargaup = $_POST['hargaup'];
$hargaj = $_POST['hargaj'];
$tglbeli = date('Y-m-d');
$ketbrg = mysqli_real_escape_string($conn1, $_POST['ketbrg']);
$jenis = mysqli_real_escape_string($conn1, $_POST['jenis']);
$ukuran = mysqli_real_escape_string($conn1, $_POST['ukuran']);
$merk = mysqli_real_escape_string($conn1, $_POST['merk']);
$fotobrg1 = mysqli_real_escape_string($conn1, $_POST['fotobrg1']);
$newfile = "";

if ($hargabrg == 0) {
    $hargabrg = 0;
}

if ($hargaj == 0) {
    if ($hargaup == 0) {
        $hargaup = 0;
        $hargaj = $hargabrg;
    } else {
        $hargaj = $hargaj + ($hargabrg * $hargaup / 100);
    }
}

mysqli_autocommit($conn1, false);

if (isset($_FILES['fotobrg']) && $_FILES['fotobrg']['error'] === UPLOAD_ERR_OK) {
    $src = $_FILES['fotobrg']['tmp_name'];
    $fileext = substr($_FILES['fotobrg']['name'], -5);
    $filename = $_FILES['fotobrg']['name'];
    $newfile = date('YmdHis') . $fileext;
    $targetDirectory = "foto/";
    $output_dir = $targetDirectory . $newfile;
    $imageFileType = strtolower(pathinfo($output_dir, PATHINFO_EXTENSION));

    // Cek ekstensi
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $response["success"] = false;
        $response["message"] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        echo json_encode($response);
        exit;
    }

    // Cek ukuran file
    if ($_FILES["fotobrg"]["size"] > 5000000) {
        $response["success"] = false;
        $response["message"] = "File is too large.";
        echo json_encode($response);
        exit;
    }

    // Pindahkan file ke folder
    if (move_uploaded_file($src, $output_dir)) {
        $fotoBaru = $newfile; // simpan nama file baru untuk diupdate ke database
    } else {
        $response["success"] = false;
        $response["message"] = "Failed upload picture.";
        echo json_encode($response);
        exit;
    }
} else {
    // Tidak upload gambar, pakai nama file lama dari input hidden atau text
    $fotoBaru = $_POST['fotobrg1'] ?? ''; // ambil dari input form hidden/text
}


$sqlmst = "UPDATE mstbrg SET nmbrg='" . $nmbrg . "', satuan='" . $satuan . "', jenis='" . $jenis . "', hargabrg ='" . $hargabrg . "' WHERE kdbrg='" . $kdbrg . "'";
$resmst = mysqli_query($conn1, $sqlmst);

$sql = "UPDATE barangjasa SET nmbrg='" . $nmbrg . "',	 stok='" . $stok . "', satuan='" . $satuan . "', jenis='" . $jenis . "', ukuran='" . $ukuran . "', merk='" . $merk . "', harga='" . $hargabrg . "', hargaup='" . $hargaup . "', hargaj='" . $hargaj . "', ketbrg='" . $ketbrg . "', idadm ='" . $id . "',fotobrg ='" . $fotoBaru . "' WHERE kdbrg='" . $kdbrg . "'";
$ressspart = mysqli_query($conn1, $sql);
//echo json_encode($ressspart);
//exit;
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
