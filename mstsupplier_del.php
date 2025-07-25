<?php
include("sess_check.php");

if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
    die('Direct access not allowed');
}
$idspl = $_REQUEST['idspl'];
$sql = "SELECT * FROM supplier WHERE idspl ='" . $idspl . "'";
$result = mysqli_query($conn1, $sql);
$data = mysqli_fetch_array($result);
$pkpsel = $data['pkp'];

?>

<div class="row mb-3">
    <label for="nmspl" class="col-sm-3 col-form-label">Supplier Name</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nmspl" name="nmspl" placeholder="item name" value="<?php echo $data['nmspl']; ?>">
        <input type="hidden" class="form-control" id="idspl" name="idspl" placeholder="item name" value="<?php echo $data['idspl']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="almtspl" class="col-sm-3 col-form-label">Address</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="almtspl" name="almtspl" placeholder="Address here" value="<?php echo $data['almtspl']; ?>">
    </div>
</div>
</br>
<h5 class="text-danger">Are you sure to delete this?</h5>