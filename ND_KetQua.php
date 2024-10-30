<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  include "ND_dauSV.php";
?>

    <div class="container my-5">
        <h2 class="text-center mb-4">Danh sách kết quả các lần thi</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Tên môn</th>
                   
                    <th class="text-center">Tên bài thi</th>
                    <th class="text-center">Điểm</th>
                    <th class="text-center">Ngày thi</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <?php $sql = "Select * from KetQua kq join BaiThi bt on bt.IDBaiThi = kq.IDBaiThi 
                join MH_GV mhgv on mhgv.IDMH_GV = bt.IDMH_GV
                join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc  
                 
                where kq.IDNDung = '$id'";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th class="text-center" scope="row"><?php echo $row['IDKetQua']; ?></th>
                        <td>
                            <a href="<?php echo $row['IDKetQua']; ?>" class="text-primary">
                                <?php echo $row['TenMonHoc']; ?>
                            </a>
                        </td>
                                            
                        
                        <td class="text-center"><?php echo $row['TenBaiThi']; ?></td>
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