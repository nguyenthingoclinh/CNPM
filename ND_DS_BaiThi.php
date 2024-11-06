<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  include "ND_dau.php";
?>

    <div class="container my-5">
        <h2 class="text-center mb-4">Danh sách bài thi</h2>
        <div class="text-start mb-3 d-flex justify-content-start">
            <a href="ND_ThemBT.php" class="btn btn-success me-2">
                <i class="bi bi-file-earmark-text me-1"></i>Thêm bài thi
            </a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                <th class="col-1 text-center">#</th>
                    <th class="text-center">Tên bài thi</th>
                    <th class="text-center">Giảng viên</th>
                    <th class="text-center">Môn học</th>
                    <th class="text-center">Số câu</th>
                    <th class="text-center">Bắt đầu</th>
                    <th class="text-center">Kết thúc</th>
                    <th class="text-center">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php $sql = "SELECT * FROM BaiThi bt join MH_GV mhgv on mhgv.IDMH_GV = bt.IDMH_GV
                join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc 
                join NguoiDung nd on nd.IDNDung = mhgv.IDNDung
                where nd.IDNDung = '$id'";
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
                        <td class="text-center"><?php echo $row['HoTen']; ?></td>
                        <td class="text-center"><?php echo $row['TenMonHoc']; ?></td>
                        <td class="text-center"><?php echo $row['SoCau']; ?></td>
                        <td class="text-center"><?php echo $row['TGBatDau']; ?></td>
                        <td class="text-center"><?php echo $row['TGKetThuc'] ; ?></td>
                        <td class="text-center">
                        <a href="ND_SuaBT.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-primary btn-sm" title="Sửa bài thi">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="ND_XoaBT.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-danger btn-sm" title="Xóa bài thi">
                            <i class="bi bi-trash"></i>
                            
                        </a>
                        <a href="ND_CauHoi_BaiThi.php?this_id=<?php echo $row['IDBaiThi']; ?>&socau=<?php echo $row['SoCau']; ?>" class="btn btn-warning btn-sm" title="Danh sách câu hỏi">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="ND_ThemLopThi.php?this_id=<?php echo $row['IDBaiThi']; ?>&tenmon=<?php echo $row['TenMonHoc']; ?>" class="btn btn-success btn-sm" title="Danh sách sinh viên">
                            <i class="bi bi-house"></i>
                        </a>
                        <a href="ND_DS_SVThi.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-info btn-sm" title="Danh sách sinh viên">
                            <i class="bi bi-list"></i>
                        </a>
                        <a href="ND_VaoThigv.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-info btn-sm" title="Danh sách sinh viên">
                            <i class="bi bi-clipboard-check"></i>
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