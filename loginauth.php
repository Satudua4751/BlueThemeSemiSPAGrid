<?php
// memanggil file koneksi
include("koneksi.php");
$username = $password = $akses = "";

// mengecek apakah tombol login sudah di tekan atau belum
if (isset($_POST['login'])) {

	// mengecek apakah username dan password sudah di isi atau belum
	if (empty($_POST['username']) || empty($_POST['password'])) {
		// mengarahkan ke halaman index.php
		header("location: index.php?err=empty");
	} else {
		// membaca nilai variabel username dan password
		$username = $_POST['username'];
		$password = $_POST['password'];

		// sanitize input
		$username = trim(htmlentities(strip_tags($_POST['username'])));
		$password = trim(htmlentities(strip_tags($_POST['password'])));

		// gunakan prepared statement
		$stmt = $conn1->prepare("SELECT * FROM users WHERE useradm = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		// cek apakah user ditemukan
		if ($result->num_rows === 1) {
			$dataku = $result->fetch_assoc();
			// Verifikasi password dengan hash yang ada di DB
			if (password_verify($password, $dataku['passadm'])) {
				session_start();
				$_SESSION['aaa'] = $dataku['useradm'];
				$_SESSION['bbb'] = $dataku['passadm'];
				$_SESSION['ccc'] = $dataku['roleadm'];
				$_SESSION['ddd'] = $dataku['idadm'];
				$_SESSION['eee'] = $dataku['idkasir'];
				$otherinfo = $_SESSION['aaa'];

				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
					$ip_address = $_SERVER['HTTP_CLIENT_IP'];
				}
				//whether ip is from proxy
				elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
					$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
					//whether ip is from remote address
					$ip_address = $_SERVER['REMOTE_ADDR'];
					$br_info = $_SERVER['HTTP_USER_AGENT'];
				}

				$sqlloginfo = "INSERT INTO logininfo (webaddress, username, otherinfo) VALUES ('$ip_address', '$br_info', '$otherinfo')";
				$ress = mysqli_query($conn1, $sqlloginfo);
				if ($_SESSION['ccc'] == 'admin') {
					echo "masuk kesini admin";
					header("location: dashboard01.php?login=sukses");
				} elseif ($_SESSION['ccc'] == 'operator') {
					header("location: dashboard01.php?login=sukses");
				} elseif ($_SESSION['ccc'] == 'akun') {
					echo "masuk kesini akun";
					header("location: dashboard01.php?login=sukses");
				}
			} else {
				header("location: index.php?err=failed");
			}
		} else {
			header("location: index.php?err=failed");
		}
	}
}
