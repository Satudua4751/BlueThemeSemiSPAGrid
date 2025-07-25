<?php
if (!defined('APP_SECURE')) {
    die('Direct access not allowed');
}
?>
<ul class="metismenu" id="sidenav">
    <li>
        <a href="dashboard01.php">
            <div class="parent-icon"><i class="material-icons-outlined">home</i> </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>

    <li class="menu-label">Master</li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i> </div>
            <div class="menu-title">Master</div>
        </a>
        <ul id="mymenu">
            <li><a href="mstbarang"><i class="material-icons-outlined">inventory</i>Products</a> </li>
            <li><a href="mstlangganan"><i class="material-icons-outlined">people</i>Customers</a> </li>
            <li><a href="mstsupplier"><i class="material-icons-outlined">factory</i>Supplier</a> </li>

        </ul>
    </li>

    <li class="menu-label">Transaksi</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">warehouse</i> </div>
            <div class="menu-title">Pembelian</div>
        </a>
        <ul id="mymenu">
            <li><a href="pembelian"><i class="material-icons-outlined">local_mall</i>Pembelian</a> </li>
            <li><a href="repbeli"><i class="material-icons-outlined">assessment</i>Report Pembelian</a> </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">space_dashboard</i> </div>
            <div class="menu-title">Penjualan</div>
        </a>
        <ul id="mymenu">
            <li><a href="penjualan" target="_blank"><i class="material-icons-outlined">store</i>Penjualan</a> </li>
            <li><a href="repjual" target="_blank"><i class="material-icons-outlined">assessment</i>Report Penjualan</a> </li>
        </ul>
    </li>
</ul>