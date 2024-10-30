<?php
  include "data.php";
  include "classND.php"; 
  $user = new User(); 
  $id = $user->layIDNguoiDung();
  $this_id = $_GET['this_id'];
  $tenmon = $_GET['tenmon'];
  $sql1 = "select * from BaiThi where IDBaiThi =".$this_id;
  $result = mysqli_query($conn, $sql1);
  $row = mysqli_fetch_assoc($result);
  if(isset($_POST['btn'])){
      $lophoc = $_POST['lophoc'];
      $sql = "insert into BT_Lop(IDBaiThi, IDLop) values('$this_id', '$lophoc')";
      mysqli_query($conn, $sql);
  }
  if(isset($_POST['btnq'])){
      header('Location: ND_DS_BaiThi.php');
  }
  include "ND_dau1.php";
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Thêm lớp</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="baithi" class="form-label">Bài thi</label>
                    <input type="text" class="form-control" name="baithi" value = "<?php echo $row['TenBaiThi'];?>" disabled>
                </div>
                <div class="mb-3">
                <label for="lophoc" class="form-label">Lớp học</label>
                    <select class="form-control" name="lophoc">
                        <option value="">-- Chọn lớp học --</option>
                        <?php
                            $sql2 = "SELECT * FROM MonHoc mh join MH_GV gv on mh.IDMonHoc = gv.IDMonHoc
                                    join NguoiDung nd on nd.IDNDung = gv.IDNDung 
                                    join GV_Lop on GV_Lop.IDMH_GV = gv.IDMH_GV
                                    join LopHoc lh on lh.IDLop = GV_Lop.IDLop
                                    where nd.IDNDung = '$id' and mh.TenMonHoc like '$tenmon'
                                    ";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    echo "<option value='{$row2['IDLop']}'>{$row2['TenLop']} - ID: {$row2['IDLop']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có lớp</option>";
                            }
                        ?>
                    </select>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
                  <button type="submit" class="btn btn-secondary" name="btnq">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include "ND_cuoi.php";
?>