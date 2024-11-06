<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from MonHoc  where IDMonHoc=".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['btn'])){
        $monhoc = $_POST['monhoc'];
        $lophoc = $_POST['lophoc'];
        $nguoidung = $_POST['nguoidung'];
        $mota = $_POST['mota'];
        $sql = "insert into MH_GV(IDMonHoc, IDNDung) values('$monhoc', '$nguoidung')";
        mysqli_query($conn, $sql);
       
    }
    if(isset($_POST['btnq'])){
        header('Location: DS_MonHoc.php');
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
              <h5 class="card-title">Thêm chi tiết môn học</h5>
              <form class="row g-3" method = "POST">
              <div class="col-12">
                  <label for="monhoc" class="form-label">Môn học</label>
                  <input type="text" class="form-control" name="monhoc" value="<?php echo $row['TenMonHoc']; ?>">
                </div>
                <div class="col-12">
                    <label for="nguoidung" class="form-label">Người dùng</label>
                    <select class="form-control" name="nguoidung">
                        <option value="">-- Chọn giảng viên --</option>
                        <?php
                            $sql3 = 'SELECT * FROM NguoiDung WHERE VaiTro LIKE "Giáo Viên"';
                            $result3 = mysqli_query($conn, $sql3);
                            if (mysqli_num_rows($result3) > 0) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    echo "<option value='{$row3['IDNDung']}'>{$row3['HoTen']} - ID: {$row3['IDNDung']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có giảng viên</option>";
                            }
                        ?>
                    </select>
                </div>
                
                <div class="col-12">
                  <label for="mota" class="form-label">Mô tả</label>
                  <input type="text" class="form-control" name="mota">
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

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'cuoi.php';
  ?>
