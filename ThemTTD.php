<?php
    include "data.php";
    $errors = [];
    if(isset($_POST['btn'])){
        $tenmenu = $_POST['tenmenu'];
        $mucdo = $_POST['mucdo'];
        $idcha = $_POST['idcha'];
        $thutu = $_POST['thutu'];
        $maquyen = $_POST['maquyen'];
        $action = $_POST['action'];
        if (empty($tenmenu)) {
          $errors['tenmenu'] = "Tên menu không được để trống";
        }
        if ($mucdo == "") {
            $errors['mucdo'] = "Mức độ không được để trống";
        }
        if ($idcha == "") {  
          $errors['idcha'] = "ID cha không được để trống";
        }
        if ($thutu == "") {
          $errors['thutu'] = "Thứ tự không được để trống";
        }
        if (!empty($mucdo) && !is_numeric($mucdo)) {
          $errors['mucdo'] = "Mức độ phải là một số.";
        }
        if (!empty($idcha) && !is_numeric($idcha)) {
            $errors['idcha'] = "ID cha phải là một số.";
        }
        if (!empty($thutu) && !is_numeric($thutu)) {
            $errors['thutu'] = "Thứ tự phải là một số.";
        }
        if (empty($errors)) {
          $sql = "insert into Menu(TenMenu, MucDo, IdCha, ThuTu, MaQuyen, ActionName) values('$tenmenu', '$mucdo', '$idcha', '$thutu', '$maquyen', '$action')";
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
              <h5 class="card-title">Thêm Thanh thực đơn</h5>
              <!-- Vertical Form -->
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenmenu" class="form-label">Tên menu</label>
                  <input type="text" class="form-control" name="tenmenu" value="<?php echo isset($tenmenu) ? $tenmenu : ''; ?>">
                  <?php if (isset($errors['tenmenu'])) echo "<span style='color:red;'>{$errors['tenmenu']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="mucdo" class="form-label">Mức độ</label>
                  <input type="text" class="form-control" name="mucdo" value="<?php echo isset($mucdo) ? $mucdo : ''; ?>">
                  <?php if (isset($errors['mucdo'])) echo "<span style='color:red;'>{$errors['mucdo']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="idcha" class="form-label">Id cha</label>
                  <input type="text" class="form-control" name="idcha" value="<?php echo isset($idcha) ? $idcha : ''; ?>">
                  <?php if (isset($errors['idcha'])) echo "<span style='color:red;'>{$errors['idcha']}</span>"; ?>
                </div>
                <div class="col-12">
                  <label for="thutu" class="form-label">Thứ tự</label>
                  <input type="text" class="form-control" name="thutu" value="<?php echo isset($thutu) ? $thutu : ''; ?>">
                  <?php if (isset($errors['thutu'])) echo "<span style='color:red;'>{$errors['thutu']}</span>"; ?>
                </div>
               
                <div class="col-12">
               
                <label asp-for="maquyen">Mã quyền</label>
                <select asp-for="maquyen" class="form-select" name="maquyen">
                  <option value="1">Admin</option>
                  <option value="2">Giáo viên</option>
                  <option value="3">Sinh viên</option>
                </select>
                </div>
          <div class="col-12">
                  <label for="action" class="form-label">Action Name</label>
                  <input type="text" class="form-control" name="action">
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
