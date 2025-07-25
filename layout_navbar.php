<?php
if (!defined('APP_SECURE')) {
    die('Direct access not allowed');
}
?>

<nav class="navbar navbar-expand align-items-center gap-4">
    <div class="btn-toggle">
        <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
    </div>
    <div class="search-bar flex-grow-1">
        <div class="position-relative">
            <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text" placeholder="Search">
            <span
                class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
            <span
                class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>

        </div>
    </div>
    <ul class="navbar-nav gap-1 nav-right-links align-items-center">
        <li class="nav-item d-lg-none mobile-search-btn">
            <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown"><img
                    src="assets/images/county/04.png" width="22" alt="">
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                            src="assets/images/county/04.png" width="20" alt=""><span class="ms-2">Indonesia</span></a>
                </li>
                <li><a class="dropdown-item d-flex align-items-center py-2" href="javascript:;"><img
                            src="assets/images/county/01.png" width="20" alt=""><span class="ms-2">Canada</span></a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
                data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">apps</i></a>
            <div class="dropdown-menu dropdown-menu-end dropdown-apps shadow-lg p-3">
                <div class="border rounded-4 overflow-hidden">
                    <div class="row row-cols-3 g-0 border-bottom">
                        <div class="col border-end">
                            <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                <div class="app-icon">
                                    <img src="assets/images/apps/01.png" width="36" alt="">
                                </div>
                                <div class="app-name">
                                    <p class="mb-0">Gmail</p>
                                </div>
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                <div class="app-icon">
                                    <img src="assets/images/apps/02.png" width="36" alt="">
                                </div>
                                <div class="app-name">
                                    <p class="mb-0">Skype</p>
                                </div>
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                <div class="app-icon">
                                    <img src="assets/images/apps/04.png" width="36" alt="">
                                </div>
                                <div class="app-name">
                                    <p class="mb-0">YouTube</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->

                    <div class="row row-cols-3 g-0 border-bottom">
                        <div class="col border-end">
                            <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                <div class="app-icon">
                                    <img src="assets/images/apps/05.png" width="36" alt="">
                                </div>
                                <div class="app-name">
                                    <p class="mb-0">Google</p>
                                </div>
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                <div class="app-icon">
                                    <img src="assets/images/apps/12.png" width="36" alt="">
                                </div>
                                <div class="app-name">
                                    <p class="mb-0">Photo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col border-end">
                            <div class="app-wrapper d-flex flex-column gap-2 text-center">
                                <div class="app-icon">
                                    <img src="assets/images/apps/06.png" width="36" alt="">
                                </div>
                                <div class="app-name">
                                    <p class="mb-0">Instagram</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row row-cols-3 g-0 border-bottom">
                    </div><!--end row-->
                    <div class="row row-cols-3 g-0">
                    </div><!--end row-->
                </div>
            </div>
        </li>

        <li class="nav-item dropdown shawdow-white">
            <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                <img src="foto/<?php echo $fotoadm; ?>" class="rounded-circle p-1 border" width="45" height="45" alt="">
            </a>
            <div class="dropdown-menu dropdown-user dropdown-menu-end shawdow-white">
                <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                    <div class="text-center">
                        <img src="foto/<?php echo $fotoadm; ?>" class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                            alt="">
                        <h5 class="user-name mb-0 fw-bold">Hello, <?php echo $nmadm; ?> </h5>
                    </div>
                </a>
                <form method="POST" action="logout.php" class="d-none" id="logout-form">
                    <input type="hidden" autocomplete="off">
                </form>
                <hr class="dropdown-divider">
                <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                        class="material-icons-outlined">account_circle</i>Profile</a>
                <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
                        class="material-icons-outlined">settings</i>Setting</a>
                <hr class="dropdown-divider">
                <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;" data-bs-toggle="modal" data-bs-target="#logoutModal"><i
                        class="material-icons-outlined">power_settings_new</i>Logout</a>
            </div>
        </li>
    </ul>
</nav>