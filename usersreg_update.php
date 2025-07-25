<?php
include("sess_check.php");
header("Content-Type: application/json");
$response = array();
$idadm = mysqli_real_escape_string($conn1, $_POST['idadm']);
$nmadm = mysqli_real_escape_string($conn1, $_POST['nmadm']);
$telp = mysqli_real_escape_string($conn1, $_POST['telpadm']);
$user = mysqli_real_escape_string($conn1, $_POST['useradm']);
$pass = trim(mysqli_real_escape_string($conn1, $_POST['passadm']));
$confirm_password = trim(mysqli_real_escape_string($conn1, $_POST['passadm1']));
$role = mysqli_real_escape_string($conn1, $_POST['roleadm']);

if (isset($_FILES['fotoadm']) && $_FILES['fotoadm']['error'] === UPLOAD_ERR_OK) {
    $src = $_FILES['fotoadm']['tmp_name'];
    $fileext = substr($_FILES['fotoadm']['name'], -5);
    $filename = $_FILES['fotoadm']['name'];
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
    if ($_FILES["fotoadm"]["size"] > 5000000) {
        $response["success"] = false;
        $response["message"] = "File is too large.";
        echo json_encode($response);
        exit;
    }

    // Allow only certain file formats (you can customize this)
    if (!empty($_POST['fotoadm'])) {
        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif") {
            $response["success"] = false;
            $response["message"] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
            echo json_encode($response);
            exit;
        }
    }

    // Pindahkan file ke folder
    if (move_uploaded_file($src, $output_dir)) {
        $fotoBaru = $newfile; // simpan nama file baru untuk diupdate ke database
    } else {
        $response["success"] = false;
        $response["message"] = "Fail upload picture.";
        echo json_encode($response);
        exit;
    }
} else {
    // Tidak upload gambar, pakai nama file lama dari input hidden atau text
    $fotoBaru = $_POST['fotoadm1'] ?? ''; // ambil dari input form hidden/text
}

mysqli_autocommit($conn1, false);
// Cek apakah password baru diisi
if (!empty($pass)) {
    $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET nmadm='" . $nmadm . "',	 telpadm='" . $telp . "', useradm='" . $user . "', passadm='" . $pass_hashed . "', roleadm='" . $role . "' WHERE idadm='" . $idadm . "'";
} else {
    $sql = "UPDATE users SET nmadm='" . $nmadm . "',	 telpadm='" . $telp . "', useradm='" . $user . "', roleadm='" . $role . "' WHERE idadm='" . $idadm . "'";
}
$ressreg = mysqli_query($conn1, $sql);
if (json_encode($ressreg) == 'true') {
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
