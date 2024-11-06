<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  $this_id = $_GET['this_id'];
  include "ND_dau.php";
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Danh sách lớp học</h2>
    <div class="row">

        <?php 
         $sql = "SELECT * from MH_GV gv 
         join LopHoc lh on lh.IDMH_GV = gv.IDMH_GV 
         join MonHoc mh on mh.IDMonHoc = gv.IDMonHoc
         JOIN NguoiDung nd on nd.IDNDung = gv.IDNDung 
         WHERE nd.IDNDung = '$id' and mh.IDMonHoc = '$this_id' 
         ORDER BY mh.TenMonHoc";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                $icon_class = "fas fa-book"; 
        ?>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 text-center">
               
                <div class="card-icon" style="font-size: 50px; color: #ff8c00; margin: 20px auto;">
                    <a href="ND_CTLH.php?this_id=<?php echo $row['IDLop']; ?>&idmonhoc=<?php echo $this_id; ?>" >
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
