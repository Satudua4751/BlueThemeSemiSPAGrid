<?php
include("sess_check.php");

if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
    die('Direct access not allowed');
}

$norek = substr(trim($_REQUEST['norek']), 0, 6);
$bln = substr(trim($_REQUEST['norek']), 6, 2);
$thn = substr(trim($_REQUEST['norek']), 8, 4);
$sql = "SELECT * FROM glmas$thn WHERE norek ='" . $norek . "'";
$result = mysqli_query($conn1, $sql);
$data = mysqli_fetch_array($result);
$slak = 0;
$dk = $data['tprek'];
$gr = $data['grrek'];
$sl = $data['saldo' . $bln];
$db = $data['debet' . $bln];
$kd = $data['kredit' . $bln];
$db1 = $data['debt' . $bln];
$kd1 = $data['kred' . $bln];
$am1 = $data['amount' . $bln];

if (($dk == 'D')) {
	$slak = $sl + $db + $db1 - $kd - $kd1;
} else {
	$slak = $sl - $db - $db1 + $kd + $kd1;
}

?>

<div class="row g-3 align-items-center">
	<div class="input-group input-group-sm">
		<span class="input-group-text col-3"><strong>Kode Jurnal</strong></span>
		<div class="col">
			<input type="text" name="norek" id="norek" class="form-control" aria-labelledby="norek" value="<?php echo $data['norek'] ?>" readonly>
			<input type="hidden" name="bln" id="bln" class="form-control" aria-labelledby="norek" value="<?php echo $bln ?>" readonly>
		</div>
	</div>
</div>
<div class="row g-3 align-items-center">
	<div class="input-group input-group-sm">
		<span class="input-group-text col-3"><strong>Nama Jurnal</strong></span>
		<div class="col">
			<input type="text" name="nmrek" id="nmrek" class="form-control" aria-labelledby="nmrek" value="<?php echo $data['nmrek'] ?>" >
		</div>
	</div>
</div>
<div class="row g-3 align-items-center">
	<div class="input-group input-group-sm">
		<span class="input-group-text col-3"><strong>Tipe</strong></span>
		<div class="col">
			<select name="tprek" id="tprek" class="form-select" aria-label="Default select example">
				<option value="">D/K</option>
				<option value="D" <?php if ($dk === "D") echo " selected"; ?>>DEBET</option>
				<option value="K" <?php if ($dk === "K") echo " selected"; ?>>KREDIT</option>
			</select>
		</div>
		<span class="input-group-text col-3"><strong>Grup</strong></span>
		<div class="col">
			<select name="grrek" id="grrek" class="form-select" aria-label="Default select example">
				<option value="">1/2/3/4/5</option>
				<option value="1" <?php if ($gr === "1") echo " selected"; ?>>ASET</option>
				<option value="2" <?php if ($gr === "2") echo " selected"; ?>>HUTANG</option>
				<option value="3" <?php if ($gr === "3") echo " selected"; ?>>MODAL</option>
				<option value="4" <?php if ($gr === "4") echo " selected"; ?>>PENDAPATAN</option>
				<option value="5" <?php if ($gr === "5") echo " selected"; ?>>BIAYA</option>
			</select>
		</div>
	</div>
</div>
<div class="row g-3 align-items-center">
	<div class="input-group input-group-sm">
		<span class="input-group-text col-3"><strong>Saldo Awal</strong></span>
		<div class="col">
			<input type="number" name="saldo" id="saldo" class="form-control text-end" aria-labelledby="saldo" value="<?php echo number_format($sl, 2,'.','') ?>">
		</div>
	</div>
</div>
<div class="row g-3 align-items-center">
	<div class="input-group input-group-sm">
		<span class="input-group-text col-3"><strong>Debet</strong></span>
		<div class="col">
			<input type="number" name="debet" id="debet" class="form-control text-end" aria-labelledby="debet" value="<?php echo number_format($db, 2,'.','') ?>" >
		</div>
		<span class="input-group-text col-3"><strong>Debet Penutup</strong></span>
		<div class="col">
			<input type="number" name="debt" id="debt" class="form-control text-end" aria-labelledby="debt" value="<?php echo number_format($db1, 2,'.','') ?>" >
		</div>
	</div>
</div>
<div class="row g-3 align-items-center">
	<div class="input-group input-group-sm">
		<span class="input-group-text col-3"><strong>Kredit</strong></span>
		<div class="col">
			<input type="number" name="kredit" id="kredit" class="form-control text-end" aria-labelledby="kredit" value="<?php echo number_format($kd, 2,'.','') ?>" >
		</div>
		<span class="input-group-text col-3"><strong>Kredit Penutup</strong></span>
		<div class="col">
			<input type="number" name="kred" id="kred" class="form-control text-end" aria-labelledby="kred" value="<?php echo number_format($kd1, 2,'.','') ?>" >
		</div>
	</div>
</div>
<div class="row g-3 align-items-center">
	<div class="input-group input-group-sm">
		<span class="input-group-text col-3"><strong>Amount</strong></span>
		<div class="col">
			<input type="number" name="amount" id="amount" class="form-control text-end" aria-labelledby="amount" value="<?php echo number_format($am1, 2,'.','') ?>" readonly>
		</div>
	</div>
</div>
<div class="row g-3 align-items-center">
	<div class="input-group input-group-sm">
		<span class="input-group-text col-3"><strong>Saldo Akhir</strong></span>
		<div class="col">
			<input type="number" name="akhir" id="akhir" class="form-control text-end" aria-labelledby="akhir" value="<?php echo number_format($slak, 2,'.','') ?>" readonly>
		</div>
	</div>
</div>