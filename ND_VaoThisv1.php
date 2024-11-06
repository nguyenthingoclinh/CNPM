<?php
  include "data.php";
  $this_id = $_GET['this_id'];
  if(isset($_POST['btn'])){
    header("Location: ND_Thisv1.php?this_id=$this_id");
  }
  include "ND_dauSV.php";
?>
<div style="display: flex; justify-content: center; align-items: center; height: 60vh;">
    <form method="POST" style="text-align: center;">
      <?php
         $sql = "SELECT * from BaiThi where IDBaiThi =".$this_id;
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
      ?>
      <div style="display: block; margin-bottom: 20px; font-size: 17px;">
        <p>Tên bài thi: <?php echo $row['TenBaiThi'] ?></p>
        <p>Số câu: <?php echo $row['SoCau'] ?></p>
        <p>Thời gian bắt đầu: <?php echo $row['TGBatDau'] ?></p>
        <p>Thời gian kết thúc: <?php echo $row['TGKetThuc'] ?></p>
      </div>
   
        <button type="submit" class="btn btn-primary" name="btn" style="padding: 15px 30px;">Vào thi</button>
    </form>
</div>
<?php
    include "ND_cuoi.php";  
?>
