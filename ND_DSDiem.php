<?php
  include "data.php";
  $idbaithi = $_GET['idbaithi'];
  $idlop = $_GET['idlop'];
  include "ND_dau.php";
?>
    <div class="container my-5">
        <h2 class="text-center mb-4">Danh sách kết quả</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Tên bài thi</th>
                    <th class="text-center">Mã sinh viên</th>
                    <th class="text-center">Họ tên</th>
                    <th class="text-center">Điểm</th>
                    <th class="text-center">Ngày thi</th> 
                </tr>
            </thead>
            <tbody>
            <?php 
                /*$sql = "SELECT kq.IDKetQua, bt.TenBaiThi, nd.IDNDung, nd.HoTen, kq.Diem, kq.TGNop  
                        FROM KetQua kq 
                        INNER JOIN BaiThi bt ON bt.IDBaiThi = kq.IDBaiThi 
                        LEFT JOIN BT_Lop btlop ON btlop.IDBaiThi = kq.IDBaiThi  
                        INNER JOIN Lop_SV lopsv ON lopsv.IDLop = btlop.IDLop 
                        INNER JOIN NguoiDung nd ON nd.IDNDung = lopsv.IDNDung 
                        GROUP BY kq.IDKetQua, bt.TenBaiThi, nd.IDNDung, nd.HoTen, kq.Diem, kq.TGNop 
                        HAVING kq.IDBaiThi = '$idbaithi' AND lopsv.IDLop = '$idlop'";*/
                        $sql = "SELECT *  
                        FROM KetQua kq 
                        left join BaiThi bt ON bt.IDBaiThi = kq.IDBaiThi 
                        left join NguoiDung nd on nd.IDNDung = kq.IDNDung 
                        
                        left join Lop_SV lopsv on lopsv.IDNDung = nd.IDNDung 
                        WHERE kq.IDBaiThi = '$idbaithi' and lopsv.IDLop = '$idlop' ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th class="text-center" scope="row"><?php echo $row['IDKetQua']; ?></th>
                        <td>
                            <a href="<?php echo $row['IDKetQua']; ?>" class="text-primary">
                                <?php echo $row['TenBaiThi']; ?>
                            </a>
                        </td>
                        <td class="text-center"><?php echo $row['IDNDung']; ?></td>
                        <td class="text-center"><?php echo $row['HoTen']; ?></td>
                        <td class="text-center"><?php echo $row['Diem']; ?></td>
                        <td class="text-center"><?php echo date('Y-m-d', strtotime($row['TGNop'])); ?></td>
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