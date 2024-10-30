<?php
    include "data.php";
    if(isset($_POST['btn'])){
       
       
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
              <h5 class="card-title">Thêm câu hỏi</h5>
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tende" class="form-label">Đề</label>
                  <input type="text" class="form-control" name="tende">
                </div>
                <div class="col-12">
                    <label for="monhoc" class="form-label">Môn học</label>
                    <select class="form-control" name="monhoc">
                        <option value="">-- Chọn môn học --</option>
                        <?php
                            $sql1 = 'SELECT * FROM MonHoc';
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    echo "<option value='{$row1['IDMonHoc']}'>{$row1['TenMonHoc']} - ID: {$row1['IDMonHoc']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có giảng viên</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                  <label for="DA1" class="form-label">Đáp án A</label>
                  <input type="text" class="form-control" name="DA1">
                </div>
                <div class="col-12">
                  <label for="DA2" class="form-label">Đáp án B</label>
                  <input type="text" class="form-control" name="DA2">
                </div>
                <div class="col-12">
                  <label for="DA3" class="form-label">Đáp án C</label>
                  <input type="text" class="form-control" name="DA3">
                </div>
                <div class="col-12">
                  <label for="DA4" class="form-label">Đáp án D</label>
                  <input type="text" class="form-control" name="DA4">
                </div>
                <div class="col-12">
                  <label for="DADung" class="form-label">Đáp án Đúng</label>
                  <select class="form-control" name="DADung">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
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
      </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  