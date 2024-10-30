
<?php
    include "data.php";
    include "ND_dau1.php";
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
        echo "<script type='text/javascript'>
        window.location.href = 'ND_DS_SV_Lop.php?this_id=$this_id';
        </script>";
    }
    
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <h2 class="text-center mb-4">Thêm sinh viên vào lớp</h2>
            <form  method="POST">
                <div class="mb-3">
                    <label for="tenlop" class="form-label">Tên lớp</label>
                    <input type="text" class="form-control" name="tenlop" value = "<?php echo $tenlop ?>" disabled>
                </div>
                <div class="mb-3">
                <label for="sinhvien" class="form-label">Sinh viên</label>
                    <select class="form-control" name="sinhvien">
                        <option value="">-- Chọn sinh viên --</option>
                        <?php
                            $sql2 = 'SELECT * FROM NguoiDung where VaiTro like "Sinh Viên"';
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

<?php
     include "ND_cuoi.php";
?>