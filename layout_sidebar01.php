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
            <li><a href="mstbarang" class="hover-1"><i class="material-icons-outlined">inventory</i>Products</a> </li>
            <li><a href="mstbarang01" class="hover-1"><i class="material-icons-outlined">inventory</i>Products01</a> </li>
            <li><a href="mstlangganan" class="hover-1"><i class="material-icons-outlined">people</i>Customers</a> </li>
            <li><a href="mstsupplier" class="hover-1"><i class="material-icons-outlined">factory</i>Supplier</a> </li>
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
            <li><a href="penjualan01" class="hover-1"><i class="material-icons-outlined">store</i>Penjualan</a> </li>
            <li><a href="repjual01" class="hover-1"><i class="material-icons-outlined">assessment</i>Report Penjualan</a> </li>
        </ul>
    </li>
    <li class="menu-label">Report</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">assignment</i>
            </div>
            <div class="menu-title">Report</div>
        </a>
        <ul id="mymenu">
            <li><a href="reporder" target="_blank"><i class="material-icons-outlined">pending_actions</i>Out-Standing</a></li>
            <li><a href="reponproses" target="_blank"><i class="material-icons-outlined">pending_actions</i>On-Going</a></li>
            <li><a href="repmargin" target="_blank"><i class="material-icons-outlined">show_chart</i>Margin</a></li>
        </ul>
    </li>
    <li class="menu-label">Administration</li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">app_registration</i>
            </div>
            <div class="menu-title">Registration</div>
        </a>
        <ul id="mymenu">
            <li><a href="usersreg"><i class="material-icons-outlined">how_to_reg</i>Registration</a> </li>
            <li><a href="usersret"><i class="material-icons-outlined">refresh</i>Reset Account</a> </li>
            <li><a href="usersret"><i class="material-icons-outlined">lock_reset</i>Forgot Pass</a> </li>
        </ul>
    </li>
</ul>