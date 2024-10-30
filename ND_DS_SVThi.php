<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  $this_id = $_GET['this_id'];
  if(isset($_POST['btnq'])){
    header('Location: ND_DS_BaiThi.php');
  }
  include "ND_dau1.php";
?>

    <div class="container my-5">
        <h2 class="text-center mb-4">Danh sách sinh viên</h2>
        <form method="POST">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
            <tr>
                <th class="col-1 text-center">#</th>
                <th class="col-3 text-center">Tên bài thi</th>
                <th class="col-2 text-center">Tên lớp</th>
                <th class="col-2 text-center">Họ tên</th>
                
            </tr>
            </thead>
            <tbody>
                <?php
                
                $sql = "SELECT * FROM BT_Lop btlop 
                        JOIN LopHoc l ON l.IDLop = btlop.IDLop
                        JOIN Lop_SV lopsv ON lopsv.IDLop = l.IDLop
                        JOIN NguoiDung nd ON nd.IDNDung = lopsv.IDNDung
                        JOIN BaiThi bt ON bt.IDBaiThi = btlop.IDBaiThi
                        where  bt.IDBaiThi = '$this_id'";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <th class="text-center" scope="row"><?php echo $row['IDBaiThi']; ?></th>
                    <td>
                        <a href="<?php echo $row['IDBaiThi']; ?>" class="text-primary">
                            <?php echo $row['TenBaiThi']; ?>
                        </a>
                    </td>
                    <td class="text-center"><?php echo $row['TenLop']; ?></td>
                    <td class="text-center"><?php echo $row['HoTen']; ?></td>
                    
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Không có dữ liệu</td></tr>";
                }
                ?>  
            </tbody>
        </table>
        <button type="submit" class="btn btn-secondary" name="btnq">Reset</button>
        </form>
    </div>
    
<?php
    include "ND_cuoi.php";
?>