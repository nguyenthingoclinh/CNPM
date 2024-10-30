<?php
    include "data.php";
    
    $this_id = $_GET['this_id'];
    $sql1 = "select * from LopHoc where IDLop=".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $tenlop = $row['TenLop'];
    if(isset($_POST['btn'])){
        $sinhvien = $_POST['sinhvien'];
        $sql = "insert into Lop_SV (IDLop, IDNDung) values('$this_id','$sinhvien')";
        mysqli_query($conn, $sql);
    }
    if(isset($_POST['btnq'])){
        header("Location: DS_SV_Lop.php?this_id=$this_id");
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
              <h5 class="card-title">Thêm sinh viên</h5>
              <form class="row g-3" method = "POST">
                <div class="col-12">
                  <label for="tenlop" class="form-label">Tên lớp</label>
                  <input type="text" class="form-control" name="tenlop" value = "<?php echo $tenlop ?>" disabled>
                </div>
                <div class="col-12">
                    <label for="sinhvien" class="form-label">Sinh viên</label>
                    <select class="form-control" name="sinhvien">
                        <option value="">-- Chọn sinh viên --</option>
                        <?php
                            $sql2 = 'SELECT * FROM NguoiDung where VaiTro like "Sinh Viên" order by HoTen';
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    echo "<option value='{$row2['IDNDung']}'>{$row2['HoTen']} - ID: {$row2['IDNDung']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có</option>";
                            }
                        ?>
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

  </main>