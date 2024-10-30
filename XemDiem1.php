<?php
    include 'data.php'; 
    include "classND.php"; 
    $score = $_GET['diem'];
    $total_questions = $_GET['tong'];
    $this_id = $_GET['this_id'];

    $diem_tinh = ($score / $total_questions) * 10;
    
    $user = new User(); 
    $id = $user->layIDNguoiDung();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $TGNop = date('Y-m-d H:i:s');
    $sql = "insert into KetQua(IDBaiThi, IDNDung, Diem, TGNop) values('$this_id', '$id', " .round($diem_tinh, 2) . ", '$TGNop')";
    mysqli_query($conn, $sql);
    include "ND_dauSV.php";
?>
<div style="display: flex; justify-content: center; align-items: center; height: 60vh; font-size: 20px;">
   
      <div style="display: block;">
        <p>Số câu trả lời đúng: <?php echo $score; ?> / <?php echo $total_questions; ?></p>
        <p>Điểm: <?php echo round($diem_tinh, 2); ?> / 10</p>
      </div>
</div>       
    

<?php
    include "ND_cuoi.php";
?>