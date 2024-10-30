<?php
    include "data.php";
    $errors = [];
    if(isset($_POST['btn'])){
        $tenmonhoc = $_POST['tenmonhoc'];
        $mota = $_POST['mota'];
        $sotc = $_POST['sotc'];

        if (empty($tenmonhoc)) {
          $errors['tenmonhoc'] = "Tên môn học không được để trống";
        }
        if (empty($sotc)) {
          $errors['sotc'] = "Số tín chỉ không được để trống";
        }
        if (empty($errors)) {
          $sql = "insert into MonHoc(TenMonHoc, SoTC, MoTa) values('$tenmonhoc', '$sotc', '$mota')";
          mysqli_query($conn, $sql);
          header('Location: ThemMHCT.php');
        }
        
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
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Thêm Môn học</h5>
              <!-- Vertical Form -->
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenmonhoc" class="form-label">Tên môn học</label>
                  <input type="text" class="form-control" name="tenmonhoc" value="<?php echo isset($tenmonhoc) ? $tenmonhoc : ''; ?>">
                  <?php if (isset($errors['tenmonhoc'])) echo "<span style='color:red;'>{$errors['tenmonhoc']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="sotc" class="form-label">Số tín chỉ</label>
                  <input type="text" class="form-control" name="sotc" value="<?php echo isset($sotc) ? $sotc : ''; ?>">
                  <?php if (isset($errors['sotc'])) echo "<span style='color:red;'>{$errors['sotc']}</span>"; ?>
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
  