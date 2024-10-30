<?php
    include "data.php";
    if(isset($_POST['btn'])){
        $tenbaithi = $_POST['tenbaithi'];
        $monhoc = $_POST['monhoc'];
        $socau = $_POST['socau'];
        $batdau = $_POST['batdau'];
        $ketthuc = $_POST['ketthuc'];
        $sql = "insert into BaiThi(IDMH_GV, TenBaiThi, SoCau, TGBatDau, TGKetThuc) values( '$monhoc', '$tenbaithi','$socau','$batdau', '$ketthuc')";
        mysqli_query($conn, $sql);
        header('Location: DS_BaiThi.php');
    }
    if(isset($_POST['btnq'])){
        header('Location: DS_BaiThi.php');
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
              <h5 class="card-title">Thêm bài thi</h5>
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenbaithi" class="form-label">Tên bài thi</label>
                  <input type="text" class="form-control" name="tenbaithi">
                </div>
                <div class="col-12">
                    <label for="monhoc" class="form-label">Môn học</label>
                    <select class="form-control" name="monhoc">
                        <option value="">-- Chọn môn học --</option>
                        <?php
                            $sql1 = 'SELECT * FROM  MH_GV mhgv 
                            join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc
                            join NguoiDung nd on nd.IDNDung = mhgv.IDNDung order by mh.TenMonHoc';
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    echo "<option value='{$row1['IDMH_GV']}'>{$row1['TenMonHoc']} - {$row1['HoTen']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                  <label for="socau" class="form-label">Số câu</label>
                  <input type="number" class="form-control" name="socau">
                </div>
                <div class="col-12">
                  <label for="batdau" class="form-label">Thời gian bắt đầu</label>
                  <input type="datetime-local" class="form-control" name="batdau">
                </div>
                <div class="col-12">
                  <label for="ketthuc" class="form-label">Thời gian kết thúc</label>
                  <input type="datetime-local" class="form-control" name="ketthuc">
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

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  