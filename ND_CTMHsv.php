<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  $this_id = $_GET['this_id'];
  include "ND_dauSV.php";
?>

    <div class="container my-5" style="margin-left: 150px;">
        <div class="text-start mb-3">
            <a href="ND_MHsv.php" class="btn btn-warning">
            <i class="bi bi-arrow-left-circle"></i> Quay lại</a> 
            
        </div>
        <br>
        <h5 >Danh sách bài thi</h5><!-- class="text-center mb-3"-->
        <div class="text-start mb-3 d-flex justify-content-start">
        </div>
        <?php  $sql = "SELECT * FROM BaiThi bt join MH_GV mhgv on mhgv.IDMH_GV = bt.IDMH_GV
                join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc 
                join BT_Lop btlop on btlop.IDBaiThi = bt.IDBaiThi 
                join LopHoc lh on lh.IDLop = btlop.IDLop 
                join Lop_SV sv on sv.IDLop = lh.IDLop 
                join NguoiDung nd on nd.IDNDung = sv.IDNDung
                where nd.IDNDung = '$id' and mh.IDMonHoc = '$this_id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

        <div style="display: flex; align-items: center;">
            <i class="bi bi-check-square" style="font-size: 24px; color: orange; margin-right: 8px;"></i>
            <div>
                <h6 style="margin: 0;">
                    <a href="ND_VaoThisv.php?this_id=<?php echo $row['IDBaiThi']; ?>&idmonhoc=<?php echo $this_id; ?>" style="text-decoration: none; color: inherit;" class="link-hover">
                        <?php echo $row['TenBaiThi']; ?>
                    </a>
                </h6>
                <p style="margin: 0; color: gray;">Là các dạng bài tập trắc nghiệm do máy tự động chấm điểm</p>
                <br>
            </div>
        </div>

        <?php
                    }
                }
        ?>
    <style>
        .link-hover:hover {
            text-decoration: underline;
        }
    </style>
    <!--<div class="container my-5">
        <h2 class="text-center mb-4">Danh sách bài thi</h2>
        <div class="text-start mb-3 d-flex justify-content-start">
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
                    <th class="text-center">Vào thi</th>
                </tr>
            </thead>
            <tbody>
                <?php $sql = "SELECT * FROM BaiThi bt join MH_GV mhgv on mhgv.IDMH_GV = bt.IDMH_GV
                join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc 
                join BT_Lop btlop on btlop.IDBaiThi = bt.IDBaiThi 
                join LopHoc lh on lh.IDLop = btlop.IDLop 
                join Lop_SV sv on sv.IDLop = lh.IDLop 
                join NguoiDung nd on nd.IDNDung = sv.IDNDung
                where nd.IDNDung = '$id' and mh.IDMonHoc = '$this_id'";
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
                        <a href="ND_VaoThisv.php?this_id=<?php echo $row['IDBaiThi']; ?>" class="btn btn-primary btn-sm" title="Sửa bài thi">
                            <i class="bi bi-pencil"></i>
                        </a>
                        </td>
                    </tr>
                    <?php
                    }               
                }
                ?>            
            </tbody>
        </table>-->
    </div>
    
<?php
    include "ND_cuoi.php";
?>