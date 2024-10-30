<?php
    include "data.php";
    $this_id = $_GET['this_id'];
    $sql1 = "select * from BaiThi where IDBaiThi =".$this_id;
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['btn'])){
        $lophoc = $_POST['lophoc'];
        $sql = "insert into BT_Lop(IDBaiThi, IDLop) values('$this_id', '$lophoc')";
        mysqli_query($conn, $sql);
    }
    if(isset($_POST['btnq'])){
        header('Location: DS_BaiThi.php');
    }
?>

<?php
  include 'dau1.php';
  ?>
  <main id="main" class="main d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    <section class="section" style="width: 100%; max-width: 1000px;">
    <div class="row justify-content-center">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thêm lớp học bài thi</h5>
                <form class="row g-3" method = "POST">
                    <div class="col-12">
                        <label for="baithi" class="form-label">Bài thi</label>
                        <input type="text" class="form-control" name="baithi" value = "<?php echo $row['TenBaiThi'];?>" disabled>
                    </div>
                    <div class="col-12">
                        <label for="lophoc" class="form-label">Lớp học</label>
                        <select class="form-control" name="lophoc">
                            <option value="">-- Chọn lớp học --</option>
                            <?php
                                $sql2 = 'SELECT * FROM LopHoc';
                                $result2 = mysqli_query($conn, $sql2);
                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        echo "<option value='{$row2['IDLop']}'>{$row2['TenLop']} - ID: {$row2['IDLop']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>Không có lớp</option>";
                                }
                            ?>
                        </select>
                    </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btn">Thêm</button>
                  <button type="submit" class="btn btn-secondary" name="btnq">Quay lại</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

  </main>
 