<?php
    include "data.php";
    $errors = [];
    if(isset($_POST['btn'])){
        $tenlophoc = $_POST['tenlophoc'];
        $monhoc = $_POST['monhoc'];
        $namhoc = $_POST['namhoc'];
        $soluong = $_POST['soluong'];
        $ky = $_POST['ky'];
        if (empty($tenlophoc)) {
          $errors['tenlophoc'] = "Tên lớp học không được để trống";
        }
        if (empty($monhoc)) {
            $errors['monhoc'] = "Môn học không được để trống";
        }
        if (empty($soluong)) {
          $errors['soluong'] = "Số lượng không được để trống";
        }
        if (empty($ky)) {
          $errors['ky'] = "Kỳ không được để trống";
        }
        if (empty($namhoc)) {
          $errors['namhoc'] = "Năm học không được để trống";
        }
        if (!empty($soluong) && !is_numeric($soluong)) {
          $errors['soluong'] = "Số lượng phải là một số.";
        }
        if (!empty($ky) && !is_numeric($ky)) {
          $errors['ky'] = "Kỳ phải là một số.";
        }
        if (empty($errors)) {
          $sql = "insert into LopHoc(TenLop, IDMH_GV, SoLuong, NamHoc, Ky) values('$tenlophoc', '$monhoc', '$soluong', '$namhoc', '$ky')";
          mysqli_query($conn, $sql);
          header('Location: DS_LopHoc.php');
        }
        
    }
    if(isset($_POST['btnq'])){
        header('Location: DS_LopHoc.php');
    }
?>

<?php
  include 'dau1.php';
  ?>
  <main id="main" class="main d-flex justify-content-center align-items-center">
    <section class="section">
    <div class="row justify-content-center">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm Lớp học</h5>
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenlophoc" class="form-label">Tên lớp học</label>
                  <input type="text" class="form-control" name="tenlophoc" value="<?php echo isset($tenlophoc) ? $tenlophoc : ''; ?>">
                  <?php if (isset($errors['tenlophoc'])) echo "<span style='color:red;'>{$errors['tenlophoc']}</span>"; ?>
                </div>
                <div class="col-12">
                    <label for="monhoc" class="form-label">Môn học - Giảng viên</label>
                    <select class="form-control" name="monhoc" >
                        <option value="">-- Chọn môn học - giảng viên --</option>
                        <?php
                            $sql1 = 'SELECT * FROM MH_GV join NguoiDung nd on nd.IDNDung = MH_GV.IDNDung
                            join MonHoc mh on mh.IDMonHoc = MH_GV.IDMonHoc
                            order by mh.TenMonHoc';
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                  $selected = ($monhoc == $row1['IDMH_GV']) ? 'selected' : ''; 
                                  echo "<option value='{$row1['IDMH_GV']}' $selected>{$row1['TenMonHoc']} - ID: {$row1['HoTen']}</option>";
                                  
                                }
                            } else {
                                echo "<option value=''>Không có</option>";
                            }
                        ?>
                    </select>
                    <?php if (isset($errors['monhoc'])) echo "<span style='color:red;'>{$errors['monhoc']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="soluong" class="form-label">Số lượng</label>
                  <input type="text" class="form-control" name="soluong" value="<?php echo isset($soluong) ? $soluong : ''; ?>">
                  <?php if (isset($errors['soluong'])) echo "<span style='color:red;'>{$errors['soluong']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="namhoc" class="form-label">Năm học</label>
                  <input type="text" class="form-control" name="namhoc" value="<?php echo isset($namhoc) ? $namhoc : ''; ?>">
                  <?php if (isset($errors['namhoc'])) echo "<span style='color:red;'>{$errors['namhoc']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="ky" class="form-label">Kỳ</label>
                  <input type="text" class="form-control" name="ky" value="<?php echo isset($ky) ? $ky : ''; ?>">
                  <?php if (isset($errors['ky'])) echo "<span style='color:red;'>{$errors['ky']}</span>"; ?>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
                  <button type="submit" class="btn btn-secondary" name="btnq">Reset</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

  </main>
  