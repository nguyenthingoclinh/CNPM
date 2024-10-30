<?php
    include 'data.php'; 
    
    $score = $_GET['diem'];
    $total_questions = $_GET['tong'];
    $diem_tinh = ($score / $total_questions) * 10;
    
    include "ND_dau.php";
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