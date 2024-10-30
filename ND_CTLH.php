<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  $this_id = $_GET['this_id'];
  include "ND_dau.php";
?>

    <div class="container my-5">
        
        <div class="text-start mb-3">
          <a href="ND_DS_SV_Lop1.php?this_id=<?php echo $this_id ?>" class="btn btn-success">Danh sách sinh viên</a> 
        </div>
        <h5 class="text-center mb-4">Danh sách bài thi</h5>
        <div class="text-start mb-3 d-flex justify-content-start">
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                <th class="col-1 text-center">#</th>
                    <th class="text-center">Tên bài thi</th>
                    <th class="text-center">Môn học</th>
                    <th class="text-center">Số câu</th>
                    <th class="text-center">Bắt đầu</th>
                    <th class="text-center">Kết thúc</th>
                    <th class="text-center">Vào thi</th>
                </tr>
            </thead>
            <tbody>
                <?php $sql = "SELECT * FROM BaiThi bt join MH_GV mhgv on mhgv.IDMH_GV = bt.IDMH_GV
                join NguoiDung nd on nd.IDNDung = mhgv.IDNDung
                join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc 
                join BT_Lop btlop on btlop.IDBaiThi = bt.IDBaiThi 
                join LopHoc lh on lh.IDLop = btlop.IDLop 
                where nd.IDNDung = '$id' and lh.IDLop = '$this_id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                    <th class="text-center" scope="row"><?php echo $row['IDBaiThi']; ?></th>
                        <td>
                        <a href="DS_CH_BT.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="text-primary" title="Danh sách câu hỏi">
                            <?php echo $row['TenBaiThi']; ?>
                        </a>
                        </td>
                        <td class="text-center"><?php echo $row['TenMonHoc']; ?></td>
                        <td class="text-center"><?php echo $row['SoCau']; ?></td>
                        <td class="text-center"><?php echo $row['TGBatDau']; ?></td>
                        <td class="text-center"><?php echo $row['TGKetThuc'] ; ?></td>
                        <td class="text-center">
                        <a href="ND_VaoThi1.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-primary btn-sm" title="Sửa bài thi">
                            <i class="bi bi-pencil"></i>
                        </a>
                        </td>
                    </tr>
                    <?php
                    }               
                }
                ?>            
            </tbody>
        </table>
    </div>
    
<?php
    include "ND_cuoi.php";
?>