
<?php
    include "data.php";
    include "classND.php"; 
    $user = new User(); 
    $id = $user->layIDNguoiDung();
    if(isset($_POST['btn'])){
        $tenbaithi = $_POST['tenbaithi'];
        $monhoc = $_POST['monhoc'];
        $socau = $_POST['socau'];
        $batdau = $_POST['batdau'];
        $ketthuc = $_POST['ketthuc'];
        $sql = "insert into BaiThi(IDMH_GV, TenBaiThi, SoCau, TGBatDau, TGKetThuc) values( '$monhoc', '$tenbaithi','$socau','$batdau', '$ketthuc')";
        mysqli_query($conn, $sql);
        header('Location: ND_DS_BaiThi.php');
    }
    if(isset($_POST['btnq'])){
        header('Location: ND_DS_BaiThi.php');
    }

    include "ND_dau1.php";
    
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Sửa bài thi</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="tenbaithi" class="form-label">Tên bài thi</label>
                    <input type="text" class="form-control" name="tenbaithi">
                </div>
                <div class="mb-3">
                <label for="monhoc" class="form-label">Môn học</label>
                    <select class="form-control" name="monhoc">
                        <option value="">-- Chọn môn học --</option>
                        <?php
                            $sql1 = "SELECT distinct mh.TenMonHoc, mhgv.IDMH_GV, HoTen FROM  MH_GV mhgv 
                            join MonHoc mh on mh.IDMonHoc = mhgv.IDMonHoc
                            join NguoiDung nd on nd.IDNDung = mhgv.IDNDung 
                            where nd.IDNDung = '$id'
                            order by mh.TenMonHoc";
                            $result1 = mysqli_query($conn, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    echo "<option value='{$row1['IDMH_GV']}'>{$row1['TenMonHoc']} - {$row1['HoTen']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="socau" class="form-label">Số câu</label>
                    <input type="number" class="form-control" name="socau">
                </div>
                <div class="mb-3">
                    <label for="batdau" class="form-label">Thời gian bắt đầu</label>
                    <input type="datetime-local" class="form-control" name="batdau">
                </div>
                <div class="mb-3">
                    <label for="ketthuc" class="form-label">Thời gian kết thúc</label>
                    <input type="datetime-local" class="form-control" name="ketthuc">
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btn">Submit</button>
                  <button type="submit" class="btn btn-secondary" name="btnq">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
     include "ND_cuoi.php";
?>