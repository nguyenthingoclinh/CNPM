<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from NguoiDung where IDNDung=".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
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
          $anh = $row['anh'];
      }
      if (empty($hoten)) {
        $errors['hoten'] = "Họ tên không được để trống";
      }
      if (empty($matkhau)) {
        $errors['matkhau'] = "Mật khẩu không được để trống";
      }
      if (empty($cancuoc)) {
        $errors['cancuoc'] = "Căn cước không được để trống";
      }
      if (empty($ngaysinh)) {
        $errors['ngaysinh'] = "Ngày sinh không được để trống";
      }
      if (empty($diachi)) {
        $errors['diachi'] = "Địa chỉ không được để trống";
      }
      if (empty($errors)) {
        $sql = "update NguoiDung set HoTen = '$hoten', MatKhau = '$matkhau', CCCD = '$cancuoc', NgaySinh = '$ngaysinh', DiaChi = '$diachi', anh = '$anh' where IDNDung=".$this_id;
        mysqli_query($conn, $sql);
        header('Location: DS_SinhVien.php');
      }
        
    }
    if(isset($_POST['btnq'])){
        header('Location: DS_SinhVien.php');
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
              <h5 class="card-title">Sửa Sinh viên</h5>
              <!-- Vertical Form -->
              <form class="row g-3" method = "POST" enctype="multipart/form-data">
                <div class="col-12">
                  <label for="hoten" class="form-label">Họ tên</label>
                  <input type="text" class="form-control" name="hoten" value = "<?php echo $row['HoTen'];?>">
                  <?php if (isset($errors['hoten'])) echo "<span style='color:red;'>{$errors['hoten']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="matkhau" class="form-label">Mật khẩu</label>
                  <input type="text" class="form-control" name="matkhau" value = "<?php echo $row['MatKhau'];?>">
                  <?php if (isset($errors['matkhau'])) echo "<span style='color:red;'>{$errors['matkhau']}</span>"; ?>
                </div>
              
                <div class="col-12">
                  <label for="cancuoc" class="form-label">Căn cước</label>
                  <input type="text" class="form-control" name="cancuoc" value = "<?php echo $row['CCCD'];?>">
                  <?php if (isset($errors['cancuoc'])) echo "<span style='color:red;'>{$errors['cancuoc']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="ngaysinh" class="form-label">Ngày sinh</label>
                  <input type="date" class="form-control" name="ngaysinh" value = "<?php echo $row['NgaySinh'];?>">
                  <?php if (isset($errors['ngaysinh'])) echo "<span style='color:red;'>{$errors['ngaysinh']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="diachi" class="form-label">Địa chỉ</label>
                  <input type="text" class="form-control" name="diachi" value = "<?php echo $row['DiaChi'];?>">
                  <?php if (isset($errors['diachi'])) echo "<span style='color:red;'>{$errors['diachi']}</span>"; ?>
                </div>

                <div class="form-group col-md-12">
                  <label class="control-label">Ảnh hiện tại</label>
                    <div class="mb-3">
                        <?php if (!empty($row['anh'])): ?>
                            <img src="<?php echo $row['anh']; ?>" alt="Ảnh sinh viên" style="width: 150px; height: auto;">
                        <?php else: ?>
                            <p>Không có ảnh</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="control-label">Chọn ảnh mới (nếu muốn thay đổi)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-success" type="button" onclick="document.getElementById('anh').click()">Chọn ảnh</button>
                        </div>
                        <input type="file" class="form-control-file" name="anh" id="anh" style="display:none;" accept="image/*">
                        <input type="text" class="form-control" id="file_display" readonly>
                    </div>
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
  <?php
  include 'cuoi.php';
  ?>
  <script>
    document.getElementById('anh').addEventListener('change', function() {
        var fileName = this.files[0].name;
        document.getElementById('file_display').value = fileName;
    });
</script>
