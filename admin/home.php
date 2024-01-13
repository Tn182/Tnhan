<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .center-text {
            text-align: center;
        }

        .font-weight-bold {
            font-weight: bold;
            font-size: 18px;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>
    <?php
    $so_loaiphong = so_loaiphong();
    $so_phong = so_phong();
    $so_binhluan = so_binhluan();
    $so_danhgia = so_danhgia();
    $so_khachhang = so_khachhang();
    $so_donphong = so_donphong();
    $so_donphonghuy = so_donphonghuy();
    $tong_tien_donphong = tong_tien_donphong();
    $tong_tien = number_format((int)$tong_tien_donphong['TongTien'], 0, '.', '.');
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 font-weight-bold">
                <div class="p-3 mb-2  text-black rounded shadow custom-color-1">
                    <p class="center-text text-dark">Tổng số loại phòng</p>
                    <p class="center-text text-dark"><?php echo $so_loaiphong['SoLuongLoaiPhong']; ?></p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3  font-weight-bold">
                <div class="p-3 mb-2  text-black rounded shadow custom-color-2">
                    <p class="center-text text-dark">Tổng số phòng</p>
                    <p class="center-text text-dark"><?php echo $so_phong['SoLuongPhong']; ?></p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 font-weight-bold font-weight-bold">
                <div class="p-3 mb-2  text-black rounded shadow custom-color-2">
                    <p class="center-text text-dark">Bình Luận</p>
                    <p class="center-text text-dark"><?php echo $so_binhluan['SoLuongBinhLuan']; ?></p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 font-weight-bold">
                <div class="p-3 mb-2  text-black rounded shadow custom-color-1">
                    <p class="center-text text-dark">Xếp hạng và Đánh giá</p>
                    <p class="center-text text-dark"><?php echo $so_danhgia['SoLuongDanhGia']; ?></p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 font-weight-bold">
                <div class="p-3 mb-2  text-black rounded shadow custom-color-2">
                    <p class="center-text text-dark">Khách hàng đăng ký</p>
                    <p class="center-text text-dark"><?php echo $so_khachhang['SoLuongKhachHang']; ?></p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 font-weight-bold">
                <div class="p-3 mb-2  text-black rounded shadow custom-color-3">
                    <p class="center-text text-dark">Tổng số phòng đặt</p>
                    <p class="center-text text-dark"><?php echo $so_donphong['SoLuongDonPhong']; ?></p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 font-weight-bold">
                <div class="p-3 mb-2  text-black rounded shadow custom-color-2">
                    <p class="center-text text-dark">Phòng bị hủy</p>
                    <p class="center-text text-dark"><?php echo $so_donphonghuy['SoLuongDonPhongHuy']; ?></p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 font-weight-bold">
                <div class="p-3 mb-2  text-black rounded shadow custom-color-2">
                    <p class="center-text text-dark">Tổng doanh thu</p>
                    <p class="center-text text-dark"><?php echo $tong_tien; ?> VNĐ</p>
                </div>
            </div>
            <!-- Thêm các div khác và áp dụng lớp màu sắc tương ứng -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRmzNLOL0b3n5xgJg9KFJo6K9CkvrjzG3iG5FdZ2n" crossorigin="anonymous"></script>
</body>

</html>