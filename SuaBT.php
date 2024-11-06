<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from BaiThi where IDBaiThi =".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $errors = [];
    if(isset($_POST['btn'])){
        $tenbaithi = $_POST['tenbaithi'];
        $monhoc = $_POST['monhoc'];
        $socau = $_POST['socau'];
        $batdau = $_POST['batdau'];
        $ketthuc = $_POST['ketthuc'];
        if (empty($tenbaithi)) {
          $errors['tenbaithi'] = "Tên bài thi không được để trống";
        }
        if (empty($monhoc)) {
            $errors['monhoc'] = "Môn học không được để trống";
        }
        if (empty($socau)) {
          $errors['socau'] = "Số câu không được để trống";
        }
        if (empty($batdau)) {
          $errors['batdau'] = "Thời gian bắt đầu không được để trống";
        }
        if (empty($ketthuc)) {
          $errors['ketthuc'] = "Thời gian kết thúc không được để trống";
        }
        if (empty($errors)) {
          $sql = "update BaiThi set IDMH_GV = '$monhoc', TenBaiThi = '$tenbaithi', SoCau = '$socau', TGBatDau = '$batdau', TGKetThuc = '$ketthuc' 
          where IDBaiThi=".$this_id;
          mysqli_query($conn, $sql);
          header('Location: DS_BaiThi.php');
        }
        
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
              <h5 class="card-title">Sửa bài thi</h5>
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenbaithi" class="form-label">Tên bài thi</label>
                  <input type="text" class="form-control" name="tenbaithi" value = "<?php echo $row['TenBaiThi'] ?>">
                  <?php if (isset($errors['tenbaithi'])) echo "<span style='color:red;'>{$errors['tenbaithi']}</span>"; ?>
                </div>
                <div class="col-12">
                    <label for="monhoc" class="form-label">Môn học</label>
                    <select class="form-control" name="monhoc" >
                        <option value="">-- Chọn môn học --</option>
                        <?php
                            $sql2 = 'SELECT * FROM  MH_GV mhgv 
                            join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc
                            join NguoiDung nd on nd.IDNDung = mhgv.IDNDung order by mh.TenMonHoc';
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $selected = ($row2['IDMH_GV'] == $row['IDMH_GV']) ? 'selected' : '';
                                    echo "<option value='{$row2['IDMH_GV']}' $selected>{$row2['TenMonHoc']} - {$row2['HoTen']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có</option>";
                            }
                        ?>
                    </select>
                    <?php if (isset($errors['monhoc'])) echo "<span style='color:red;'>{$errors['monhoc']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="socau" class="form-label">Số câu</label>
                  <input type="number" class="form-control" name="socau" value = "<?php echo $row['SoCau'] ?>" >
                  <?php if (isset($errors['socau'])) echo "<span style='color:red;'>{$errors['socau']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="batdau" class="form-label">Thời gian bắt đầu</label>
                  <input type="datetime-local" class="form-control" name="batdau" value = "<?php echo $row['TGBatDau'] ?>" >
                  <?php if (isset($errors['batdau'])) echo "<span style='color:red;'>{$errors['batdau']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="ketthuc" class="form-label">Thời gian kết thúc</label>
                  <input type="datetime-local" class="form-control" name="ketthuc" value = "<?php echo $row['TGKetThuc'] ?>" >
                  <?php if (isset($errors['ketthuc'])) echo "<span style='color:red;'>{$errors['ketthuc']}</span>"; ?>
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
  