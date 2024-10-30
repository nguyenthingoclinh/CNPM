<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  include "ND_dau.php";
?>

    <div class="container my-5">
        <h2 class="text-center mb-4">Danh sách câu hỏi</h2>
        <div class="text-start mb-3 d-flex justify-content-start">
            <a href="ND_ThemCH.php" class="btn btn-success me-2">
                <i class="bi bi-file-earmark-text me-1"></i>Thêm câu hỏi
            </a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="col-1 text-center">#</th>
                    <th class="col-3 text-center">Đề</th>
                    <th class="col-2 text-center">Môn học</th>
                    <th class="col-1 text-center">Đáp án A</th>
                    <th class="col-1 text-center">Đáp án B</th>
                    <th class="col-1 text-center">Đáp án C</th>
                    <th class="col-1 text-center">Đáp án D</th>
                    <th class="col-1 text-center">Đáp án đúng</th>
                    <th class="col-2 text-center">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $sql = "SELECT * FROM CauHoi ch join MH_GV on ch.IDMH_GV = MH_GV.IDMH_GV 
                join NguoiDung nd on nd.IDNDung = MH_GV.IDNDung
                join MonHoc mh on mh.IDMonHoc = MH_GV.IDMonHoc
                where nd.IDNDung = '$id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th class="text-center" scope="row"><?php echo $row['IDCauHoi']; ?></th>
                        <td>
                            <a href="<?php echo $row['IDCauHoi']; ?>" class="text-primary">
                                <?php echo $row['TenDe']; ?>
                            </a>
                        </td>
                        <td class="text-center"><?php echo $row['TenMonHoc']; ?></td>
                        <td class="text-center"><?php echo $row['DA1']; ?></td>
                        <td class="text-center"><?php echo $row['DA2']; ?></td>
                        <td class="text-center"><?php echo $row['DA3']; ?></td>
                        <td class="text-center"><?php echo $row['DA4'] ; ?></td>
                        <td class="text-center"><?php echo $row['DADung'] ; ?></td>
                        <td class="text-center">
                            <a href="ND_SuaCH.php?this_id=<?php echo $row['IDCauHoi']; ?>" class="btn btn-primary btn-sm" title="Sửa câu hỏi">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="ND_XoaCH.php?this_id=<?php echo $row['IDCauHoi']; ?>" class="btn btn-danger btn-sm" title="Xóa câu hỏi">
                                <i class="bi bi-trash"></i>
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