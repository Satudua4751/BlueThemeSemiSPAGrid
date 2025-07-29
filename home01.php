<?php
include("sess_check.php"); // ini akan menghentikan akses jika tidak login atau tidak ada sesi

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] == 'getfilter') {
    // Tampilkan konten yang diminta oleh AJAX
    // echo "<div class='alert alert-info'>Konten dari home01.php berhasil dimuat via AJAX.</div>";
} else {
    // Akses langsung yang tidak valid
    die('Direct access not allowed');
}
?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Information</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group" role="group">
        </div>
    </div>
</div>
<!--end breadcrumb-->
<div class="row">
    <div class="col-12 col-lg-4 col-xxl-4 d-flex">
        <div class="card shadow-white rounded-4 w-100">
            <div class="card-body">
                <div class="">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0">Congratulations <span class="fw-600">Jhon</span></h5>
                        <img src="assets/images/apps/party-popper.png" width="24" height="24" alt="">
                    </div>
                    <p class="mb-4">You are the best seller of this monnth</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="mb-0 text-indigo">$168.5K</h3>
                            <p class="mb-3">58% of sales target</p>
                            <button class="btn btn-grd btn-grd-primary rounded-5 border-0 px-4">View Details</button>
                        </div>
                        <img src="assets/images/apps/gift-box-3.png" width="100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-xxl-2 d-flex">
        <div class="card shadow-white rounded-4 w-100">
            <div class="card-body">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div
                        class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary">
                        <span class="material-icons-outlined fs-5">shopping_cart</span>
                    </div>
                    <div>
                        <span class="text-success d-flex align-items-center">+24%<i
                                class="material-icons-outlined">expand_less</i></span>
                    </div>
                </div>
                <div>
                    <h4 class="mb-0">248k</h4>
                    <p class="mb-3">Total Orders</p>
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 col-xxl-2 d-flex">
        <div class="card shadow-white rounded-4 w-100">
            <div class="card-body">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div
                        class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success">
                        <span class="material-icons-outlined fs-5">attach_money</span>
                    </div>
                    <div>
                        <span class="text-success d-flex align-items-center">+14%<i
                                class="material-icons-outlined">expand_less</i></span>
                    </div>
                </div>
                <div>
                    <h4 class="mb-0">$47.6k</h4>
                    <p class="mb-3">Total Sales</p>
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xxl-2 d-flex">
        <div class="card shadow-white rounded-4 w-100">
            <div class="card-body">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div
                        class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-info bg-opacity-10 text-info">
                        <span class="material-icons-outlined fs-5">visibility</span>
                    </div>
                    <div>
                        <span class="text-danger d-flex align-items-center">-35%<i
                                class="material-icons-outlined">expand_less</i></span>
                    </div>
                </div>
                <div>
                    <h4 class="mb-0">189K</h4>
                    <p class="mb-3">Total Visits</p>
                    <div id="chart3"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xxl-2 d-flex">
        <div class="card shadow-white rounded-4 w-100">
            <div class="card-body">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <div
                        class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10 text-warning">
                        <span class="material-icons-outlined fs-5">leaderboard</span>
                    </div>
                    <div>
                        <span class="text-success d-flex align-items-center">+18%<i
                                class="material-icons-outlined">expand_less</i></span>
                    </div>
                </div>
                <div>
                    <h4 class="mb-0">24.6%</h4>
                    <p class="mb-3">Bounce Rate</p>
                    <div id="chart4"></div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->


<div class="row">
    <div class="col-12 col-xl-4">
        <div class="card shadow-white w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="">
                            <h5 class="mb-0">Order Status</h5>
                        </div>
                        <div class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <span class="material-icons-outlined fs-5">more_vert</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="position-relative">
                        <div class="piechart-legend">
                            <h2 class="mb-1">68%</h2>
                            <h6 class="mb-0">Total Sales</h6>
                        </div>
                        <div id="chart6"></div>
                    </div>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                    class="material-icons-outlined fs-6 text-primary">fiber_manual_record</span>Sales</p>
                            <div class="">
                                <p class="mb-0">68%</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                    class="material-icons-outlined fs-6 text-danger">fiber_manual_record</span>Product</p>
                            <div class="">
                                <p class="mb-0">25%</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                                    class="material-icons-outlined fs-6 text-success">fiber_manual_record</span>Income</p>
                            <div class="">
                                <p class="mb-0">14%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-xl-8">
        <div class="card shadow-white w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Sales & Views</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div id="chart5"></div>
                <div
                    class="d-flex flex-column flex-lg-row align-items-start justify-content-around border p-3 rounded-4 mt-3 gap-3">
                    <div class="d-flex align-items-center gap-4">
                        <div class="">
                            <p class="mb-0 data-attributes">
                                <span
                                    data-peity='{ "fill": ["#2196f3", "rgb(255 255 255 / 12%)"], "innerRadius": 32, "radius": 40 }'>5/7</span>
                            </p>
                        </div>
                        <div class="">
                            <p class="mb-1 fs-6 fw-bold">Monthly</p>
                            <h2 class="mb-0">65,127</h2>
                            <p class="mb-0"><span class="text-success me-2 fw-medium">16.5%</span><span>55.21 USD</span></p>
                        </div>
                    </div>
                    <div class="vr"></div>
                    <div class="d-flex align-items-center gap-4">
                        <div class="">
                            <p class="mb-0 data-attributes">
                                <span
                                    data-peity='{ "fill": ["#ffd200", "rgb(255 255 255 / 12%)"], "innerRadius": 32, "radius": 40 }'>5/7</span>
                            </p>
                        </div>
                        <div class="">
                            <p class="mb-1 fs-6 fw-bold">Yearly</p>
                            <h2 class="mb-0">984,246</h2>
                            <p class="mb-0"><span class="text-success me-2 fw-medium">24.9%</span><span>267.35 USD</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->


<div class="row">
    <div class="col-12 col-lg-6 col-xxl-4 d-flex">
        <div class="card shadow-white w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Social Revenue</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <h3 class="mb-0">48,569</h3>
                        <p class="mb-0 text-success gap-3">27%<span class="material-icons-outlined fs-6">arrow_upward</span>
                        </p>
                    </div>
                    <p class="mb-0 font-13">Last 1 Year Income</p>
                </div>
                <div class="table-responsive">
                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="social-icon d-flex align-items-center gap-3 flex-grow-1">
                                <img src="assets/images/apps/17.png" width="40" alt="">
                                <div>
                                    <h6 class="mb-0">Facebook</h6>
                                    <p class="mb-0">Social Media</p>
                                </div>
                            </div>
                            <h5 class="mb-0">45,689</h5>
                            <div class="card-lable bg-success text-success bg-opacity-10">
                                <p class="text-success mb-0">+28.5%</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="social-icon d-flex align-items-center gap-3 flex-grow-1">
                                <img src="assets/images/apps/twitter-circle.png" width="40" alt="">
                                <div>
                                    <h6 class="mb-0">Twitter</h6>
                                    <p class="mb-0">Social Media</p>
                                </div>
                            </div>
                            <h5 class="mb-0">34,248</h5>
                            <div class="card-lable bg-danger text-danger bg-opacity-10">
                                <p class="text-red mb-0">-14.5%</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="social-icon d-flex align-items-center gap-3 flex-grow-1">
                                <img src="assets/images/apps/03.png" width="40" alt="">
                                <div>
                                    <h6 class="mb-0">Tik Tok</h6>
                                    <p class="mb-0">Entertainment</p>
                                </div>
                            </div>
                            <h5 class="mb-0">45,689</h5>
                            <div class="card-lable bg-success text-success bg-opacity-10">
                                <p class="text-green mb-0">+28.5%</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="social-icon d-flex align-items-center gap-3 flex-grow-1">
                                <img src="assets/images/apps/19.png" width="40" alt="">
                                <div>
                                    <h6 class="mb-0">Instagram</h6>
                                    <p class="mb-0">Social Media</p>
                                </div>
                            </div>
                            <h5 class="mb-0">67,249</h5>
                            <div class="card-lable bg-danger text-danger bg-opacity-10">
                                <p class="text-red mb-0">-43.5%</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="social-icon d-flex align-items-center gap-3 flex-grow-1">
                                <img src="assets/images/apps/20.png" width="40" alt="">
                                <div>
                                    <h6 class="mb-0">Snapchat</h6>
                                    <p class="mb-0">Conversation</p>
                                </div>
                            </div>
                            <h5 class="mb-0">89,178</h5>
                            <div class="card-lable bg-success text-success bg-opacity-10">
                                <p class="text-green mb-0">+24.7%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xxl-4 d-flex">
        <div class="card shadow-white w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Popular Products</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/top-products/01.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Apple Hand Watch</h6>
                            <p class="mb-0">Sale: 258</p>
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1">$199</h6>
                            <p class="mb-0 text-success font-13">+12%</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/top-products/02.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Mobile Phone Set</h6>
                            <p class="mb-0">Sale: 169</p>
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1">$159</h6>
                            <p class="mb-0 text-success font-13">+14%</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/top-products/04.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Grey Shoes Pair</h6>
                            <p class="mb-0">Sale: 859</p>
                        </div>
                        <div class="">
                            <div class="text-center">
                                <h6 class="mb-1">$279</h6>
                                <p class="mb-0 text-danger font-13">-12%</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/top-products/05.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Blue Yoga Mat</h6>
                            <p class="mb-0">Sale: 328</p>
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1">$389</h6>
                            <p class="mb-0 text-success font-13">+25%</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/top-products/06.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">White water Bottle</h6>
                            <p class="mb-0">Sale: 992</p>
                        </div>
                        <div class="text-center">
                            <h6 class="mb-1">$584</h6>
                            <p class="mb-0 text-danger font-13">-25%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-12 col-xxl-4 d-flex">
        <div class="card shadow-white w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Top Vendors</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/avatars/01.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Senia</h6>
                            <p class="mb-0">Sale: 879</p>
                        </div>
                        <div class="ratings">
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/avatars/02.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Sylvia</h6>
                            <p class="mb-0">Sale: 879</p>
                        </div>
                        <div class="ratings">
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/avatars/03.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Sonia</h6>
                            <p class="mb-0">Sale: 879</p>
                        </div>
                        <div class="ratings">
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/avatars/04.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Michele</h6>
                            <p class="mb-0">Sale: 879</p>
                        </div>
                        <div class="ratings">
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <img src="assets/images/avatars/08.png" width="55" class="rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">Aoki</h6>
                            <p class="mb-0">Sale: 879</p>
                        </div>
                        <div class="ratings">
                            <span class="material-icons-outlined text-warning fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                            <span class="material-icons-outlined fs-5">star</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->


<div class="row">
    <div class="col-12 col-xxl-6 d-flex">
        <div class="card shadow-white rounded-4 w-100">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Transactions</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div style="width:100%;">
                    <div id="Gridjual" class="slick-container" style="height:520px;"></div>
                    <div id="pager"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 col-xxl-3 d-flex flex-column">
        <div class="card shadow-white rounded-4 w-100">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <p class="mb-1">Messages</p>
                        <h3 class="mb-0">986</h3>
                    </div>
                    <div class="wh-42 d-flex align-items-center justify-content-center rounded-circle bg-grd-danger">
                        <span class="material-icons-outlined fs-5 text-white">shopping_cart</span>
                    </div>
                </div>
                <div class="progress mb-0" style="height:6px;">
                    <div class="progress-bar bg-grd-danger" role="progressbar" style="width: 60%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center mt-3 gap-2">
                    <div class="card-lable bg-success bg-opacity-10">
                        <p class="text-success mb-0">+34.7%</p>
                    </div>
                    <p class="mb-0 font-13">from last month</p>
                </div>
            </div>
        </div>

        <div class="card shadow-white rounded-4 w-100 d-none">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <div class="">
                            <p class="mb-2">Total Profit</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <h4 class="mb-0">$75,365</h4>
                            <div class="card-lable bg-danger bg-opacity-10">
                                <p class="text-danger mb-0">-26.9%</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div id="chart7"></div>
            </div>
        </div>

        <div class="card shadow-white rounded-4 w-100">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">$15.7K</h5>
                        <p class="mb-0">Total Profit</p>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="">
                    <div id="chart9"></div>
                </div>
                <div class="text-center mt-3">
                    <p class="mb-0"><span class="text-success me-1">12.5%</span> from last month</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xxl-3 d-flex">
        <div class="card shadow-white rounded-4 w-100">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Monthly Budget</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <span class="material-icons-outlined fs-5">more_vert</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div class="chart-container mb-2">
                    <div id="chart8"></div>
                </div>
                <div class="text-center">
                    <h3>$84,256</h3>
                    <p class="mb-3">Vestibulum fermentum nisl id nulla ultricies convallis.</p>
                    <button class="btn btn-grd btn-grd-info rounded-5 px-4">Increase Budget</button>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/js/dashboard2.js"></script>

<script type="module">
    import {
        Editors,
        Formatters,
        SlickGlobalEditorLock,
        SlickRowSelectionModel,
        SlickColumnPicker,
        SlickDataView,
        SlickCustomTooltip,
        SlickGridMenu,
        SlickGridPager,
        SlickGrid,
        Utils,
    } from './assets/js/esm/index.js';

    let dataView;
    let grid;

    // Definisikan kolom grid
    let columns = [{
            id: "sel",
            name: "#",
            field: "num",
            behavior: "select",
            cssClass: "text-end",
            width: 30,
            cannotTriggerInsert: true,
            resizable: false,
            selectable: false,
            excludeFromColumnPicker: true
        },
        {
            id: "idtrx",
            name: "No Transaksi",
            field: "idtrx",
            width: 40,
            sortable: true
        },
        {
            id: "tgltrx",
            name: "Tanggal",
            field: "tgltrx",
            width: 40,
            sortable: true
        },
        {
            id: "nmkon",
            name: "Customer",
            field: "nmkon",
            sortable: true
        },
        {
            id: "platno",
            name: "Plat. No",
            field: "platno",
            width: 40,
            sortable: true
        },
        {
            id: "jenispkj",
            name: "Pekerjaan",
            field: "jenispkj",
            sortable: true
        },
        {
            id: "totaljual",
            name: "Total",
            field: "totaljual",
            cssClass: "text-end",
            width: 60,
            formatter: (r, c, v) => {
                if (v == null || isNaN(v)) return 'Rp 0,00';
                return 'Rp ' + parseFloat(v).toLocaleString("id-ID", {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }
        },
        {
            id: "sttrx",
            name: "Status",
            field: "sttrx",
            cssClass: "text-end",
            sortable: true,
            width: 30,
            formatter: (r, c, v) => {
                let badgeClass = "badge bg-secondary";
                if (v === "ongoing") badgeClass = "badge bg-warning";
                else if (v === "finish") badgeClass = "badge bg-success";
                else if (v === "cancel") badgeClass = "badge bg-dark";
                else if (v === "pending") badgeClass = "badge bg-dark";
                return `<span class="${badgeClass}">${v}</span>`;
            }
        }
    ];

    let options = {
        columnPicker: {
            columnTitle: "Columns",
            hideForceFitButton: false,
            hideSyncResizeButton: false,
            forceFitTitle: "Force fit columns",
            syncResizeTitle: "Synchronous resize",
        },
        gridMenu: {
            iconCssClass: "sgi sgi-menu sgi-17px", // you can provide iconImage OR iconCssClass
        },
        editable: false,
        enableAddRow: false,
        enableCellNavigation: true,
        asyncEditorLoading: true,
        forceFitColumns: true,
        enableHtmlRendering: true, // disabling HTML rendering means that `innerHTML` will not be used by SlickGrid (better for CSP)
        rowHeight: 30,
        createFooterRow: true,
        showFooterRow: true,
        footerRowHeight: 30
        // Custom Tooltip options can be defined in a Column or Grid Options or a mixed of both (first options found wins)
        //customTooltip: {
        //    formatter: tooltipFormatter,
        //}
    };

    let sortcol = "title";
    let sortdir = 1;
    let searchString = "";

    function myFilter(item, args) {
        if (args.searchString != "" && item["nmkon"].indexOf(args.searchString) == -1) {
            return false;
        }
        return true;
    }

    function comparer(a, b) {
        let x = a[sortcol],
            y = b[sortcol];
        return (x == y ? 0 : (x > y ? 1 : -1));
    }

    function updateFooterTotals() {
        let total = 0;
        dataView.getItems().forEach(item => {
            let val = parseFloat(item.totaljual);
            if (!isNaN(val)) total += val;
        });

        let footerRowNode = grid.getFooterRowColumn("totaljual");
        if (footerRowNode) {
            footerRowNode.innerHTML = `<div class="text-end font-weight-bolder">Rp ${total.toLocaleString("id-ID", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        })}</div>`;
        }
    }

    // Ambil data dari PHP
    fetch('./api/homejual01.php')
        .then(res => res.json())
        .then(data => {
            data.forEach((item, i) => {
                item.id = i;
                item.num = i + 1;
            }); // SlickGrid wajib punya unique `id`
            //console.log("DATA TERAMBIL:", data); // Tambahan debug
            dataView.setItems(data);
            updateFooterTotals(); // <-- Tambahkan ini di sini!
            setTimeout(() => window.dispatchEvent(new Event('resize')), 500); // Untuk paksa layout refresh
        })
        .catch(err => console.error("Gagal ambil data:", err));

    // Setup DataView dan Grid
    dataView = new SlickDataView({
        useCSPSafeFilter: true
    });

    grid = new SlickGrid("#Gridjual", dataView, columns, options, {
        enableCellNavigation: true,
        enableColumnReorder: false,
    });
    grid.setSelectionModel(new SlickRowSelectionModel());

    let pager = new SlickGridPager(dataView, grid, "#pager");
    let columnpicker = new SlickColumnPicker(columns, grid, options);
    let gridMenu = new SlickGridMenu(columns, grid, options);



    grid.onKeyDown.subscribe(function(e) {
        // select all rows on ctrl-a
        if (e.which != 65 || !e.ctrlKey) {
            return false;
        }

        let rows = [];
        for (let i = 0; i < dataView.getLength(); i++) {
            rows.push(i);
        }

        grid.setSelectedRows(rows);
        e.preventDefault();
    });

    grid.onSort.subscribe(function(e, args) {
        sortdir = args.sortAsc ? 1 : -1;
        sortcol = args.sortCol.field;

        // using native sort with comparer
        dataView.sort(comparer, args.sortAsc);
        updateFooterTotals(); // <--- Panggilan pertama setelah load
    });

    // wire up model events to drive the grid
    // !! both dataView.onRowCountChanged and dataView.onRowsChanged MUST be wired to correctly update the grid
    // see Issue#91
    dataView.onRowCountChanged.subscribe(function(e, args) {
        grid.updateRowCount();
        grid.render();
    });

    dataView.onRowsChanged.subscribe(function(e, args) {
        grid.invalidateRows(args.rows);
        grid.render();
        updateFooterTotals(); // <-- Tambahkan ini!
    });

    dataView.onPagingInfoChanged.subscribe(function(e, pagingInfo) {
        grid.updatePagingStatusFromView(pagingInfo);

        // show the pagingInfo but remove the dataView from the object, just for the Cypress E2E test
        delete pagingInfo.dataView;
        //console.log('on After Paging Info Changed - New Paging:: ', pagingInfo);
    });

    dataView.onBeforePagingInfoChanged.subscribe(function(e, previousPagingInfo) {
        // show the previous pagingInfo but remove the dataView from the object, just for the Cypress E2E test
        delete previousPagingInfo.dataView;
        //console.log('on Before Paging Info Changed - Previous Paging:: ', previousPagingInfo);
    });

    document.querySelectorAll("#txtSearch2").forEach(elm => elm.addEventListener('keyup', (e) => {
        SlickGlobalEditorLock.cancelCurrentEdit();
        // clear on Esc
        if (e.which == 27) e.target.value = '';
        searchString = (e.target.value || '').trim();
        updateFilter();
        dataView.refresh();
        updateFooterTotals(); // <--- Panggilan pertama setelah load
    }));

    function updateFilter() {
        dataView.setFilterArgs({
            searchString
        });
        dataView.refresh();
        updateFooterTotals(); // <--- Panggilan pertama setelah load
    }

    // initialize the model after all the events have been hooked up
    grid.resizeCanvas();
    dataView.beginUpdate();
    dataView.endUpdate();
    grid.invalidate(); // <- WAJIB
    grid.render(); // <- WAJIB
    dataView.setFilterArgs({
        searchString
    });
    dataView.setFilter(myFilter);
    dataView.endUpdate();

    dataView.syncGridSelection(grid, true);
</script>