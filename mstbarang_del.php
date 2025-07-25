<?php
include("sess_check.php");

if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
    die('Direct access not allowed');
}
$kdbrg = $_REQUEST['kdbrg'];
$sql = "SELECT * FROM barangjasa WHERE kdbrg ='" . $kdbrg . "'";
$result = mysqli_query($conn1, $sql);
$data = mysqli_fetch_array($result);
$jnsselected = $data['jenis'];

?>

<div class="row mb-3">
    <label for="kdbrg" class="col-sm-3 col-form-label">Code</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="kdbrg" name="kdbrg" placeholder="code part" value="<?php echo $data['kdbrg']; ?>" readonly>
    </div>
</div>
<div class="row mb-3">
    <label for="nmbrg" class="col-sm-3 col-form-label">Item Name</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nmbrg" name="nmbrg" placeholder="item name" value="<?php echo $data['nmbrg']; ?>" readonly>
    </div>
</div>
</br>
<h5 class="text-danger">are you sure delete this ?</h5>