<?php
  include "data.php";
  $this_id = $_GET['this_id'];
  include "ND_dau.php";
?>

    <div class="container my-5">
        <h2 class="text-center mb-4">Danh sách sinh viên</h2>
        <div class="text-start mb-3 d-flex justify-content-start">
            <a href="ND_ThemSVLop.php?this_id=<?php echo $this_id; ?>" class="btn btn-success me-2">
                <i class="bi bi-file-earmark-text me-1"></i>Thêm sinh viên
            </a>
            <a href="ND_DS_Lop.php" class="btn btn-warning">
                <i class="bi bi-arrow-left-circle"></i> Quay lại
            </a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="col-1 text-center">#</th>
                    <th class="col-3 text-center">Tên lớp</th>
                    <th class="col-2 text-center">Mã sinh viên</th>
                    <th class="col-3 text-center">Họ tên sinh viên</th>
                    <th class="col-2 text-center">Ngày sinh</th>
                    <th class="col-2 text-center">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $sql = 'SELECT * FROM Lop_SV lopsv join NguoiDung nd on nd.IDNDung = lopsv.IDNDung
                    join LopHoc lh on lh.IDLop = lopsv.IDLop
                    where lh.IDLop = '.$this_id;
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
                            <td class="text-center"><?php echo $row['IDNDung']; ?></td>
                            <td class="text-center"><?php echo $row['HoTen']; ?></td>
                            <td class="text-center"><?php echo $row['NgaySinh']; ?></td>
                            <td class="text-center">
                                <a href="ND_XoaSVLop.php?idnd=<?php echo $row['IDNDung']; ?>&this_id=<?php echo $this_id; ?>" class="btn btn-danger btn-sm" title="Xóa sinh viên">
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