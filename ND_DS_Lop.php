<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  include "ND_dau.php";
?>

    <div class="container my-5">
        <h2 class="text-center mb-4">Danh sách lớp</h2>
       <!-- <div class="text-start mb-3">
          <a href="ND_ThemLop.php" class="btn btn-success">Thêm Mới</a> 
        </div>-->

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="col-1 text-center">#</th>
                    <th class="col-3 text-center">Tên lớp</th>
                    <th class="col-2 text-center">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $sql = "SELECT * FROM MonHoc mh join MH_GV gv on mh.IDMonHoc = gv.IDMonHoc
                join NguoiDung nd on nd.IDNDung = gv.IDNDung 
                join GV_Lop on GV_Lop.IDMH_GV = gv.IDMH_GV
                join LopHoc lh on lh.IDLop = GV_Lop.IDLop
                where nd.IDNDung = '$id'
                order by mh.TenMonHoc";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th class="text-center" scope="row"><?php echo $row['IDLop']; ?></th>
                        <td>
                            <a href="<?php echo $row['IDLop']; ?>" class="text-primary">
                                <?php echo $row['TenLop']; ?>
                            </a>
                        </td>
                                            
                        <td class="text-center">
                           <!-- <a href="ND_SuaLop.php?this_id=<?php echo $row['IDLop']; ?>" class="btn btn-primary btn-sm" title="Sửa lớp">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="ND_XoaLop.php?this_id=<?php echo $row['IDLop']; ?>" class="btn btn-danger btn-sm" title="Xóa lớp">
                                <i class="bi bi-trash"></i>
                            </a>-->
                            <a href="ND_DS_SV_Lop.php?this_id=<?php echo $row['IDLop']; ?>" class="btn btn-success btn-sm" title="Danh sách sinh viên">
                                <i class="bi bi-file-earmark-text"></i>
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