<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql = "SELECT * from MonHoc
                where IDMonHoc =".$this_id;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['IDMonHoc'];
    $errors = [];
    if(isset($_POST['btn'])){
      $tenmonhoc = $_POST['tenmonhoc'];
      $nguoidung = $_POST['nguoidung'];
      $namhoc = $_POST['namhoc'];
      $sotc = $_POST['sotc'];

      if (empty($tenmonhoc)) {
        $errors['tenmonhoc'] = "Tên môn học không được để trống";
      }
      if (empty($sotc)) {
        $errors['sotc'] = "Số tín chỉ không được để trống";
      }
      if (empty($errors)) {
        $ssql = "update MonHoc set TenMonHoc = '$tenmonhoc', SoTC = '$sotc', MoTa = '$mota' where IDMonHoc=".$id;
        mysqli_query($conn, $ssql);
        header('Location: DS_MonHoc.php');
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
              <h5 class="card-title">Sửa Môn học</h5>
              <!-- Vertical Form -->
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenmonhoc" class="form-label">Tên môn học</label>
                  <input type="text" class="form-control" name="tenmonhoc" value = "<?php echo $row['TenMonHoc']?>">
                  <?php if (isset($errors['tenmonhoc'])) echo "<span style='color:red;'>{$errors['tenmonhoc']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="sotc" class="form-label">Số tín chỉ</label>
                  <input type="text" class="form-control" name="sotc" value = "<?php echo $row['SoTC']?>">
                  <?php if (isset($errors['sotc'])) echo "<span style='color:red;'>{$errors['sotc']}</span>"; ?>
                </div>
                
                <div class="col-12">
                  <label for="mota" class="form-label">Mô tả</label>
                  <input type="text" class="form-control" name="mota" value = "<?php echo $row['MoTa']?>">
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
  