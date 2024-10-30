<?php
    class User {
        // Hàm để đăng nhập và lưu tên người dùng vào cookie
        public function dangNhap($id, $tenNguoiDung, $vaiTro, $anh) {
            // Lưu trữ ID người dùng, tên và vai trò vào cookie, mã hóa dữ liệu
            setcookie('IDNguoiDung', $id, time() + 3600); // Cookie tồn tại trong 1 giờ
            setcookie('tenNguoiDung', $tenNguoiDung, time() + 3600); // Cookie tồn tại trong 1 giờ
            setcookie('vaiTro', $vaiTro, time() + 3600); // Cookie tồn tại trong 1 giờ
            setcookie('anh', $anh, time() + 3600); 
        }
    
        // Hàm để lấy ID người dùng từ cookie
        public function layIDNguoiDung() {
            if (isset($_COOKIE['IDNguoiDung'])) {
                return $_COOKIE['IDNguoiDung'];
            }
            return null;
        }
    
        // Hàm để lấy tên người dùng hiện tại từ cookie
        public function layTenNguoiDung() {
            if (isset($_COOKIE['tenNguoiDung'])) {
                return $_COOKIE['tenNguoiDung'];
            }
            return null; // Trả về null nếu chưa đăng nhập
        }
    
        // Hàm để kiểm tra vai trò của người dùng từ cookie
        public function layVaiTro() {
            if (isset($_COOKIE['vaiTro'])) {
                return $_COOKIE['vaiTro'];
            }
            return null;
        }

        public function layAnh() {
            if (isset($_COOKIE['anh'])) {
                return $_COOKIE['anh'];
            }
            return null;
        }
    
        // Hàm để đăng xuất
        public function dangXuat() {
            // Xóa cookie bằng cách đặt thời gian hết hạn trong quá khứ
            setcookie('IDNguoiDung', '', time() - 3600);
            setcookie('tenNguoiDung', '', time() - 3600);
            setcookie('vaiTro', '', time() - 3600);
            setcookie('anh', '', time() - 3600);
        }
    }
    
?>