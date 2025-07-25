<?php
include("sess_check.php");
header("Content-Type: application/json");
$cek = $valid = 0;
$response = array();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_SESSION['ddd'];
    $kdbrg = mysqli_real_escape_string($conn1, $_POST['kdbrg']);
    $nmbrg = mysqli_real_escape_string($conn1, $_POST['nmbrg']);
    $stok = mysqli_real_escape_string($conn1, $_POST['stok']);
    $satuan = mysqli_real_escape_string($conn1, $_POST['satuan']);
    $jenis = mysqli_real_escape_string($conn1, $_POST['jenis']);
    $hargabrg = mysqli_real_escape_string($conn1, $_POST['hargabrg']);
    $hargaup = mysqli_real_escape_string($conn1, $_POST['hargaup']);
    $hargaj = mysqli_real_escape_string($conn1, $_POST['hargaj']);
    $tglbeli = date('Y-m-d');
    $ukuran = mysqli_real_escape_string($conn1, $_POST['ukuran']);
    $merk = mysqli_real_escape_string($conn1, $_POST['merk']);
    $ketbrg = mysqli_real_escape_string($conn1, $_POST['ketbrg']);
    // validasi kode spart
    $sqlcek = "SELECT kdbrg FROM barangjasa WHERE jenis='barang' AND kdbrg='" . $kdbrg . "' limit 1";
    $ress = mysqli_query($conn1, $sqlcek);
    if ($ress->num_rows > 0) {
        $response["success"] = false;
        $response["message"] = "Kode Spare Part Sudah ada";
        echo json_encode($response);
        exit;
    } else {
        mysqli_autocommit($conn1, false);

        if ($stok == 0) {
            $stok = 0;
        }

        if ($hargabrg == 0) {
            $hargabrg = 0;
        }

        if ($hargaj == 0) {
            if ($hargaup == 0) {
                $hargaup = 0;
                $hargaj = $hargabrg;
            } else {
                $hargaj = $hargabrg + ($hargabrg * $hargaup / 100);
            }
        } else {
        }

        $src = $_FILES['fotobrg']['tmp_name'];
        $fileext = substr($_FILES['fotobrg']['name'], -5);
        $filename = $_FILES['fotobrg']['name'];
        $newfile = date('YmdHis') . $fileext;
        $targetDirectory = "foto/"; // Specify your upload directory
        $output_dir = $targetDirectory . $newfile;
        $imageFileType = strtolower(pathinfo($output_dir, PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($output_dir)) {
            $response["success"] = false;
            $response["message"] = "File already exists.";
            echo json_encode($response);
            exit;
        }

        // Check file size (adjust as needed)
        if ($_FILES["fotobrg"]["size"] > 5000000) {
            $response["success"] = false;
            $response["message"] = "File is too large.";
            echo json_encode($response);
            exit;
        }

        // Allow only certain file formats (you can customize this)
        if (!empty($_POST['fotobrg'])) {
            if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif") {
                $response["success"] = false;
                $response["message"] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
                echo json_encode($response);
                exit;
            }
        }
        $sqlmst = "INSERT INTO mstbrg (kdbrg,nmbrg,satuan,jenis,hargabrg) VALUES ('$kdbrg','$nmbrg','$satuan','$jenis','$hargabrg')";
        $resmst = mysqli_query($conn1, $sqlmst);

        $ressspart = mysqli_query($conn1, "INSERT INTO barangjasa(kdbrg,nmbrg,satuan,jenis,ukuran,merk,tglbeli,stok,qtyin,qtyout,harga,hargaup,hargaj,ketbrg,fotobrg,idadm) VALUES('$kdbrg','$nmbrg','$satuan','$jenis','$ukuran','$merk','$tglbeli','$stok',0,0,'$hargabrg','$hargaup','$hargaj','$ketbrg','$newfile','$id')");
        if (json_encode($ressspart) == 'true') {
            mysqli_commit($conn1);
            move_uploaded_file($src, $output_dir);
            $response["success"] = true;
            $response["message"] = "Save Success.";
        } else {
            mysqli_rollback($conn1);
            $response["success"] = false;
            $response["message"] = "Failed to save.";
        }
        mysqli_close($conn1);
    }
    echo json_encode($response);
}
