
<?php
     include "data.php";
     include "ND_dau1.php";
     $this_id = $_GET['this_id'];
     $sql = "SELECT gv.IDMH_GV, nd.IDNDung, mh.IDMonHoc, lh.IDLop, mh.TenMonHoc, nd.HoTen, mh.MoTa FROM MonHoc mh join MH_GV gv on mh.IDMonHoc = gv.IDMonHoc
                 join NguoiDung nd on nd.IDNDung = gv.IDNDung 
                 join LopHoc lh on lh.IDLop = gv.IDLop
                 where gv.IDMH_GV =".$this_id;
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
     $id = $row['IDMonHoc'];
     if(isset($_POST['btn'])){
       $ssql1 = "delete from MH_GV where IDMH_GV=".$this_id;
       mysqli_query($conn, $ssql1);
       echo "<script type='text/javascript'>
        window.location.href = 'ND_DS_MH.php';
      </script>";
   }
   if(isset($_POST['btnq'])){
    echo "<script type='text/javascript'>
    window.location.href = 'ND_DS_MH.php';
  </script>";
   }
?>



<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Xóa môn Học</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="tenmonhoc" class="form-label">Tên Môn Học</label>
                    <input type="text" class="form-control" name="tenmonhoc" value = "<?php echo $row['TenMonHoc'] ?>" disabled>
                </div>
                
                <div class="mb-3">
                    <label for="monhoc" class="form-label">Môn học</label>
                    <select class="form-control" name="monhoc" disabled>
                        <option value="">-- Chọn môn học --</option>
                        <?php
                            $sql1 = 'SELECT * FROM MonHoc';
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $selected = ($row1['IDMonHoc'] == $row['IDMonHoc']) ? 'selected' : '';
                                    echo "<option value='{$row1['IDMonHoc']}' $selected>{$row1['TenMonHoc']} - ID: {$row1['IDMonHoc']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có môn học</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nguoidung" class="form-label">Người dùng</label>
                    <select class="form-control" name="nguoidung" disabled>
                        <option value="">-- Chọn giảng viên --</option>
                        <?php
                            $sql3 = 'SELECT * FROM NguoiDung WHERE VaiTro LIKE "Giáo Viên"';
                            $result3 = mysqli_query($conn, $sql3);
                            if (mysqli_num_rows($result3) > 0) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    $selected = ($row3['IDNDung'] == $row['IDNDung']) ? 'selected' : '';
                                    echo "<option value='{$row3['IDNDung']}' $selected>{$row3['HoTen']} - ID: {$row3['IDNDung']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có giảng viên</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lophoc" class="form-label">Lớp học</label>
                    <select class="form-control" name="lophoc" disabled>
                        <option value="">-- Chọn lớp học --</option>
                        <?php
                            $sql2 = 'SELECT * FROM LopHoc';
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $selected = ($row2['IDLop'] == $row['IDLop']) ? 'selected' : '';
                                    echo "<option value='{$row2['IDLop']}' $selected>{$row2['TenLop']} - ID: {$row2['IDLop']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có lớp học</option>";
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