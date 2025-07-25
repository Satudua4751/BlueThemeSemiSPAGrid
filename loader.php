<?php
define('APP_SECURE', true);

$page = basename($_GET['page']);
$file = $page . '.php';

if (file_exists($file)) {
    include($file);

    // Tambahkan loader JS modul otomatis
    // echo "<script type='module' src='./assets/js/{$page}.js'></script>";
} else {
    http_response_code(404);
    echo "Halaman tidak ditemukan.";
}