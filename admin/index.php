<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Health S</title>
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
                    <a class="text-decoration-none text-white" href="index.php">Health S</a>
                </h5>
            </div>
        </div>

        <div class="search position-relative text-center px-4 py-3 mt-2">
            <input type="text" class="form-control w-100 border-0 bg-transparent" placeholder="Search here">
            <i class="fa fa-search position-absolute d-block fs-6"></i>
        </div>
        <ul class="categories list-unstyled">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="uil-user-plus fa-fw"></i><span>Người dùng</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#" id="loadContent">Danh sách người dùng</a></li>
                    <li><a class="dropdown-item" href="#" id="loadContentCapNhat">Thêm người dùng</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="newsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="uil-envelope-download fa-fw"></i><span>Tin Tức</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="newsDropdown">
                    <li><a class="dropdown-item" href="#" id="loadNew">Thêm Tin tức</a></li>
                    <li><a class="dropdown-item" href="#" id="loadNewdel">Xóa Tin tức</a></li>
                </ul>
            </li>
            <!-- Các mục menu khác -->
        </ul>
    </aside>

    <section id="wrapper">
        <nav class="navbar navbar-expand-md bg-dark">
            <div class="container-fluid mx-2 bg-dark">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle-navbar" aria-controls="toggle-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="uil-bars text-white"></i>
                    </button>
                    <a class="navbar-brand bg-dark py-3" href="index.php">Dashboard Health S</a>
                </div>
                <div class="collapse navbar-collapse" id="toggle-navbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">My inbox</a></li>
                                <li><a class="dropdown-item" href="#">Help</a></li>
                                <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="login.php">Log out</a></li>
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
        <div class="p-4" id="contentContainer"></div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#loadContent").click(function (e) {
                e.preventDefault();
                loadContent("khachhang/danhsachkhachhang.php");
            });

            $("#loadContentCapNhat").click(function (e) {
                e.preventDefault();
                loadContent("khachhang/capnhat.php");
            });

            $("#loadNew").click(function (e) {
                e.preventDefault();
                loadContent("themtintuc.php", function () {
                    CKEDITOR.replace('content');
                });
            });

            $("#loadNewdel").click(function (e) {
                e.preventDefault();
                loadContent("capnhattin.php");
            });

            function loadContent(url, callback) {
                $("#contentContainer").load(url, function () {
                    if (callback) {
                        callback();
                    }
                });
            }
        });
    </script>
</body>

</html>
