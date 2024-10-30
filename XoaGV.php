<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from NguoiDung where IDNDung=".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['btn'])){
        $hoten = $_POST['hoten'];
        $matkhau = $_POST['matkhau'];
        $cancuoc = $_POST['cancuoc'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $sql = "delete from NguoiDung where IDNDung=".$this_id;
        mysqli_query($conn, $sql);
        header('Location: DS_GiangVien.php');
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
              <h5 class="card-title">Xóa Giảng viên</h5>
              <!-- Vertical Form -->
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="hoten" class="form-label">Họ tên</label>
                  <input type="text" class="form-control" name="hoten" value = "<?php echo $row['HoTen'];?>" disabled>
                </div>
                <div class="col-12">
                  <label for="matkhau" class="form-label">Mật khẩu</label>
                  <input type="text" class="form-control" name="matkhau" value = "<?php echo $row['MatKhau'];?>" disabled>
                </div>
              
                <div class="col-12">
                  <label for="cancuoc" class="form-label">Căn cước</label>
                  <input type="text" class="form-control" name="cancuoc" value = "<?php echo $row['CCCD'];?>" disabled>
                </div>
                <div class="col-12">
                  <label for="ngaysinh" class="form-label">Ngày sinh</label>
                  <input type="text" class="form-control" name="ngaysinh" value = "<?php echo $row['NgaySinh'];?>" disabled>
                </div>
                <div class="col-12">
                  <label for="diachi" class="form-label">Địa chỉ</label>
                  <input type="text" class="form-control" name="diachi" value = "<?php echo $row['DiaChi'];?>" disabled>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
                  <button type="submit" class="btn btn-secondary" name="btnq">Reset</button>
                </div>
              </form><!-- Vertical Form -->

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
