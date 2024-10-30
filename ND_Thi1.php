<?php
include 'data.php'; 

$this_id = $_GET['this_id'];

$sql = "SELECT * FROM BaiThi WHERE IDBaiThi = '$this_id'";
$thi = mysqli_query($conn, $sql);
if (mysqli_num_rows($thi) > 0) {
    $ttthi = mysqli_fetch_assoc($thi);
} else {
    echo "Không tìm thấy bài thi!";
    exit();
}

// Thiết lập múi giờ
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Lấy thời gian bắt đầu và kết thúc
$thoi_gian_bat_dau = strtotime($ttthi['TGBatDau']);
$thoi_gian_ket_thuc = strtotime($ttthi['TGKetThuc']);

// Lấy thời gian hiện tại
$thoi_gian_hien_tai = strtotime(date('Y-m-d H:i:s'));

// Kiểm tra thời gian
if ($thoi_gian_hien_tai < $thoi_gian_bat_dau) {
    echo "Chưa đến thời gian bắt đầu bài thi!";
    exit();
}

if ($thoi_gian_hien_tai > $thoi_gian_ket_thuc) {
    echo "Thời gian làm bài đã hết!";
    exit();
}

// Tính thời gian còn lại
$thoi_gian_con_lai = $thoi_gian_ket_thuc - $thoi_gian_hien_tai;

$phut_con_lai = floor($thoi_gian_con_lai / 60);
$giay_con_lai = $thoi_gian_con_lai % 60;

// Truy vấn câu hỏi
$sql_cauhoi = "SELECT * FROM CH_BT 
        JOIN CauHoi ON CH_BT.IDCauHoi = CauHoi.IDCauHoi 
        WHERE CH_BT.IDBaiThi = '$this_id'";
$result_cauhoi = mysqli_query($conn, $sql_cauhoi);
$cauhoi = [];
if (mysqli_num_rows($result_cauhoi) > 0) {
    while ($row = mysqli_fetch_assoc($result_cauhoi)) {
        $cauhoi[] = $row;
    }
} else {
    echo "Không có câu hỏi trong bài thi này!";
    exit();
}

// Xử lý nộp bài
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $diem = 0;
    $tong_so_cau_hoi = count($cauhoi);
    $so_cau_tra_loi = 0;

    foreach ($cauhoi as $cau) {
        $cauhoi_id = 'cauhoi_' . $cau['IDCauHoi'];

        if (isset($_POST[$cauhoi_id])) {
            $dap_an_nguoi_dung = trim($_POST[$cauhoi_id]); 
            if ($dap_an_nguoi_dung == $cau['DADung']) { 
                $diem++; 
            }
            $so_cau_tra_loi++;
        }
    }

    // Chuyển hướng sang trang XemDiem.php với tham số điểm và tổng số câu hỏi
    header("Location: XemDiem1.php?diem=$diem&tong=$tong_so_cau_hoi&this_id=$this_id");
    exit();
}

include "ND_dauSV.php";
?>

<script type="text/javascript">
// Nhận thời gian còn lại từ PHP
var phutConLai = <?php echo $phut_con_lai; ?>;
var giayConLai = <?php echo $giay_con_lai; ?>;

// Hàm cập nhật đếm ngược
function startTimer(minutes, seconds) {
    var totalSeconds = minutes * 60 + seconds;
    var interval = setInterval(function () {
        var minutes = parseInt(totalSeconds / 60, 10);
        var seconds = totalSeconds % 60;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        document.querySelector('#thoi_gian').textContent = minutes + " ch " + seconds + " giây";

        if (--totalSeconds <= 0) {
            clearInterval(interval);
            // Hết giờ, tự động nộp bài
            document.forms[0].submit(); // Gọi hàm nộp bài
        }
    }, 1000);
}

// Khi trang đã load, bắt đầu bộ đếm
window.onload = function () {
    startTimer(phutConLai, giayConLai);
};
</script>

<div class="container py-5">
    <h2><?php echo $ttthi['TenBaiThi']; ?></h2>
    <p>Thời gian còn lại: <span id="thoi_gian"></span></p>
    
    <form method="POST" action="">
        <?php $dem = 0; foreach ($cauhoi as $cau): $dem++; ?>
            <div>
                <h5><?php echo "Câu hỏi " . $dem . ": " . $cau['TenDe']; ?></h5>
                <div style="margin-left: 20px;">
                    <label><input type="radio" name="cauhoi_<?php echo $cau['IDCauHoi']; ?>" value="A"> <?php echo $cau['DA1']; ?></label><br>
                    <label><input type="radio" name="cauhoi_<?php echo $cau['IDCauHoi']; ?>" value="B"> <?php echo $cau['DA2']; ?></label><br>
                    <label><input type="radio" name="cauhoi_<?php echo $cau['IDCauHoi']; ?>" value="C"> <?php echo $cau['DA3']; ?></label><br>
                    <label><input type="radio" name="cauhoi_<?php echo $cau['IDCauHoi']; ?>" value="D"> <?php echo $cau['DA4']; ?></label><br>
                </div>
            </div>
            <br>
        <?php endforeach; ?>
        
        <button type="submit" class="btn btn-primary" name="btnq">Nộp bài</button>
    </form>
</div>

<?php include "ND_cuoi.php"; ?>
