<?php
    include "data.php";
    $errors = [];
    if(isset($_POST['btn'])){
        $hoten = $_POST['hoten'];
        $matkhau = $_POST['matkhau'];
        $cancuoc = $_POST['cancuoc'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        if (isset($_FILES['anh']) && $_FILES['anh']['error'] == 0) {
          $uploadDir = 'uploads/';
          $fileName = basename($_FILES['anh']['name']);
          $uploadFile = $uploadDir . $fileName;
          if (move_uploaded_file($_FILES['anh']['tmp_name'], $uploadFile)) {
              $anh = $uploadFile; 
          } else {
              echo "Lỗi: Không thể tải lên file ảnh.";
          }
        } else {
            $anh = ""; 
        }

        if (empty($hoten)) {
          $errors['hoten'] = "Họ tên không được để trống";
        }
        if (empty($matkhau)) {
          $errors['matkhau'] = "Mật khẩu không được để trống";
        }
        if ($cancuoc == "") {
          $errors['cancuoc'] = "Căn cước không được để trống";
        }
        if (empty($ngaysinh)) {
          $errors['ngaysinh'] = "Ngày sinh không được để trống";
        }
        if (empty($diachi)) {
          $errors['diachi'] = "Địa chỉ không được để trống";
        }
        if (!empty($cancuoc) && !is_numeric($cancuoc)) {
          $errors['cancuoc'] = "Căn cước phải là một số.";
        }
        if (empty($errors)) {
          $sql = "insert into NguoiDung(HoTen, MatKhau, VaiTro, CCCD, NgaySinh, DiaChi, anh) values('$hoten', '$matkhau', 'Giáo Viên', '$cancuoc', '$ngaysinh', '$diachi', '$anh')";
          mysqli_query($conn, $sql);
          header('Location: DS_GiangVien.php');
        }
       
    }
    if(isset($_POST['btnq'])){
        header('Location: DS_GiangVien.php');
    }
?>


<?php
  include 'dau1.php';
  ?>
  <main id="main" class="main d-flex justify-content-center align-items-center">
    <section class="section">
    <div class="row justify-content-center">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm Giảng viên</h5>
              <form class="row g-3" method = "POST" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="hoten" class="form-label">Họ tên</label>
                  <input type="text" class="form-control" name="hoten" value="<?php echo isset($hoten) ? $hoten : ''; ?>">
                  <?php if (isset($errors['hoten'])) echo "<span style='color:red;'>{$errors['hoten']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="matkhau" class="form-label">Mật khẩu</label>
                  <input type="text" class="form-control" name="matkhau" value="<?php echo isset($matkhau) ? $matkhau : ''; ?>">
                  <?php if (isset($errors['matkhau'])) echo "<span style='color:red;'>{$errors['matkhau']}</span>"; ?>
                </div>
              
                <div class="col-12">
                  <label for="cancuoc" class="form-label">Căn cước</label>
                  <input type="text" class="form-control" name="cancuoc" value="<?php echo isset($cancuoc) ? $cancuoc : ''; ?>">
                  <?php if (isset($errors['cancuoc'])) echo "<span style='color:red;'>{$errors['cancuoc']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="ngaysinh" class="form-label">Ngày sinh</label>
                  <input type="date" class="form-control" name="ngaysinh" value="<?php echo isset($ngaysinh) ? $ngaysinh : ''; ?>">
                  <?php if (isset($errors['ngaysinh'])) echo "<span style='color:red;'>{$errors['ngaysinh']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="diachi" class="form-label">Địa chỉ</label>
                  <input type="text" class="form-control" name="diachi" value="<?php echo isset($diachi) ? $diachi : ''; ?>">
                  <?php if (isset($errors['diachi'])) echo "<span style='color:red;'>{$errors['diachi']}</span>"; ?>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label">Images</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-success" type="button" onclick="document.getElementById('anh').click()">Choose a pic</button>
                        </div>
                        <input type="file" class="form-control-file" asp-for="LinkImage" name="anh" id="anh" style="display:none;" accept="image/*">
                        <input type="text" class="form-control" id="file_display" readonly>
                    </div>
                </div>

                <script>
                    document.getElementById('anh').addEventListener('change', function() {
                        var fileName = this.files[0].name;
                        document.getElementById('file_display').value = fileName;
                    });
                </script>

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
  <?php
  include 'cuoi.php';
  ?>
