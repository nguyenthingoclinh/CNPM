<?php
    include 'data.php'; 
    $this_id = $_GET['this_id'];
    $idmonhoc = $_GET['idmonhoc'];
    $str = "";
    $sql = "SELECT * FROM BaiThi WHERE IDBaiThi = '$this_id'";
    $thi = mysqli_query($conn, $sql);
    if (mysqli_num_rows($thi) > 0) {
        $ttthi = mysqli_fetch_assoc($thi);
    } else {
        $str = "Không tìm thấy bài thi!";
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoi_gian_bat_dau = strtotime($ttthi['TGBatDau']);
    $thoi_gian_ket_thuc = strtotime($ttthi['TGKetThuc']);
    $thoi_gian_hien_tai = strtotime(date('Y-m-d H:i:s'));
    if ($thoi_gian_hien_tai < $thoi_gian_bat_dau) {
        $str = "Chưa đến thời gian bắt đầu bài thi!";
    }
    if ($thoi_gian_hien_tai > $thoi_gian_ket_thuc) {
        $str = "Thời gian làm bài đã hết!";
    }
    $thoi_gian_con_lai = $thoi_gian_ket_thuc - $thoi_gian_hien_tai;
    $phut_con_lai = floor($thoi_gian_con_lai / 60);
    $giay_con_lai = $thoi_gian_con_lai % 60;
    $sql_cauhoi = "SELECT * FROM CH_BT 
            join CauHoi ON CH_BT.IDCauHoi = CauHoi.IDCauHoi 
            where CH_BT.IDBaiThi = '$this_id'";
    $result_cauhoi = mysqli_query($conn, $sql_cauhoi);
    $cauhoi = [];
    if (mysqli_num_rows($result_cauhoi) > 0) {
        while ($row = mysqli_fetch_assoc($result_cauhoi)) {
            $cauhoi[] = $row;
        }
    } else {
        $str = "Không có câu hỏi trong bài thi này!";
    }
    if (isset($_POST['btn']) || isset($_POST['auto_submit'])) {
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
        header("Location: XemDiem1.php?diem=$diem&tong=$tong_so_cau_hoi&this_id=$this_id");
        exit();
    }
    if (isset($_POST['btnq'])) {
        header("Location: ND_CTMHsv.php?this_id=$idmonhoc");
    }
    include 'ND_dauSV.php';
?>
<script type="text/javascript">
    var phutConLai = <?php echo $phut_con_lai; ?>;
    var giayConLai = <?php echo $giay_con_lai; ?>;
    function startTimer(minutes, seconds) {
        var totalSeconds = minutes * 60 + seconds;
        var interval = setInterval(function () {
            var minutes = parseInt(totalSeconds / 60, 10);
            var seconds = totalSeconds % 60;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            document.querySelector('#thoi_gian').textContent = minutes + " : " + seconds;
            if (--totalSeconds <= 0) {
                clearInterval(interval);
                document.getElementById('auto_submit').value = '1';
                document.forms['thi'].submit();
            }
        }, 1000);
    }
    window.onload = function () {
        startTimer(phutConLai, giayConLai);
    };

</script>
<div class="container py-5">
<form id="thi" method="POST" >
<input type="hidden" name="auto_submit" id="auto_submit" value="0">
    <?php
        if(!empty($str)){
            ?>
            <div style="display: flex; justify-content: center; align-items: flex-start; height: 50vh; padding-top: 20px;">
                <div style="text-align: center;">
                    <h5><?php echo $str; ?></h5>
                    <button type="submit" class="btn btn-primary" name="btnq" style="margin-top: 10px;">Quay lại</button>
                </div>
            </div>
            <?php
        }
        else{
    ?>
    <h2><?php echo $ttthi['TenBaiThi']; ?></h2>
    <p>Thời gian còn lại: <span id="thoi_gian"></span></p>
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
        <button type="submit" class="btn btn-primary" name="btn">Nộp bài</button>
    </form>
    <?php
        }
    ?>
</div>
<?php include "ND_cuoi.php"; ?>
