<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from LopHoc lh join MH_GV on MH_GV.IDMH_GV = lh.IDMH_GV where lh.IDLop=".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['btn'])){
        $tenlophoc = $_POST['tenlophoc'];
        $monhoc = $_POST['monhoc'];
        $soluong = $_POST['soluong'];
        $ky = $_POST['ky'];
        $namhoc = $_POST['namhoc'];
        $sql = "update LopHoc set TenLop = '$tenlophoc', IDMH_GV = '$monhoc', SoLuong = '$soluong', Ky = '$ky', NamHoc = '$namhoc' where IDLop=".$this_id;
        mysqli_query($conn, $sql);
        header('Location: DS_LopHoc.php');
    }
    if(isset($_POST['btnq'])){
        header('Location: DS_LopHoc.php');
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
              <h5 class="card-title">Sửa Lớp học</h5>
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenlophoc" class="form-label">Tên lớp học</label>
                  <input type="text" class="form-control" name="tenlophoc" value = "<?php echo $row['TenLop'] ?>">
                </div>
                <div class="col-12">
                    <label for="monhoc" class="form-label">Môn học</label>
                    <select class="form-control" name="monhoc">
                        <option value="">-- Chọn môn học - giảng viên --</option>
                        <?php
                            $sql1 = 'SELECT * FROM MH_GV join NguoiDung nd on nd.IDNDung = MH_GV.IDNDung
                            join MonHoc mh on mh.IDMonHoc = MH_GV.IDMonHoc';
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    $selected = ($row1['IDMH_GV'] == $row['IDMH_GV']) ? 'selected' : '';
                                    echo "<option value='{$row1['IDMH_GV']}' $selected>{$row1['TenMonHoc']} - ID: {$row1['HoTen']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có giảng viên</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                  <label for="soluong" class="form-label">Số lượng</label>
                  <input type="text" class="form-control" name="soluong" value = "<?php echo $row['SoLuong'] ?>">
                </div>
                <div class="col-12">
                  <label for="namhoc" class="form-label">Năm học</label>
                  <input type="text" class="form-control" name="namhoc" value = "<?php echo $row['NamHoc'] ?>">
                </div>
                <div class="col-12">
                  <label for="ky" class="form-label">Kỳ học</label>
                  <input type="text" class="form-control" name="ky" value = "<?php echo $row['Ky'] ?>">
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

  </main>
  