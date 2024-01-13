
<main class="admin__main1">
    <div class="form-container">
        <h1 class="form-title">Thêm Tài Khoản</h1>
        <form action="index.php?act=them_taikhoan" method="POST" enctype="multipart/form-data" class="add-loai-hang-form">
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Họ tên</label>
                <input type="text" name="ho_ten" class="forminput" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Tên đăng nhâp:</label>
                <input type="text" name="ten_dn" class="forminput" required>
                <span class="form-error"><?php echo isset($loi["ten"]) ? $loi["ten"] : "" ?></span>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">SĐT:</label>
                <input type="tel" placeholder="" name="tel" class="forminput" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Email:</label>
                <input type="email" placeholder="Email" name="email" class="forminput" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">CCCD:</label>
                <input type="number" placeholder="" name="cccd" class="forminput" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Mật khẩu:</label>
                <input type="password" name="mat_khau" class="forminput" required>
            </div>
            <div class="form-group">
                <label for="tenlh_bottom" class="formlabel">Ảnh đại điện:</label>
                <input type="file" name="hinh" class="forminput">
                <span class="form-error"><?php echo isset($loi["loianh"]) ? $loi["loianh"] : "" ?></span>
            </div>
            <div class="form-group1">
                <label for="tenlh_bottom" class="formlabel">Trạng Thái:</label>
                <input type="radio" id="kichhoat" name="kich_hoat" value="0" checked>
                <label for="kichhoat">Kích hoạt</label>
                <input type="radio" id="choblock1" name="kich_hoat" value="1">
                <label for="choblock1">Chặn</label>
            </div>
            <div class="form-group1">
                <label for="tenlh_bottom" class="formlabel">Vai Trò:</label>
                <input type="radio" id="vaitro" name="vai_tro" value="0" checked>
                <label for="vaitro">Khách hàng</label>
                <input type="radio" id="choblock2" name="vai_tro" value="1">
                <label for="choblock2">Quản trị</label>
            </div>
            <input type="submit" name="them_tai_khoan" class="form-button" value="Thêm Khách Hàng">
            <input type="reset" value="Nhập lại" class="form-button-reset">
            <br>
            <span class="form-error"><?php echo isset($loi["ten1"]) ? $loi["ten1"] : "" ?></span>
        </form>
        <p><a href="index.php?act=danhsachkh" class="form-link">Xem danh sách khách hàng</a></p>
    </div>
</main>