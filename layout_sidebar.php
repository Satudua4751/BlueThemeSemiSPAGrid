<?php
if (!defined('APP_SECURE')) {
    die('Direct access not allowed');
}
?>
<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="assets/images/BE-SQL-LOGO-01c.png" class="logo-img" alt="">
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">BE-SQL</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <?php
        switch ($userslg) {
            case 'admin':
                include 'layout_sidebar01.php';
                break;
            case 'akun':
                include 'layout_sidebar01.php';
                break;
            case 'operator':
                include 'layout_sidebar02.php';
                break;
        }
        ?>
        <!--end navigation-->
    </div>
</aside>
<!--end sidebar-->