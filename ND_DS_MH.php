<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  include "ND_dau.php";
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Danh Sách Môn Học</h2>
    <div class="row">
        <?php 
        $sql = "SELECT * from MH_GV gv 
                join MonHoc mh ON mh.IDMonHoc = gv.IDMonHoc
                JOIN NguoiDung nd ON nd.IDNDung = gv.IDNDung 
                WHERE nd.IDNDung = '$id'
                ORDER BY mh.TenMonHoc";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                $icon_class = "fas fa-book"; 
        ?>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 text-center">
               
                <div class="card-icon" style="font-size: 50px; color: #ff8c00; margin: 20px auto;">
                    <a href="ND_CTMH.php?this_id=<?php echo $row['IDMonHoc']; ?>" >
                    <i class="<?php echo $icon_class; ?>"></i>
                    </a>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['TenMonHoc']; ?></h5>
                    
                </div>
            </div>
        </div>

        <?php
            }               
        }
        ?>            
    </div>
</div>

<?php
    include "ND_cuoi.php";
?>
