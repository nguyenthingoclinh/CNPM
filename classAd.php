<?php
    class Ad {
        
        public function dangNhap($id, $tenNguoiDung, $vaiTro, $anh) {
            
            setcookie('IDNguoiDung', $id, time() + 3600); 
            setcookie('tenNguoiDung', $tenNguoiDung, time() + 3600); 
            setcookie('vaiTro', $vaiTro, time() + 3600); 
            setcookie('anh', $anh, time() + 3600); 
        }
    
        
        public function layIDNguoiDung() {
            if (isset($_COOKIE['IDNguoiDung'])) {
                return $_COOKIE['IDNguoiDung'];
            }
            return null;
        }
    
        
        public function layTenNguoiDung() {
            if (isset($_COOKIE['tenNguoiDung'])) {
                return $_COOKIE['tenNguoiDung'];
            }
            return null; 
        }
    
        
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
    
        
        public function dangXuat() {
            
            setcookie('IDNguoiDung', '', time() - 3600);
            setcookie('tenNguoiDung', '', time() - 3600);
            setcookie('vaiTro', '', time() - 3600);
            setcookie('anh', '', time() - 3600);
        }

        public function kiemTraCookie() {
            return isset($_COOKIE['IDNguoiDung'], $_COOKIE['tenNguoiDung'], $_COOKIE['vaiTro'], $_COOKIE['anh']);
        }
    }
    
?>