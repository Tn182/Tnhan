<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý khách sạn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/from.css">
    <script src="./ckeditor/ckeditor.js"></script>

</head>

<body class="bg-light">
    <aside class="sidebar bg-dark position-fixed top-0 left-0 overflow-auto h-100 float-left" id="show-side-navigation1">
        <i class="uil-bars close-aside d-md-none d-lg-none" data-close="show-side-navigation1"></i>
        <div class="bg-dark d-flex align-items-center px-3 py-4">
            <div class="ms-2">
                <h5 class="fs-6 mb-0">
                    <a class="text-decoration-none text-white" href="index.php">TNT - HOTEL</a>
                </h5>
            </div>
        </div>

        <div class="search position-relative text-center px-4 py-3 mt-2">
            <input type="text" class="form-control w-100 border-0 bg-transparent" placeholder="Search here">
            <i class="fa fa-search position-absolute d-block fs-6"></i>
        </div>
        <ul class="categories list-unstyled">
            <li class="has-dropdown">
                <i class="uil-shopping-cart-alt"></i> <span>Đặt phòng</span>
                <ul class="sidebar-dropdown list-unstyled">
                    <li><a href="index.php?act=phongmoidat">Phòng mới đặt</a></li>
                    <li><a href="index.php?act=xacnhanthanhtoan">Xác nhận thanh toán</a></li>
                    <li><a href="index.php?act=chotraphong">Chờ trả phòng</a></li>
                    <li><a href="index.php?act=hosodatphong">Hồ sơ đặt phòng</a></li>
                </ul>
            </li>

            <!-- <li class="has-dropdown">
                <i class="uil-estate fa-fw"></i> <span>Khách sạn</span>
                <ul class="sidebar-dropdown list-unstyled">
                    <li><a href="#">Danh sách khách sạn</a></li>
                    <li><a href="#">Thêm khách sạn</a></li>
                </ul>
            </li> -->
            <li class="has-dropdown">
                <i class="uil-bright"></i><span>Quản lý loại phòng</span>
                <ul class="sidebar-dropdown list-unstyled">
                    <li><a href="index.php?act=danhs_loaiphong">Danh sách Loại phòng</a></li>
                    <li><a href="index.php?act=themloaiphong">Thêm loại phòng</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <i class="uil-bright"></i><span>Quản lý Tiện nghi</span>
                <ul class="sidebar-dropdown list-unstyled">
                    <li><a href="index.php?act=danhs_tiennghi">Danh sách Tiện nghi</a></li>
                    <li><a href="index.php?act=themtiennghi">Thêm Tiện nghi</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <i class="uil-bright"></i><span>Quản lý Cơ sở</span>
                <ul class="sidebar-dropdown list-unstyled">
                    <li><a href="index.php?act=danhs_coso">Danh sách Cơ sở</a></li>
                    <li><a href="index.php?act=themcoso">Thêm Cơ sở</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <i class="uil-th"></i> <span>Phòng</span>
                <ul class="sidebar-dropdown list-unstyled">
                    <li><a href="index.php?act=danhsachphong">Danh sách phòng</a></li>
                    <li><a href="index.php?act=phong">Thêm phòng</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <i class="uil-user-plus fa-fw"></i><span>Người dùng</span>
                <ul class="sidebar-dropdown list-unstyled">
                    <li><a href="index.php?act=danhsachkh">Danh sách người dùng</a></li>
                    <li><a href="index.php?act=them_taikhoan">Thêm người dùng</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <i class="uil-envelope-download fa-fw"></i><span>Tin Tức</span>
                <ul class="sidebar-dropdown list-unstyled">
                    <li><a href="index.php?act=danhs_tintuc">Danh sách tin tức</a></li>
                    <li><a href="index.php?act=them_tintuc">Thêm Tin tức</a></li>
                </ul>
            </li>
            <li class="">
                <i class=" uil-comment-alt-heart"></i> <a href="index.php?act=binhluan"> Bình luận</a>
            </li>
            <li class="">
                <i class="uil-file-info-alt "></i> <a href="index.php?act=danhgia"> Đánh giá</a>
            </li>
            <li class="">
                <i class="uil-chart-growth-alt"></i><a href="settings.php">Cài đặt</a>
            </li>
        </ul>
    </aside>

    <section id="wrapper">
        <nav class="navbar navbar-expand-md bg-dark">
            <div class="container-fluid mx-2 bg-dark">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle-navbar" aria-controls="toggle-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="uil-bars text-white"></i>
                    </button>
                    <a class="navbar-brand bg-dark py-3" href="index.php">QUẢN LÝ KHÁCH SẠN</span></a>
                </div>
                <div class="collapse navbar-collapse" id="toggle-navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="#">My account</a>
                                </li>
                                <li><a class="dropdown-item" href="#">My inbox</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Help</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Log out</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i data-show="show-side-navigation1" class="uil-bars show-side-btn"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="p-4">