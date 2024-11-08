<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from Menu where IDMenu=".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $errors = [];
    if(isset($_POST['btn'])){
        $tenmenu = $_POST['tenmenu'];
        $mucdo = $_POST['mucdo'];
        $idcha = $_POST['idcha'];
        $thutu = $_POST['thutu'];
        $maquyen = $_POST['maquyen'];
        $action = $_POST['actionn'];
        if (empty($tenmenu)) {
          $errors['tenmenu'] = "Tên menu không được để trống";
        }
        if (empty($mucdo)) {
            $errors['mucdo'] = "Mức độ không được để trống";
        }
        if (!is_numeric($idcha) || $idcha < 0) {  
          $errors['idcha'] = "ID cha phải là số không âm";
        }
        if (empty($thutu)) {
          $errors['thutu'] = "Thứ tự không được để trống";
        }
        if (empty($errors)) {
          $sql = "update Menu set TenMenu = '$tenmenu', MucDo = '$mucdo', IdCha = '$idcha', ThuTu = '$thutu', MaQuyen = '$maquyen', ActionName = '$action' where IDMenu=".$this_id;
          mysqli_query($conn, $sql);
          header('Location: DS_ThanhTD.php');
        }
        
    }
    if(isset($_POST['btnq'])){
        header('Location: DS_ThanhTD.php');
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
              <h5 class="card-title">Sửa Thanh thực đơn</h5>
              <!-- Vertical Form -->
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenmenu" class="form-label">Tên menu</label>
                  <input type="text" class="form-control" name="tenmenu" value = "<?php echo $row['TenMenu'];?>">
                  <?php if (isset($errors['tenmenu'])) echo "<span style='color:red;'>{$errors['tenmenu']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="mucdo" class="form-label">Mức độ</label>
                  <input type="text" class="form-control" name="mucdo" value = "<?php echo $row['MucDo'];?>">
                  <?php if (isset($errors['mucdo'])) echo "<span style='color:red;'>{$errors['mucdo']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="idcha" class="form-label">Id cha</label>
                  <input type="text" class="form-control" name="idcha" value = "<?php echo $row['IdCha'];?>">
                  <?php if (isset($errors['idcha'])) echo "<span style='color:red;'>{$errors['idcha']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="thutu" class="form-label">Thứ tự</label>
                  <input type="text" class="form-control" name="thutu" value = "<?php echo $row['ThuTu'];?>">
                  <?php if (isset($errors['thutu'])) echo "<span style='color:red;'>{$errors['thutu']}</span>"; ?>
                </div>
               
                <div class="col-12">
                    <label for="maquyen">Mã quyền</label>
                    <select class="form-select" name="maquyen" id="maquyen">
                        <option value="1" <?php echo ($row['MaQuyen'] == 1) ? 'selected' : ''; ?>>Admin</option>
                        <option value="2" <?php echo ($row['MaQuyen'] == 2) ? 'selected' : ''; ?>>Giáo viên</option>
                        <option value="3" <?php echo ($row['MaQuyen'] == 3) ? 'selected' : ''; ?>>Sinh viên</option>
                    </select>
                </div>
                <div class="col-12">
                  <label for="actionn" class="form-label">Action Name</label>
                  <input type="text" class="form-control" name="actionn" value = "<?php echo $row['ActionName'];?>">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
                  <button type="submit" class="btn btn-warning" name="btnq">Reset</button>
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