    <?php
include("sess_check.php");

if (!defined('APP_SECURE') && (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) {
    die('Direct access not allowed');
}
$idadm = $_REQUEST['idadm'];
$sql = "SELECT * FROM users WHERE idadm ='" . $idadm . "'";
$result = mysqli_query($conn1, $sql);
$data = mysqli_fetch_array($result);

?>

<div class="row mb-3">
    <label for="nmadm" class="col-sm-3 col-form-label">Name</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nmadm" name="nmadm" placeholder="item name" value="<?php echo $data['nmadm']; ?>">
        <input type="hidden" class="form-control" id="idadm" name="idadm" placeholder="item name" value="<?php echo $data['idadm']; ?>">
    </div>
</div>

</br>
<h5 class="text-danger">Are you sure to delete this?</h5>