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

?>

<div class="row g-3 align-items-center">
    <div class="input-group input-group-sm">
        <span class="input-group-text col-3"><strong>Kode Jurnal</strong></span>
        <div class="col">
            <input type="text" name="norek" id="norek" class="form-control" placeholder="Norek" value="<?php echo $data['norek'] ?>" readonly>
        </div>
    </div>
</div>
<div class="row g-3 align-items-center">
    <div class="input-group input-group-sm">
        <span class="input-group-text col-3"><strong>Nama Jurnal</strong></span>
        <div class="col">
            <input type="text" name="nmrek" id="nmrek" class="form-control" placeholder="Nama" value="<?php echo $data['nmrek'] ?>" required>
        </div>
    </div>
</div>
</br>
<h4 class="text-danger text-center"> Yakin Hapus Data ? </h4>