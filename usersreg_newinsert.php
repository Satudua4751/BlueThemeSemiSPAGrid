<?php
include("koneksi.php");
header("Content-Type: application/json");
$response = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = mysqli_real_escape_string($conn1, $_POST['nmadm']);
    $telp = mysqli_real_escape_string($conn1, $_POST['telpadm']);
    $user = mysqli_real_escape_string($conn1, $_POST['useradm']);
    $pass = trim(mysqli_real_escape_string($conn1, $_POST['passadm']));
    $confirm_password = trim(mysqli_real_escape_string($conn1, $_POST['passadm1']));
    $role = mysqli_real_escape_string($conn1, $_POST['role']);

    // Validasi password
    if (empty($pass)) {
        $response["success"] = false;
        $response["message"] = "input password !!";
        echo json_encode($response);
        exit;
    } elseif (strlen($pass) < 6) {
        $response["success"] = false;
        $response["message"] = "password lenght min 6 !!";
        echo json_encode($response);
        exit;
    }

    // Validasi konfirmasi password
    if (empty($confirm_password)) {
        $response["success"] = false;
        $response["message"] = "repeat password !!";
        echo json_encode($response);
        exit;
    } elseif ($pass !== $confirm_password) {
        $response["success"] = false;
        $response["message"] = "password not same !!";
        echo json_encode($response);
        exit;
    }

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

    // Validasi user
    $sqlcek = "SELECT useradm FROM users WHERE useradm='$user' LIMIT 1";
    $ress = mysqli_query($conn1, $sqlcek);
    if ($ress->num_rows > 0) {
        $response["success"] = false;
        $response["message"] = "User name already taken !!";
        echo json_encode($response);
        exit;
    } else {
        $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
        mysqli_autocommit($conn1, false);
        $sql = "INSERT INTO users (nmadm, telpadm, useradm, passadm, roleadm, fotoadm, idkasir) 
                VALUES ('$nama', '$telp', '$user', '$pass_hashed', '$role', '$newfile', '0')";
        $ressreg = mysqli_query($conn1, $sql);

        if ($ressreg) {
            mysqli_commit($conn1);
            move_uploaded_file($src, $output_dir);
            $response["success"] = true;
            $response["message"] = "Data Berhasil disimpan.";
        } else {
            mysqli_rollback($conn1);
            $response["success"] = false;
            $response["message"] = "Data Gagal disimpan. Error: " . mysqli_error($conn1);
        }
        mysqli_close($conn1);
    }

    echo json_encode($response);
}
