<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from Menu where IDMenu=".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['btn'])){
        $tenmenu = $_POST['tenmenu'];
        $mucdo = $_POST['mucdo'];
        $idcha = $_POST['idcha'];
        $thutu = $_POST['thutu'];
        $maquyen = $_POST['maquyen'];
        $sql = "delete from Menu where IDMenu=".$this_id;
        mysqli_query($conn, $sql);
        header('Location: DS_ThanhTD.php');
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
              <h5 class="card-title">Xóa Thanh thực đơn</h5>
              <!-- Vertical Form -->
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenmenu" class="form-label">Tên menu</label>
                  <input type="text" class="form-control" name="tenmenu" value = "<?php echo $row['TenMenu'];?>" disabled>
                </div>
                <div class="col-12">
                  <label for="mucdo" class="form-label">Mức độ</label>
                  <input type="text" class="form-control" name="mucdo" value = "<?php echo $row['MucDo'];?>" disabled>
                </div>
                <div class="col-12">
                  <label for="idcha" class="form-label">Id cha</label>
                  <input type="text" class="form-control" name="idcha" value = "<?php echo $row['IdCha'];?>" disabled>
                </div>
                <div class="col-12">
                  <label for="thutu" class="form-label">Thứ tự</label>
                  <input type="text" class="form-control" name="thutu" value = "<?php echo $row['ThuTu'];?>" disabled>
                </div>
               
                <div class="col-12">
                    <label for="maquyen">Mã quyền</label>
                    <select class="form-select" name="maquyen" id="maquyen" disabled>
                        <option value="1" <?php echo ($row['MaQuyen'] == 1) ? 'selected' : ''; ?>>Admin</option>
                        <option value="2" <?php echo ($row['MaQuyen'] == 2) ? 'selected' : ''; ?>>Giáo viên</option>
                        <option value="3" <?php echo ($row['MaQuyen'] == 3) ? 'selected' : ''; ?>>Sinh viên</option>
                    </select>
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
