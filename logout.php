<?php
// memulai session
session_start();
session_unset();        // optional: bersihkan variabel
// menghancurkan session
$logout = session_destroy();
if ($logout) {
  // mengarahkan ke halaman login.php
  header("location: index.php?login=out");
}
