<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  include "ND_dauSV.php";
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Danh Sách Môn Học</h2>
    <div class="row">

        <?php 
        $sql = "SELECT * from Lop_SV lopsv join LopHoc lh on lopsv.IDLop = lh.IDLop
                JOIN MH_GV gv ON lh.IDMH_GV = gv.IDMH_GV 
                join MonHoc mh ON mh.IDMonHoc = gv.IDMonHoc
                JOIN NguoiDung nd ON nd.IDNDung = lopsv.IDNDung 
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
                    <a href="ND_CTMH1.php?this_id=<?php echo $row['IDMonHoc']; ?>" >
                    <i class="<?php echo $icon_class; ?>"></i>
                    </a>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['TenMonHoc']; ?></h5>
                    <p class="card-text"><?php echo "(" . $row['TenLop'] . ")"; ?></p>
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
