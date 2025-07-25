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
    </div>
</div>
<div class="row mb-3">
    <label for="almtspl" class="col-sm-3 col-form-label">Address</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="almtspl" name="almtspl" placeholder="Address here" value="<?php echo $data['almtspl']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="pkp" class="col-sm-3 col-form-label">Type PKP</label>
    <div class="col-sm-9">
        <select class="form-select" id="pkp" name="pkp">
            <option value="pkp" <?php if ($pkpsel === "pkp") echo " selected"; ?>>PKP</option>
            <option value="nonpkp" <?php if ($pkpsel === "nonpkp") echo " selected"; ?>>NON-PKP</option>
            
        </select>
    </div>
</div>
<div class="row mb-3">
    <label for="telpspl" class="col-sm-3 col-form-label">Phone Number</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="telpspl" name="telpspl" placeholder="Phone Number here" value="<?php echo $data['telpspl']; ?>">
    </div>
</div>
<div class="row mb-3">
    <label for="npwp" class="col-sm-3 col-form-label">NPWP</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="npwp" name="npwp" placeholder="0000 0000 0000 0000" value="<?php echo $data['npwp']; ?>">
    </div>
</div>